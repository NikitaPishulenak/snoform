
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var statusVal='';
var stepVerify=true; //Фрлаг есть ли ошибка валидации. Не пускать на другую страницу

$(".next").click(function(){
    console.log('nextClick');
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

$(".submit").click(function(){
    return false;
})

function stepsValidate(step){
  
    switch (step){
        case "step1":  
        if(($("input#titleOfPaper").val().trim()=='') || ($("input#titleOfPaper").val().trim().length<3)){
            showError('input#titleOfPaper', 'Введите корректные данные!');
        }
        if($("select#sectionSel").val()==0){
            showError('select#sectionSel', 'Выберите секцию из списка!');
        }
        if($("select#formParticipationSel").val()==0){
            showError('select#formParticipationSel', 'Выберите из списка!');
        }
        if($("select#contentsReportSel").val()==0){
            showError('select#contentsReportSel', 'Выберите из списка!');
        }
        if($("input#uploadFilePDF").val()==''){
            showError('input#uploadFilePDF', 'Прикрепить .pdf файл!');
        }
        if($("input#uploadFileDOC").val()==''){
            showError('input#uploadFileDOC', 'Прикрепить .doc файл!');
        }

        //return true;
        return stepVerify;
        break;
        
        case "step2":  
            return true;
            break;
        
        case "step3":  
            return true;
            break;

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
        error += "Внимание! Ваш файл превышает допустимый размер 1 Mb! Выберите другой файл!";
    }
    // Если есть ошибки
    if (error != '') {
        // очищаем значение input file
        $(file).val("");
        alert(error);
    }
    return false;
}

