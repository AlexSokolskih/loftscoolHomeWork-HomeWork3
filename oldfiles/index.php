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



<?php


if ($event == 'avtorization') {

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