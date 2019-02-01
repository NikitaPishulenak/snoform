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
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
        
}
?>