<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.03.2017
 * Time: 20:40
 */
class Main
{
    public function showHeader($activPage='')
    {
        $filelistActive = '';
        $userlistActive = '';
        $regActive = '';
        $registrationActive = '';
        switch ($activPage){
            case 'filelist':
                 $filelistActive = 'class="active"';
                break;
            case 'usersList':
                $userlistActive = 'class="active"';
                break;
            case 'reg':
                $regActive = 'class="active"';
                break;
            case 'registration':
                $registrationActive = 'class="active"';
                break;
            default:
                $mainpageActive = 'class="active"';
                break;

        }

        echo '
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Сокольских Александр</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li '.$regActive. ' ><a href="/loftscoolHomeWork-HomeWork3/reg.php">Авторизация</a></li>
            <li ' .$registrationActive. ' ><a href="/loftscoolHomeWork-HomeWork3/registration.php">Регистрация</a></li>
            <li ' .$userlistActive. ' ><a href="/loftscoolHomeWork-HomeWork3/usersList.php">Список пользователей</a></li>
            <li ' .$filelistActive. ' ><a href="/loftscoolHomeWork-HomeWork3/filelist.php">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';
    }

    public function showFuter()
    {
        echo '<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>';
    }

    public function savePhoto()
    {
        $uploaddir = '/var/www/uploads/';
        echo '<br>';
        var_dump($_FILES);
           $filename = date('U').rand(1,100000);
           $extension =  mb_strrchr($_FILES['userfoto']['name'],'.');
           move_uploaded_file($_FILES['userfoto']['tmp_name'], dirname(__FILE__).'/photos/'.$filename.$extension);
           echo "<p>".dirname(__FILE__).'/photos/'.$filename.$extension.'</p>';

    }

}