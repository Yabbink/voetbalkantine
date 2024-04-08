<?php require_once 'header.php';
require_once '../src/databaseFunctions.php';
require_once '../src/UserFunctions.php';

session_start();
try {
    $db = db_connect();
    $beheerder = null;
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $admin = db_getData("SELECT email, wachtwoord FROM beheerder WHERE email = '$email' AND wachtwoord = '$wachtwoord'");
        $beheerder = $admin->fetch_assoc();
    }
    $bestellingen = db_getData("select * from bestelling INNER JOIN producten ON bestelling.productid = producten.productid");
    $users = db_getData("select * from users");
}catch (PDOException $e){
    die("error!: " . $e->getMessage());
}
?>
<section>
    <?php if($beheerder !== 'no admin found' && $beheerder !== null){?>
        <div class="page login">
            <div class="container">
<!--                <p>wil je de <a href="#">bestellingen</a> of wil je de <a href="#">users</a> zien</p>-->
                <h1 >bestellingen van vandaag</h1>
                    <table border="1">
                        <tr>
                            <th>bestellingid</th>
                            <th>userid</th>
                            <th>productid</th>
                            <th>naam</th>
                            <th>prijs</th>
                            <th>datum</th>
                            <th>verwijderen</th>
                        </tr>
                        <?php foreach($bestellingen as $bestel){?>
                        <tr>
                            <td><?php echo $bestel['id'] ?></td>
                            <td><?php echo $bestel['userid'] ?></td>
                            <td><?php echo $bestel['productid'] ?></td>
                            <td><?php echo $bestel['naam'] ?></td>
                            <td><?php echo $bestel['prijs'] ?></td>
                            <td><?php echo $bestel['datum'] ?></td>
                            <td><a href="server.php?del=<?php echo $bestel['id']; ?>">Verwijderen</a></td>
                        </tr>
                        <?php } ?>
                    </table>
            </div>
        </div>
    <?php }else{ ?>
    <div class="page login">
        <div class="container">
            <h1>Inloggen Beheerder</h1>
            <form action="#" method="post">
                <div class="inputRow">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="inputRow">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" name="wachtwoord">
                </div>
                <div class="inputRow">
                    <input type="submit" value="login" name="login">
                </div>
            </form>
            <?php } ?>
</section>
<?php require_once 'footer.php'; ?>
