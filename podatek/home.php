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
  <script src="functions.js"></script>
</head>
<body>
    <?php printHeaderMenu(); ?>

    <div class="user-detail-container">
        <div class="user-detail-photo">
            <img src="./graphics/Photo-Placeholder.jpg" alt="Smiley face" height="100%" width="100%">
        </div>
        <div class="user-detail-data">
            <p>Imię: <?php echo $_SESSION["imie"]?></p>
            <p>Nazwisko: <?php echo $_SESSION["nazwisko"]?></p>
            <p>PESEL: <?php echo $_SESSION["pesel"]?></p>
            <p>Nr telefonu: <?php echo $_SESSION["telefon"]?></p>
            <p>E-Mail: <?php echo $_SESSION["email"]?></p>
        </div>
    </div>
</body>
</html>

<?php
///////////////////////////////////////////////////////////////////////////////////////////
    // echo $_SESSION["email"]."\n";
    // echo $_SESSION["imie"]."\n";
    // echo $_SESSION["nazwisko"]."\n";
    // echo $_SESSION["pesel"]."\n";
    // echo $_SESSION["telefon"]."\n";
?>