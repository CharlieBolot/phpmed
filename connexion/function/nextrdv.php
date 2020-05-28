<?php
require_once 'connexion/bdd/bdd.php';
$idprat = $_SESSION['idprat'];
$next = [];



$pdo= get_pdo();
$query=$pdo->prepare('SELECT * FROM events WHERE idprat = :idprat AND DATE_format(start, \'%d/%m/%Y%H/%i/%s\') > DATE_format(NOW(), \'%d/%m/%Y%H/%i/%s\') AND DATE(start) = DATE(NOW())');
$query->bindValue(':idprat',$idprat, PDO::PARAM_STR);

$query->execute();
$nextrdv=$query->fetch();

$nexttime = (new DateTime($nextrdv['start']))->format('H:i');

$query=$pdo->prepare('SELECT * FROM patient WHERE id = :idpat');
$query->bindValue(':idpat',$nextrdv['idpat'], PDO::PARAM_STR);
$query->execute();
$nextpat=$query->fetchAll();


