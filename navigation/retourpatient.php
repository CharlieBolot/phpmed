<?php
// On appelle la session
session_start();

// On écrase le tableau de session
$_SESSION['id_ordo'] = array();


// On redirige le praticient vers le profil du patient

//header('Location:  /phpMed/connexion/praticien/profil/fiche?id='.$i.'"');
header('Location: /phpMed/connexion/praticien/profil');
?>
