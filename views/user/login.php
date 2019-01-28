<?php 
include ROOT . '/views/layouts/header.php'; 
?>

<section>
   <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-6 col-lg-4  col-xs-offset-1 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">

                <div class="signup-form">
                    <form action="#" method="post" id="authform">
                        <fieldset>
                            <h2 class="fs-title">Вход на сайт</h2>
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li class="error"> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="contentF">
                                <input type="email" name="email" id="email" placeholder="E-mail" value=""/>
                                <input type="password" name="password" id="password" placeholder="Пароль" value=""/>
                                <input type="submit" name="submit" class="btn login-button" value="Вход" /><br>
                                <span>У меня еще нет учетной записи.&nbsp; <a href="<?php echo rootFolder; ?>/register">Зарегистрироваться.</a></span>
                                
                            </div>
                        </fieldset>
                    </form>
                </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>