<?php include 'head.php'; ?>

    <title>Ticket</title>
  </head>
  <body>

<?php include 'header.php'; ?>

    <h2>Ticket</h2>

    <?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
    $id=$_GET['id'];
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
    <h3>File: <?= $row->file?></h3>
    <h3>Comments:</h3>
<?php endwhile ?>

<table>
<?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("SELECT * FROM comments WHERE id_ticket=$id;");
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
  <td>Creator</td>
  <td><?= $row->type?></td>
  <td><?= $row->status?></td>
  <td>
    <?php $z=$row->assigned;
    $st2 = $dbh->prepare("SELECT name FROM users WHERE id =$z;");
    $st2->execute();
    $name = $st2->fetchObject();
    echo $name->name;?>
  </td>
  <td>Description</td>
   <td><?= $row->file?></td>
  <td><?php $id=$row->id?>
    <a class="cnopkamini" href="ticket.php?id=<?=$id?>">Show</a>
    <a class="cnopkamini" href="ticket_edit.php?id=<?=$id?>">Edit</a>
    <a class="cnopkamini" href="ticket_del.php?id=<?=$id?>">Delete</a>
  </td>
  </tr>
<?php endwhile ?>
  </table>
  <a href="comment_new.php?id=<?=$_GET['id'];?>" class="cnopka">NEW COMMIT</a>
  </body>
</html>
