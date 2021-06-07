<?php

session_start();

include '.\php.inc\database_conn.php';

if(isset($_GET["id"])){

    if ($_SESSION["logged"] == true){
        $sql = "DELETE FROM Users WHERE Id = '{$_GET["id"]}'";
        $statement = $db->prepare($sql);
        $statement->execute();
        header("Location: admin.php");
        exit();
    }
    
    else {
        header("Location: login.php");
        exit();
    }

}
else {
    header("Location: login.php");
    exit();
}


?>