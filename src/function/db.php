<?php
/*** Created by PhpStorm.* Date: 08.12.2017* Time: 08:18*/

class db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};port={$params['port']}";

        try        {
        $db = new PDO($dsn, $params['user'], $params['password']);
        //$db->exec("set names utf8"); - раскоментировать если будут иероглифы на сайте
        return $db;
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            //include(ROOT.'/function/errorPage.php'); // redirect for the error page
            die('MySQL Получил неверный запрос или неверные данные для работы с базой данных');
        }
    }
}
