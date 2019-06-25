<?php
    include "functions.php";
    
    include "database_access.php";

    checkLogin();
    
    if($_SESSION["admin"] != 1){
        header("Location: home.php");
    }

    ///////////////////////////////////////////////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html>
<head>
<title>Podatkowo</title>
  <meta charset='utf-8'/>
  <title>Aplikacja podatkowa 2k19</title>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/editDetails.css">
  <script src="functions.js"></script>
</head>
<body>
    <?php printHeaderMenu(); ?>

    <div class="user-detail-container">
        <div class='taxes'>
            <div class='tax-header'>
                <div class='tax-element'>
                    PESEL
                </div>
                <div class='tax-element'>
                    Podstawa opodatkowania
                </div>
                <div class='tax-element'>
                    Przychód
                </div>
                <div class='tax-element'>
                    Koszty uzyskania
                </div>
                <div class='tax-element'>
                    Dochód
                </div>
                <div class='tax-element'>
                    Składki społeczne
                </div>
                <div class='tax-element'>
                    Podatek według skali
                </div>
                <div class='tax-element'>
                    Składki zdrowotne
                </div>
                <div class='tax-element'>
                    Podatek należny
                </div>
                <div class='tax-element'>
                    Rok obrachunkowy
                </div>
                <div class='tax-element'>
                    Akcje
                </div>
            </div>
            <?php
                $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
                if ($conn->connect_errno) {
                    echo "Connect failed: %s\n".$mysqli->connect_error;
                }

                if($result = ($conn->query("SELECT * FROM tab_podatkow")))
                {
                    if($result->num_rows > 0){
                        while($row =  $result->fetch_assoc()){
                            echo "
                            <div class='tax'>
                                <div class='tax-element'>
                                ".$row["pesel"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["podstawa_opodatkowania"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["przychod"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["koszty_uzyskania_przychodu"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["dochod"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["skladki_spoleczne"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["podatek_wedlug_skali"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["skladki_zdrowotne"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["podatek_nalezny"]."
                                </div>
                                <div class='tax-element'>
                                ".$row["rok_obrachunkowy"]."
                                </div>
                                <div class='tax-element-action'>
                                    <a href='./edit.php?id=".$row["ID"]."&admin=1'>
                                        <div class='edit'>
                                        </div>
                                    </a>
                                    <a href='./delete.php?id=".$row["ID"]."&admin=1'>
                                        <div class='delete'>
                                        </div>
                                    </a>
                                    <a href='./export.php?id=".$row["ID"]."'>
                                        <div class='export'>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            ";
                        }
                    }else{
                        header("Location: taxCalculation.php");
                    }
                }

                mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>