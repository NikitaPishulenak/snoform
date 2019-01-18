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
        
        $section = Report::getSectionList();
        $formParticipation = Report::getFormParticipationList();
        $contentsReport = Report::getContentsReportList();

        $statuses = Student::getStatusesList();
        $faculties = Student::getFacultyList();

		require_once(ROOT . '/views/main/index.php');
		return true;
    }

    //отправка формы на сервер
    public function actionSendF(){
        print_r($_REQUEST);
        // require_once(ROOT . '/views/main/index.php');
        //return true;
    }
    
    public function actionContact(){
        $name='';
        $phon='';
        $message='';
        $result = false;

        if (isset($_POST['submit'])) {
            $name=$_POST['name'];
            $phon=$_POST['phonNumber'];
            $message=$_POST['userText'];

            $errors = false;

            if (!User::checkFieldEmpty($name)) {
                $errors[] = 'Введите ваше имя!';
            }
            if (!User::checkName($name)) {
                $errors[] = 'Имя не может быть меньше 2 символов!';
            }
            if (!User::checkFieldEmpty($phon)) {
                $errors[] = 'Введите ваш номер телефона!';
            }
            if (!User::checkFieldEmpty($message)) {
                $errors[] = 'Введите ваш вопрос!';
            }
            if($errors==false){
                ECHO"JH";
            }
            

        }

		require_once(ROOT . '/views/site/contact.php');
		return true;
    }
    
    public function actionSearch($text){
		$categories = array();
        $categories = Category::getCategoriesList();
        $text=urldecode($text);

        $searchProducts = array();
        $searchProducts = Product::getSearchedProducts($text);
       
		require_once(ROOT . '/views/site/search.php');
		return true;
    }
    

}
?>