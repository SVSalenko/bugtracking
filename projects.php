<?php
include 'head.php';
?>
    <title>Projects</title>
  </head>
  <body>

    <?php include 'header.php'; ?>

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
