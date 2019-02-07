<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="post" action="saveForm" enctype="multipart/form-data">
            <ul id="progressbar">
                    <li class="active">Доклад</li>
                    <li>Участник</li>
                    <li>Руководитель</li>
                </ul>
            <fieldset>
                
                <h2 class="fs-title">Доклад</h2>
                <h3 class="fs-subtitle">Информация о докладе</h3>
                <div class="contentF" >
                    <input type="hidden" name="idReport" value="<?php if (isset($reportData['id_report'])) echo $reportData['id_report']; ?>">
                    <div class="titleBlock"><strong> Название работы (Title of Paper)</strong><span class="req">*</span></div>
                    <input type="text" maxlength="140" name="titleOfPaper" id="titleOfPaper" placeholder="Лечение хронического холецистита" value="<?php if (isset($reportData['title_report'])) echo $reportData['title_report']; ?>"/>
                   

                    <div class="titleBlock"><strong> Форма участия (The form of participation)</strong><span class="req">*</span></div>
                    <select id="formParticipationSel" name="formParticipationSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($formParticipation as $formPartItem): ?>
                            <option value="<?php echo $formPartItem['id_formParticipation']; ?>" 
                                <?php if ($formPartItem['id_formParticipation'] == $reportData['id_formParticipation']) echo ' selected="selected"'; ?>>
                                <?php echo $formPartItem['name_formParticipation']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong>Содержание доклада(Contents of the report)</strong><span class="req">*</span></div>
                    <select id="contentsReportSel" name="contentsReportSel">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($contentsReport as $contRepItem): ?>
                            <option value="<?php echo $contRepItem['id_contentsReport']; ?>" 
                                <?php if ($contRepItem['id_contentsReport'] == $reportData['id_contentReport']) echo ' selected="selected"'; ?>>
                                <?php echo $contRepItem['name_contentsReport']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                
                <input type="button" name="next" class="next action-button step1" value="Далее"/>
                
                
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Автор</h2>
                <h3 class="fs-subtitle">Информация о авторе</h3>
                <div class="contentF" >
                    <div class="titleBlock"><strong> ФИО автора (Author`s Surname Name)</strong><span class="req">*</span></div>
                    <input type="text" maxlength="140" name="fio1" id="fio1" value="<?php if (isset($reportData['fio1'])) echo $reportData['fio1']; ?>"/>

                    <div class="titleBlock"><strong> Полное название учебного заведения/организации автора (Full name of the institution which the Author
                represent)</strong><span class="req">*</span></div>
                    <input type="text" maxlength="140" name="universityName1" id="universityName1" value="<?php if (isset($reportData['universityName1'])) echo $reportData['universityName1']; ?>"/>

                    <div class="titleBlock"><strong> Сокращенное название учебного заведения/организации автора (Abbreviation of the institution, which the
                Author represent)</strong><span class="req">*</span></div>
                    <input type="text" maxlength="140" name="abbreviatureUniver1" id="abbreviatureUniver1" placeholder="Аббревиатура" value="<?php if (isset($reportData['abbreviatureUniver1'])) echo $reportData['abbreviatureUniver1']; ?>">

                    
                    <div class="titleBlock"><strong> Статус автора (Status of the author)</strong><span class="req">*</span><br><em class="hint"> На момент участия в Конференции!</em></div>
                    <select id="statusAuthor1" name="statusAuthor1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?php echo $status['id_status']; ?>" 
                                <?php if ($status['id_status'] == $reportData['statusAuthor1']) echo ' selected="selected"'; ?> >
                                <?php echo $status['name_status']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Факультет автора (faculty of the Author)</strong><span class="req">*</span></div>
                    <input type="text" maxlength="140" name="nameFacultyE1" id="nameFacultyE1" value="<?php if (isset($reportData['facultyName1'])) echo $reportData['facultyName1']; ?>">
                    
                    <div class="titleBlock"><strong> Курс автора (Course)</strong><span class="req">*</span></div>
                    <select id="courseAuthor1" name="courseAuthor1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['id_course']; ?>" 
                                <?php if ($course['id_course'] == $reportData['courseAuthor1']) echo ' selected="selected"'; ?> >
                                <?php echo $course['name_course']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> E-mail автора</strong><span class="req">*</span><br><em class="hint">Внимание! Указанный Вами e-mail будет использован Оргкомитетом Конференции для обратной связи (Attention! Your e-mail will be used by the Organizing Commitee of the Conference for feedback)</em></div>
                    <input type="email" maxlength="140" name="emailAuthor1" value="<?php if (isset($reportData['emailAuthor1'])) echo $reportData['emailAuthor1']; ?>" id="emailAuthor1" placeholder="example@exam.ru"  />

                    <div class="titleBlock"><strong> Телефон автора (Telephone №)</strong><span class="req">*</span></div>
                    
<!--                     <select id="countryA1" name="countryA1" onchange="show(this)">       
                        <option value=".by" selected>+375</option>
                        <option value=".ru">+7</option>
                    <input type="text" id="phoneNumber" /> -->
                    <input type="text" name="telAuthor1" id="telAuthor1" class="tel" placeholder="+375-(XX)-XXX-XX-XX" value="<?php if (isset($reportData['telAuthor1'])) echo $reportData['telAuthor1']; ?>" />


                    <div id="coauthorE">
                        <h2 class="fs-subtitle">Информация о соавторе</h2>
                        <div class="titleBlock"><strong> ФИО соавтора </strong><span class="req">*</span></div>
                        <input type="text" maxlength="140" name="fio2" id="fio2" value="<?php if (isset($reportData['fio2'])) echo $reportData['fio2']; ?>" placeholder="Иванов Степан Викторович"/>

                        <div class="titleBlock"><strong>Полное название учебного заведения/организации соавтора </strong><br><br></div>
                        <input type="text" maxlength="140" name="universityName2" id="universityName2" value="<?php if (isset($reportData['universityName2'])) echo $reportData['universityName2']; ?>"/>

                        <div class="titleBlock"><strong> Сокращенное название учебного заведения/организации соавтора </strong></div>
                        <input type="text" maxlength="140" name="abbreviatureUniver2" id="abbreviatureUniver2" placeholder="БГМУ" value="<?php if (isset($reportData['abbreviatureUniver2'])) echo $reportData['abbreviatureUniver2']; ?>">

                        
                        <div class="titleBlock"><strong> Статус соавтора </strong></div>
                        <select id="statusAuthor2" name="statusAuthor2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($statuses as $status): ?>
                                <option value="<?php echo $status['id_status']; ?>" 
                                    <?php if ($status['id_status'] == $reportData['statusAuthor2']) echo ' selected="selected"'; ?> >
                                    <?php echo $status['name_status']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong> Факультет соавтора </strong></div>
                        
                        <input type="text" maxlength="140" name="nameFacultyE2" id="nameFacultyE2" value="<?php if (isset($reportData['facultyName2'])) echo $reportData['facultyName2']; ?>">

                        <div class="titleBlock"><strong> Курс соавтора</strong></div>
                        <select id="courseAuthor2" name="courseAuthor2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($courses as $course): ?>
                                <option value="<?php echo $course['id_course']; ?>" 
                                    <?php if ($course['id_course'] == $reportData['courseAuthor2']) echo ' selected="selected"'; ?> >
                                    <?php echo $course['name_course']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong> E-mail соавтора</strong></div>
                        <input type="email"  maxlength="140" name="emailAuthor2" id="emailAuthor2" value="<?php if (isset($reportData['emailAuthor2'])) echo $reportData['emailAuthor2']; ?>" placeholder="example@exam.ru" />

                        <div class="titleBlock"><strong> Телефон соавтора </strong></div>
                        <input type="text" name="telAuthor2" id="telAuthor2" value="<?php if (isset($reportData['telAuthor2'])) echo $reportData['telAuthor2']; ?>" class="tel" placeholder="+375-(XX)-XXX-XX-XX" />

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
                    <input type="text" maxlength="140" name="fioSupervisor1" id="fioSupervisor1" placeholder="Рахман Борис Мойсеевич" value="<?php if (isset($reportData['fioSupervisor1'])) echo $reportData['fioSupervisor1']; ?>"/>

                    <div class="titleBlock"><strong> Учёная степень 1-го научного руководителя (Scientific degree of the 1st Supervisor)</strong></div>
                    <select id="scientificDegree1" name="scientificDegree1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($scientificDegree as $sD): ?>
                            <option value="<?php echo $sD['id_scientificDegree']; ?>" 
                                <?php if ($sD['id_scientificDegree'] == $reportData['scientificDegree1']) echo ' selected="selected"'; ?> >
                                <?php echo $sD['name_scientificDegree']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Учёное звание 1-го научного руководителя (Academic rank of the 1st Supervisor)</strong></div>
                    <select id="academicRanks1" name="academicRanks1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($academicRanks as $aR): ?>
                            <option value="<?php echo $aR['id_academicRanks']; ?>" 
                                <?php if ($aR['id_academicRanks'] == $reportData['academicRanks1']) echo ' selected="selected"'; ?> >
                                <?php echo $aR['name_academicRanks']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong> Должность 1-го научного руководителя (Position of the 1st Supervisor)</strong></div>
                    <select id="positionSupervisor1" name="positionSupervisor1">
                        <option value="0">Не выбрано</option>
                        <?php foreach ($positionSupervisor as $pS): ?>
                            <option value="<?php echo $pS['id_positionSupervisor']; ?>" 
                                <?php if ($pS['id_positionSupervisor'] == $reportData['positionSupervisor1']) echo ' selected="selected"'; ?> >
                                <?php echo $pS['name_positionSupervisor']; ?>
                            </option>
                       <?php  endforeach; ?>
                    </select>

                    <div class="titleBlock"><strong>Полное название учебного заведения/организации 1-го научного руководителя (Full name of the 1st
                    Supervisor institution)</strong><span class="req">*</span></div>
                    <input type="text" value="<?php if (isset($reportData['universityNameSupervisor1'])) echo $reportData['universityNameSupervisor1']; ?>" maxlength="140" name="universityNameSupervisorE1" id="universityNameSupervisorE1" placeholder="Название ВУЗа">
                    

                    <div class="titleBlock"><strong> Название кафедры/структурного подразделения 1-го научного руководителя (Department)</strong></div>
                    <input type="text" value="<?php if (isset($reportData['departmentSupervisor1'])) echo $reportData['departmentSupervisor1']; ?>" maxlength="140" name="departmentSupervisor1" id="departmentSupervisor1" placeholder="Название кафедры">

                    <div class="titleBlock"><strong> Телефон 1-го научного руководителя (Telephone № of the 1st Supervisor)</strong></div>
                    <input type="text" value="<?php if (isset($reportData['telSupervisor1'])) echo $reportData['telSupervisor1']; ?>" name="telSupervisor1" id="telSupervisor1" class="tel" placeholder="+375-(XX)-XXX-XX-XX" />
                    
                    <div id="secondSupervisorE">
                        <h2 class="fs-subtitle">Информация о втором руководителе</h2>
                        <div class="titleBlock"><strong> ФИО 2-го научного руководителя (Surname Name of the 2st Supervisor)</strong><span class="req">*</span></div>
                        <input type="text" value="<?php if (isset($reportData['fioSupervisor2'])) echo $reportData['fioSupervisor2']; ?>" maxlength="140" name="fioSupervisor2" id="fioSupervisor2" placeholder="Рахман Борис Мойсеевич"/>

                        <div class="titleBlock"><strong> Учёная степень 2-го научного руководителя (Scientific degree of the 2st Supervisor)</strong></div>
                        <select id="scientificDegree2" name="scientificDegree2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($scientificDegree as $sD): ?>
                                <option value="<?php echo $sD['id_scientificDegree']; ?>" 
                                    <?php if ($sD['id_scientificDegree'] == $reportData['scientificDegree2']) echo ' selected="selected"'; ?> >
                                    <?php echo $sD['name_scientificDegree']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong> Учёное звание 2-го научного руководителя (Academic rank of the 2st Supervisor)</strong></div>
                        <select id="academicRanks2" name="academicRanks2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($academicRanks as $aR): ?>
                                <option value="<?php echo $aR['id_academicRanks']; ?>" 
                                    <?php if ($aR['id_academicRanks'] == $reportData['academicRanks2']) echo ' selected="selected"'; ?> >
                                    <?php echo $aR['name_academicRanks']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong> Должность 2-го научного руководителя (Position of the 2st Supervisor)</strong></div>
                        <select id="positionSupervisor2" name="positionSupervisor2">
                            <option value="0">Не выбрано</option>
                            <?php foreach ($positionSupervisor as $pS): ?>
                                <option value="<?php echo $pS['id_positionSupervisor']; ?>" 
                                    <?php if ($pS['id_positionSupervisor'] == $reportData['positionSupervisor2']) echo ' selected="selected"'; ?> >
                                    <?php echo $pS['name_positionSupervisor']; ?>
                                </option>
                           <?php  endforeach; ?>
                        </select>

                        <div class="titleBlock"><strong>Полное название учебного заведения/организации 2-го научного руководителя (Full name of the 2st Supervisor institution)</strong><span class="req">*</span></div>
                        
                        <input type="text" value="<?php if (isset($reportData['universityNameSupervisor2'])) echo $reportData['universityNameSupervisor2']; ?>" maxlength="140" name="universityNameSupervisorE2" id="universityNameSupervisorE2" placeholder="Название ВУЗа">

                        <div class="titleBlock"><strong> Название кафедры/структурного подразделения 2-го научного руководителя (Department)</strong></div>
                        <input type="text" value="<?php if (isset($reportData['departmentSupervisor2'])) echo $reportData['departmentSupervisor2']; ?>" maxlength="140" name="departmentSupervisor2" id="departmentSupervisor2" placeholder="Название кафедры">

                        <div class="titleBlock"><strong> Телефон 2-го научного руководителя (Telephone № of the 2st Supervisor)</strong></div>
                        <input type="text" value="<?php if (isset($reportData['telSupervisor2'])) echo $reportData['telSupervisor2']; ?>" name="telSupervisor2" id="telSupervisor2" class="tel" placeholder="+375-(XX)-XXX-XX-XX" />

                    </div>

                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Назад"/>
                <input type="button" name="" class="next action-button step3 save" value="Сохранить"/>
            </fieldset>
        </form>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>