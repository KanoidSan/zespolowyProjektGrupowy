<?php
    //global important variables
    include "database_access.php";
    include "functions.php"; // gives session

    //local important variables
    $ID = $_POST["ID"];
    $pesel = floatval($_SESSION["pesel"]);
    $przychod = floatval($_POST["przychod"]);
    $kosztUzyskania = floatval($_POST["kosztUzyskania"]);
    $ubezpSpoleczne = floatval($_POST["ubezpSpoleczne"]);
    $rok = floatval($_POST["rok"]);

    $dochod = $przychod - $kosztUzyskania;
    $podstawaOpodatkowania = $dochod - $ubezpSpoleczne;  //czy robimy absolute
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
        header("Location: taxes.php");
    }else{
        if($_POST["przychod"] === "" || $_POST["kosztUzyskania"] === "" || $_POST["ubezpSpoleczne"] === "" || empty($_POST["rok"])){
            header("Location: taxes.php");
        }else{
            if($podstawaOpodatkowania < 0 || $dochod < 0){
                header("Location: taxes.php");
            }else{
                //logic of page
                $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
                if ($conn->connect_errno) {
                    echo "Connect failed: %s\n".$mysqli->connect_error;
                }

                if($result = $conn->query("UPDATE `tab_podatkow` SET `podstawa_opodatkowania`= $podstawaOpodatkowania, `przychod`= $przychod, `koszty_uzyskania_przychodu` = $kosztUzyskania, `dochod` = $dochod, `skladki_spoleczne` = $ubezpSpoleczne, `podatek_wedlug_skali` = $podatekWedlugSkali, `skladki_zdrowotne` = $ubezpZdrowotne, `podatek_nalezny` = $podatekNalezny WHERE ID=$ID;"))
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
            }
        }
    }
?>