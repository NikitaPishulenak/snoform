<?php

class Report
{


    //Получаю список всех секций
    public static function getSectionList()
    {
        $db = Db::getInstance()->getConnection();
        $sectionList = array();

        $result = $db->query("SELECT id_section, name_section FROM sections ORDER BY name_section ASC");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $sectionList[$i] = $row;
            $i++;
        }
        return $sectionList;
    }
    
    
    //Получаю список всех форм участия
    public static function getFormParticipationList()
    {
        $db = Db::getInstance()->getConnection();
        $FormParticipation = array();

        $result = $db->query("SELECT * FROM formParticipation");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $FormParticipation[$i] = $row;
            $i++;
        }
        return $FormParticipation;
    }

    //Получаю список содержание доклада
    public static function getContentsReportList()
    {
        $db = Db::getInstance()->getConnection();
        $contentsReport = array();

        $result = $db->query("SELECT * FROM contentsReport");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $contentsReport[$i] = $row;
            $i++;
        }
        return $contentsReport;
    }
}