<?php

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: /index.php');
}

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Задачи</title>
  </head>
  <body bgcolor="#edeef0">

    <header class="header">

        <h1><font face="arial">BUGTRACKING <?= $_SESSION['user']->name ?>
          <a href = "viyti.php"><img src="viyti.png" width="25" height="25" ma></a></font></h1>


    </header>

    <h1>Задачи</h1>
    <table border="1" bordercolor="000000" width="99%">
      <tr>
        <td>id</td>
        <td>task</td>
        <td>bug</td>
        <td>status</td>
      </tr>
      <tr>
        <td>1</td>
        <td><a href="task.html"> replace windows </a></td>
        <td></td>
        <td>new</td>
      </tr>
  </body>
</html>
