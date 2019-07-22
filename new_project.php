<?php
include 'head.php';
?>
    <title>Creating</title>
  </head>
  <body>

    <?php include 'header.php'; ?>

      <div class="page_block">
          <h2 class="center">Creating a new project</h2>
          <form action="save.php" method="post" name="registerform">
            <p>  <input name="name" type="text" class="big_text"  value="" placeholder="Name" required="true" />  </p>
            <p>  <input name="register" type="submit" class="cnopka" value="Create">  </p>
          </form>
      </div>

  </body>
</html>
