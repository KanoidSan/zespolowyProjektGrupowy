<?php
    //global important variables
    include "database_access.php";
    include "functions.php"; // gives session

    //local important variables
    $pesel = floatval($_SESSION["pesel"]);
    $przychod = floatval($_POST["przychod"]);
    $kosztUzyskania = floatval($_POST["kosztUzyskania"]);
    $ubezpSpoleczne = floatval($_POST["ubezpSpoleczne"]);
    $rok = floatval($_POST["rok"]);

    $dochod = $przychod - $kosztUzyskania;
    $podstawaOpodatkowania = $dochod - $ubezpSpoleczne;
    $podatekWedlugSkali = 0;
    switch($rok){
        case 2017:
            $podatekWedlugSkali = tax2017($podstawaOpodatkowania);
            break;
        case 2018:
            $podatekWedlugSkali = tax2018($podstawaOpodatkowania);
            break;
        case 2019:
            $podatekWedlugSkali = tax2019($podstawaOpodatkowania);
            break;
        default:
            header("Location: taxCalculation.php");
            break;
    }
    $ubezpZdrowotne = 0.09 * $podatekWedlugSkali;
    $podatekNalezny = $podatekWedlugSkali - $ubezpZdrowotne;
    
    if(!isset($pesel) || !isset($_POST["przychod"]) || !isset($_POST["kosztUzyskania"]) || !isset($_POST["ubezpSpoleczne"]) || !isset($_POST["rok"])){
        header("Location: taxCalculation.php");
    }else{
        if($_POST["przychod"] === "" || $_POST["kosztUzyskania"] === "" || $_POST["ubezpSpoleczne"] === "" || empty($_POST["rok"])){
            header("Location: taxCalculation.php");
        }else{
            if($podstawaOpodatkowania < 0 || $dochod < 0){
                header("Location: taxCalculation.php");
            }else{
                //logic of page
                $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
                if ($conn->connect_errno) {
                    echo "Connect failed: %s\n".$mysqli->connect_error;
                }

                if($result = $conn->query("INSERT INTO `tab_podatkow`(`podstawa_opodatkowania`, `przychod`, `koszty_uzyskania_przychodu`, `dochod`, `skladki_spoleczne`, `podatek_wedlug_skali`, `skladki_zdrowotne`, `podatek_nalezny`, `rok_obrachunkowy`, `pesel`) VALUES ($podstawaOpodatkowania, $przychod, $kosztUzyskania, $dochod, $ubezpSpoleczne, $podatekWedlugSkali, $ubezpZdrowotne, $podatekNalezny, '".$rok."', '".$pesel."')"))
                {
                    header("Location: taxCalculation.php");
                }else{
                    header("Location: taxCalculation.php");
                }

                mysqli_close($conn);
            }
        }
    }
?>