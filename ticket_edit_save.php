<?php

for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
  $origFileName = basename($_FILES['file']['name'][$i]);
  $filename = "file/" . time() . random_int(100, 999) . $origFileName;
  move_uploaded_file($_FILES['file']['tmp_name'][$i], $filename);
}


session_start();
$id=$_GET['id'];
include 'connect.php';
$st = $dbh->prepare("UPDATE tickets SET name=:name, type=:type, status=:status, assigned=:assigned, description=:description, file=:file, orig_file_name=:orig_file_name WHERE id=$id;");
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':type', $_POST['type']);
$st->bindParam(':status', $_POST['status']);
$st->bindParam(':assigned', $_POST['assigned']);
$st->bindParam(':description', $_POST['description']);
$st->bindParam(':file', $filename);
$st->bindParam(':orig_file_name', $origFileName);
$res = $st->execute();
//var_dump($st->errorInfo());
header('Location: ticket_show.php?id='.$id.'');
