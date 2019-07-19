<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title>Creating</title>
  </head>
  <body>

    <header class="header">
    <h1><font face="arial">BUGTRACKING <?= $_SESSION['user']->name ?></h1>
      <a href = "viyti.php"><img src="viyti.png" width="25" height="25" class="qwe"></a></font>
    </header>

      <div class="page_block">
          <h2 class="center">Creating a new project</h2>
          <form action="save.php" method="post" name="registerform">
            <p>  <input name="name" type="text" class="big_text"  value="" placeholder="Name" required="true" />  </p>
            <p>  <input name="register" type="submit" class="cnopka" value="Create">  </p>
          </form>
      </div>

  </body>
</html>
