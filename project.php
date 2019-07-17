<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title>Project</title>
  </head>
  <body>

    <header class="header">
    <h1><font face="arial">BUGTRACKING <?= $_SESSION['user']->name ?>
      <a href = "viyti.php"><img src="viyti.png" width="25" height="25" class="qwe"></a></font></h1>
    </header>

    <h2>Project</h2>

    <?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
    $id=$_GET['id'];
    $st = $dbh->prepare("SELECT * FROM projects WHERE id=$id;");
    $st->execute();
    while($row = $st->fetchObject()){
      echo '<p>id: ' .$row->id. '</p>';
      echo '<p>name: ' .$row->name. '</p>';
      echo '<p>creater: ' .$row->creater. '</p>';
      echo '<p>tickets:</p>';
    }
?>
  </body>
</html>
