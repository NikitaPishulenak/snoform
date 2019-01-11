<?php

class UserController
 {
	public function actionRegister(){
        $name='';
        $email='';
        $password='';
        $result = false;
        
        if (isset($_POST['submit'])) {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $errors = false;
            
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');
		return true;
    }

    public function actionLogin(){
        $email='';
        $password='';
        $result = false;
        
        if (isset($_POST['submit'])) {
            $email=$_POST['email'];
            $password=$_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!User::checkEmailExists($email)) {
                $errors[] = 'Пользователь с таким логином не зарегистрирован!';
            }

            $userId=User::checkUserData($email, $password);
            if(!$userId){
                $errors[] = 'Неверный логин и/или пароль!';
            }else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                if(User::checkAdmin()){
                    ?><script>document.location.href='/phpShop/admin'</script><?php
                }else{
                    ?><script>document.location.href='/phpShop/cabinet'</script><?php
                }
            }
            
        
        }

        require_once(ROOT . '/views/user/login.php');
		return true;
    }

    public function actionLogout(){
        unset($_SESSION['user']);
        ?><script>document.location.href='/phpShop/login'</script><?php
		return true;
    }


}
?>