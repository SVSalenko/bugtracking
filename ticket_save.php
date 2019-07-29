<?php

for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
  $origFileName = basename($_FILES['file']['name'][$i]);
  $filename = "file/" . time() . random_int(100, 999) . $origFileName;
  move_uploaded_file($_FILES['file']['tmp_name'][$i], $filename);
}


session_start();
include 'connect.php';
$st = $dbh->prepare("INSERT INTO tickets (id_project, name, creator, type, status, assigned, description, file, orig_file_name) VALUES (:id_project, :name, :creator, :type, :status, :assigned, :description, :file, :orig_file_name);");
$st->bindParam(':id_project', $_GET['id']);
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':creator', $_SESSION['user']->name);
$st->bindParam(':type', $_POST['type']);
$st->bindParam(':status', $_POST['status']);
$st->bindParam(':assigned', $_POST['assigned']);
$st->bindParam(':description', $_POST['description']);
$st->bindParam(':file', $filename);
$st->bindParam(':orig_file_name', $origFileName);
$st->execute();

$tagsr = $_POST['tags'];
$tags= trim($tagsr);
function multiexplode ($delimiters,$string) {
  $ready = str_replace($delimiters, $delimiters[0], $string);
  $tagq = explode($delimiters[0], $ready);
  return  $tagq;
}
$exploded = multiexplode(array(", " , "," , "." , " "),$tags);
for ($i=0; $i <count($exploded); $i++) {

$st2 = $dbh->prepare("SELECT * FROM tickets WHERE name=:name;");
$st2->bindParam(':name', $_POST['name']);
$st2->execute();
$ticket = $st2->fetchObject();

$st3 = $dbh->prepare("INSERT INTO tags (name) VALUES (:name);");
$st3->bindParam(':name', $exploded[$i]);
$st3->execute();

$st4 = $dbh->prepare("SELECT * FROM tags WHERE name=:name;");
$st4->bindParam(':name', $exploded[$i]);
$st4->execute();
$tag = $st4->fetchObject();

$st5 = $dbh->prepare("INSERT INTO tickets_tags (id_ticket, id_tag) VALUES (:id_ticket, :id_tag);");
$st5->bindParam(':id_ticket', $ticket->id);
$st5->bindParam(':id_tag', $tag->id);
$st5->execute();
}
$id=$_GET['id'];

//header('Location: project.php?id='.$id.'');
echo '<pre>';
print_r($exploded);
var_dump($st->errorInfo());
var_dump($st2->errorInfo());
var_dump($st3->errorInfo());
var_dump($st4->errorInfo());
var_dump($st5->errorInfo());
