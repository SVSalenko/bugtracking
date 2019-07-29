<?php $title = 'Ticket';?>
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'connect.php';?>
<?php $id=$_GET['id'];
$st = $dbh->prepare("SELECT * FROM tickets WHERE id=$id;");
$st->execute();
while($row = $st->fetchObject()):?>

          <h3>Creator: <?= $row->creator?></h3>
          <h3>Id: <?= $row->id?></h3>

    <div class="page_block">
    <form action = "ticket_edit_save.php?id=<?=$id?>" method = "post" enctype="multipart/form-data" name = "registerform">

      <p> <label for="1">Name:</label> </p>
      <p> <input id="1" name="name" type="text" class="big_text"  value="" placeholder="<?=$row->name?>" required="true" />  </p>

      <p> <label for="2">Type:</label> </p>
      <p> <select id="2" class="big_text" name="type">
            <option>task</option>
            <option>bug</option>
          </select></p>

      <p> <label for="3">Status:</label> </p>
      <p> <select id="3" class="big_text" name="status">
            <option>new</option>
            <option>in progress</option>
            <option>testing</option>
            <option>done</option>
          </select></p>

      <p> <label for="4">Assigned:</label> </p>
      <p> <select id="4" class="big_text" name="assigned">
            <?php $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
            $st = $dbh->prepare("SELECT * FROM users");
            $st->execute();
            while($users = $st->fetchObject()): ?>
            <option value="<?=$users->id?>"><?=$users->name?></option>
            <?php endwhile ?>
          </select></p>

      <p> <label for="5">Description:</label> </p>
      <p> <input id="5" name="description" type="text" class="big_text" placeholder="<?=$row->description?>"/>  </p>

      <p> <label for="6">File:</label> </p>
      <p> <input id="6" name="file[]" type="file" class="big_text" /> </p>

      <p> <label for="7">Tags:</label> </p>
      <p> <input id="7" name="tags" type="text" class="big_text" /> </p>

      <p> <input name="register" type="submit" class="cnopka" value="Edit"> </p>

<?php endwhile?>

      </form>
    </div>
  </body>
</html>
