<?php include_once '../config/database.php'; ?>
<?php
function db_connect(){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $mysqli;
}

function db_getData($query){
    $mysqli = db_connect();
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result;
}

function db_insertData($query){
    $mysqli = db_connect();
    $result = null;
    if($mysqli->query($query) === true){
        $result = $mysqli->insert_id;
    }else{
        $result = "Error: " . $query . "<br>" . $mysqli->error;
    }
    $mysqli->close();
    return $result;
}

?>
