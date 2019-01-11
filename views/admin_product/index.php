<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/phpShop/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="/phpShop/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            
            <h4>Список товаров</h4>
            <em title="Новинка"><span class="new_rule"></span>Новинка</em>&nbsp;
            <em title="Рекомендуем"><span class="recomendet_rule"></span>Рекомендуем</em>&nbsp;
            <em title="Товар имеется в наличии"><span class="existInStore_rule"></span>На складе</em>&nbsp;
            <em title="Товар отображается на сайте"><span class="available_rule"></span>Активен</em>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; 
                        if( $product['is_new']==1) echo "<span title='Новинка' class='new_rule'></span>";
                        if( $product['is_recommended']) echo "<span title='Рекомендуем' class='recomendet_rule'></span>";
                        if( $product['status']==1) echo "<span title='Товар имеется в наличии' class='existInStore_rule'></span>";
                        if( $product['availability']==1) echo "<span title='Товар отображается на сайте' class='available_rule'></span>";
                        ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><a href="/phpShop/product/<?php echo $product['id'];?>"><?php echo $product['name'];?></a></td>
                        <td><?php echo $product['price']; ?></td>  
                        <td><a class="edtProduct edtItem" href="/phpShop/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a>
                        <span class="delProduct delItem" data-idProduct="<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></span></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

