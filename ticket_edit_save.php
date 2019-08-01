<?php

for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
  $origFileName = basename($_FILES['file']['name'][$i]);
  $filename = "file/" . time() . random_int(100, 999) . $origFileName;
  move_uploaded_file($_FILES['file']['tmp_name'][$i], $filename);
}

session_start();
include 'connect.php';
$st = $dbh->prepare("UPDATE tickets SET name=:name, type=:type, status=:status, assigned=:assigned, description=:description, file=:file, orig_file_name=:orig_file_name WHERE id=$it;");
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':type', $_POST['type']);
$st->bindParam(':status', $_POST['status']);
$st->bindParam(':assigned', $_POST['assigned']);
$st->bindParam(':description', $_POST['description']);
$st->bindParam(':file', $filename);
$st->bindParam(':orig_file_name', $origFileName);
$res = $st->execute();

$st = $dbh->prepare("DELETE  FROM tickets_tags WHERE id_ticket= :id;");
$st->bindParam(':id', $_GET['id']);
$st->execute();

$tags= trim($_POST['tags']);
$exploded = explode(",", $tags);
 foreach ($exploded as $id => $tagName) {
      $exploded[$id] = trim($tagName);
}

$tags = (array_unique($exploded));
for ($i=0; $i <count($tags); $i++) {

  $st = $dbh->prepare("SELECT * FROM tags WHERE name =:name;");
  $st->bindParam(':name', $tags[$i]);
  $res = $st->execute();
  $taggs = $st->fetchObject();
  $tagg = $taggs->name;
  $tag = $taggs->id;

  if($tagg != $tags[$i]) {
    $st = $dbh->prepare("INSERT INTO tags (name) VALUES (:name);");
    $st->bindParam(':name', $tags[$i]);
    $st->execute();
    $tag = $dbh->lastInsertId();
  }

  if($tagg = $tags[$i]){
    $st = $dbh->prepare("INSERT INTO tickets_tags (id_ticket, id_tag) VALUES (:id_ticket, :id_tag);");
    $st->bindParam(':id_ticket', $_GET['id']);
    $st->bindParam(':id_tag', $tag);
    $st->execute();
  }
}

header('Location: ticket_show.php?id='.$_GET['id'].'');
