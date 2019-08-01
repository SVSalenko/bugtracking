<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("UPDATE comments SET comment=:comment WHERE id_ticket=:id;");
$st->bindParam(':id', $_GET['id']);
$st->bindParam(':comment', $_POST['comment']);
$res = $st->execute();
$id=$_GET['id'];
//header('Location: ticket_show.php?id='.$_GET['id'].'');
var_dump($st->errorInfo());
