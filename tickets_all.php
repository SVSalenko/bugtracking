<?php $title = 'Ticket';?>
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'connect.php';?>
<?php $id=$_GET['id'];
    $st = $dbh->prepare("SELECT * FROM tickets WHERE assigned=$id");
    $st->execute();?>
<h2>Tickets <?php
$st2 = $dbh->prepare("SELECT * FROM users WHERE id=$id");
$st2->execute();
$name = $st2->fetchObject();
echo $name->name;?> </h2>
    <table>
      <tr>
      <td>id</td>
      <td>name</td>
      <td>creator</td>
      <td>type</td>
      <td>status</td>
      <td>description</td>
      <td>file</td>
      <td>action</td>
      </tr>
    <?php while($row = $st->fetchObject()):?>
      <tr>
      <td><?= $row->id?></td>
      <td><?= $row->name?></td>
      <td><?= $row->creator_id?></td>
      <td><?= $row->type?></td>
      <td><?= $row->status?></td>
      <td><?= $row->description?></td>
       <td><a href="<?= $row->file?>"><img class="imgmini" src="<?= $row->file?>"/></a></td>
      <td><?php $id=$row->id?>
        <a class="cnopkamini" href="ticket_show.php?id=<?=$id?>">Show</a>
        <?php if($row->creator_id == $_SESSION['user']->id || $_SESSION['user']->role == 'admin'):?>
        <a class="cnopkamini" href="ticket_edit.php?id=<?=$id?>">Edit</a>
        <a class="cnopkamini" href="ticket_del.php?id=<?=$id?>">Delete</a>
        <?php endif ?>
      </td>
      </tr>
    <?php endwhile ?>
</table>

    </body>
  </html>
