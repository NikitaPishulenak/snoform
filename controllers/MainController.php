<?php

class MainController
{
    //отображение страницы с формой
	public function actionIndex(){
        if(!User::checkLogged()){
            ?>
            <script>document.location.href='/snoform/login'</script>
            <?php
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

            // $address = 'mail.bsmu.by';
            // $port = 25;
            // $login = 'pishulenakna';
            // $pwd = 'K41ItHWWE';
            // $from = 'pishulenakna@bsmu.by';
            // $to = 'niki1995-11@mail.ru';
            // $msg = 'Message';
            //     //------------------------------------------- //
            //     try {
            //         // Создание сокета
            //         $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            //         if ($socket < 0) {
            //             throw new Exception('socket_create() failed: ' . socket_strerror(socket_last_error()) . "\n");
            //         }
            //         // Соединение сокета к серверу
            //         $result = socket_connect($socket, $address, $port);
            //         if ($result === false) {
            //             throw new Exception('socket_connect() failed: ' . socket_strerror(socket_last_error()) . "\n");
            //         }
            //         // Чтение информацию о сервере
            //         read_smtp_answer($socket);
            //         // Обращение к серверу
            //         write_smtp_response($socket, 'EHLO ' . $login);
            //         read_smtp_answer($socket); // ответ сервера
            //         // Запрос авторизации
            //         write_smtp_response($socket, 'AUTH LOGIN');
            //         read_smtp_answer($socket); // ответ сервера
            //         // Отравка логина
            //         write_smtp_response($socket, base64_encode($login));
            //         read_smtp_answer($socket); // ответ сервера
            //         // Отравка пароль
            //         write_smtp_response($socket, base64_encode($pwd));
            //         // Адрес отправителя
            //         write_smtp_response($socket, 'MAIL FROM:<' . $from . '>');
            //         read_smtp_answer($socket); // ответ сервера
            //         // Задаем адрес получателя
            //         write_smtp_response($socket, 'RCPT TO:<' . $to . '>');
            //         read_smtp_answer($socket); // ответ сервера
            //         // Подготовка сервера к приему данных
            //         write_smtp_response($socket, 'DATA');
            //         read_smtp_answer($socket); // ответ сервера
            //         $message = "Content-type: text/html; charset=\"UTF-8\"\r\n To: $to\r\n\r\n $msg\r\n\r\n";

            //         write_smtp_response($socket, $message . "\r\n.");
            //         read_smtp_answer($socket); // ответ сервера
            //         // Отсоединяемся от сервера
            //         write_smtp_response($socket, 'QUIT');
            //         read_smtp_answer($socket); // ответ сервера
            //     } 
            //     catch (Exception $e) {
            //         $message_for_user = "\nError: " . $e->getMessage();
            //     }
            //     if (isset($socket)) {
            //         socket_close($socket);
            //     }

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