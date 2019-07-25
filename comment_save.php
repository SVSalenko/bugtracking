<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("INSERT INTO comments(id_ticket, comment, creator) VALUES (:id_ticket, :comment, :creator);");
$st->bindParam(':id_ticket', $_GET['id']);
$st->bindParam(':comment', $_POST['comment']);
$st->bindParam(':creator', $_SESSION['user']->name);
$res = $st->execute();
$id=$_GET['id'];
header('Location: ticket_show.php?id='.$_GET['id'].'');
var_dump($st->errorInfo());
