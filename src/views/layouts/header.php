<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<meta name="description" content="">-->
    <meta name="author" content="">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>">
    <link href="/assets/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/styles/main.css" rel="stylesheet">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="/"><i class="fa fa-phone"></i> TEST </a></li>
                            <li><a href="tel:+375 29 763 93 82"><i class="fa fa-phone"></i> +375(29)763 93 82</a></li>
                            <li><a href="mailto:testmail@gmail.com"><i class="fa fa-envelope"></i> mikhalkevich@ya.ru</a></li>
                        </ul>
                    </div>
                </div>
                    <ul class="nav navbar-nav right">
                        <?php if (user::isGuest()): ?>
                            <li><a href="/user/register/"><i class="fa fa-lock"></i> Регистрация</a></li>
                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                        <?php else: ?>
                            <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                        <?php endif; ?>
                    </ul>
            </div>
        </div>
    </div>
