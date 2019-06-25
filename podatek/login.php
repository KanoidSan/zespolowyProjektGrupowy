<?php
    //global important variables
    session_start();
    include "database_access.php";

    //local important variables
    $email = $_POST["email"];
    $haslo = $_POST["password"];

    //logic of page
    $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
    if ($conn->connect_errno) {
        echo "Connect failed: %s\n".$mysqli->connect_error;
    }

    if($result = $conn->query("SELECT * FROM `tab_loginow` WHERE `e-mail`='".$email."' AND `haslo`='".$haslo."'")->fetch_array())
    {
        if($userData = $conn->query("SELECT * FROM `tab_podstawowa` WHERE `e-mail`='".$result["e-mail"]."' AND `pesel`='".$result["pesel"]."'")->fetch_array())
        $_SESSION["email"] = $result["e-mail"];
        $_SESSION["imie"] = $userData["imie"];
        $_SESSION["nazwisko"] = $userData["nazwisko"];
        $_SESSION["pesel"] = $userData["pesel"];
        $_SESSION["telefon"] = $userData["telefon"];
        $_SESSION["admin"] = $result["admin"];

        header("Location: home.php");
    }else{
        header("Location: index.php");
    }

    mysqli_close($conn);
?>