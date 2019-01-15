<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="post" action="sendForm">
            <ul id="progressbar">
                    <li class="active">Доклад</li>
                    <li>Участник</li>
                    <li>Руководитель</li>
                </ul>
            <fieldset>
                
                <h2 class="fs-title">Доклад</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <div class="contentF" >
                    <div class="titleBlock"><strong> Название работы (Title of Paper)</strong><span class="req">*</span></div>
                    <input type="text" name="titleOfPaper" id="titleOfPaper" placeholder="Лечение хронического холецистита"/>

                    <div class="titleBlock" title="Прикрепите .pdf файл скан-копии вашего доклада с визами научных руководителей"><strong>.pdf файл скан-копии доклада с визами</strong><span class="req">*</span><span style="color: #8c0000; font-size: 0.9em"><br><i>Размер файла не должен превышать 1Mb</i></span></div>
                    <input type="file" name="reportFilePDF" id="uploadFilePDF" onchange="CheckFile(this, 'pdf')" accept="application/pdf" title="Прикрепите .pdf файл скан-копии вашего доклада с визами научных руководителей. Размер файла не должен превышать 1Mb.">

                    <div class="titleBlock" title="Прикрепите .doc файл вашего доклада"><strong>.doc файл доклада</strong><span class="req">*</span><span style="color: #8c0000; font-size: 0.9em"><br><i>Размер файла не должен превышать 1Mb</i></span></div>
                    <input type="file" name="reportFileDOC" id="uploadFileDOC" onchange="CheckFile(this, 'doc')" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" title="Прикрепите .doc файл вашего доклада. Размер файла не должен превышать 1Mb.">


                    <div class="titleBlock" title="Выберите научное направление Конференции, в котором хотите принять участие
                        (Select Conference themes, which you would like participate)"><strong> Секция (Section)</strong><span class="req">*</span></div>
                    <select id="sectionSel" name="sectionSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($section as $sectionItem):
                            echo '<option value="'.$sectionItem['id_section'].'">'.$sectionItem['name_section'].'</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Форма участия (The form of participation)</strong><span class="req">*</span></div>
                    <select id="formParticipationSel" name="formParticipationSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($formParticipation as $formPartItem): print_r($formPartItem);
                            echo '<option value="' . $formPartItem['id_formParticipation'] . '">' . $formPartItem['name_formParticipation'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong>Содержание доклада(Contents of the report)</strong><span class="req">*</span></div>
                    <select id="contentsReportSel" name="contentsReportSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($contentsReport as $contRepItem): print_r($contRepItem);
                            echo '<option value="' . $contRepItem['id_contentsReport'] . '">' . $contRepItem['name_contentsReport'] . '</option>';
                        endforeach; ?>
                    </select>

                </div>
                
                <input type="button" name="next" class="next action-button step1" value="Далее"/>
                
                
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Social Profiles</h2>
                <h3 class="fs-subtitle">Your presence on the social network</h3>
                <div class="contentF">
                <input type="text" name="twitter" placeholder="Twitter"/>
                <input type="text" name="facebook" placeholder="Facebook"/>
                <input type="text" name="gplus" placeholder="Google Plus"/>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button step2" value="Next"/>
                
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <div class="contentF">
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="cpass" placeholder="Confirm Password"/>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="action-button step3" value="Submit"/>
            </fieldset>
<!--             <input type="submit" class="action-button" value="Submit"> -->
        </form>
    </div>
</div>

<?php


 include ROOT . '/views/layouts/footer.php'; ?>