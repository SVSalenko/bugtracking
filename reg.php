<?php
include 'connect.php';

if (!isset($_POST["register"])) {
  die();
}

if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['pass'])) {
    echo "Все поля обязательны для заполнения!";
    die();
}

if ($_POST['pass'] != $_POST['pass2']) {
    echo "Пароли не совпадают!";
    die();
}


$st = $dbh->prepare("SELECT * FROM users WHERE email = :email;");
$st->bindParam(':email', $_POST['email']);
$st->execute();

if($st->fetchObject()) {
  echo "Этот ник занятый. Попробуйте другой!";
  die();
}

$pass=password_hash($_POST['pass'], PASSWORD_BCRYPT);
$st = $dbh->prepare("INSERT INTO users(name,surname,email,password) VALUES (:name, :surname, :email, :password);");
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':surname', $_POST['surname']);
$st->bindParam(':email', $_POST['email']);
$st->bindParam(':password', $pass);
$res = $st->execute();


if($res){
    session_start();
    $st = $dbh->prepare("SELECT * FROM users WHERE email = :email;");
    $st->bindParam(':email', $_POST['email']);
    $st->execute();
    $user = $st->fetchObject();
    $_SESSION['user'] = $user;
    header('Location: projects.php');
}
else {
    echo "Не удалось добавить информацию";
    var_dump($st->errorInfo());
}
