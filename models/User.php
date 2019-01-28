<?php

class User
{
    public static function register($email, $password) {
        
        $db = Db::getInstance()->getConnection(); 
        
        $sql = 'INSERT INTO user (email, password, dtReg) '
                . 'VALUES (:email, md5(:password), CURRENT_TIMESTAMP())';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
    

    // public static function checkFieldEmpty($field) {
    //     if (!empty($field)) {
    //         return true;
    //     }
    //     return false;
    // }


    // /**
    //  * Проверяет имя: не меньше, чем 2 символа
    //  */
    // public static function checkName($name) {
    //     if (strlen($name) >= 2) {
    //         return true;
    //     }
    //     return false;
    // }

        
    // *
    //  * Проверяет имя: не меньше, чем 6 символов
     
    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    
    // /**
    //  * Проверяет email
    //  */
    // public static function checkEmail($email) {
    //     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         return true;
    //     }
    //     return false;
    // }
    
    /**
    //  Передаю $countVal=0 для регистрации  $countVal=1 для авторизации
    //  */
    public static function checkEmailExists($email, $countVal) {
        $result = Base::select("SELECT COUNT(*) AS count FROM user WHERE email ='$email'");
        print_r($result);
        if($result[0]['count']==$countVal){
            return true;
        }else{
           return false; 
        }
    }

    //Проверяю логин пароль
    public static function checkUserData($email, $password)
    {
        $db = Db::getInstance()->getConnection(); 

        $sql = 'SELECT * FROM user WHERE email = :email AND password = md5(:password)';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
        
        $db = Db::getInstance()->getConnection(); 
        $sql = 'SELECT email FROM user WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->execute();

        $row=$result->fetch(PDO::FETCH_ASSOC);
        // $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }else{
            ?><script>document.location.href='/snoform/login'</script><?php
        }       
    }

    public static function checkAdmin(){
        $userId=self::checkLogged();
        $user=self::getUserById($userId);
        if($user['role']=="admin"){
            return true;
        }else{
            return false;
        }
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function verifiPwd($userId, $pwd) {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT password FROM user WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_STR);
        $result->execute();

        $row=$result->fetch(PDO::FETCH_ASSOC);
        if($row['password']==md5($pwd)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function equalPwd($pwd1, $pwd2) {
        if ($pwd1===$pwd2){
            return true; 
        }
        else{
            return false;
        }
    }

    public static function updatePwd($userId, $password)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE user SET user.password = md5(:pwd) WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->bindParam(':pwd', $password, PDO::PARAM_STR);
        return $result->execute();

    }

    public static function getUserById($id)
    {
        $db = Db::getInstance()->getConnection(); 
        $sql = 'SELECT * FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    
}