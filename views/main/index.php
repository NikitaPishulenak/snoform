<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="post" action="sendForm" enctype="multipart/form-data">
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
                
                
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Автор</h2>
                <h3 class="fs-subtitle">Информация о авторе</h3>
                <div class="contentF" >
                    <div class="titleBlock"><strong> ФИО автора (Author`s Surname Name)</strong><span class="req">*</span></div>
                    <input type="text" name="fio1" id="fio1" placeholder="Иванов Степан Викторович"/>

                    <div class="titleBlock"><strong>Полное название учебного заведения/организации автора (Full name of the institution which the Author
                represent)</strong><span class="req">*</span></div>
                    
                    <div class="marg"></div>
                    <div class="left">
                        <label><input type="radio" name="universityName1" onclick="handelRB(this, 'fullNameUniver1');" value="Белорусский государственный медицинский университет" checked> Белорусский государственный медицинский университет</label><br>
                        <label><input type="radio" name="universityName1" onclick="handelRB(this, 'fullNameUniver1');" value="0" id="rbUniver1"> Другой</label>
                        <input type="text" name="nameOtherUniversity1" id="fullNameUniver1">
                    </div>

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

                    <div class="titleBlock"><strong> Курс автора (Course)</strong><span class="req">*</span></div>
                    <select id="courseAuthor1" name="courseAuthor1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($courses as $course):
                            echo '<option value="' . $course['id_course'] . '">' . $course['name_course'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> E-mail автора</strong><span class="req">*</span><br><em class="hint">Внимание! Указанный Вами e-mail будет использован Оргкомитетом Конференции для обратной связи (Attention! Your e-mail will be used by the Organizing Commitee of the Conference for feedback)</em></div>
                    <input type="email" name="emailAuthor1" id="emailAuthor1" placeholder="example@exam.ru" />

                    <div class="titleBlock"><strong> Телефон автора (Telephone №)</strong><span class="req">*</span></div>
                    <input type="text" name="telAuthor1" id="telAuthor1" class="tel" placeholder="+375-(XX)-XXX-XX-XX" />

                    <div class="titleBlock"><strong> У вас есть соавтор?</strong></div>
                    <div class="marg"></div>
                    <div class="left">
                        <label><input type="radio" name="haveSecondAuthor" onclick="coauthor(this, 'coauthor');" value="1" id="haveSecondAuthorY">Да</label>
                        <label><input type="radio" name="haveSecondAuthor" onclick="coauthor(this, 'coauthor');" value="0" id="haveSecondAuthorN" value="0" checked style="margin-left: 20px;">Нет</label>
                    </div>


                    <div id="coauthor">
                        <h2 class="fs-subtitle">Информация о соавторе</h2>
                        <div class="titleBlock"><strong> ФИО соавтора </strong><span class="req">*</span></div>
                        <input type="text" name="fio2" id="fio2" placeholder="Иванов Степан Викторович"/>

                        <div class="titleBlock"><strong>Полное название учебного заведения/организации соавтора </strong><br><br></div>
                        
                        <div class="left">
                            <label><input type="radio" name="universityName2" onclick="handelRB(this, 'fullNameUniver2');" value="Белорусский государственный медицинский университет" checked> Белорусский государственный медицинский университет</label><br>
                            <label><input type="radio" name="universityName2" onclick="handelRB(this, 'fullNameUniver2');" value="0" id="rbUniver2"> Другой</label>
                            <input type="text" name="nameOtherUniversity" id="fullNameUniver2">
                        </div>

                        <div class="titleBlock"><strong> Сокращенное название учебного заведения/организации соавтора </strong></div>
                        <input type="text" name="abbreviatureUniver2" id="abbreviatureUniver2" placeholder="БГМУ">

                        
                        <div class="titleBlock"><strong> Статус соавтора </strong></div>
                        <select id="statusAuthor2" name="statusAuthor2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($statuses as $status):
                                echo '<option value="' . $status['id_status'] . '">' . $status['name_status'] . '</option>';
                            endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong> Факультет соавтора </strong><br><em class="hint">Если Вы не являетесь студентом, выберите вариант ответа "Нет"</em></div>
                        
                        <div class="marg"></div>
                        <div class="left">
                            <?php foreach ($faculties as $faculty):?>
                                <label><input type="radio" name="facultyName2" onclick="handelRB(this, 'otherFac2');" value="<?php echo $faculty['id_faculti']; ?>"><?php echo $faculty['name_faculti']; ?></label><br>
                            <?php endforeach; ?>
                            <label><input type="radio" name="facultyName2" onclick="handelRB(this, 'otherFac2');" value="0" id="rbFac2">Другое/Other</label>
                            <input type="text" name="nameOtherFaculty" id="otherFac2" placeholder="Профориентации">
                        </div>

                        <div class="titleBlock"><strong> Курс соавтора</strong></div>
                        <select id="courseAuthor2" name="courseAuthor2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($courses as $course):
                                echo '<option value="' . $course['id_course'] . '">' . $course['name_course'] . '</option>';
                            endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong> E-mail соавтора</strong></div>
                        <input type="email" name="emailAuthor2" id="emailAuthor2" placeholder="example@exam.ru" />

                        <div class="titleBlock"><strong> Телефон соавтора </strong></div>
                        <input type="text" name="telAuthor2" id="telAuthor2" class="tel" placeholder="+375-(XX)-XXX-XX-XX" />

                    </div>

                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="button" name="next" class="next action-button step2" value="Далее"/>
                
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Руководитель</h2>
                <h3 class="fs-subtitle">Информация о руководителе</h3>
                <div class="contentF">
                    <div class="titleBlock"><strong> ФИО 1-го научного руководителя (Surname Name of the 1st Supervisor)</strong><span class="req">*</span></div>
                    <input type="text" name="fioSupervisor1" id="fioSupervisor1" placeholder="Рахман Борис Мойсеевич"/>

                    <div class="titleBlock"><strong> Учёная степень 1-го научного руководителя (Scientific degree of the 1st Supervisor)</strong></div>
                    <select id="scientificDegree1" name="scientificDegree1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($scientificDegree as $sD):
                            echo '<option value="' . $sD['id_scientificDegree'] . '">' . $sD['name_scientificDegree'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Учёное звание 1-го научного руководителя (Academic rank of the 1st Supervisor)</strong></div>
                    <select id="academicRanks1" name="academicRanks1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($academicRanks as $aR):
                            echo '<option value="' . $aR['id_academicRanks'] . '">' . $aR['name_academicRanks'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Должность 1-го научного руководителя (Position of the 1st Supervisor)</strong></div>
                    <select id="positionSupervisor1" name="positionSupervisor1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($positionSupervisor as $pS):
                            echo '<option value="' . $pS['id_positionSupervisor'] . '">' . $pS['name_positionSupervisor'] . '</option>';
                        endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong>Полное название учебного заведения/организации 1-го научного руководителя (Full name of the 1st
                    Supervisor institution)</strong><span class="req">*</span></div>
                    
                    <div class="marg"></div>
                    <div class="left">
                        <label><input type="radio" name="universityNameSupervisor1" onclick="handelRB(this, 'nameOtherUniversitySupervisor1');" value="Белорусский государственный медицинский университет" checked> Белорусский государственный медицинский университет</label><br>
                        <label><input type="radio" name="universityNameSupervisor1" onclick="handelRB(this, 'nameOtherUniversitySupervisor1');" value="0" id="rbOtherUniversitySupervisor1"> Другой</label>
                        <input type="text" name="nameOtherUniversitySupervisor1" id="nameOtherUniversitySupervisor1">
                    </div>

                    <div class="titleBlock"><strong> Название кафедры/структурного подразделения 1-го научного руководителя (Department)</strong></div>
                    <input type="text" name="departmentSupervisor1" id="departmentSupervisor1" placeholder="Название кафедры">

                    <div class="titleBlock"><strong> Телефон 1-го научного руководителя (Telephone № of the 1st Supervisor)</strong></div>
                    <input type="text" name="telSupervisor1" id="telSupervisor1" class="tel" placeholder="+375-(XX)-XXX-XX-XX" />
                
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="button" name="" class="next action-button step3 submit" value="Отправить"/>
            </fieldset>
<!--             <input type="submit" class="action-button" value="Submit"> -->
        </form>
    </div>
</div>
<script type="text/javascript">
    function handelRB(myRadio, idElem) {
        var el=document.getElementById(idElem);
        if(myRadio.value=="0"){
            el.disabled = false;
        }else{
            el.value="";
            el.disabled = true;
        }
    }

    function coauthor(objRadio, idElem) {
        var el=document.getElementById(idElem);
        if(objRadio.value=="1"){
            el.style.display = 'block';
        }else if(objRadio.value=="0"){
            el.style.display = 'none';
        }
    }
</script>
<?php include ROOT . '/views/layouts/footer.php'; ?>