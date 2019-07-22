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
