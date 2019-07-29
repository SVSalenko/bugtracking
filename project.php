<?php $title = 'Project';?>
<?php include 'head.php';?>
<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>
    <h2>Project</h2>

    <?php $id=$_GET['id'];
    $st = $dbh->prepare("SELECT * FROM projects WHERE id=$id;");
    $st->execute();
    while($row = $st->fetchObject()):?>
      <h3>Id: <?= $row->id ?> </h3>
      <h3>Name: <?= $row->name ?> </h3>
      <h3>Creator: <?= $row->creater ?> </h3>
      <h3>Tickets: <?php $st2 = $dbh->prepare("SELECT COUNT(type) as count FROM tickets WHERE id_project = $row->id;");
      $st2->execute();
      $tickets= $st2->fetchObject();
      echo $tickets->count;?></h3>
      <h3>Tasks: <?php $st3 = $dbh->prepare("SELECT COUNT(type) as count FROM tickets WHERE id_project = $row->id AND type='task';");
      $st3->execute();
      $task= $st3->fetchObject();
      echo $task->count;?></h3>
      <h3>Bugs: <?php $st4 = $dbh->prepare("SELECT COUNT(type) as count FROM tickets WHERE id_project = $row->id AND type='bug';");
      $st4->execute();
      $bug= $st4->fetchObject();
      echo $bug->count;?></h3>
      <h3>Tickets:</h3>
<?php endwhile ?>
<table>
<?php $st = $dbh->prepare("SELECT * FROM tickets WHERE id_project=$id ORDER BY apdated_at DESC;");
$st->execute();


?>
  <tr>
  <td>id</td>
  <td>name</td>
  <td>Creator</td>
  <td>type</td>
  <td>status</td>
  <td>assigned</td>
  <td>Description</td>
  <td>file</td>
  <td>action</td>
  </tr>
<?php while($row = $st->fetchObject()):?>
  <tr>
  <td><?= $row->id?></td>
  <td><?= $row->name?></td>
  <td><?= $row->creator?></td>
  <td><?= $row->type?></td>
  <td><?= $row->status?></td>
  <td><a href="tickets_all.php?id=<?= $row->assigned?>"/>
    <?php $z=$row->assigned;
    $st2 = $dbh->prepare("SELECT name FROM users WHERE id =$z;");
    $st2->execute();
    $name = $st2->fetchObject();
    echo $name->name;?></a>
  </td>
  <td><?= $row->description?></td>
   <td><a href="<?= $row->file?>"><img class="imgmini" src="<?= $row->file?>"/></a></td>
  <td><?php $id=$row->id?>
    <a class="cnopkamini" href="ticket_show.php?id=<?=$id?>">Show</a>
    <a class="cnopkamini" href="ticket_edit.php?id=<?=$id?>">Edit</a>
    <a class="cnopkamini" href="ticket_del.php?id=<?=$id?>">Delete</a>
  </td>
  </tr>
<?php endwhile ?>
  </table>
  <a href="ticket_new.php?id=<?=$_GET['id'];?>" class="cnopka">NEW TICKET</a>
  </body>
</html>
