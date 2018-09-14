<?php
  session_start();
  if (!isset($_SESSION['zalogowany'])){
    header('Location: formlog.php');
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
<?php
  echo "<p>Witaj ".$_SESSION['user'].'! [<a href="logout.php">Wyloguj się! ]</a></p>';
?>
</body>
</html>
