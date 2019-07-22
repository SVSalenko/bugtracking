<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("INSERT INTO tickets(id_project, name, type, status, assigned, file) VALUES (:id_project, :name, :type, :status, :assigned, :file);");
$st->bindParam(':id_project', $_GET['id']);
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':type', $_POST['type']);
$st->bindParam(':status', $_POST['status']);
$st->bindParam(':assigned', $_POST['assigned']);
$st->bindParam(':file', $_POST['file']);
$res = $st->execute();
$id=$_GET['id'];
header('Location: project.php?id='.$id.'');
