<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="post" action="sendForm">
            <ul id="progressbar">
                    <li class="active">Доклад</li>
                    <li>Участник</li>
                    <li>Руководитель</li>
                </ul>
            <!-- <fieldset>
                
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
                        <?php foreach ($formParticipation as $formPartItem): 
                            echo '<option value="' . $formPartItem['id_formParticipation'] . '">' . $formPartItem['name_formParticipation'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong>Содержание доклада(Contents of the report)</strong><span class="req">*</span></div>
                    <select id="contentsReportSel" name="contentsReportSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($contentsReport as $contRepItem): 
                            echo '<option value="' . $contRepItem['id_contentsReport'] . '">' . $contRepItem['name_contentsReport'] . '</option>';
                        endforeach; ?>
                    </select>

                </div>
                
                <input type="button" name="next" class="next action-button step1" value="Далее"/>
                
                
            </fieldset> -->
            <fieldset>
                <h2 class="fs-title">Автор</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <div class="contentF" >
                    <div class="titleBlock"><strong> ФИО автора (Author`s Surname Name)</strong><span class="req">*</span></div>
                    <input type="text" name="fio1" id="fio1" placeholder="Иванов Степан Викторович"/>

                    <div class="titleBlock"><strong>Полное название учебного заведения/организации автора (Full name of the institution which the Author
                represent)</strong><span class="req">*</span></div>
                    
                    <div class="marg"></div>
                    <div class="left">
                        <label><input type="radio" name="universityName1" onclick="handelRB(this, 'fullNameUniver1');" value="Белорусский государственный медицинский университет" checked> Белорусский государственный медицинский университет</label><br>
                        <label><input type="radio" name="universityName1" onclick="handelRB(this, 'fullNameUniver1');" value="0" id="rbUniver1"> Другой</label>
                        <input type="text" name="nameOtherUniversity" id="fullNameUniver1">
                    </div>
                    <!-- <script type="text/javascript">
                        function handelRB(myRadio) {
                            var el=document.getElementById('fullNameUniver1');
                            if(myRadio.value=="0"){
                                 el.style.display = 'initial';

                            }else{
                                el.style.display = 'none';
                            }
                        }
                    </script> -->

                    <div class="titleBlock"><strong> Сокращенное название учебного заведения/организации автора (Abbreviation of the institution, which the
                Author represent)</strong><span class="req">*</span></div>
                    <input type="text" name="abbreviatureUniver1" id="abbreviatureUniver1" placeholder="БГМУ">

                    
                    <div class="titleBlock"><strong> Статус автора (Status of the author)</strong><span class="req">*</span><br><em class="hint"> На момент участия в Конференции!</em></div>
                    <select id="statusAuthor1" name="statusAuthor1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($statuses as $status):
                            echo '<option value="' . $status['id_status'] . '">' . $status['name_status'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Факультет автора (faculty of the Author)</strong><span class="req">*</span><br><em class="hint">Если Вы не являетесь студентом, выберите вариант ответа "Нет" (If you are not a student,
                select "No")</em></div>
                    
                    <div class="marg"></div>
                    <div class="left">
                        <?php foreach ($faculties as $faculty):?>
                            <label><input checked type="radio" name="facultyName1" onclick="handelRB(this, 'otherFac1');" value="<?php echo $faculty['id_faculti']; ?>"><?php echo $faculty['name_faculti']; ?></label><br>
                        <?php endforeach; ?>
                        <label><input type="radio" name="facultyName1" onclick="handelRB(this, 'otherFac1');" value="0" id="rbFac1">Другое/Other</label>
                        <input type="text" name="nameOtherFaculty" id="otherFac1" placeholder="Профориентации">
                        
                    </div>
                    

                    <!-- <div class="titleBlock" title="Прикрепите .pdf файл скан-копии вашего доклада с визами научных руководителей"><strong>.pdf файл скан-копии доклада с визами</strong><span class="req">*</span><span style="color: #8c0000; font-size: 0.9em"><br><i>Размер файла не должен превышать 1Mb</i></span></div>
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
                        <?php foreach ($formParticipation as $formPartItem): 
                            echo '<option value="' . $formPartItem['id_formParticipation'] . '">' . $formPartItem['name_formParticipation'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong>Содержание доклада(Contents of the report)</strong><span class="req">*</span></div>
                    <select id="contentsReportSel" name="contentsReportSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($contentsReport as $contRepItem): 
                            echo '<option value="' . $contRepItem['id_contentsReport'] . '">' . $contRepItem['name_contentsReport'] . '</option>';
                        endforeach; ?>
                    </select> -->

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
<script type="text/javascript">
    function handelRB(myRadio, idElem) {
        var el=document.getElementById(idElem);
        if(myRadio.value=="0"){
            el.style.display = 'initial';
        }else{
            el.style.display = 'none';
        }
    }
</script>
<?php include ROOT . '/views/layouts/footer.php'; ?>