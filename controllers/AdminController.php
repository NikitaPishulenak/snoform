<?php

include 'AdminBase.php';

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();
        echo "админка";

        // Подключаем вид
        // require_once(ROOT . '/views/admin/index.php');
        return true;
    }

}
