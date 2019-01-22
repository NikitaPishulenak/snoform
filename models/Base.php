<?php

class Base
{
  
    public static function select($query){
        $db = Db::getInstance()->getConnection();
        $sth = $db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
    }

}