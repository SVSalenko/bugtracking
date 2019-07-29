<?php
    $id=$_GET['id'];
    include 'connect.php';
    $st = $dbh->prepare("DELETE  FROM tickets WHERE id=$id;");
    $st->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
