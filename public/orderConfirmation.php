<?php require_once 'header.php';
require_once '../src/databaseFunctions.php';

session_start();
$mysqli = db_connect();
if(isset($_POST['bestellen'])){
    $userID = $_SESSION['user']['id'];
    $productid = $_POST['bestellen'];
    $prijs = db_getData("SELECT prijs FROM producten WHERE productid = '$productid'");
    $prijs2 = $prijs->fetch_assoc();
    $prijs3 = implode($prijs2);
    $sql = db_insertData("INSERT INTO bestelling (userid,productid,prijs,datum) VALUES ('$userID' ,'$productid', '$prijs3', CURRENT_TIMESTAMP)");

    $sql2 = db_getData("SELECT bestelling.userid AS 'userid',producten.naam AS 'naam', bestelling.productid AS 'productid', bestelling.prijs AS 'prijs' FROM bestelling,producten WHERE userid = '$userID' AND bestelling.productid = producten.productid ORDER BY id DESC LIMIT 1");
    $orderData = $sql2->fetch_assoc();
}
?>
    <div class="page orderConfirmation">
        <div class="container">
            <h1>Bedankt voor de bestelling!</h1>
            <table class="orderOverview" border="1">
                <tr>
                    <th>userid</th>
                    <th>naam</th>
                    <th>productid</th>
                    <th>prijs</th>
                </tr>
                <tr>
                    <td><?php echo $orderData['userid']; ?></td>
                    <td><?php echo $orderData['naam']; ?></td>
                    <td><?php echo $orderData['productid']; ?></td>
                    <td><?php echo $orderData['prijs']; ?></td>
                </tr>
            </table>
            <p><a href="productselectie.php">bestel</a> nog een product</p>
        </div>
    </div>
<?php include_once 'footer.php';?>