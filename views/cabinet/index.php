<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h1>Кабинет пользователя</h1>
            
            <h3>Привет, <?php echo $_SESSION['name'];?>!</h3>
            <ul>
                <li><a href="/phpShop/cabinet/editPassword">Изменить пароль</a></li>
                <li><a href="/phpShop/cabinet/history">Список покупок</a></li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>