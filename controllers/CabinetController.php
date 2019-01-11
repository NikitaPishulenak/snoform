<?php

class CabinetController
{
	public function actionIndex(){
        $userId=User::checkLogged();
       
		require_once(ROOT . '/views/cabinet/index.php');
		return true;
    }

    public function actionEditPassword(){
        $userId=User::checkLogged();
        $cur_pwd='';
        $new_pwd1='';
        $new_pwd2='';
        $result = false;
        
        if (isset($_POST['submit'])) {
            $cur_pwd=$_POST['cur_password'];
            $new_pwd1=$_POST['password1'];
            $new_pwd2=$_POST['password2'];

            $errors = false;

            if(!User::verifiPwd($_SESSION['user'], $cur_pwd)){
                $errors[] = 'Введен неправильный текущий пароль';
            }

            if ((!User::checkPassword($new_pwd1)) || ((!User::checkPassword($new_pwd2)))) {
                $errors[] = 'Новый пароль не должен быть короче 6-ти символов';
            }

            if (!User::equalPwd($new_pwd1, $new_pwd2)) {
                $errors[] = 'Введённые пароли не совпадают';
            }

            if ($errors == false) {
                $result = User::updatePwd($_SESSION['user'], $new_pwd1);
            }

        }
		require_once(ROOT . '/views/cabinet/edit.php');
		return true;
    }

    public function actionShowOrder(){
        $userId=User::checkLogged();
        $ordersList = Order::getOrdersListForUser($userId);
       
		require_once(ROOT . '/views/cabinet/history.php');
		return true;
    }
    
    public function actionViewOrder($idOrder){
        $userId=User::checkLogged();
        Order::checkOwner($userId, $idOrder);
        $order = Order::getOrderById($idOrder);
        $order['date']=Order::convertDate($order['date']);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = Product::getProdustsByIds($productsIds);
            
        require_once(ROOT . '/views/cabinet/showHistory.php');

		return true;
    }

    public function actionEditOrder($idOrder){
        $userId=User::checkLogged();
        Order::checkOwner($userId, $idOrder);
        $order = Order::getOrderById($idOrder);
        $order['date']=Order::convertDate($order['date']);
        print_r($order);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = Product::getProdustsByIds($productsIds);

        if (isset($_POST['submit'])) {
            

            // $errors = false;

            // if(!User::verifiPwd($_SESSION['user'], $cur_pwd)){
            //     $errors[] = 'Введен неправильный текущий пароль';
            // }

            // if ((!User::checkPassword($new_pwd1)) || ((!User::checkPassword($new_pwd2)))) {
            //     $errors[] = 'Новый пароль не должен быть короче 6-ти символов';
            // }

            // if (!User::equalPwd($new_pwd1, $new_pwd2)) {
            //     $errors[] = 'Введённые пароли не совпадают';
            // }

            // if ($errors == false) {
            //     $result = User::updatePwd($_SESSION['user'], $new_pwd1);
            // }

        }
            
        require_once(ROOT . '/views/cabinet/editHistory.php');

		return true;
    }

    public function actionDelOrder($id)
    {
        echo $id;
        $userId=User::checkLogged();
        Order::checkOwner($userId, $id);
        Order::deleteOrderById($id);
        return true;
    }
    
}
?>