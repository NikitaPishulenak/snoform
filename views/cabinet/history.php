<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
                        
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/phpShop/cabinet">Аккаунт</a></li>
                    <li class="active">Мои заказы</li>
                </ol>
            </div>

            <h4>История заказов</h4>

            <br/>
            <?php if(empty($ordersList)): ?>
                <h4>У Вас еще нету заказов!</h4>
            <?php endif;?>


            <?php foreach ($ordersList as $order): ?>
                <div class="orderItem">
                    <div class="orderNumber">
                        <strong title="Заказ #<?php echo $order['id']; ?>">#<?php echo $order['id']; ?></strong>
                        <div class="options">
                            <a class="edtItem" href="/phpShop/cabinet/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a>
                            <!-- <a class="edtItem" href="/phpShop/cabinet/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a> -->
                            <?php if($order['status']<=2): ?>
                                <span class="delProduct delItem" data-idOrder="<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="sum_order"><strong>Сумма заказа: </strong><span><?php echo $order['total_sum']; ?> руб.</span></div>
                    <div class="sum_order"><strong>Дата оформления: </strong><span><?php echo $order['date']; ?> </span></div>
                    <div class="sum_order"><strong>Статус: </strong><span><?php echo $order['status_val']; ?> </span></div>
                    
                
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>