<?php
    include "functions.php";

    checkLogin();

    //global important variables
    session_start();
    include "database_access.php";

    //local important variables
    $id = $_GET["id"];

    //logic of page
    $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
    if ($conn->connect_errno) {
        echo "Connect failed: %s\n".$mysqli->connect_error;
    }

    if($result = ($conn->query("DELETE FROM tab_podatkow WHERE id=$id")))
    {
        if($_SESSION["admin"]==1 && $_GET["admin"]==1){
            header("Location: allTaxes.php");
        }else{
            header("Location: taxes.php");
        }      
    }else{
        header("Location: error.php");
    }

    mysqli_close($conn);
?>