<?php $title = 'Creating'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>
      <div class="block">
          <h2 class="center">Creating a new ticket</h2>
          <form action="ticket_save.php?id=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data" name="registerform">

            <p class="lb"> <label for="1">Name:</label>
             <input id="1" name="name" type="text" class="text"  value="" placeholder="Name" required="true" />  </p>

            <p class="lb"> <label for="2">Type:</label>
             <select id="2" class="text" name="type">
                  <option>task</option>
                  <option>bug</option>
                </select></p>

            <p class="lb"> <label  for="3">Status:</label>
             <select id="3" class="text" name="status">
                  <option>new</option>
                  <option>in progress</option>
                  <option>testing</option>
                  <option>done</option>
                </select></p>

            <p class="lb"> <label  for="4">Assigned:</label>
             <select id="4" class="text" name="assigned">
                  <?php $st = $dbh->prepare("SELECT * FROM users");
                  $st->execute();
                  while($users = $st->fetchObject()): ?>
                  <option value="<?=$users->id?>"><?=$users->name?></option>
                  <?php endwhile ?>
                </select></p>

            <p class="lb" > <label for="5">Description:</label>
             <input id="5" name="description" type="text" class="text" />  </p>

            <p class="lb"> <label for="6">File:</label>
            <input id="6" name="file[]" type="file" class="text" />  </p>

            <p class="lb"> <label for="7">Tags:</label>
            <input id="7" name="tags" type="text" class="text" />  </p>

            <p class="center">  <input name="register" type="submit" class="cnopka" value="Create">  </p>
          </form>
      </div>

  </body>
</html>
