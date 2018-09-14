<?php
session_start();
  require_once "baza.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
  if ($polaczenie->connect_errno!=0){
    echo "Error ".$polaczenie->connect_errno;
  }
  else{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    //$sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";
    if ($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
    mysqli_real_escape_string($polaczenie,$login),
    mysqli_real_escape_string($polaczenie,$haslo)))){
      $ilu_userow = $rezultat->num_rows;
      if($ilu_userow>0){
        $_SESSION['zalogowany'] = true;
        $wiersz = $rezultat->fetch_assoc();
        $_SESSION['id'] = $wiersz['id'];
        $_SESSION['user'] = $wiersz['user'];
        //i tutaj wstawiając $_SESSION['nowa zmienna'] = $wiersz['nazwa wiersza']; wyciągasz kolejne dane z bazy
        unset($_SESSION['blad']);
        $rezultat->free_result();
        header('Location: app.php');
      } else {
        $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location: formlog.php');
        }
      }
    }
    $polaczenie->close();
?>
