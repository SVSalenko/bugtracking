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
      <h3>Creator: <?= $row->creator?></h3>
      <h3>Type: <?= $row->type?></h3>
      <h3>Status: <?= $row->status?></h3>
      <h3>Assigned: <?= $row->assigned?></h3>
      <h3>Description: <?= $row->description?></h3>
      <h3>File: <a href="<?= $row->file ?>"><?= $row->orig_file_name ?></a></h3>
      <h3>Comments:</h3>
    <?php endwhile ?>

<table>
    <tr>
      <td>Comment</td>
      <td>Creator</td>
    </tr>
  <?php $st2 = $dbh->prepare("SELECT * FROM comments WHERE id_ticket=$id;");
  $st2->execute();
  while($comment = $st2->fetchObject()):?>
    <tr>
      <td><?= $comment->comment?></td>
      <td><?= $comment->creator?></td>
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
    <a href="comment_new.php?id=<?=$_GET['id'];?>" class="cnopka">NEW COMMIT</a>
    <a class="cnopka" href="ticket_edit.php?id=<?=$id?>">EDIT TICKET</a>
    <a class="cnopka" href="ticket_del.php?id=<?=$id?>">DELETE TICKET</a>
  </p>
  </body>
</html>
