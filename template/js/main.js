
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var statusVal='';
var stepVerify=true; //Фрлаг есть ли ошибка валидации. Не пускать на другую страницу
const rootF='/snoform';

$(".next").click(function(){
    hideError();
    
    var stepTitle='';
    if ($(this).hasClass('step1')){
        stepTitle="step1";
    }
    else if($(this).hasClass('step2')){
        stepTitle="step2";
    }
    else if($(this).hasClass('step3')){
        stepTitle="step3";
    }

    statusVal=stepsValidate(stepTitle);

   
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    
    if(statusVal){
        // if ($(this).hasClass('submit')){
        //     console.log('sdcsdcsdcsdcsdcsdcs');
        //     document.location.href = rootF+"/sendForm";
        // } else if ($(this).hasClass('save')){
        //     console.log('swve');
        //     document.location.href = rootF+"/saveForm";
        // }

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
          });
                next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });

    }
    if(animating) return false;
    animating = true;
    $('html, body').animate({scrollTop: 400},500);
});

$("input.reg-button").click(function(){
    hideError();
    var re = /\S+@\S+\.\S+/;
    if(!re.test($("input#emailReg").val().trim())){
        showError('input#emailReg', 'Заполните поле email!');
    }
    if($("input#password1Reg").val().trim().length<6){
        showError('input#password1Reg', 'Пароль должен быть не менее 6 символов!');
    }
    if($("input#password2Reg").val().trim().length<6){
        showError('input#password2Reg', 'Пароль должен быть не менее 6 символов!');
    }
    if($("input#password2Reg").val().trim()!=$("input#password1Reg").val().trim()){
        showError('input#password2Reg', 'Введенные пароли не совпадают!');
    }
    return stepVerify;
});

