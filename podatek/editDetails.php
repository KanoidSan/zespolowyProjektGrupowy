<?php
    include "functions.php";

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
        <div class="user-detail-photo">
            <img src="./graphics/Photo-Placeholder.jpg" alt="Smiley face" height="100%" width="100%">
        </div>
        <div class='user-detail'>
            <form action="updateDetails.php" method="POST">
            <div class='user-detail-data-outer'>
                <div class="user-detail-data">
                    <p>PESEL: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Imię: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Nazwisko: </p>
                    <div class="user-detail-space-between"></div>
                    <p>Nr telefonu: </p>
                    <div class="user-detail-space-between"></div>
                    <p>E-Mail: </p>
                </div>
                <div class="user-detail-data">
                    <input type="text" name="pesel" pattern="[0-9].{10,11}" minlength="11" maxlength="11" value=<?php echo $_SESSION["pesel"]?> disabled>
                    <div class="user-detail-space-between"></div>
                    <input type="text" name="imie" pattern="[A-Za-z].{2,}" value=<?php echo $_SESSION["imie"]?>>
                    <div class="user-detail-space-between"></div>
                    <input type="text" name="nazwisko" pattern="[A-Za-z].{2,}" value=<?php echo $_SESSION["nazwisko"]?>>
                    <div class="user-detail-space-between"></div>
                    <input type="text" name="telefon" pattern="[0-9].{8,9}" value=<?php echo $_SESSION["telefon"]?>>
                    <div class="user-detail-space-between"></div>
                    <input type="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" value=<?php echo $_SESSION["email"]?>>
                </div>
            </div>
            <button type="submit" class="button-element" >Zapisz dane</button>
            </form>
            <div class="user-detail-space-between"></div>
        </div>
    </div>
</body>
</html>