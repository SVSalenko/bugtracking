<?php

if (!isset($_POST["register"])) {
  die();
}

if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['pass'])) {
    echo "Все поля обязательны для заполнения!";
    die();
}

$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("SELECT * FROM users WHERE email = :email;");
$st->bindParam(':email', $_POST['email']);
$st->execute();

if($st->fetchObject()) {
  echo "Этот ник занятый. Попробуйте другой!";
  die();
}

$st = $dbh->prepare("INSERT INTO users(name,surname,email,password) VALUES (:name, :surname, :email, :password);");
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':surname', $_POST['surname']);
$st->bindParam(':email', $_POST['email']);
$st->bindParam(':password', $_POST['pass']);
$res = $st->execute();


if($res){
    session_start();
    $st = $dbh->prepare("SELECT * FROM users WHERE email = :email;");
    $st->bindParam(':email', $_POST['email']);
    $st->execute();
    $user = $st->fetchObject();
    $_SESSION['user'] = $user;
    header('Location: /tasks.php');
}
else {
    echo "Не удалось добавить информацию";
    var_dump($st->errorInfo());
}


?>
