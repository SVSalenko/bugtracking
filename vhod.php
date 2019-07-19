<?php
if (!isset($_POST["submit"])) {
  die();
}

$email = $_POST["email"];
$password = $_POST["password"];


$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("SELECT password FROM users where email='$email'");
$st->execute();
$row = $st->fetchObject();
$hash = $row->password;

if (password_verify ($password, $hash) ) {
session_start();
$st = $dbh->prepare("SELECT * FROM users WHERE email = :email;");
$st->bindParam(':email', $_POST['email']);
$st->execute();
$user = $st->fetchObject();
$_SESSION['user'] = $user;
header('Location: /projects.php');
} else {
header('Location: /sing_in.php');
}
