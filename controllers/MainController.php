<?php

class MainController
{
    //отображение страницы с формой
	public function actionIndex(){
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
            echo "sended";
        }
        // require_once(ROOT . '/views/main/index.php');
        //return true;
    }
    
    
    

}
?>