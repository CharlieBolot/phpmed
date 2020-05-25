<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../calendrier/public/css/calendar.css">
    <?php session_start(); ?>
    <title>PhpMed</title>


    <nav class="navbar navbar-dark bg-primary mb-3">
    <a href="/phpMed/connexion/<?=$_SESSION['type']?>/" class="navbar-brand"><!--Mon calendrier-->PhpMed</a>
</nav>
</head>
<body>



