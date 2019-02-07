<?php

class UserController
 {
	public function actionRegister(){
        if(!User::isGuest()){
            Base::redirect("/");
        }
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
                // 
                $rCode = $_POST['g-recaptcha-response'];
                $rUrl = 'https://www.google.com/recaptcha/api/siteverify';
                $rSecret = '6LfRwo0UAAAAAEPeBHu-u7FhtAXETLPNSRfu9H8Z';
                $ip = $_SERVER['REMOTE_ADDR'];

                $curl = curl_init($rUrl);

                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
                curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret='.$rSecret.'&response='.$rCode.'&remoteip='.$ip);
                curl_setopt($curl, CURLINFO_HEADER_OUT, false);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $res = curl_exec($curl);
                curl_close($curl);
                $res = json_decode($res);

                if ($res->success) {
                    $result = User::register($email, $password1);
                    if($result){
                        $userId=User::checkUserData($email, $password1);

                        $msg='Здравствуйте!<br>Вы успешно зарегистрировались на сайте '.$_SERVER['HTTP_HOST'].'<br><strong>Логин:</strong><span>'.$email.'</span><br><strong>Пароль:</strong><span>'.$password1.'</span><br><br><em>С уважением, руководство СНО БГМУ.</em>';
                        Base::sendMail($email, $msg);

                        User::auth($userId);
                        Base::redirect("/");
                        exit;
                    }
                } else {
                   ?><script>alert("Ботам здесь не место!");</script><?php
                }

                
            }
        }

        require_once(ROOT . '/views/user/register.php');
		return true;
    }

    public function actionLogin(){
        if(!User::isGuest()){
            Base::redirect("/");
        }
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
            }else{
                $userId=User::checkUserData($email, $password);
                if(!$userId){
                    $errors[] = 'Неверный логин и/или пароль!';
                }else{
                    User::auth($userId);
                    if(User::checkAdmin()){
                        Base::redirect("/admin");
                    }else{
                        Base::redirect("/");
                    }
                }
            }
       
        }

        require_once(ROOT . '/views/user/login.php');
		return true;
    }

    public function actionLogout(){
        unset($_SESSION['user']);
        Base::redirect("/enter");
		return true;
    }


}
?>