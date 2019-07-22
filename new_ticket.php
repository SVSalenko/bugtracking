<?php
include 'head.php';
?>
    <title>Creating</title>
  </head>
  <body>

    <?php include 'header.php'; ?>

      <div class="page_block">
          <h2 class="center">Creating a new ticket</h2>
          <form action="save_ticket.php?id=<?=$_GET['id'];?>" method="post" name="registerform">

            Name:
            <p>  <input name="name" type="text" class="big_text"  value="" placeholder="Name" required="true" />  </p>

            Type:
            <p> <select  class="big_text" name="type">
              <option>task</option>
              <option>bug</option>
            </select></p>

            Status:
            <p> <select  class="big_text" name="status">
              <option>new</option>
              <option>in progress</option>
              <option>testing</option>
              <option>done</option>
            </select></p>

            Assigned:
            <p> <select  class="big_text" name="assigned">
              <?php
              $dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
              $st = $dbh->prepare("SELECT name FROM users");
              $st->execute();
              while($users = $st->fetchObject()): ?>
              <option><?=$users->name?></option>
              <?php endwhile ?>
            </select></p>

            File:
            <p>  <input name="file" type="file" class="big_text" />  </p>

            <p>  <input name="register" type="submit" class="cnopka" value="Create">  </p>
          </form>
      </div>

  </body>
</html>
