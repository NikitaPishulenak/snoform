<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-sm-8 col-md-6 col-lg-4  col-xs-offset-1 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">

                    <div class="signup-form">
                        <form action="#" method="post" id="regform">
                            <fieldset>
                                <div class="contentF">
                                    <h2 class="fs-title">Регистрация на сайте</h2>
                                     <?php if ($result): ?>
                                        <p>Вы успешно зарегистрированы!</p>
                                        <a href="<?php echo rootFolder; ?>/login">Авторизоваться</a>
                                    <?php else: ?>
                                    <?php if (isset($errors) && is_array($errors)): ?>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li class="error"> - <?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul> 
                                    <?php endif; ?>
                                    <input type="email" name="emailReg" id="emailReg" placeholder="E-mail" value="<?php echo $email; ?>"/>
                                    <input type="password" name="password1Reg" id="password1Reg" placeholder="Пароль" value="<?php echo $password1; ?>"/>
                                    <input type="password" name="password2Reg" id="password2Reg" placeholder="Подтвердите пароль" value="<?php echo $password1; ?>"/>
                                    <input type="submit" name="submit" class="btn reg-button" value="Регистрация" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>