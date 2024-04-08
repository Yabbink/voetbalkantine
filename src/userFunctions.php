<?php include_once '../config/database.php'; ?>
<?php
function registerUser($firstname, $lastname, $email, $password){
    try {
        $mysqli = db_connect();
        $db = $mysqli;
        $result = $db->prepare("INSERT INTO users (firstname, lastname, email, password) 
                                  values ('$firstname' , '$lastname' , '$email' , '$password')");
        $result->execute();
        return 1;
    } catch (PDOException $e){
        die("error!: " . $e->getMessage());
    }
}
function getUser($email, $password){
    $mysqli = db_connect();
    $user = $mysqli->query("SELECT email, password FROM users WHERE email = '$email' AND password ='$password'");
    if($user > 0){
        // Cijfer found, return user data
        return $user;
    }else{
        return "No user found";
    }
}
?>

