<?php
include 'head.php';
?>
    <title>Project</title>
  </head>
  <body>

    <?php include 'header.php'; ?>

    <h2>Project</h2>

    <?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
    $id=$_GET['id'];
    $st = $dbh->prepare("SELECT * FROM projects WHERE id=$id;");
    $st->execute();
    while($row = $st->fetchObject()):?>
      <p>id: <?= $row->id ?> </p>
      <p>name: <?= $row->name ?> </p>
      <p>creater: <?= $row->creater ?> </p>
      <p>tickets:</p>
<?php endwhile ?>
<table>
<?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("SELECT * FROM tickets WHERE id_project=$id;");
$st->execute();?>
  <tr>
  <td>id</td>
  <td>name</td>
  <td>type</td>
  <td>status</td>
  <td>assigned</td>
  <td>file</td>
  </tr>
<?php while($row = $st->fetchObject()):?>
  <tr>
  <td><?= $row->id?></td>
  <td><?= $row->name?></td>
  <td><?= $row->type?></td>
  <td><?= $row->status?></td>
  <td><?= $row->assigned?></td>
  <td><?= $row->file?></td>
  </tr>
<?php endwhile ?>
  </table>
  <a href="new_ticket.php?id=<?=$_GET['id'];?>" class="cnopka">NEW TICKET</a>
  </body>
</html>
