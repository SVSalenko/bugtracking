<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title>Projects</title>
  </head>
  <body>

    <header class="header">
        <h1><font face="arial">BUGTRACKING <?= $_SESSION['user']->name ?></h1>
          <a href = "viyti.php"><img src="viyti.png" width="25" height="25" class="qwe"></a></font>
    </header>

    <h2>Projects</h2>
    <a href="new_project.php" class="cnopka">NEW PROJECT</a>
    <table>
      <?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
      $st = $dbh->prepare("SELECT * FROM projects;");
      $st->execute();
        echo '<tr>';
        echo  '<td>id</td>';
        echo  '<td>name</td>';
        echo  '<td>creater</td>';
        echo  '<td>action</td>';
        echo '</tr>';
      while($row = $st->fetchObject()){
        echo '<tr>';
        echo '<td>' .$row->id. '</td>';
        $id=$row->id;
        echo '<td><a class="line" href="project.php?id='.$id.'">' .$row->name. '</a></td>';
        echo '<td>' .$row->creater. '</td>';
        echo '<td>
          <a class="cnopkamini" href="project.php?id='.$id.'">Show</a>
          <a class="cnopkamini" href="project_edit.php?id='.$id.'">Edit</a>
          <a class="cnopkamini" href="project_del.php?id='.$id.'">Delete</a>
        </td>';
        echo '</tr>';
      }
?>
    </table>
  </body>
</html>
