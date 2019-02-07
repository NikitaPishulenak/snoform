<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <strong>Информация по состоянию на <?php echo Date('d-m-Y G:i'); ?></strong>
            <?php if (empty($completedReports)): ?>
                    <h3>На данный момент база данных пуста!</h3>
                <?php else: ?>
                    <div class="col">
                        <button id="selAll">Выделить все</button>
                        <button id="cancelAll">Отменить все</button>
                        <button class="exportSel">Экспортировать</button>
                    </div>
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