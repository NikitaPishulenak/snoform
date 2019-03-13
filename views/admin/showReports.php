<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><strong>Информация по состоянию на <?php echo $nowDateTime; ?></strong><br><br>
            <?php if (empty($completedReports)): ?>
                    <h3>На данный момент база данных пуста!</h3>
                <?php else: ?>
                    <div class="col">
                        <a id="selAll" class="btn btn-info col-xs-12 col-sm-3">Выделить все</a>
                        <a id="cancelAll" class="btn btn-info col-xs-12 col-sm-3">Отменить все</a>
                        <a class="btn btn-info exportSel col-md-4 col-xs-12 col-sm-3" target="blank">Экспортировать</a>
                    </div>
                    <br>
                    <?php foreach ($completedReports as $cr):?>
                        <div class="sectionItem" data-idS="<?php echo $cr['id_sections'];?>">
                            <strong><?php echo $cr['sName']; ?></strong><br>
                            <div class="countR" title="Количество докладов в секции: <?php echo $cr['C']; ?>"><?php echo $cr['C']; ?></div>
                        </div>
                    <?php endforeach; ?>                              
                <?php endif; ?>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>