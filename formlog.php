<?php
  session_start();
  if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
    header('Location:app.php');
    exit();
  }
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>system logowania</title>
</head>
<body>
  <form action="zaloguj.php" method="post">
    <a href="register.php">register</a><br></br>
    <b>LOGIN:</b><br></br><input type="text" name="login" />
    <br></br>
    <b>HASŁO:</b><br></br><input type="password" name="haslo" />
    <br></br>
    <input type="submit" value="zaloguj się na konto" />
  </form>
<?php
  if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>
</body>
</html>
