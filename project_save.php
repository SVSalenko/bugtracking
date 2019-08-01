<?php
session_start();
include 'connect.php';
$st = $dbh->prepare("INSERT INTO projects(name, creator_id) VALUES (:name, :creator_id);");
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':creator_id', $_SESSION['user']->id);
$res = $st->execute();
header('Location: projects.php');
