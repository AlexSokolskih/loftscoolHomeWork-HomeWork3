<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.03.2017
 * Time: 19:15
 */

require_once 'main.php';

$main = new Main;
$page=$_GET['page'];
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
$main -> showHeader();
 switch ($page){
     case 'filelist':
         require_once 'filelist.php';
         break;
     case 'list':
         require_once 'usersList.php';
         break;
     case 'list':
         require_once 'usersList.php';
         break;
     case 'reg':
         require_once 'reg.php';
         break;
     default:
         require_once 'mainpage.php';
         break;

 }

$main -> showFuter();
?>

</body>
</html>