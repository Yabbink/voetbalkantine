<?php include_once '../config/config.php'; ?>
<?php include_once '../config/database.php'; ?>
<?php include_once '../src/databaseFunctions.php';?>
<?php include_once '../src/userFunctions.php';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>voetbalkantine</title>
    <link rel="stylesheet" href="<?php echo CSS_FOLDER ?>/style.css">
<!--    <link rel="stylesheet" href="css/style.css">-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

</head>
<body>
<!-- Start navigation -->
<nav>
    <div class="container">
        <div class="logo">
            <h3>voetbalkantine</h3>
            <img src="images/logoratti.jpg" alt="afbeelding2">
        </div>
        <ul class="menu">
            <li><a href="../public/index.php">Home</a></li>
            <li><a href="../public/naaminvullen.php">Inloggen</a></li>
            <li><a href="../public/registreren.php">Registreren</a></li>
            <li><a href="../public/productselectie.php">Producten</a></li>
            <li><a href="../public/productbeheer.php">Beheer</a></li>
        </ul>
    </div>
</nav>
<!-- End navigation -->
<!-- Start hero image -->
<section class="hero">
    <div class="content">
        <h1>Welkom in de voetbalkantine</h1>
        <p>Selecteer het eten en drinken of log in</p>
        <div class="btn-group">
            <a href="productselectie.php" class="btn-primary">selecteer producten</a>
            <a href="naaminvullen.php" class="btn-secondary">log in</a>
        </div>
    </div>

</section>
<!-- End hero image -->
