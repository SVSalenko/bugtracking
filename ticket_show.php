<?php $title = 'Ticket';?>
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'connect.php';?>
    <h2>Ticket</h2>

    <?php $id=$_GET['id'];
    $st = $dbh->prepare("SELECT * FROM tickets WHERE id=$id;");
    $st->execute();
    while($row = $st->fetchObject()):?>
      <h3>Id: <?= $row->id?></h3>
      <h3>Name: <?= $row->name?></h3>
      <h3>Creator: <?php $z=$row->creator_id;
      $st2 = $dbh->prepare("SELECT name FROM users WHERE id =$z;");
      $st2->execute();
      $name = $st2->fetchObject();
      echo $name->name;?></h3>
      <h3>Type: <?= $row->type?></h3>
      <h3>Status: <?= $row->status?></h3>
      <h3>Assigned: <?php $z=$row->assigned;
      $st2 = $dbh->prepare("SELECT name FROM users WHERE id =$z;");
      $st2->execute();
      $name = $st2->fetchObject();
      echo $name->name;?></h3>
      <h3>Description: <?= $row->description?></h3>
      <h3>File: <a href="<?= $row->file ?>"><?= $row->orig_file_name ?></a></h3>
      <h3>Comments:</h3>
    <?php endwhile ?>

<table>
    <tr>
      <td>Comment</td>
      <td>Creator</td>
      <td>Action</td>
    </tr>
  <?php $st2 = $dbh->prepare("SELECT * FROM comments WHERE id_ticket=$id;");
  $st2->execute();
  while($comment = $st2->fetchObject()):?>
    <tr>
      <td><?= $comment->comment?></td>
      <td><?= $comment->creator?></td>
      <td> <a href="comment_edit.php?id=<?=$_GET['id'];?>" class="cnopkamini">Edit</a> </td>
    </tr>
  <?php endwhile ?>
</table>

<h3>Tags:
<?php $st3 = $dbh->prepare("SELECT * FROM tickets_tags WHERE id_ticket = $id;");
$st3->execute();
while($tags = $st3->fetchObject()):?>
  <a href="">
  <?php $ta = $tags->id_tag;
  $st4 = $dbh->prepare("SELECT * FROM tags WHERE id = $ta;");
  $st4->execute();
  $tag = $st4->fetchObject();
  echo  $tag->name;
  ?></a>
<?php endwhile ?>
</h3>
  <p>
    <?php $st = $dbh->prepare("SELECT * FROM tickets WHERE id=:id;");
    $st->bindParam(':id', $_GET['id']);
    $st->execute();
    $creator = $st->fetchObject();
    if($creator->creator_id == $_SESSION['user']->id || $_SESSION['user']->role == 'admin'):?>
    <a href="comment_new.php?id=<?=$_GET['id'];?>" class="cnopka">NEW COMMIT</a>
    <a class="cnopka" href="ticket_edit.php?id=<?=$id?>">EDIT TICKET</a>
  <?php endif ?>
  </p>
  </body>
</html>
