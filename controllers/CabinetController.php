<?php

class CabinetController
{
	public function actionIndex(){
        $userId=User::checkLogged();
        if(!$userId){
            Base::redirect("/enter");
        }else{
            //Пользователь авторизован и зашел в кабинет
            $userReports = array();
            $userReports = User::getUserReports($_SESSION['user']);
        }      
       
		require_once(ROOT . '/views/cabinet/index.php');
		return true;
    }

   
    

    public function actionEditForm($idReport){
        if(!User::checkLogged()){
            Base::redirect("/enter");
            exit;
        }else if(!Report::isOwner($idReport)){
            Base::redirect("/cabinet");
            exit;
        }

        $reportData=Report::getReportByID($idReport);
        //report
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
        
        $formParticipation = Report::getFormParticipationList();
        $contentsReport = Report::getContentsReportList();

        $statuses = Student::getStatusesList();
        $faculties = Student::getFacultyList();
        $courses = Student::getCoursesList();

        $scientificDegree = Teatcher::getScientificDegreeList();
        $academicRanks = Teatcher::getAcademicRanksList();
        $positionSupervisor = Teatcher::getPositionSupervisorList();
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
        
}
?>