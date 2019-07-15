<?php
if (!isset($_POST["submit"])) {
  die();
}

$email = $_POST["email"];
$password = $_POST["password"];

if ($email === "" || $password === "") {
  echo  "Данные введены не во все поля<br>";
} else {
  $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
  $res = $dbh->query("SELECT email, password FROM users WHERE email='$email' AND password='$password'")->fetch();
}

if (!$res) {
  echo "<span class='error'>Ошибка при вводе логина и пароля</span><br><br>";
}

if($res){
session_start();
$st = $dbh->prepare("SELECT * FROM users WHERE email = :email;");
$st->bindParam(':email', $_POST['email']);
$st->execute();
$user = $st->fetchObject();
$_SESSION['user'] = $user;
header('Location: /tasks.php');
}

?>
