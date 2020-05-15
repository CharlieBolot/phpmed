<!Doctype html>

<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/calendar.css">
    <title><?= isset($title) ? h($title): 'Mon calendrier' ?></title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-3">
    <a href="../public/index.php" class="navbar-brand">Mon calendrier</a>
</nav>