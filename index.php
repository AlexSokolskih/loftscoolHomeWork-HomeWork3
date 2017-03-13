<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.03.2017
 * Time: 19:15
 */

require_once 'main.php';

session_start();
$_SESSION['test'] = 'Hello world!';

$main = new Main;
var_dump($_POST);
echo '<br>';
var_dump($_GET);


$page = $_GET['page'];
$event = $_GET['event'];

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


if() {

}


if ($_SESSION['authorized'] == true) {
    switch ($page) {
    case 'filelist':
        $main->showHeader('filelist');
        include_once 'filelist.php';
        break;
    case 'usersList':
        $main->showHeader('usersList');
        include_once'usersList.php';
        break;
    case 'reg':
        $main->showHeader('reg');
        include_once'reg.php';
        break;
    default:
        $main->showHeader('mainpage');
        include_once'mainpage.php';
        break;
    }

} else {
    switch ($page) {
    case 'filelist':
        $main->showHeader('mainpage');
        echo '<p>Не только лишь все могут просматривать эту страницу!   Авторизуйтесь</p>';
        include_once'mainpage.php';
        break;
    case 'usersList':
        $main->showHeader('mainpage');
        echo '<p>Не только лишь все могут просматривать эту страницу!   Авторизуйтесь</p>';
        include_once'mainpage.php';
        break;
    case 'reg':
        $main->showHeader('reg');
        include_once'reg.php';
        break;
    default:
        $main->showHeader('mainpage');
        include_once'mainpage.php';
        break;
    }

}


$main->showFuter();
?>

</body>
</html>