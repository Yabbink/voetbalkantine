<?php
session_start();
$db = db_connect();
if ($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['login'])) {
    $result = $db->query("SELECT * FROM beheerders WHERE email= '" . $_POST['email'] . "' AND 
    password='" . $_POST['password'] . "'");

    if($result->num_rows > 0){
        $row = $result->fetch_array();
//        echo $row['firstName'] . " " . $row['lastName'];
        print_r($row);
        $_SESSION['user'] = $row;
        header("location: index.html");
    }
    else
    {
        echo "je wachtwoord is fout geef een ander wachtwoord";
        header("location: index.html");
    }
}

$db->close();
?>