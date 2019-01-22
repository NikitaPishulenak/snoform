<?php

class Student extends Base
{

    public static function getStatusesList()
    {
        $statusesList = array();
        $statusesList = Base::select("SELECT * FROM statuses ORDER BY name_status ASC");
        return $statusesList;
    }

    public static function getFacultyList()
    {
        $facList = array();
        $facList = Base::select("SELECT * FROM faculties");
        return $facList;
    }

    public static function getCoursesList()
    {
        $coursList = array();
        $coursList = Base::select("SELECT * FROM courses");
        return $coursList;
    }

}

?>