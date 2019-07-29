<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("INSERT INTO projects(name,creater) VALUES (:name, :creater);");
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':creater', $_SESSION['user']->name);
$res = $st->execute();
header('Location: projects.php');
