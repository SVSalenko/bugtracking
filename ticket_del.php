<?php
    $id=$_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
    $st = $dbh->prepare("DELETE  FROM tickets WHERE id=$id;");
    $st->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
