<?php

class siteController
{
    public function actionIndex()
    {
        $pageTitle = "Главная";
        $pageDescription = "Главная страница магазина";
        require_once(ROOT . '/views/main/index.php');
        return true;
    }

    public function actionContact()
    {

        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            // Валидация полей
            if (!user::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                $adminEmail = 'admin@test.com';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }

        }
        $pageTitle = "Контакты";
        $pageDescription = "Страница контактов магазина";
        require_once(ROOT . '/views/main/contact.php');

        return true;
    }

    public function actionBLog()
    {
        $pageTitle = "Блог";
        $pageDescription = "Страница блога";
        require_once(ROOT . '/views/blog/index.php');
        return true;
    }

    public function actionAbout()
    {
        $pageTitle = "Про нас";
        $pageDescription = "История успеха";
        require_once(ROOT . '/views/about/index.php');
        return true;
    }

    public function actionTest(){
        echo 'Ok';
    }
}