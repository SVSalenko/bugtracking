<?php include 'connect.php';
    $id=$_GET['id'];
    $st = $dbh->prepare("DELETE  FROM projects WHERE id=$id;");
    $st->execute();

    header('Location: projects.php');
