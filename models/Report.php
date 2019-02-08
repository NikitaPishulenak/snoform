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

    //Создаю папки 75 шт (нужен для админки)
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
        // print_r($file);
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
                return $file_name; //true
            } else {
                return false;
            }

        } else {
            echo "<script>alert(\"Произошла ошибка загрузки файла!\")</script>";
        }
    }
    
    //Вставляю доклад в БД
    public static function sendToDB($array) {
        // print_r($array);
        $fioName=($array['fio2']) ? $array['fio1']."-".$array['fio2'] : $array['fio1'];
        $fioName=Base::translit($fioName);
    	$fPDF=self::saveFile($_FILES['reportFilePDF'], 1, '.pdf', $fioName, $array['sectionSel']);
        $fDOC=self::saveFile($_FILES['reportFileDOC'], 1, '.doc', $fioName, $array['sectionSel']);
        
        $db = Db::getInstance()->getConnection(); 
        

        $sql = 'INSERT INTO reports (id_user, title_report, reportFilePDF, reportFileDOC, id_sections, id_formParticipation, id_contentReport, fio1, universityName1, abbreviatureUniver1, statusAuthor1, facultyName1, courseAuthor1, emailAuthor1, telAuthor1, haveSecondAuthor, fio2, universityName2, abbreviatureUniver2, statusAuthor2, facultyName2, courseAuthor2, emailAuthor2, telAuthor2, fioSupervisor1, scientificDegree1, academicRanks1, positionSupervisor1, universityNameSupervisor1, departmentSupervisor1, telSupervisor1, haveSecondSup, fioSupervisor2, scientificDegree2, academicRanks2, positionSupervisor2, universityNameSupervisor2, departmentSupervisor2, telSupervisor2) '
                . 'VALUES (:id_user, :title_report, :reportFilePDF, :reportFileDOC, :id_sections, :id_formParticipation, :id_contentReport, :fio1, :universityName1, :abbreviatureUniver1, :statusAuthor1, :facultyName1, :courseAuthor1, :emailAuthor1, :telAuthor1, :haveSecondAuthor, :fio2, :universityName2, :abbreviatureUniver2, :statusAuthor2, :facultyName2, :courseAuthor2, :emailAuthor2, :telAuthor2, :fioSupervisor1, :scientificDegree1, :academicRanks1, :positionSupervisor1, :universityNameSupervisor1, :departmentSupervisor1, :telSupervisor1, :haveSecondSup, :fioSupervisor2, :scientificDegree2, :academicRanks2, :positionSupervisor2, :universityNameSupervisor2, :departmentSupervisor2, :telSupervisor2)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $_SESSION['user'], PDO::PARAM_INT);
        $result->bindParam(':title_report', $array['titleOfPaper'], PDO::PARAM_STR);
        
        // $fPDF=$fioName.'.pdf';
        // $fDOC=$fioName.'.doc';
        
        $result->bindParam(':reportFilePDF', $fPDF, PDO::PARAM_STR);
        $result->bindParam(':reportFileDOC', $fDOC, PDO::PARAM_STR);
        $result->bindParam(':id_sections', $array['sectionSel'], PDO::PARAM_INT);
        $result->bindParam(':id_formParticipation', $array['formParticipationSel'], PDO::PARAM_INT);
        $result->bindParam(':id_contentReport', $array['contentsReportSel'], PDO::PARAM_INT);
        $result->bindParam(':fio1', $array['fio1'], PDO::PARAM_STR);
        
        $univerName1=($array['universityName1']=="0") ? $array['nameOtherUniversity1'] : $array['universityName1'];
        $facName1=($array['facultyName1']=="0") ? $array['nameOtherFaculty1'] : $array['facultyName1'];
        $univerName2=($array['universityName2']=="0") ? $array['nameOtherUniversity2'] : $array['universityName2'];
        if (isset($array['facultyName2'])){
            $facName2=($array['facultyName2']=="0") ? $array['nameOtherFaculty2'] : $array['facultyName2'];
        }else{
            $facName2=NULL;
        }
        
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

        //supervisor first
        $result->bindParam(':fioSupervisor1', $array['fioSupervisor1'], PDO::PARAM_STR);
        $result->bindParam(':scientificDegree1', $array['scientificDegree1'], PDO::PARAM_INT);
        $result->bindParam(':academicRanks1', $array['academicRanks1'], PDO::PARAM_INT);
        $result->bindParam(':positionSupervisor1', $array['positionSupervisor1'], PDO::PARAM_INT);

        $univerNameSup1=($array['universityNameSupervisor1']=="0") ? $array['nameOtherUniversitySupervisor1'] : $array['universityNameSupervisor1'];
        $univerNameSup2=($array['universityNameSupervisor2']=="0") ? $array['nameOtherUniversitySupervisor2'] : $array['universityNameSupervisor2'];

        $result->bindParam(':universityNameSupervisor1', $univerNameSup1, PDO::PARAM_STR);
        $result->bindParam(':departmentSupervisor1', $array['departmentSupervisor1'], PDO::PARAM_STR);
        $result->bindParam(':telSupervisor1', $array['telSupervisor1'], PDO::PARAM_STR);
        $result->bindParam(':haveSecondSup', $array['haveSecondSup'], PDO::PARAM_INT);

        //supervisor second
        $result->bindParam(':fioSupervisor2', $array['fioSupervisor2'], PDO::PARAM_STR);
        $result->bindParam(':scientificDegree2', $array['scientificDegree2'], PDO::PARAM_INT);
        $result->bindParam(':academicRanks2', $array['academicRanks2'], PDO::PARAM_INT);
        $result->bindParam(':positionSupervisor2', $array['positionSupervisor2'], PDO::PARAM_INT);
        $result->bindParam(':universityNameSupervisor2', $univerNameSup2, PDO::PARAM_STR);
        $result->bindParam(':departmentSupervisor2', $array['departmentSupervisor2'], PDO::PARAM_STR);
        $result->bindParam(':telSupervisor2', $array['telSupervisor2'], PDO::PARAM_STR);

        if($result){
            $msg="<div><div><div><h2>Уважаемый участник!<br>Поздравляем! Вы прошли регистрацию!</h2><h4>В течение суток по электронной почте Вы получите подтверждение того, что Ваши тезисы получены и направлены на рассмотрение.</h4></div><div><h4>LXXI АПСМиФ 2019 </h4><h4>Оргкомитет</h4></div><div><h3>КОНТАКТЫ:</h3><strong>Председатель СНО БГМУ</strong><br>Давидян Артур Валерьевич<br>
                    Телефон: +375-29-980-53-08<br><br><strong>Заместитель председателя СНО БГМУ </strong><br>
                    по информационно-издательской и организационной работе<br> Подголина Алена Александровна<br>Телефон: +375-29-586-46-54<br><br><strong>Заместитель председателя СНО БГМУ </strong><br>
                    по внутривузовским и межуниверситетским коммуникациям<br>Пристром Игорь Юрьевич<br>Телефон: +375-44-553-44-91<br><br>
                    <em>http://sno.bsmu.by<br>E-mail: sno@bsmu.by<br>220116, г. Минск, Республика Беларусь, пр-т. Дзержинского, 83,<br>
                    учреждение образования «Белорусский государственный медицинский университет»,<br>Совет Студенческого научного общества</em></div></div>
                    <div><div><h2>Dear participant!<br>Congratulations! You have been registered!</h2><h4>During the day you will receive the e-mail-confirmation that your abstract prepared and submitted for consideration.</h4></div><div><h4>LXXI APMM&Ph 2019 </h4><h4>Organizing Committee</h4></div><div><h3>CONTACTS:</h3><strong>Chairman of Student Scientific Society of BSMU</strong><br>Davidyan Artur Valerievich<br>Телефон: +375-29-980-53-08<br><br><strong>Deputy chairman of the </strong><br>Student Scientific Society of BSMU on information-publishing and organizational work<br>Podgolina Alena Aleksandrovna<br>Телефон: +375-29-586-46-54<br><br><strong>Chief</strong><br>of the Department of inter-institutional relations<br>of the Council of Student Scientific Society of BSMU<br>Pristrom Igor Yuryevich<br>Телефон: +375-44-553-44-91<br><br><em>http://sno.bsmu.by<br>E-mail: sno@bsmu.by<br>220116, Minsk, Republic of Belarus, Dzerzhinsky Av. 83,<br>Belarusian State Medical University,<br>Council of Student Scientific Society</em></div></div></div>";
            $emails=array();
            if((isset($array['emailAuthor2'])) && (!empty($array['emailAuthor1']))){
                array_push($emails, $array['emailAuthor2'], $array['emailAuthor1']);
            }else{
                array_push($emails, $array['emailAuthor1']);
            }
            foreach ($emails as $email) {
                Base::sendMail($email, $msg);
            }
        }
        
        return $result->execute();
    }

    //Получение всей информации о докладе
    public static function getReportByID($id)
    {
        $db = Db::getInstance()->getConnection();  
        $sql = 'SELECT *  FROM reports WHERE id_report = :id LIMIT 1';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    //Проверка твой ли ты пытаешься доклад изменить
    public static function isOwner($idReport)
    {
        $ownInfo = array();
        $ownInfo = Base::select("SELECT id_user FROM reports WHERE id_report=".$idReport);
        if($ownInfo[0]['id_user']!=$_SESSION['user']){
            return false;
        }else{
            return true;
        }
    }

    //Обновляю доклад в БД
    public static function changeToDB($array) {
        // echo "params".'<br>';
        // print_r($array);
        $db = Db::getInstance()->getConnection(); 
        
        $sql = 'UPDATE reports
            SET 
                title_report = :title_report,
                id_formParticipation = :id_formParticipation,
                id_contentReport = :id_contentReport,
                fio1 = :fio1,
                universityName1 = :universityName1,
                abbreviatureUniver1 = :abbreviatureUniver1,
                statusAuthor1 = :statusAuthor1,
                facultyName1 = :facultyName1,
                courseAuthor1 = :courseAuthor1,
                emailAuthor1 = :emailAuthor1,
                telAuthor1 = :telAuthor1,
                fio2 = :fio2,
                universityName2 = :universityName2,
                abbreviatureUniver2 = :abbreviatureUniver2,
                statusAuthor2 = :statusAuthor2,
                facultyName2 = :facultyName2,
                courseAuthor2 = :courseAuthor2,
                emailAuthor2 = :emailAuthor2,
                telAuthor2 = :telAuthor2,
                fioSupervisor1 = :fioSupervisor1,
                scientificDegree1 = :scientificDegree1,
                academicRanks1 = :academicRanks1,
                positionSupervisor1 = :positionSupervisor1,
                universityNameSupervisor1 = :universityNameSupervisor1,
                departmentSupervisor1 = :departmentSupervisor1,
                telSupervisor1 = :telSupervisor1,
                fioSupervisor2 = :fioSupervisor2,
                scientificDegree2 = :scientificDegree2,
                academicRanks2 = :academicRanks2,
                positionSupervisor2 = :positionSupervisor2,
                universityNameSupervisor2 = :universityNameSupervisor2,
                departmentSupervisor2 = :departmentSupervisor2,
                telSupervisor2 = :telSupervisor2
            WHERE id_report = :id';
               
        $result = $db->prepare($sql);
        $result->bindParam(':id', $array['idReport'], PDO::PARAM_INT);
        $result->bindParam(':title_report', $array['titleOfPaper'], PDO::PARAM_STR);
        $result->bindParam(':id_formParticipation', $array['formParticipationSel'], PDO::PARAM_INT);
        $result->bindParam(':id_contentReport', $array['contentsReportSel'], PDO::PARAM_INT);
        $result->bindParam(':fio1', $array['fio1'], PDO::PARAM_STR);
        $result->bindParam(':universityName1', $array['universityName1'], PDO::PARAM_STR);
        $result->bindParam(':abbreviatureUniver1', $array['abbreviatureUniver1'], PDO::PARAM_STR);
        $result->bindParam(':statusAuthor1', $array['statusAuthor1'], PDO::PARAM_INT);
        $result->bindParam(':facultyName1', $array['nameFacultyE1'], PDO::PARAM_STR);
        $result->bindParam(':courseAuthor1', $array['courseAuthor1'], PDO::PARAM_INT);
        $result->bindParam(':emailAuthor1', $array['emailAuthor1'], PDO::PARAM_STR);
        $result->bindParam(':telAuthor1', $array['telAuthor1'], PDO::PARAM_STR);
        $result->bindParam(':fio2', $array['fio2'], PDO::PARAM_STR);
        $result->bindParam(':universityName2', $array['universityName2'], PDO::PARAM_STR);
        $result->bindParam(':abbreviatureUniver2', $array['abbreviatureUniver2'], PDO::PARAM_STR);
        $result->bindParam(':statusAuthor2', $array['statusAuthor2'], PDO::PARAM_INT);
        $result->bindParam(':facultyName2', $array['nameFacultyE2'], PDO::PARAM_STR);
        $result->bindParam(':courseAuthor2', $array['courseAuthor2'], PDO::PARAM_INT);
        $result->bindParam(':emailAuthor2', $array['emailAuthor2'], PDO::PARAM_STR);
        $result->bindParam(':telAuthor2', $array['telAuthor2'], PDO::PARAM_STR);

        $result->bindParam(':fioSupervisor1', $array['fioSupervisor1'], PDO::PARAM_STR);
        $result->bindParam(':scientificDegree1', $array['scientificDegree1'], PDO::PARAM_INT);
        $result->bindParam(':academicRanks1', $array['academicRanks1'], PDO::PARAM_INT);
        $result->bindParam(':positionSupervisor1', $array['positionSupervisor1'], PDO::PARAM_INT);
        $result->bindParam(':universityNameSupervisor1', $array['universityNameSupervisorE1'], PDO::PARAM_STR);
        $result->bindParam(':departmentSupervisor1', $array['departmentSupervisor1'], PDO::PARAM_STR);
        $result->bindParam(':telSupervisor1', $array['telSupervisor1'], PDO::PARAM_STR);
        $result->bindParam(':fioSupervisor2', $array['fioSupervisor2'], PDO::PARAM_STR);
        $result->bindParam(':scientificDegree2', $array['scientificDegree2'], PDO::PARAM_INT);
        $result->bindParam(':academicRanks2', $array['academicRanks2'], PDO::PARAM_INT);
        $result->bindParam(':positionSupervisor2', $array['positionSupervisor2'], PDO::PARAM_INT);
        $result->bindParam(':universityNameSupervisor2', $array['universityNameSupervisorE2'], PDO::PARAM_STR);
        $result->bindParam(':departmentSupervisor2', $array['departmentSupervisor2'], PDO::PARAM_STR);
        $result->bindParam(':telSupervisor2', $array['telSupervisor2'], PDO::PARAM_STR);
        
       return $result->execute();
    }

    //Формирование csv документа
    public static function getCSV()
    {
        $csv_str="Название работы (Title of Paper); ФИО автора (Author`s name); Полное название учебного заведения/организации автора (Full name of the institution which the Author represent); Сокращенное название учебного заведения/организации автора (Abbreviation of the institution, which the Author represent); Статус автора (Status of the author); Факультет автора (faculty of the Author); Курс автора (Course); E-mail автора; Телефон автора (Telephone №); ФИО соавтора; Полное название учебного заведения/организации соавтора; Сокращенное название учебного заведения/организации соавтора; Статус соавтора; Факультет соавтора; Курс соавтора; E-mail соавтора; Телефон соавтора; ФИО 1-го научного руководителя (Surname Name of the 1st Supervisor); Учёная степень 1-го научного руководителя (Scientific degree of the 1st Supervisor); Учёное звание 1-го научного руководителя (Academic rank of the 1st Supervisor); Должность 1-го научного руководителя (Position of the 1st Supervisor); Полное название учебного заведения/организации 1-го научного руководителя (Full name of the 1st Supervisor institution); Название кафедры/структурного подразделения 1-го научного руководителя (Department); Телефон 1-го научного руководителя (Telephone № of the 1st Supervisor); ФИО 2-го научного руководителя (Surname Name of the 2st Supervisor); Учёная степень 2-го научного руководителя (Scientific degree of the 2st Supervisor); Учёное звание 2-го научного руководителя (Academic rank of the 2st Supervisor); Должность 2-го научного руководителя (Position of the 2st Supervisor); Полное название учебного заведения/организации 2-го научного руководителя (Full name of the 2st Supervisor institution); Название кафедры/структурного подразделения 2-го научного руководителя (Department); Телефон 2-го научного руководителя (Telephone № of the 2st Supervisor); Секция (Section); Форма участия (The form of participation); Содержание доклада(Contents of the report);";
        
        $file_name="archive-".Date('d-m-Y').".csv";

        $csv_str .= "\r\n";

        $arrData = array();
        $arrData=Base::select("SELECT title_report, fio1, universityName1, abbreviatureUniver1, (SELECT S.name_status FROM statuses AS S WHERE S.id_status=R.statusAuthor1), facultyName1, (SELECT C.name_course FROM courses AS C WHERE C.id_course=R.courseAuthor1), emailAuthor1, telAuthor1, fio2, universityName2, abbreviatureUniver2, (SELECT S.name_status FROM statuses AS S WHERE S.id_status=R.statusAuthor2), facultyName2, (SELECT C.name_course FROM courses AS C WHERE C.id_course=R.courseAuthor2), emailAuthor2, telAuthor2, fioSupervisor1, (SELECT SD.name_scientificDegree FROM scientificDegree AS SD WHERE SD.id_scientificDegree=R.scientificDegree1), (SELECT AR.name_academicRanks FROM academicRanks AS AR WHERE AR.id_academicRanks=R.academicRanks1), (SELECT PS.name_positionSupervisor FROM positionSupervisor AS PS WHERE PS.id_positionSupervisor=R.positionSupervisor1), universityNameSupervisor1, departmentSupervisor1, telSupervisor1, fioSupervisor2, (SELECT SD.name_scientificDegree FROM scientificDegree AS SD WHERE SD.id_scientificDegree=R.scientificDegree2), (SELECT AR.name_academicRanks FROM academicRanks AS AR WHERE AR.id_academicRanks=R.academicRanks2), (SELECT PS.name_positionSupervisor FROM positionSupervisor AS PS WHERE PS.id_positionSupervisor=R.positionSupervisor2), universityNameSupervisor2, departmentSupervisor2, telSupervisor2, (SELECT SEC.name_section FROM sections AS SEC WHERE SEC.id_section=R.id_sections), (SELECT FP.name_formParticipation FROM formParticipation AS FP WHERE FP.id_formParticipation=R.id_formParticipation), (SELECT CR.name_contentsReport FROM contentsReport AS CR WHERE CR.id_contentsReport=R.id_contentReport) FROM reports AS R ORDER BY id_report ASC");
        
        foreach ($arrData as $arrD){
            foreach ($arrD as $key => $val) {
               $csv_str .=$val.";";
            }
            $csv_str .= "\r\n";
        }
        $file = fopen("reports/".$file_name, "w+");
        $csv_str= mb_convert_encoding($csv_str, "windows-1251", "utf-8");
        fwrite($file, trim($csv_str)); 
        fclose($file);
        header('Content-type: application/csv');
        header("Content-Disposition: inline; filename=\"".$file_name."\"");

        readfile("reports/".$file_name);
        unlink("reports/".$file_name);
        
    }

    //Вывести все имеющиеся доклады по секциям
    public static function getReportsList()
    {
        $repList = array();
        $repList = Base::select("SELECT id_sections, (SELECT name_section FROM sections AS S WHERE S.id_section=R.id_sections) AS sName, COUNT(*) AS C FROM reports AS R GROUP BY id_sections ORDER BY sName ASC");
        return $repList;
    }

}