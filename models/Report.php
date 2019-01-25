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
<<<<<<< HEAD
    
=======

    //Вставляю доклад в БД
    public static function sendToDB($array) {
        if (is_uploaded_file($_FILES['reportFilePDF']['tmp_name'])) {
            if ($_FILES['reportFilePDF']['size'] <= 1 * 1024 * 1024) {
                $file_name = date("YmdGis") . ".pdf";
                // $resultFolder = mysqli_query($dbc, "SELECT name_sectionName FROM sectionsName WHERE id_sectionName='$section'")
                // or die ("Не удалось извлечь имя папки");
                // $folder = mysqli_fetch_row($resultFolder);
                $_FILES['reportFilePDF']['name'] = $file_name;
                move_uploaded_file($_FILES['reportFilePDF']['tmp_name'], "../snoform/reports/" . $_FILES['reportFilePDF']['name']);
                echo "<script>alert(\"Файл успешно загружен\")</script>";
            } else {
                echo "<script>alert(\"Размер файла превышает 1 МБ! Загрузка на сервер не возможна!\")</script>";
                exit;
            }

        } else {
            echo "<script>alert(\"Произошла ошибка загрузки файла!\")</script>";
        }
        $db = Db::getInstance()->getConnection(); 
        

        $sql = 'INSERT INTO reports (title_report) '
                . 'VALUES (:title_report)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':title_report', $array['titleOfPaper'], PDO::PARAM_STR);
        // $result->bindParam(':email', $email, PDO::PARAM_STR);
        // $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
>>>>>>> 0d842ab4de78a75d7b780cfd37cce27936132cb6
}