<?php

class Teatcher extends Base
{
    public static function getScientificDegreeList()
    {      
        $scientificDegree = array();
        $scientificDegree = Base::select("SELECT * FROM scientificDegree ORDER BY name_scientificDegree ASC");
        return $scientificDegree;
    }

    public static function getAcademicRanksList()
    {
        $academicRanks = array();
        $academicRanks = Base::select("SELECT * FROM academicRanks ORDER BY name_academicRanks ASC");
        return $academicRanks;
    }

    public static function getPositionSupervisorList()
    {
        $positionSupervisor = array();
        $positionSupervisor = Base::select("SELECT * FROM positionSupervisor ORDER BY name_positionSupervisor ASC");
        return $positionSupervisor;
    }
}
