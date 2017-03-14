<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.03.2017
 * Time: 19:15
 */

require_once 'main.php';
require_once 'dataBase.php';

session_start();

$main = new Main;
$dataBase = new DataBase;

//$dataBase->showUsers();
var_dump($dataBase->getUsersList());

var_dump($_POST);
echo '<br>';
var_dump($_GET);


$page = htmlspecialchars($_GET['page']);
$event = htmlspecialchars($_GET['event']);

$user = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);

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


if ($event == 'avtorization') {
    /*считать из бд и проверить на совпадение                  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    if ($user == 'Alex' and $password == 'secret') {
        $message = '<p>вы авторизованы как: ' . $user . ' </p>';
        $_SESSION['authorized'] = true;
    } else {
        $message = '<p>не получилось авторизоваться: ' . $user . ' </p>';
        $_SESSION['authorized'] = false;
    }
} elseif ($event == 'registration') {
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);
    $newLogin = htmlspecialchars($_POST['newLogin']);
    if ($password1 !== $password2) {
        $message = '<p> введенные пароли не совпадают <p>';
    } else {
        $message = '<p> пользователь ' . $newLogin . ' успешно добавлен<p>';

        /*записать в бд и может проверить на наличие в бд такого перед вставкой !!!!!!!!!!!!!!!!!!!!!!!!!*/
    }
}




if ($_SESSION['authorized'] == true) {

    if ($event == 'saveUser') {
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $decscription = htmlspecialchars($_POST['decscription']);
        $main->savePhoto();
        /*$foto обработать и записать в бд*/

    } elseif ($event == 'editinguser') {
        $userId = htmlspecialchars($_GET['userid']);
    } elseif ($event == 'deleteuser') {
        $userId  = htmlspecialchars($_GET['userid']);
        /* удалить из бд пользователя */
    }

    switch ($page) {
        case 'filelist':
            $main->showHeader('filelist');
            include_once 'filelist.php';
            break;
        case 'usersList':
            $main->showHeader('usersList');
            include_once 'usersList.php';
            break;
        case 'reg':
            $main->showHeader('reg');
            echo $message;
            include_once 'reg.php';
            break;
        case 'userEditing':
            $main->showHeader('usersList');
            echo $message;
            include_once 'userEditing.php';
            break;
        default:
            $main->showHeader('mainpage');
            echo $message;
            include_once 'mainpage.php';
            break;
    }

} else {
    switch ($page) {
        case 'filelist':
            $main->showHeader('mainpage');
            echo '<p>Не только лишь все могут просматривать эту страницу!   Авторизуйтесь</p>';
            include_once 'mainpage.php';
            break;
        case 'usersList':
            $main->showHeader('mainpage');
            echo '<p>Не только лишь все могут просматривать эту страницу!   Авторизуйтесь</p>';
            include_once 'mainpage.php';
            break;
        case 'userEditing':
            $main->showHeader('usersList');
            echo '<p>Не только лишь все могут просматривать эту страницу!   Авторизуйтесь</p>';
            include_once 'mainpage.php';
            break;
        case 'reg':
            $main->showHeader('reg');
            echo $message;
            include_once 'reg.php';
            break;
        default:
            $main->showHeader('mainpage');
            echo $message;
            include_once 'mainpage.php';
            break;
    }

}


$main->showFuter();
?>

</body>
</html>