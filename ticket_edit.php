<?php $title = 'Ticket';?>
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'connect.php';?>
          <h2>Ticket</h2>
<?php $id=$_GET['id'];
$st = $dbh->prepare("SELECT * FROM tickets WHERE id=$id;");
$st->execute();
while($row = $st->fetchObject()):?>

          <h3>Creator: <?php $z=$row->creator_id;
          $st2 = $dbh->prepare("SELECT name FROM users WHERE id =$z;");
          $st2->execute();
          $name = $st2->fetchObject();
          echo $name->name;?></h3>
          <h3>Id: <?= $row->id?></h3>

    <div class="block">
    <form action = "ticket_edit_save.php?id=<?=$id?>" method = "post" enctype="multipart/form-data" name = "registerform">

      <p class="lb"> <label for="1">Name:</label>
       <input id="1" name="name" type="text" class="text"  value="<?=$row->name?>" required="true" />  </p>

      <p class="lb"> <label for="2">Type:</label>
       <select id="2" class="text" name="type">
            <option <?php if ($row->type == 'bug'): ?> selected="true"<?php endif ?>>bug</option>
            <option <?php if ($row->type == 'task'): ?> selected="true"<?php endif ?>>task</option>
          </select> </p>




      <p class="lb"> <label for="3">Status:</label>
       <select id="3" class="text" name="status">
            <option<?php if ($row->status == 'new'): ?> selected="true"<?php endif ?>>new</option>
            <option<?php if ($row->status == 'in progress'): ?> selected="true"<?php endif ?>>in progress</option>
            <option<?php if ($row->status == 'testing'): ?> selected="true"<?php endif ?>>testing</option>
            <option<?php if ($row->status == 'done'): ?> selected="true"<?php endif ?>>done</option>
          </select></p>

      <p class="lb"> <label for="4">Assigned:</label>
       <select id="4" class="text" name="assigned">
            <?php $st = $dbh->prepare("SELECT * FROM users");
            $st->execute();
            while($users = $st->fetchObject()): ?>
            <option value="<?=$users->id?>"><?=$users->name?></option>
            <?php endwhile ?>
          </select></p>

      <p class="lb"> <label for="5">Description:</label>
       <input id="5" name="description" type="text" class="text" value="<?=$row->description?>"/>  </p>

      <p class="lb"> <label for="6">File:</label>
       <input id="6" name="file[]" type="file" class="text" /> </p>

      <p class="lb"> <label for="7">Tags:</label>
       <input id="7" name="tags" type="text" class="text" value=
        "<?php $st3 = $dbh->prepare("SELECT * FROM tickets_tags WHERE id_ticket = $id;");
        $st3->execute();
      while($tags = $st3->fetchObject()){
        $ta = $tags->id_tag;
        $st4 = $dbh->prepare("SELECT * FROM tags WHERE id = $ta;");
        $st4->execute();
        $tag = $st4->fetchObject();
        echo $tag->name,", ";}?>"/> </p>


      <p class="center"> <input name="register" type="submit" class="cnopka" value="Edit"> </p>

<?php endwhile?>

      </form>
    </div>
  </body>
</html>
