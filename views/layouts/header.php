<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Конференция</title>

        <link href="<?php echo rootFolder; ?>/template/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo rootFolder; ?>/template/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"> -->
        <!-- <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css"> -->
        <link rel="stylesheet" href="<?php echo rootFolder; ?>/template/css/style.css"/>
        <!-- <link rel="stylesheet" href="<?php echo rootFolder; ?>/template/css/icons.css"/> -->
            <!-- <script src="<?php echo rootFolder; ?>/template/js/bootstrap.min.js"></script> -->
        
        
        <link rel="shortcut icon" href="<?php echo rootFolder; ?>/template/images/ico/favicon.ico">
    </head>

    <body>
    <header id="header">
        <div class="col-md-12">
            <img src="<?php echo rootFolder;?>/template/images/banner.png" alt="баннер"><hr>
        </div>

        <?php if(!User::isGuest()): ?>
            <div class="col-md-6 col-md-offset-3 menu">
                <?php if(User::checkAdmin()): ?>
                    <a href="admin"><i class='glyphicon glyphicon-certificate'></i> Админпанель</a>
                <?php endif; ?>
                <a href="cabinet"><i class='glyphicon glyphicon-user'></i> Кабинет</a>
                <a href="logout"><i class="glyphicon glyphicon-log-out"></i></i> Выход</a>
            </div>
        <?php endif; ?>
           <!--  <div class="shop-menu pull-left">
                <ul class="nav navbar-nav">                                    
                    <?php if(!User::isGuest()): ?>
                        <li class="dropdown"><a href="<?php echo rootFolder; ?>/cabinet" class="headIcon"><i class="fa fa-user headIcon"></i> Аккаунт</a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?php echo rootFolder; ?>/logout" class="headIcon"><i class="fa fa-unlock headIcon"></i> Выход</a></li> 
                            </ul>
                        </li>
                        <?php else: ?>
                            <li class="dropdown"><a href="<?php echo rootFolder; ?>/login" class="headIcon"><i class="fa fa-lock headIcon"></i> Вход</a></li> 
                            <li><a href="<?php echo rootFolder; ?>/register" class="headIcon"><i class="fa fa-archive headIcon"></i> Регистрация</a></li> 
                            
                        <?php endif; ?>
                </ul>
            </div> -->
                   
    </header>