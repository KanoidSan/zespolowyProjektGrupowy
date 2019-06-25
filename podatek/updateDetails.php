<?php
    include "functions.php";

    checkLogin();

    //global important variables
    session_start();
    include "database_access.php";

    //local important variables
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $pesel = $_POST["pesel"];
    $telefon = $_POST["telefon"];
    $email = $_POST["email"];

    //logic of page
    $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
    if ($conn->connect_errno) {
        echo "Connect failed: %s\n".$mysqli->connect_error;
    }

    if($result = ($conn->query("UPDATE `tab_podstawowa` SET `e-mail` = '$email', `imie` = '$imie', `nazwisko` = '$nazwisko', `telefon` = '$telefon' WHERE `e-mail` = '".$_SESSION['email']."' AND `pesel` = '".$_SESSION['pesel']."';")))
    {
        if($userData = $conn->query("SELECT * FROM `tab_podstawowa` WHERE `pesel`='".$_SESSION['pesel']."'")->fetch_array())
        $_SESSION["email"] = $userData["e-mail"];
        $_SESSION["imie"] = $userData["imie"];
        $_SESSION["nazwisko"] = $userData["nazwisko"];
        $_SESSION["telefon"] = $userData["telefon"];

        header("Location: home.php");
    }else{
        header("Location: index.php");
    }

    mysqli_close($conn);

    header("Location: home.php");
?>