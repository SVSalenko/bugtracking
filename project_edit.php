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
    while($row = $st->fetchObject()){
      echo '<p>id: ' .$row->id. '</p>';
      echo '<form action="edit.php?id='.$id.'" method="post" name="registerform">
      <p>name: <input name="name" type="text" class="big_text"  value="" placeholder="'.$row->name.'" required="true" /><input name="register" type="submit" class="cnopkamini" value="Create">  </p>
      </form>';
      echo '<p>creater: ' .$row->creater. '</p>';
      echo '<p>tickets:</p>';
    }
?>
  </body>
</html>
