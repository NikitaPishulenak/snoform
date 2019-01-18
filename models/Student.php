<?php

class Student
{

    public static function getStatusesList()
    {
        $db = Db::getInstance()->getConnection();
        $statusesList = array();

        $result = $db->query("SELECT * FROM statuses ORDER BY name_status ASC");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $statusesList[$i] = $row;
            $i++;
        }
        return $statusesList;
    }

    public static function getFacultyList()
    {
        $db = Db::getInstance()->getConnection();
        $facList = array();

        $result = $db->query("SELECT * FROM faculties ");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $facList[$i] = $row;
            $i++;
        }
        return $facList;
    }

}

?>