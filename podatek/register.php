<?php
    //global important variables
    session_start();
    include "database_access.php";

    //local important variables
    $email = $_POST["email"];
    $haslo = $_POST["password"];
    $imie = $_POST["firstname"];
    $nazwisko = $_POST["lastname"];
    $pesel = $_POST["pesel"];
    $telefon = $_POST["phone"];

    //logic of page
    $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
    if ($conn->connect_errno) {
        echo "Connect failed: %s\n".$mysqli->connect_error;
    }

    if($conn->query("INSERT INTO `tab_podstawowa` (`pesel`, `imie`, `nazwisko`, `telefon`, `e-mail`) VALUES ('".$pesel."','".$imie."','".$nazwisko."','".$telefon."','".$email."')")){
        echo "Dodano rekord do tabeli podstawowej\n";
        
        if($conn -> query("INSERT INTO `tab_loginow` (`e-mail`, `haslo`, `pesel`, `admin`) VALUES ('".$email."','".$haslo."','".$pesel."', 0)")){
            echo "Dodano rekord do tabeli loginow\n";

            $_SESSION["email"] = $email;
            $_SESSION["imie"] = $imie;
            $_SESSION["nazwisko"] = $nazwisko;
            $_SESSION["pesel"] = $pesel;
            $_SESSION["telefon"] = $telefon;
            $_SESSION["admin"] = 0;
            
            // //DEBUG
            // echo $_SESSION["email"]."\n";
            // echo $_SESSION["imie"]."\n";
            // echo $_SESSION["nazwisko"]."\n";
            // echo $_SESSION["pesel"]."\n";
            // echo $_SESSION["telefon"]."\n";

            header("Location: home.php");       
        }else{
            $conn->query("DELETE FROM `tab_podstawowa` WHERE `e-mail` = '".$email."' AND `haslo` = '".$haslo."' AND `pesel` = '".$pesel."')");

            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }

    mysqli_close($conn);

?>