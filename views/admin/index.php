<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Добрый день, администратор <?php echo $_SESSION['email']; ?>!</h3>
            <div class="col">
                <h4>Вам доступны такие возможности:</h4>
                <div class="toolItem" id="downloadCSV"><a href="csv">Экспортировать .csv архив</a></div>
                <div class="toolItem"><a href="rep">Просмотреть доклады</a></div>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>

