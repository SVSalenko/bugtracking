<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title>Вход</title>
  </head>
  <body>

    <header class="header">
    <h1><font face="arial">BUGTRACKING</font></h1>
    </header>

    <div class="page_block">
      <form action="vhod.php" method="post">
      <h2 class="center">Вход</h2>
      <p> <input name="email" type="email" class="big_text" value="" placeholder="Емейл" required="true"></p>
      <p> <input name="password" type="password" class="big_text" value="" placeholder="Пароль" required="true"></p>
      <p> <input name="submit" type="submit" class="ttt" value="Войти"></p>
      </form>
    </div>
  </body>
</html>
