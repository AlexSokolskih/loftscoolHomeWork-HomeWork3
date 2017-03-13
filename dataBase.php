<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 14.03.2017
 * Time: 0:11
 */
class DataBase
{
    protected $pdo;
    function __construct()
    {
        $host = '127.0.0.1';
        $db   = 'loftschool';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $opt);
    }


    public function showUsers()
    {
        $userslist = $this->pdo->query('SELECT * FROM table_name');
        while ($row = $userslist->fetch()){
            echo $row['name'].'<br>';
        }

    }

}