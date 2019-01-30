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
            	$i=1;
            	$file_name = $name . $typeFile;
            	while(file_exists ( ROOT."/reports/" .$file_name)){
            		$file_name = $name ."(". $i .")". $typeFile;
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
        print_r($array);
        $fioName=($array['fio2']) ? $array['fio1']."-".$array['fio2'] : $array['fio1'];
        $fioName=Base::translit($fioName);
    	self::saveFile($_FILES['reportFilePDF'], 1, '.pdf', $fioName, $array['sectionSel']);
        self::saveFile($_FILES['reportFileDOC'], 1, '.doc', $fioName, $array['sectionSel']);
        
        $db = Db::getInstance()->getConnection(); 
        

        $sql = 'INSERT INTO reports (title_report, reportFilePDF, reportFileDOC, id_sections, id_formParticipation, id_contentReport, fio1, universityName1, abbreviatureUniver1, statusAuthor1, facultyName1, courseAuthor1, emailAuthor1, telAuthor1, haveSecondAuthor, fio2, universityName2, abbreviatureUniver2, statusAuthor2, facultyName2, courseAuthor2, emailAuthor2, telAuthor2) '
                . 'VALUES (:title_report, :reportFilePDF, :reportFileDOC, :id_sections, :id_formParticipation, :id_contentReport, :fio1, :universityName1, :abbreviatureUniver1, :statusAuthor1, :facultyName1, :courseAuthor1, :emailAuthor1, :telAuthor1, :haveSecondAuthor, :fio2, :universityName2, :abbreviatureUniver2, :statusAuthor2, :facultyName2, :courseAuthor2, :emailAuthor2, :telAuthor2)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':title_report', $array['titleOfPaper'], PDO::PARAM_STR);
        
        $fPDF=$fioName.'.pdf';
        $fDOC=$fioName.'.doc';
        
        $result->bindParam(':reportFilePDF', $fPDF, PDO::PARAM_STR);
        $result->bindParam(':reportFileDOC', $fDOC, PDO::PARAM_STR);
        $result->bindParam(':id_sections', $array['sectionSel'], PDO::PARAM_INT);
        $result->bindParam(':id_formParticipation', $array['formParticipationSel'], PDO::PARAM_INT);
        $result->bindParam(':id_contentReport', $array['contentsReportSel'], PDO::PARAM_INT);
        $result->bindParam(':fio1', $array['fio1'], PDO::PARAM_STR);
        
        $univerName1=($array['universityName1']=="0") ? $array['nameOtherUniversity1'] : $array['universityName1'];
        $facName1=($array['facultyName1']=="0") ? $array['nameOtherFaculty1'] : $array['facultyName1'];
        $univerName2=($array['universityName2']=="0") ? $array['nameOtherUniversity2'] : $array['universityName2'];
        $facName2=($array['facultyName2']=="0") ? $array['nameOtherFaculty2'] : $array['facultyName2'];

        //author first
        $result->bindParam(':universityName1', $univerName1, PDO::PARAM_STR);
        $result->bindParam(':abbreviatureUniver1', $array['abbreviatureUniver1'], PDO::PARAM_STR);
        $result->bindParam(':statusAuthor1', $array['statusAuthor1'], PDO::PARAM_INT);
        $result->bindParam(':facultyName1', $facName1, PDO::PARAM_STR);
        $result->bindParam(':courseAuthor1', $array['courseAuthor1'], PDO::PARAM_INT);
        $result->bindParam(':emailAuthor1', $array['emailAuthor1'], PDO::PARAM_STR);
        $result->bindParam(':telAuthor1', $array['telAuthor1'], PDO::PARAM_STR);
        $result->bindParam(':haveSecondAuthor', $array['haveSecondAuthor'], PDO::PARAM_INT);

        //author second
        $result->bindParam(':fio2', $array['fio2'], PDO::PARAM_STR);
        $result->bindParam(':universityName2', $univerName2, PDO::PARAM_STR);
        $result->bindParam(':abbreviatureUniver2', $array['abbreviatureUniver2'], PDO::PARAM_STR);
        $result->bindParam(':statusAuthor2', $array['statusAuthor2'], PDO::PARAM_INT);
        $result->bindParam(':facultyName2', $facName2, PDO::PARAM_STR);
        $result->bindParam(':courseAuthor2', $array['courseAuthor2'], PDO::PARAM_INT);
        $result->bindParam(':emailAuthor2', $array['emailAuthor2'], PDO::PARAM_STR);
        $result->bindParam(':telAuthor2', $array['telAuthor2'], PDO::PARAM_STR);



        
        return $result->execute();
    }

}