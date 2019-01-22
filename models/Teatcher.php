<?php

class Teatcher
{
    public static function getScientificDegreeList()
    {
        $db = Db::getInstance()->getConnection();
        $scientificDegree = array();

        $result = $db->query("SELECT * FROM scientificDegree ORDER BY name_scientificDegree ASC");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $scientificDegree[$i] = $row;
            $i++;
        }
        return $scientificDegree;
    }

    public static function getAcademicRanksList()
    {
        $db = Db::getInstance()->getConnection();
        $academicRanks = array();

        $result = $db->query("SELECT * FROM academicRanks ORDER BY name_academicRanks ASC");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $academicRanks[$i] = $row;
            $i++;
        }
        return $academicRanks;
    }

    public static function getPositionSupervisorList()
    {
        $db = Db::getInstance()->getConnection();
        $positionSupervisor = array();

        $result = $db->query("SELECT * FROM positionSupervisor ORDER BY name_positionSupervisor ASC");

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $positionSupervisor[$i] = $row;
            $i++;
        }
        return $positionSupervisor;
    }
}
