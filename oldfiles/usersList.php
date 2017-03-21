<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.03.2017
 * Time: 0:32
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'classes/dateBase.php';
require_once 'classes/main.php';

$page = 'registration';
$dataBase = new DataBase();
$main = new Main();

$password1 = '';
$password2 = '';
$newLogin = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Starter Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>


<?php
$main->showHeader($page);
echo $message;
?>
    <div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
      <h2>Информация выводится из базы данных</h2>
      <table class="table table-bordered">
        <tr>
          <th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Фотография</th>
          <th>Действия</th>
        </tr>
        <tr>
          <td>vasya99</td>
          <td>Вася</td>
          <td>14</td>
          <td>Эксперт в спорах в интернете</td>
          <td><img src="http://lorempixel.com/people/200/200/" alt=""></td>
          <td>
            <a href="">Удалить пользователя</a>
          </td>
        </tr>
        <?php
        $userslist =  $dataBase->getUsersList();
        foreach ($userslist  as  $value) {

          echo '<tr>
            <td>'.$value['login'].'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['age'].'</td>
            <td>'.$value['description'].'</td>
            <td><img src="/img/'.$value['photo'].'" alt=""></td>
            <td>    
              <a href="index.php?page=usersList&event=deleteuser&userid='.$value['id'].'">Удалить пользователя</a>
              <a href="index.php?page=userEditing&event=editinguser&userid='.$value['id'].'">редактировать пользователя</a>
            </td>
          </tr>';
        }

        ?>

      </table>

    </div><!-- /.container -->



<?php
$main->showFuter();
?>



