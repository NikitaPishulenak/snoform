<?php

class Report extends Base
{


    //Получаю список всех секций
    public static function getSectionList()
    {
        $sectionList = array();
        $sectionList = Base::select("SELECT id_section, name_section FROM sections ORDER BY name_section ASC");
        return $sectionList;
    }
    
    
    //Получаю список всех форм участия
    public static function getFormParticipationList()
    {
        $formParticipation = array();
        $formParticipation = Base::select("SELECT * FROM formParticipation");
        return $formParticipation;
    }

    //Получаю список содержание доклада
    public static function getContentsReportList()
    {
        $contentsReport = array();
        $contentsReport = Base::select("SELECT * FROM contentsReport");
        return $contentsReport;
    }

    //Создаю папки 72 шт (нужен для админки)
    public static function createDirectory()
    {
        $arrFolder = array();
        $arrFolder=Base::select("SELECT name_sectionName FROM sectionsName");
        foreach ($arrFolder as $value){
            mkdir(ROOT."/reports/" .$value['name_sectionName'], 0777);
        }
    }

    //Сохраняю файл на сервере
    public static function saveFile($file, $size, $typeFile, $name, $idSection)
    {
        print_r($file);
        if (is_uploaded_file($file['tmp_name'])) {
            if ($file['size'] <= $size * 1024 * 1024) {
            	$pre_name=Base::translit($name);
            	$i=1;
            	$file_name = $pre_name . $typeFile;
            	while(file_exists ( ROOT."/reports/" .$file_name)){
            		$file_name = $pre_name ."(". $i .")". $typeFile;
            		$i++;
            	}
                $resultFolder = Base::select("SELECT name_sectionName FROM sectionsName WHERE id_sectionName=".$idSection);
                $sectionFolder = $resultFolder[0]['name_sectionName'];
                $file['name'] = $file_name;
                move_uploaded_file($file['tmp_name'], ROOT."/reports/" . $sectionFolder . "/" . $file['name']);
                return true;
            } else {
                return false;
            }

        } else {
            echo "<script>alert(\"Произошла ошибка загрузки файла!\")</script>";
        }
    }
    
    //Вставляю доклад в БД
    public static function sendToDB($array) {
        $fioName=($array['fio2']) ? $array['fio1']."-".$array['fio2'] : $array['fio1'];
    	self::saveFile($_FILES['reportFilePDF'], 1, '.pdf', $fioName, $array['sectionSel']);
        self::saveFile($_FILES['reportFileDOC'], 1, '.doc', $fioName, $array['sectionSel']);
        
        $db = Db::getInstance()->getConnection(); 
        

        $sql = 'INSERT INTO reports (title_report) '
                . 'VALUES (:title_report)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':title_report', $array['titleOfPaper'], PDO::PARAM_STR);
        // $result->bindParam(':email', $email, PDO::PARAM_STR);
        // $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }

}