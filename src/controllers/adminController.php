<?php
/**
 * Created by PhpStorm.
 * User: Жорик
 * Date: 10.12.2017
 * Time: 1:12
 */

class adminController extends adminBase
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

}