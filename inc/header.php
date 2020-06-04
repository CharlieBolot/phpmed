<?php $page=$_SERVER['REQUEST_URI'];?>
<?php if($page != "/phpMed/connexion/praticien/profil/redacordo"):?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/phpMed/css/calendar.css">
    <?php session_start(); ?>

    <?php $path=explode("?",strtolower($_SERVER['REQUEST_URI']));
    $path = explode('/', $path[0]);?>
    <?php if(isset($path[5])):
        if(($path[5]!= 'ordo')&&($path[5]!= 'newordo')): 
            if(isset($_SESSION['id_ordo'])): 
                unset($_SESSION['id_ordo']); 
            endif;
        endif;
    endif; ?>

    <title>PhpMed</title>
        <nav class="navbar navbar-dark bg-primary mb-3">
            <?php if(!empty($_SESSION['type'])) :?>
                    <a href="/phpMed/connexion/<?=$_SESSION['type']?>/" class="navbar-brand"><!--Mon calendrier-->PhpMed</a>
                    <?php if($_SERVER['REQUEST_URI'] != '/phpMed/connexion/'.$_SESSION['type'].'/profil' ):?>
                    <a href="/phpMed/connexion/<?=$_SESSION['type']?>/profil" class="navbar-brand"><!--Mon calendrier-->Retour menu</a>
                    <?php endif; ?>
                    <a href="/phpMed/navigation/deco.php" class="navbar-brand"><!--Mon calendrier-->Deconnexion</a>

                    
            <?php else :?>
                    <a href="/phpMed/" class="navbar-brand"><!--Mon calendrier-->PhpMed</a>


            <?php endif ; ?>
        </nav>
    </head>
    <body>
<?php endif ; ?>




