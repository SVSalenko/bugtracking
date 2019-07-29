<?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$id=$_GET['id'];
$st = $dbh->prepare("UPDATE projects SET name=:name WHERE id=$id;");
$st->bindParam(':name', $_POST['name']);

$st->execute();
header('Location: projects.php');
