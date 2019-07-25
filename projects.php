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
      $st->execute();?>
        <tr>
        <td>id</td>
        <td>name</td>
        <td>creater</td>
        <td>action</td>
        </tr>
      <?php while($row = $st->fetchObject()):?>
        <tr>
        <td><?=$row->id?></td>
        <?php $id=$row->id; ?>
        <td><a class="line" href="project.php?id=<?=$id?>"><?=$row->name?></a></td>
        <td><?=$row->creater?></td>
        <td>
          <a class="cnopkamini" href="project.php?id=<?=$id?>">Show</a>
          <a class="cnopkamini" href="project_edit.php?id=<?=$id?>">Edit</a>
          <a class="cnopkamini" href="project_del.php?id=<?=$id?>">Delete</a>
        </td>
        </tr>
      <?php endwhile ?>
    </table>
  </body>
</html>
