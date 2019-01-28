<?php

class UserController
 {
	public function actionRegister(){

        $email='';
        $password1='';
        $password2='';
        $result = false;
        
        if (isset($_POST['submit'])) {
            $email=$_POST['emailReg'];
            $password1=$_POST['password1Reg'];
            $password2=$_POST['password2Reg'];

            $errors = false;
            
            if (!User::checkEmailExists($email, 0)) {
                $errors[] = 'Такой email уже используется';
            }
            if (!User::checkPassword($password1)) {
                $errors[] = 'Пароль должен быть не менее 6 символов!';
            }
            if (!User::checkPassword($password2)) {
                $errors[] = 'Пароль должен быть не менее 6 символов!';
            }
            if (!User::equalPwd($password1, $password2)) {
                $errors[] = 'Введенные пароли не совпадают!';
            }

            if ($errors == false) {
                $result = User::register($email, $password1);
                if($result){
                    $userId=User::checkUserData($email, $password1);
                    User::auth($userId);
                    ?>
                    <script>document.location.href='/snoform'</script>
                    <?php
                    exit;
                }
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
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!User::checkEmailExists($email, 1)) {
                $errors[] = 'Пользователь с таким логином не зарегистрирован!';
            }
            $userId=User::checkUserData($email, $password);
            if(!$userId){
                $errors[] = 'Неверный логин и/или пароль!';
            }else{
                User::auth($userId);
                if(User::checkAdmin()){
                    ?><script>document.location.href='/snoform/admin'</script><?php
                }else{
                    ?>
                    <script>document.location.href='/snoform'</script>
                    <?php
                }
            }

            
            // if(!$userId){
            //     $errors[] = 'Неверный логин и/или пароль!';
            // }else {
            //     // Если данные правильные, запоминаем пользователя (сессия)
            //     User::auth($userId);
            //     echo $_SESSION['user'];
        //         if(User::checkAdmin()){
        //             ?>
        <!-- <script>document.location.href='/phpShop/admin'</script> -->
        <?php
        //         }else{
        //             ?>
        <!-- <script>document.location.href='/phpShop/cabinet'</script> -->
        <?php
        //         }
            // }
            
        
        }

        require_once(ROOT . '/views/user/login.php');
		return true;
    }

    public function actionLogout(){
        unset($_SESSION['user']);
        ?><script>document.location.href='/snoform/login'</script><?php
		return true;
    }


}
?>