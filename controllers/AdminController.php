<?php

include 'AdminBase.php';

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionDownloadCSV()
    {
        self::checkAdmin();
        Report::getCSV();
        return true;
    }

    public function actionShowReports()
    {
        self::checkAdmin();
        $completedReports=Report::getReportsList();
        date_default_timezone_set("Europe/Minsk"); 
        $nowDateTime=Date('d-m-Y G:i');
        require_once(ROOT . '/views/admin/showReports.php');
        return true;
    }

}
