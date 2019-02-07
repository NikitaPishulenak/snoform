<?php

class MainController
{
    //отображение страницы с формой
	public function actionIndex(){
        if(!User::checkLogged()){
            Base::redirect("/enter");
        }
        //report
        $section = array();
        $formParticipation = array();
        $contentsReport = array();

        //author
        $statuses = array();
        $faculties = array();
        $courses = array();

        //teatcher
        $scientificDegree = array();
        $academicRanks = array();
        $positionSupervisor = array();
        
        $section = Report::getSectionList();
        $formParticipation = Report::getFormParticipationList();
        $contentsReport = Report::getContentsReportList();

        $statuses = Student::getStatusesList();
        $faculties = Student::getFacultyList();
        $courses = Student::getCoursesList();

        $scientificDegree = Teatcher::getScientificDegreeList();
        $academicRanks = Teatcher::getAcademicRanksList();
        $positionSupervisor = Teatcher::getPositionSupervisorList();
 
        require_once(ROOT . '/views/main/index.php');
		return true;
    }

    //отправка формы на сервер
    public function actionSendF(){

        $result = Report::sendToDB($_REQUEST);
        if ($result){
            require_once(ROOT . '/views/main/send.php');
            return true;
        }
    }

    //отправка формы на сервер
    public function actionSaveF(){
        $result = Report::changeToDB($_REQUEST);
        if ($result){
            ?><script>alert("Изменения успешно сохранены!");</script><?php
        }else{
            ?><script>alert("Произошел сбой при сохранении данных!");</script><?php
        }
        Base::redirect("/cabinet");
        return true;
    }
    
    
    

}
?>