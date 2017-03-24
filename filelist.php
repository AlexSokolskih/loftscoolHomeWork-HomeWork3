<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if ($_SESSION['authorized'] != true) {
    header('Location:/loftscoolHomeWork-HomeWork3/reg.php');
    exit;
}

require_once 'classes/dateBase.php';
require_once 'classes/main.php';

$page = 'filelist';
$dataBase = new DataBase();
$main = new Main();

$event = htmlspecialchars($_POST['event']);
$fileName = '';

var_dump($_POST);

if ($event == 'deletefile') {
    $filesInDir = scandir('photos/');
    for ($i = 2; $i < count($filesInDir); $i++) {
        if (htmlspecialchars($_POST['filename']) == $filesInDir[$i]) {
            $fileName = $filesInDir[$i];
        }
    }
    if ($fileName != '') {
        $main->deletefileImage($fileName);
    }
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
?>


<div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Информация выводится из списка файлов</h2>
    <table class="table table-bordered">
        <tr>
            <th>Название файла</th>
            <th>Фотография</th>
            <th>Действия</th>
        </tr>

        <?php
        $files = scandir('photos/');
        for ($i = 2; $i < count($files); $i++) {
            echo '<tr>
            <td>' . $files[$i] . '</td>
            <td><img src="photos/' . $files[$i] . '" alt="" width="100"></td>
            <td>
                
            <form action="filelist.php" method="post">
                <input type="hidden" name="filename" value="' . $files[$i] . '">
                <button type="submit" name="event" value="deletefile">Удалить аватарку пользователя</button>            
            </form>
            </td>
        </tr>';
        }


        ?>
    </table>

</div><!-- /.container -->


<?php
$main->showFuter();
?>

