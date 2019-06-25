<?php
    include "functions.php";
    
    include "database_access.php";

    checkLogin();
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
        <div class='user-detail'>
            <form action="editTaxes.php" method="POST">
            <div class='user-detail-data-outer'>
                <div class="user-detail-data">
                    <p>PESEL: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Przychód: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Koszt uzyskania: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Składki na ubezpieczenia społeczne: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Rok obrachunkowy: </p>
                </div>
                <div class="user-detail-data">
                    <?php
                        $conn = new mysqli($server_adress, $server_user, $server_password, $server_database_name);
                        if ($conn->connect_errno) {
                            echo "Connect failed: %s\n".$mysqli->connect_error;
                        }

                        if($result = ($conn->query("SELECT * FROM tab_podatkow WHERE ID=".$_GET["id"].";")))
                        {
                            while($row =  $result->fetch_assoc()){
                                echo "
                                <input type='hidden' name='ID' value='".$row["ID"]."'>
                                <input type='text' name='pesel' pattern='[0-9].{10,11}' minlength='11' maxlength='11' value='".$row["pesel"]."' disabled>
                                <div class='user-detail-space-between'></div>
                                <input type='text' name='przychod' pattern='[0-9]+.[0-9][0-9]' value='".$row["przychod"]."'>
                                <div class='user-detail-space-between'></div>
                                <input type='text' name='kosztUzyskania' pattern='[0-9]+.[0-9][0-9]'  value='".$row["koszty_uzyskania_przychodu"]."'>
                                <div class='user-detail-space-between'></div>
                                <input type='text' name='ubezpSpoleczne' pattern='[0-9]+.[0-9][0-9]'  value='".$row["skladki_spoleczne"]."'>
                                <div class='user-detail-space-between'></div>
                                <select name='rok'>
                                    <option value='".$row["rok_obrachunkowy"]."'> ".$row["rok_obrachunkowy"]." </option>
                                </select>
                                ";
                            }
                        }

                        mysqli_close($conn);
                    ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="button-element" >Wylicz podatek</button>
            </form>
            <div class="user-detail-space-between"></div>
        </div>
    </div>
</body>
</html>