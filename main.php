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
        $mainpageActive = '';
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
            <li '.$mainpageActive.' ><a href="index.php?page=mainpage">Авторизация</a></li>
            <li '.$regActive.' ><a href="index.php?page=reg">Регистрация</a></li>
            <li '.$userlistActive.' ><a href="index.php?page=usersList">Список пользователей</a></li>
            <li '.$filelistActive.' ><a href="index.php?page=filelist">Список файлов</a></li>
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
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>';

    }

}