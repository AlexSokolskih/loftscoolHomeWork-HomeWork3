<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();
session_start();
if ($_SESSION['authorized'] != true) {
    header('Location:/loftscoolHomeWork-HomeWork3/reg.php');
}

require_once 'classes/dateBase.php';
require_once 'classes/main.php';

$page = 'userEditing';
$dataBase = new DataBase();
$main = new Main();

if (filter_var($_GET['userid'], FILTER_VALIDATE_INT)) {
    $userid = $_GET['userid'];
} elseif ($_POST['action'] == 'updateUser') {
    $useridForUpdate = htmlspecialchars($_POST['userid']);
    $action = htmlspecialchars($_POST['action']);
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $decscription = htmlspecialchars($_POST['decscription']);
    $photo = htmlspecialchars($_POST['photo']);
    $photo = $main->savePhoto();
    if ($dataBase->updateUser($useridForUpdate, $name, $decscription, $age, $photo)) {
        header('Location:/loftscoolHomeWork-HomeWork3/usersList.php');
        exit;
    }

}

$user = $dataBase->getUserForId($userid);
var_dump($_POST);


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

?>

<div class="container">

    <div class="form-container">
        <form class="form-horizontal" action="userEditing.php" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $userid; ?>">
            <input type="hidden" class="form-control" id="action" name="action" value="updateUser">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10 ">
                    <input type="text" class="form-control" id="name" placeholder="Имя" name="name"
                           value="<?php echo $user['name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="age" placeholder="Возраст" name="age"
                           value="<?php echo $user['age']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="decscription" class="col-sm-2 control-label">о себе</label>
                <div class="col-sm-10">
                    <textarea name="decscription" id="decscription" cols="45" rows="10"
                              placeholder="О себе"><?php echo $user['description']; ?>"</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Фото</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto" placeholder="Фотография" name="userfoto">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Отправить</button>

                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->


<?php
$main->showFuter();
?>
