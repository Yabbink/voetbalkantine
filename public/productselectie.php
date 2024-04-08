<?php include_once 'header.php';?>
<?php include_once '../src/databaseFunctions.php';?>
<?php include_once '../src/userFunctions.php';?>
<?php
session_start();
try {
    if(!isset($_SESSION['user'])){
        header("location: naaminvullen.php");
        exit;
    }
    echo "welkom " . $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'] . "" . " <a href='logout.php'>Logout</a>";
    $mysqli = db_connect();
    $producten = db_getData('select * from producten');
}catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>
<div class="page productselectie">
    <div class="container">
        <h1>producten</h1>
        <form method="post" action="orderConfirmation.php">
        <div class="producten">
            <?php foreach($producten as $product){ ?>
                <div class="products">
                    <img src="<?php echo IMAGE_FOLDER . "/" . $product['productImg']; ?>" alt="product">
                    <h2> <?php echo $product['naam'] . "<br> €" . $product['prijs']; ?> </h2>
                    <input type="submit" name="bestellen" value="<?php echo $product['productid'] ?>">
                </div>
            <?php } ?>
        </div>
        </form>
        <br>
        <br>
    </div>
</div>
<?php include_once 'footer.php';?>
