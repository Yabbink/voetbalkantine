<?php require_once 'header.php'; ?>
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location: naaminvullen.php");
    exit;
}
?>
<div class="page home">
    <div class="container">
        <br>
        <p><?php echo "welkom " . $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'] . "" ?></p>
        <h1>Informatie</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo inventore magni mollitia numquam optio quam qui quod rem reprehenderit temporibus? Aspernatur consectetur consequuntur doloremque eos est eum fugiat officia voluptatem.</p>
        <a href="logout.php">Logout</a>
        <br>
    </div>
</div>
<?php require_once 'footer.php'; ?>
