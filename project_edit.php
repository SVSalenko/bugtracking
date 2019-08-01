<?php $title = 'Project'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>
    <h2>Project</h2>

    <?php $id=$_GET['id'];
    $st = $dbh->prepare("SELECT * FROM projects WHERE id=$id;");
    $st->execute();
    while($row = $st->fetchObject()):?>
      <h3>Id: <?=$row->id?> </h3>
      <form action = "project_edit_save.php?id=<?=$id?>" method = "post" name = "registerform">
      <h3>Name: <input name = "name" type = "text" class = "big_text"  value = "" placeholder = "<?=$row->name?>" required = "true" />
      <h3>Creator: <?=$row->creator_id?></h3>
      <input name = "register" type = "submit" class = "cnopka" value = "Create">  </h3>
      </form>
<?php endwhile?>
  </body>
</html>
