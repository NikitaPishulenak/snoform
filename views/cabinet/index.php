<?php include ROOT . '/views/layouts/header.php'; ?>
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <strong>Привет, <?php echo $_SESSION['email'];?>!</strong>
            <div class="col">
                <h4>Ваши зарегистрированные доклады:</h4>
                
                <?php if (empty($userReports)): ?>
                    <h3>У вас еще нет зарегистрированных докладов!</h3>
                <?php else: ?>
                    <?php foreach ($userReports as $report):?>
                        <div class="reportItem">
                            <strong class="titleR"><?php echo $report['title_report']; ?>&nbsp; <em>(<?php echo $report['s_name']; ?>)</em></strong><br>
                            <em class="author"><?php echo $report['fio1']; ?></em><br>
                            <?php if (!empty($report['fio2'])): ?>
                                <em class="author"><?php echo $report['fio2']; ?></em>
                            <?php endif; ?>
                            <div class="edt">
                                <a href="<?php echo rootFolder;?>/cabinet/edit/<?php echo  $report['id_report'];?>" title="редактировать"><i class='glyphicon glyphicon-edit'></i></a>
                                <a data-idReport="<?php echo  $report['id_report'];?>" href="#" title="удалить" class="delReport"><i class='glyphicon glyphicon glyphicon-trash'></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>    
                    <div class="marg">&nbsp;</div>                          
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>