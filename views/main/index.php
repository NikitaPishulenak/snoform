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

                    <div class="titleBlock" title="Выберите научное направление Конференции, в котором хотите принять участие
                        (Select Conference themes, which you would like participate)"><strong> Секция (Section)</strong><span class="req">*</span></div>
                    <select>
                    <?php foreach ($section as $sectionItem): print_r($sectionItem);?>
                        <!-- <option value="<php echo  $sectionItem[id_section]; ?>"> <php echo  $sectionItem[name_section]; ?> </option> -->
                    <?php endforeach; ?>
<!--                 echo '<option value="' . $row['id_section'] . '">' . $row['name_section'] . '</option>';
            }$section -->
                    </select>

            <?php
            // $query = "SELECT * FROM sections";
            // $result = mysqli_query($dbc, $query)
            // or die ("Не удалось выполнить запрос");

            // echo '<select name="section" required >';
            // echo '<option value=""> не выбрано/not chosen</option>';
            // while ($row = mysqli_fetch_array($result)) {
            //     echo '<option value="' . $row['id_section'] . '">' . $row['name_section'] . '</option>';
            // }
            // echo '</select>';
            ?>
                    <input type="text" name="lname" placeholder="Last Name"/>
                    <input type="text" name="phone" placeholder="Phone"/>
                </div>
                
                <input type="button" name="next" class="next action-button step1" value="Next"/>
                
                
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