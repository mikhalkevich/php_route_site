<?php
/**
 * Created by PhpStorm.
 * user: Жорик
 * Date: 09.12.2017
 * Time: 21:25
 */

class cabinetController
{

    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = user::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = user::getUserById($userId);

        $pageTitle = "Кабинет";
        $pageDescription = "Кабинет пользователя";
        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = user::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = user::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if (!user::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!user::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                $result = user::edit($userId, $name, $password);
            }

        }
        $pageTitle = "Кабинет";
        $pageDescription = "Кабинет пользователя режим редактирования";
        require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }

}