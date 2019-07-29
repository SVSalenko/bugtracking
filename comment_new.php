<?php $title = 'Creating';?>
<?php include 'head.php';?>
<?php include 'header.php';?>

      <div class="page_block">
          <h2 class="center">New comment</h2>
          <form action="comment_save.php?id=<?=$_GET['id'];?>" method="post" name="registerform">
            <p>  <input name="comment" type="text" class="big_text"  value="" placeholder="comment" required="true" />  </p>
            <p>  <input name="register" type="submit" class="cnopka" value="Create">  </p>
          </form>
      </div>

  </body>
</html>
