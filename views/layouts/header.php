<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Конференция</title>

        <link href="<?php echo rootFolder; ?>/template/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo rootFolder; ?>/template/css/style.css<?php echo vc; ?>"/>     
        <link rel="shortcut icon" href="<?php echo rootFolder; ?>/template/images/ico/favicon.ico">
    </head>

    <body>
    <header id="header">
        <div class="col-md-12">
            <a href="/"><img src="<?php echo rootFolder;?>/template/images/banner.png" alt="баннер"></a><hr>
        </div>

        <?php if(!User::isGuest()): ?>
            <div class="menu">
                <?php if(User::checkAdmin()): ?>
                    <a href="admin"><i class='glyphicon glyphicon-certificate'></i> Админпанель</a>
                <?php endif; ?>
                <a href="cabinet"><i class='glyphicon glyphicon-user'></i> Кабинет</a>
                <a href="logout"><i class="glyphicon glyphicon-log-out"></i></i> Выход</a>
            </div>
        <?php endif; ?>                   
    </header>