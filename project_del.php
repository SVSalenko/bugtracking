<?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
    $id=$_GET['id'];
    $st = $dbh->prepare("DELETE  FROM projects WHERE id=$id;");
    $st->execute();

    header('Location: projects.php');
