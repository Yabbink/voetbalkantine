<?php
require_once('header.php');
require_once('../src/userFunctions.php');

session_start();
try {
    $mysqli = db_connect();

    $newUser = null;
    if (isset($_POST['register'])){
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newUser = registerUser("$firstname","$lastname","$email","$password");
    }
    if(isset($_SESSION['user'])){
        $newUser = 2;
    }
}catch (PDOException $e){
    die("error!: " . $e->getMessage());
}
?>
<div class="page registreren">
    <div class="container">
        <h1>Registreren</h1>
        <?php if ($newUser === 1){?>
            <p>nieuwe gebruiker succesvol toegevoegd</p>
        <?php }else if ($newUser === 2){?>
            <p>je bent al ingelogd dus hoef je jezelf niet te registreren</p>
        <?php }else{ ?>
            <form action="#" method="post">
                <div class="inputRow">
                    <label for="firstName">Voornaam</label>
                    <input type="text" name="firstName">
                    <br>
                    <label for="lastName">Achternaam</label>
                    <input type="text" name="lastName">
                    <br>
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <br>
                    <label for="password">Wachtwoord</label>
                    <input type="password" name="password">
                    <br>
                    <input type="submit" name="register" value="Registreer">
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<?php require_once 'footer.php';?>