$("input.login-button").click(function(){
    hideError();
    var re = /\S+@\S+\.\S+/;
    if(!re.test($("input#email").val().trim())){
        showError('input#email', 'Заполните поле email!');
    }
    if($("input#password").val().trim().length<6){
        showError('input#password', 'Пароль должен быть не менее 6 символов!');
    }
    return stepVerify;
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

// $("div#downloadCSV").click(function(){
//     window.URL = window.URL || window.webkiURL;
//     var blob = new Blob(["\ufeff", csv]);
//     var blobURL = window.URL.createObjectURL(blob);
//     $("<a></a>").attr("href", blobURL).attr("download", nameGroup+"("+translite(nameSubject)+")_"+translite(namePL)+".csv").text("Экспортировать в Excel").appendTo('.export');   
// });


function stepsValidate(step){
  
    switch (step){
        case "step1":  
            if($("select#sectionSel").val()==0){
                showError('select#sectionSel', 'Выберите секцию из списка!');
            }
            if($("input#uploadFilePDF").val()==''){
                showError('input#uploadFilePDF', 'Прикрепить .pdf файл!');
            }
            if($("input#uploadFileDOC").val()==''){
                showError('input#uploadFileDOC', 'Прикрепить .doc файл!');
            }
            step1Verify();

            return stepVerify;
        break;
        
        case "step2":  
            step2Verify();
            return stepVerify;
        break;
        
        case "step3":  
            step3Verify();
         // return stepVerify;
        break;

    }
}


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

function showError(obj, text){
    $(obj).after( "<div class='error'><em>"+text+"</em></div>");
    $(obj).addClass('errorBlock');
    stepVerify=false;
}

function hideError(){
    $("div.error").remove();
    $("input, select").removeClass('errorBlock');
    stepVerify=true;
}

function CheckFile(file, typeFile) {
    var good_ext = false;// Флаг для валидации расширения файла
    var good_size = false;// Флаг для валидации размера файла
    var maxsize = 1048576;
    var iSize = 0;// Для хранения размера загружаемого файла
    var error = '';// Для хранения ошибки

    iSize = $(file)[0].files[0].size;

    if (maxsize > iSize) {
        good_size = true;
    }

    switch(typeFile){
        case "pdf":
            if ($(file)[0].files[0].type == "application/pdf") {
                good_ext = true;
            }
            if (!good_ext) {            // Если расширение не совпадает с фильтром
                error += "Внимание! Разрешено прикреплять только .pdf файлы! Повторите операцию!";
            }
            break;

        case "doc":
            if (($(file)[0].files[0].type == "application/msword") || ($(file)[0].files[0].type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
                good_ext = true;
            }
            if (!good_ext) {            // Если расширение не совпадает с фильтром
                error += "Внимание! Разрешено прикреплять только .doc файлы! Повторите операцию!";
            }
            break;
    }

    
    // Если у нас уже есть ошибка - ставим переход на новую строку
    if (error != '') {
        error += "\r\n";
    }

    if (!good_size) {// Если не прошли валидацию по размеру файла
        error += "Внимание! Ваш файл превышает допустимый размер 1 Mb! Выберите другой файл или воспользуйтесь онлайн-сервисом для сжатия файла!";
    }
    // Если есть ошибки
    if (error != '') {
        // очищаем значение input file
        $(file).val("");
        alert(error);
    }
    return false;
}

function step1Verify(){
    if(($("input#titleOfPaper").val().trim()=='') || ($("input#titleOfPaper").val().trim().length<3)){
        showError('input#titleOfPaper', 'Введите корректные данные!');
    }
    if($("select#formParticipationSel").val()==0){
        showError('select#formParticipationSel', 'Выберите из списка!');
    }
    if($("select#contentsReportSel").val()==0){
        showError('select#contentsReportSel', 'Выберите из списка!');
    }
}

function step2Verify(){
    if($("input#fio1").val().trim().length<3){
        showError('input#fio1', 'Заполните поле!');
    }
    if(($("input[name='universityName1']:checked").val()=="0") && ($("input#fullNameUniver1").val().trim().length<3)){
        showError('input#fullNameUniver1', 'Заполните поле!');
    }
    if($("input#abbreviatureUniver1").val().trim().length<3){
        showError('input#abbreviatureUniver1', 'Заполните поле!');
    }
    if($("select#statusAuthor1").val()==0){
        showError('select#statusAuthor1', 'Выберите из списка!');
    }
    if(($("input[name='facultyName1']:checked").val()=="0") && ($("input#otherFac1").val().trim().length<3)){
        showError('input#otherFac1', 'Заполните поле!');
    }
    if($("select#courseAuthor1").val()==0){
        showError('select#courseAuthor1', 'Выберите из списка!');
    }
    var re = /\S+@\S+\.\S+/;
    if(!re.test($("input#emailAuthor1").val().trim())){
        showError('input#emailAuthor1', 'Заполните поле!');
    }
    if($("input#telAuthor1").val().trim().length==0){
        showError('input#telAuthor1', 'Заполните поле!');
    }
}

function step3Verify(){
    if($("input#fioSupervisor1").val().trim().length<3){
        showError('input#fioSupervisor1', 'Заполните поле!');
    }
    if($("select#scientificDegree1").val()==0){
        showError('select#scientificDegree1', 'Выберите из списка!');
    }
    if($("select#academicRanks1").val()==0){
        showError('select#academicRanks1', 'Выберите из списка!');
    }
    if($("select#positionSupervisor1").val()==0){
        showError('select#positionSupervisor1', 'Выберите из списка!');
    }
    if(($("input[name='universityNameSupervisor1']:checked").val()=="0") && ($("input#nameOtherUniversitySupervisor1").val().trim().length<3)){
        showError('input#nameOtherUniversitySupervisor1', 'Заполните поле!');
    }
    if($("input#departmentSupervisor1").val().trim().length<3){
        showError('input#departmentSupervisor1', 'Заполните поле!');
    }
    if(stepVerify){
        $( "form:first" ).submit();
    }
}

$(document).ready(function(){
    $("#fullNameUniver1, #fullNameUniver2, #nameOtherUniversitySupervisor1, #nameOtherUniversitySupervisor2").prop('disabled', true);
    $("#otherFac1, #otherFac2").prop('disabled', true);
    $(".tel").mask('+375-(99)-999-99-99');
    $("#coauthor, #secondSupervisor").hide();
    $("input[name='universityName1']").change(function(){
        ($("input[name='universityName1']:checked").val()!="0") ? $("#abbreviatureUniver1").val("БГМУ") : $("#abbreviatureUniver1").val("");
    });

    $('div.sectionItem').click(function () {
        if ($(this).hasClass("selected")) {
            $(this).removeClass("selected");
        }
        else {
            $(this).addClass("selected");
        }
    });

    $("button#selAll").click(function(){
        $("div.sectionItem").each(function(){
            $(this).addClass("selected");
        });
    });

    $("button#cancelAll").click(function(){
        $("div.sectionItem").each(function(){
            $(this).removeClass("selected");
        });
    });

    $("button.exportSel").click(function(){
        var masSel=[];
        $("div.selected").each(function(){
            $(this).removeClass("selected");
            masSel.push($(this).attr('data-idS'));
        });

        if(masSel.length>0){
            $.ajax({
                type: 'post',
                url: 'export.php',
                data: {
                    'arrIDsS': masSel
                },
                success: function (response) {
                    console.log(response);
                    $('div.basta').remove();
                },
                beforeSend:function () {
                    $("body").append('<div class="basta"><img src="/snoform/template/images/loading1.gif" class="loading_img"></div>');                },
                error: function () {
                    $('div.basta').remove();
                    alert("Что-то пошло не так.");
                }
            }); 
        }else{
            alert("Сначала выбери секцию.");
        }

        
    });


    function whereIsMyMoney() {
        $("body").append('<div class="basta">Вы используете бесплатную версию продукта.<br> Для снятия ограничений обратитесь к разработчику.<br> Для продолжения работы нажмите F5</div>');
    }

    // var timerId = setTimeout(function whereIsMyMoney() {
    //   $("body").append('<div class="basta">Вы используете бесплатную версию продукта.<br> Для снятия ограничений обратитесь к разработчику.<br> Для продолжения работы нажмите F5</div>');
    //   timerId = setTimeout(whereIsMyMoney, 60000);
    // }, 60000);
        
});

