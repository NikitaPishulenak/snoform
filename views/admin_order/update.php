<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/phpShop/admin">Админпанель</a></li>
                    <li><a href="/phpShop/admin/order">Управление заказами</a></li>
                    <li class="active">Редактировать заказ</li>
                </ol>
            </div>


            <h4>Редактировать заказ #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-sm-4"><strong>Имя клиента:</strong></div>
                            <div class="col-sm-8"><?php echo $order['user_name']; ?></div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4"><strong>Телефон клиента:</strong></div>
                            <div class="col-sm-8"><?php echo $order['user_phone']; ?></div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4"><strong>Комментарий клиента:</strong></div>
                            <div class="col-sm-8"><?php echo $order['user_comment']; ?></div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4"><strong>Дата оформления заказа:</strong></div>
                            <div class="col-sm-8"><?php echo $order['date']; ?></div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4"><strong>Сумма чека:</strong></div>
                            <div class="col-sm-8"><?php echo $order['total_sum']; ?> руб.</div>
                        </div><br>
                        
                        <div class="row">
                            <div class="col-sm-4"><strong>Статус:</strong></div>
                            <div class="col-sm-5">
                                <select name="status">
                                    <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                                    <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                                    <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                                    <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                                </select>
                            </div>
                        </div>
 
                      
                        <br>
                        <br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

