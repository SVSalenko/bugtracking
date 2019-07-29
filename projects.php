<?php $title = 'Projects';?>
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'connect.php';?>

    <h2>Projects</h2>
    <a href="project_new.php" class="cnopka">NEW PROJECT</a>
    <table>
      <?php $st = $dbh->prepare("SELECT * FROM projects;");
      $st->execute();?>
        <tr>
        <td>id</td>
        <td>name</td>
        <td>creator</td>
        <td>tickets</td>
        <td>task</td>
        <td>bug</td>
        <td>action</td>
        </tr>
      <?php while($row = $st->fetchObject()):?>
        <tr>
        <td><?=$row->id?></td>
        <?php $id=$row->id; ?>
        <td><a class="line" href="project.php?id=<?=$id?>"><?=$row->name?></a></td>
        <td><?=$row->creater?></td>
        <td><?php $st2 = $dbh->prepare("SELECT COUNT(type) as count FROM tickets WHERE id_project = $row->id;");
        $st2->execute();
        $tickets= $st2->fetchObject();
        echo $tickets->count;?></td>
        <td><?php $st3 = $dbh->prepare("SELECT COUNT(type) as count FROM tickets WHERE id_project = $row->id AND type='task';");
        $st3->execute();
        $task= $st3->fetchObject();
        echo $task->count;?></td>
        <td><?php $st4 = $dbh->prepare("SELECT COUNT(type) as count FROM tickets WHERE id_project = $row->id AND type='bug';");
        $st4->execute();
        $bug= $st4->fetchObject();
        echo $bug->count;?></td>
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
