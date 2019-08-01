<?php include 'connect.php';
$id=$_GET['id'];
$st = $dbh->prepare("UPDATE projects SET name=:name WHERE id=$id;");
$st->bindParam(':name', $_POST['name']);
$st->execute();
header('Location: projects.php');
