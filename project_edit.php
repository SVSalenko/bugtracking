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
      <h3>Id: <?=$row->id?> </h3>
      <form action = "edit.php?id=<?=$id?>" method = "post" name = "registerform">
      <h3>Name: <input name = "name" type = "text" class = "big_text"  value = "" placeholder = "<?=$row->name?>" required = "true" />
      <h3>Creater: <?=$row->creater?></h3>
      <input name = "register" type = "submit" class = "cnopka" value = "Create">  </h3>
      </form>
<?php endwhile?>
  </body>
</html>
