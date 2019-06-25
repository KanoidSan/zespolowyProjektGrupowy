<!DOCTYPE html>
<html>
<head>
<title>Podatkowo</title>
  <meta charset='utf-8'/>
  <title>Rozlicz swój podatek</title>
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
  <div class='space'></div>
  <div class='main-container'>
      <div class='choices'>
        <div style="flex: 1;"></div>
          <div class='login choice' onClick="login()">Logowanie</div>
          <div style="flex: 2;"></div>
          <div class='register choice' onClick="register()">Rejestracja</div>
          <div style="flex: 1;"></div>
      </div>
    
    <div id="loginForm" class='login login-form'>
      <form action="login.php" method="POST">
        <div class="container">
            <label for="email"><b>E-mail</b></label>
            <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" placeholder="Enter E-mail" name="email" required>

            <label for="password"><b>Hasło</b></label>
            <input type="password" pattern="[A-Za-z0-9].{4,}" placeholder="Enter password" name="password" required>

            <button type="submit">Zaloguj</button>
        </div>
      </form>
    </div>

    <div id="registerForm" class='register register-form'>
      <form action="register.php" method="POST">
        <div class="container">
            <label for="email"><b>E-mail</b></label>
            <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" placeholder="Wprowadź E-mail" name="email" required>

            <label for="password"><b>Hasło</b></label>
            <input type="password" pattern="[A-Za-z0-9].{4,}" placeholder="Wprowadź hasło" name="password" required>

            <label for="firstname"><b>Imię</b></label>
            <input type="text" pattern="[A-Za-z].{2,}" placeholder="Wprowadź swe imię" name="firstname" required>

            <label for="lastname"><b>Nazwisko</b></label>
            <input type="text" pattern="[A-Za-z].{2,}" placeholder="Wprowadź swe nazwisko" name="lastname" required>

            <label for="pesel"><b>PESEL</b></label>
            <input type="text" pattern="[0-9].{10,11}" placeholder="Wprowadź PESEL" name="pesel" minlength="11" maxlength="11" required>

            <label for="phone"><b>Numer telefonu</b></label>
            <input type="text" pattern="[0-9].{8,9}" placeholder="Wprowadź numer telefonu" name="phone">

            <button type="submit">Utwórz konto</button>
        </div>
      </form>
    </div>

  </div>
  <div class='space'></div>
  <div class='space'></div>
  <div class='space'></div>
  <div class='space'></div>

  <script>
    function login(){
      document.getElementById('loginForm').style.display='flex';
      document.getElementsByClassName('login choice')[0].style.backgroundColor='#5786FF';
      
      document.getElementById('registerForm').style.display='none';
      document.getElementsByClassName('register choice')[0].style.backgroundColor='#7099FF';
    };

    function register(){
      document.getElementById('loginForm').style.display='none';
      document.getElementsByClassName('login choice')[0].style.backgroundColor='#7099FF';

      document.getElementById('registerForm').style.display='flex';
      document.getElementsByClassName('register choice')[0].style.backgroundColor='#5786FF';
    };
  </script>
</body>
</html>
