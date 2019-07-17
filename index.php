<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title>Регистрация</title>
  </head>
  <body>

    <header class="header">
    <h1><font face="arial">BUGTRACKING</font></h1>
    </header>

      <div class="page_block">
          <h2 class="center">Регистрация</h2>
          <form action="reg.php" method="post" name="registerform">
            <p>  <input name="name" type="text" class="big_text"  value="" placeholder="Имя" required="true" />  </p>
            <p>  <input name="surname" type="text" class="big_text"  value="" placeholder="Фамилия" required="true" />  </p>
            <p>  <input name="email" type="email" class="big_text"  value="" placeholder="Емейл" required="true" />  </p>
            <p>  <input name="pass" type="password" class="big_text"  value="" placeholder="Пароль" required="true" />  </p>
            <p>  <input name="register" type="submit" class="ttt" value="Зарегистрироваться"/>  </p>
          </form>
            <p><a class="IMH1vc" href="sing_in.php">Войти</a></P>
      </div>

  </body>
</html>
