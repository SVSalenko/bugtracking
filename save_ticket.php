<?php
if(!isset($_FILES)) {
  die();
}

$allowedTypes = array('image/jpeg','image/png','image/gif');
$uploadDir = "file/";

for($i = 0; $i < count($_FILES['file']['name']); $i++) { //Перебираем загруженные файлы
$uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
$fileChecked[$i] = false;
echo $_FILES['file']['name'][$i]." | ".$_FILES['file']['type'][$i]." — ";
$file = 'file/'.$_FILES['file']['name'][$i];

for($j = 0; $j < count($allowedTypes); $j++) { //Проверяем на соответствие допустимым форматам
if($_FILES['file']['type'][$i] == $allowedTypes[$j]) {
$fileChecked[$i] = true;
break;
}
}

if($fileChecked[$i]) { //Если формат допустим, перемещаем файл по указанному адресу
if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
echo "Успешно загружен <br>";
} else {
echo "Ошибка ".$_FILES['file']['error'][$i]."<br>";
}
} else {
echo "Недопустимый формат <br>";
}
}


session_start();
$dbh = new PDO('mysql:host=localhost;dbname=bugtracking','root','QWdf0610');
$st = $dbh->prepare("INSERT INTO tickets (id_project, name, creator, type, status, assigned, description, file) VALUES (:id_project, :name, :creator, :type, :status, :assigned, :description, :file);");
$st->bindParam(':id_project', $_GET['id']);
$st->bindParam(':name', $_POST['name']);
$st->bindParam(':creator', $_SESSION['user']->name);
$st->bindParam(':type', $_POST['type']);
$st->bindParam(':status', $_POST['status']);
$st->bindParam(':assigned', $_POST['assigned']);
$st->bindParam(':description', $_POST['description']);
$st->bindParam(':file', $file);
$res = $st->execute();
$id=$_GET['id'];
var_dump($st->errorInfo());
header('Location: project.php?id='.$id.'');
