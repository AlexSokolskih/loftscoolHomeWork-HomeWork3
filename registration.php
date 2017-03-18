<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.03.2017
 * Time: 0:32
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'classes/dataBase.php';
include_once 'classes/main.php';

$page = 'registration';
$dataBase = new DataBase();
$main = new Main();

$password1 = htmlspecialchars($_POST['password1']);
$password2 = htmlspecialchars($_POST['password2']);
$newLogin = htmlspecialchars($_POST['newLogin']);



if ($password1 !== $password2) {
    $message = '<p> введенные пароли не совпадают <p>';
}

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
$dataBase->is_userInDataBase('Вася');
echo $message;
?>

    <div class="container">
        <div class="form-container">
            <form class="form-horizontal" action="registration.php" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Логин" name="newLogin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль"
                               name="password1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Пароль"
                               name="password2">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                        <br><br>
                        Зарегистрированы? <a href="reg.php">Авторизируйтесь</a>
                    </div>
                </div>
            </form>
        </div>

    </div><!-- /.container -->


<?php
$main->showFuter();
?>