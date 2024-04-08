<?php
include_once 'header.php';
include_once '../src/userFunctions.php';

session_start();
try {
    $mysqli = db_connect();

    $newUser = null;
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newUser = getUser("$email","$password");
    }
    if(isset($_SESSION['user'])){
        $newUser = 1;
    }
}catch (PDOException $e){
    die("error!: " . $e->getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div class="page inloggen">
    <div class="container">
        <h1>Inloggen</h1>
        <?php if ($newUser === 1){?>
        <p>je bent al ingelogd</p>
        <?php }else{ ?>
        <form method="post" action="checknaam.php">
            <div class="inputRow">
                <label for="email">Email</label>
                <input type="email" name="email">
                <br>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password">
                <br>
                <input type="submit" name="login" value="Inloggen">
            </div>
        </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
<?php include_once 'footer.php'; ?>