<?php
/**
 * Created by PhpStorm.
 * User: sokolskih
 * Date: 03.04.2017
 * Time: 9:50
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'classes/dateBase.php';
require_once 'classes/main.php';
$dataBase = new DataBase();
$main = new Main();
return array($dataBase, $main);