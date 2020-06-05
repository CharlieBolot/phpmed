<?php
session_start(); 
 if(empty($_SESSION['idmedoc'])){
  $_SESSION['idmedoc'] = 0;
};
if(empty($_SESSION['id_ordo'])){
  $_SESSION['id_ordo'] = 0;
}; 
 
//require 'connexion/fpdf/fpdf.php';
require('connexion\fpdf\fpdf.php');


// Création de la class PDF 
class PDF extends FPDF { 
    // Header 
    function Header() { 
      // Logo : 100 >position à droite du document (en mm), 2 >position en haut du document, 40 >largeur de l'image en mm). La hauteur est calculée automatiquement. 
      $this->Image('connexion\views\ordo\logo.png',100,2,40); 
      // Saut de ligne 20 mm 
      $this->Ln(20); 
   
      // Titre gras (B) police Helbetica de 15 
      $this->SetFont('Helvetica','B',15); 
      // fond de couleur gris (valeurs en RGB) 
      $this->setFillColor(230,230,230); 
       // position du coin supérieur gauche par rapport à la marge gauche (mm) 
      $this->SetX(35); 
      $this->SetY(15); 
      // Texte : 100 >largeur ligne, 10 >hauteur ligne. Premier 0 >pas de bordure, 1 >retour à la ligneensuite, C >centrer texte, 1> couleur de fond ok   
      $this->Cell(100,5,'Dr '.$_SESSION['prenom'].' '.$_SESSION['nom'],0,1,'L',0); 

      // Titre gras (B) police Helbetica de 10
      $this->SetFont('Helvetica','I',10); 

      $this->Cell(100,5,utf8_decode('Diplômé de la faculté de medecine de Paris'),0,1,'L',0); 
      $this->Cell(100,5,'Medecine Generale',0,1,'L',0); 
      // Saut de ligne 10 mm 
      $this->Ln(20);     
    } 

    // Footer 
    function Footer() { 
      // Positionnement à 1,5 cm du bas 
      $this->SetY(-15); 
      // Police Arial italique 8 
      $this->SetFont('Helvetica','I',9); 
      // Numéro de page, centré (C) 
      $this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'C'); 

      $this->Image('connexion\views\ordo\signature.png',100,175,20,10); 
    } 
  }

  
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.) 
$pdf = new PDF('P','mm','A5'); 
 
// Nouvelle page (incluant ici logo, titre et pied de page) 
$pdf->AddPage(); 
// Polices par défaut : Helvetica taille 9 
$pdf->SetFont('Helvetica','',9); 
// Couleur par défaut : noir 
$pdf->SetTextColor(0); 
// Compteur de pages {nb} 
$pdf->AliasNbPages();
$pdf->Image('connexion\views\ordo\barcode.png',15,35,30,10);
// Sous-titre calées à gauche, texte gras (Bold), police de caractère 11 
$pdf->SetFont('Helvetica','B',11); 
// couleur de fond de la cellule : gris clair 
$pdf->setFillColor(230,230,230); 
// Cellule avec les données du sous-titre sur 2 lignes, pas de bordure mais couleur de fond grise 
$pdf->Cell(75,6,strtoupper(utf8_decode('Pour'.' : '.$_SESSION['fiche'][0][2].' '.$_SESSION['fiche'][0][1])),0,1,'L',1);         
$pdf->Cell(75,6,'Le '.date('d/m/Y'),0,1,'L',1);     
$pdf->Ln(10); // saut de ligne 10mm
// Fonction en-tête des tableaux en 3 colonnes de largeurs variables 
function entete_table($position_entete,$i) { 
    global $pdf; 
    $pdf->SetDrawColor(183); // Couleur du fond RVB 
    $pdf->SetFillColor(221); // Couleur des filets RVB 
    $pdf->SetTextColor(0); // Couleur du texte noir 
    $pdf->SetY($position_entete); 
    // position de colonne 1 (10mm à gauche)   
    $pdf->SetX(10);
    $pdf->Cell(40,8,utf8_decode(medicament($_SESSION['id_ordo'])[$i]['nom']),0,0,'L',0);  // 40 >largeur colonne, 8 >hauteur colonne 
    // position de la colonne 2 (50 = 10+40) 
    $pdf->SetX(50);  
    $pdf->Cell(90,8,utf8_decode(medicament($_SESSION['id_ordo'])[$i]['posologie']),0,0,'L',0); 
  
    $pdf->Ln(); // Retour à la ligne 
  }


  function medicament($id_ordo){
    require_once 'connexion/bdd/bdd.php';
    $pdo= get_pdo();
    $req = $pdo->prepare('SELECT posologie,ligne_ordo.id_medicament,nom FROM ligne_ordo,medicament WHERE ligne_ordo.id_ordo = :id_ordo AND ligne_ordo.id_medicament = medicament.id_medicament ORDER BY nom ASC ');
    $req->bindParam(':id_ordo',$id_ordo, PDO::PARAM_STR);
    $req->execute( );
    $data = $req->fetchAll();
    //var_dump($data);
    return $data;

  }

  function nbligne($id_ordo){
    require_once 'connexion/bdd/bdd.php';
    $pdo= get_pdo();
    $req = $pdo->prepare('SELECT COUNT(id_ordo) FROM ligne_ordo,ordo WHERE ligne_ordo.id_ordo = ordo.id AND ligne_ordo.id_ordo = :id_ordo ');
    $req->bindParam(':id_ordo',$id_ordo, PDO::PARAM_STR);
    $req->execute( );
    $data = $req->fetch();
   
    return $data['COUNT(id_ordo)'];
  }
  
 
  
  // AFFICHAGE EN-TÊTE DU TABLEAU 
  // Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (70 mm) 
  $position_entete = 70; 
  // police des caractères 
  $pdf->SetFont('Helvetica','',9); 
  $pdf->SetTextColor(0); 
  // on affiche les en-têtes du tableau 
  for($i=0; $i<nbligne($_SESSION['id_ordo']); $i++){
  entete_table($position_entete,$i);
  $position_entete += 5;
  }
  
 

  $position_detail = 78; // Position ordonnée = $position_entete+hauteur de la cellule d'en-tête (60+8) 





// affichage à l'écran... 
$pdf->Output('ordonnance'.$_SESSION['fiche'][0][2].$_SESSION['fiche'][0][1].'pdf','I');