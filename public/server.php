<?php
require_once "../src/databaseFunctions.php";
session_start();
$db = db_connect();

// initialize variables
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$id = 0;

if (isset($_GET['del']))
{
    $id = $_GET['del'];

    $db->query("DELETE FROM `bestelling` WHERE `id` = '$id'");

    $_SESSION['message'] = "Cijfer deleted!";
    header('location: productbeheer.php');
}