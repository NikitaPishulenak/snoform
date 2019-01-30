<?php

class MainController
{
    //отображение страницы с формой
	public function actionIndex(){
        User::checkLogged();
        // $to      = 'niki1995-11@mail.ru';  
        // $message='Здравствуйте!<br>Вы успешно зарегистрировались на сайте <a href="'.$_SERVER['HTTP_HOST'].'">'.$_SERVER['HTTP_HOST'].'</a><br><strong>Логин:</strong><span></span><br><strong>Пароль:</strong><span></span><br><br><em>С уважением, руководство СНО БГМУ.</em>';
        // $message = "To: $to\r\n\r\n".$message;
        //                 $message='Content-type: text/html; charset=UTF-8\r\n<br>Здравствуйте!<br>Вы успешно зарегистрировались на сайте <a href="'.$_SERVER['HTTP_HOST'].'">'.$_SERVER['HTTP_HOST'].'</a><br><strong>Логин:</strong><span>'.$to.'</span><br><strong>Пароль:</strong><span>'.$to.'</span><br><br><em>С уважением, руководство СНО БГМУ.</em>';
        //                 // $message = "Content-type: text/html; charset=UTF-8\r\n".$message."<br/><br/>"."<strong>Имя отправителя:</strong> <br/> "."<strong>Электронный адрес отправителя:</strong> <br/>"."<strong>Тема сообщения1:</strong><br/><br/><br/><strong>Текст сообщения:</strong> <br/>"; // заголовок "тема сообщения"
                        // Base::sendMail($to, $message);
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