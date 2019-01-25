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

    //Сохраняю файл на сервере
    public static function saveFile($file, $size, $typeFile, $name)
    {
        if (is_uploaded_file($file['tmp_name'])) {
            if ($file['size'] <= $size * 1024 * 1024) {
            	$pre_name=Base::translit($name);
            	$i=1;
            	$file_name = $pre_name . $typeFile;
            	while(file_exists ( ROOT."/reports/" .$file_name)){
            		$file_name = $pre_name ."(". $i .")". $typeFile;
            		$i++;
            	}
                
                // $resultFolder = mysqli_query($dbc, "SELECT name_sectionName FROM sectionsName WHERE id_sectionName='$section'")
                // or die ("Не удалось извлечь имя папки");
                // $folder = mysqli_fetch_row($resultFolder);
                $file['name'] = $file_name;
                move_uploaded_file($file['tmp_name'], ROOT."/reports/" . $file['name']);
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
    	self::saveFile($_FILES['reportFilePDF'], 1, '.pdf', 'Гена Гришин');
        
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