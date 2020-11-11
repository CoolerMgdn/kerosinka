//credits https://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = $(this).val().length * 2;
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		$(this).val($(this).val());
    	}
	});
};

$( () => {
  
	//Уменьшение шапки при скролле
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 100 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
		windowTop > 100 ? $('ul').css('top','70px') : $('ul').css('top','90px');
	});
	
	//Клик на лого - скролл до верха
	$('.img').on('click', () => {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Плавная прокрутка
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 100
		},500);
		e.preventDefault();
	});
	
	//Toggle Menu
	$('#menu-toggle').on('click', () => {
		$('#menu-toggle').toggleClass('closeMenu');
		$('ul').toggleClass('showMenu');
		
		$('li').on('click', () => {
			$('ul').removeClass('showMenu');
			$('#menu-toggle').removeClass('closeMenu');
		});
	});
    
    //Показать(скрыть) пароль
    $('body').on('click', '.password-control', function(){
        if ($('#password-input').attr('type') == 'password'){
            $(this).addClass('view');
            $('#password-input').attr('type', 'text');
        } else {
            $(this).removeClass('view');
            $('#password-input').attr('type', 'password');
        }
        return false;
    });
});

jQuery(document).ready(function($){
	var $timeline_block = $('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
});

//Ограничение чекбоксов
document.querySelectorAll(".checkbox2 input[type='checkbox']").forEach(el => {
    el.addEventListener("click", function(e){
        if (this.checked) {
            var count = this.closest(".checkbox2").querySelectorAll("input[type='checkbox']:checked").length;
            if (count > 2)
                this.checked = false;
        }
    });
});
document.querySelectorAll(".checkbox3 input[type='checkbox']").forEach(el => {
    el.addEventListener("click", function(e){
        if (this.checked) {
            var count = this.closest(".checkbox3").querySelectorAll("input[type='checkbox']:checked").length;
            if (count > 3)
                this.checked = false;
        }
    });
});
document.querySelectorAll(".checkbox4 input[type='checkbox']").forEach(el => {
    el.addEventListener("click", function(e){
        if (this.checked) {
            var count = this.closest(".checkbox4").querySelectorAll("input[type='checkbox']:checked").length;
            if (count > 4)
                this.checked = false;
        }
    });
});
document.querySelectorAll(".checkbox5 input[type='checkbox']").forEach(el => {
    el.addEventListener("click", function(e){
        if (this.checked) {
            var count = this.closest(".checkbox5").querySelectorAll("input[type='checkbox']:checked").length;
            if (count > 5)
                this.checked = false;
        }
    });
});
document.querySelectorAll(".checkbox7 input[type='checkbox']").forEach(el => {
    el.addEventListener("click", function(e){
        if (this.checked) {
            var count = this.closest(".checkbox5").querySelectorAll("input[type='checkbox']:checked").length;
            if (count > 7)
                this.checked = false;
        }
    });
});

//Проверка Email и пароля на валидность
$(document).ready(function(){
        "use strict";
        //================ Проверка email ==================

        //регулярное выражение для проверки email
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');
        
        mail.blur(function(){
            if(mail.val() != ''){

                // Проверяем, если email соответствует регулярному выражению
                if(mail.val().search(pattern) == 0){
                    // Убираем сообщение об ошибке
                    $('#valid_email_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }else{
                    //Выводим сообщение об ошибке
                    $('#valid_email_message').text('Неправильный Email');

                    // Дезактивируем кнопку отправки
                    //$('input[type=submit]').attr('disabled', true);
                }
            }else{
                $('#valid_email_message').text('Введите Ваш email');
            }
        });

        //================ Прооверка паролей ==================
        var password = $('input[name=password]');
        var confirm_password = $('input[name=confirm_password]');
        
        password.blur(function(){
            if(password.val() != ''){

                //Если длина введённого пароля меньше шести символов, то выводим сообщение об ошибке
                if(password.val().length < 6){
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                    //проверяем, если пароли не совпадают, то выводим сообщение об ошибке
                    if(password.val() !== confirm_password.val()){
                        //Выводим сообщение об ошибке
                        $('#valid_confirm_password_message').text('Пароли не совпадают');
                    }

                    // Дезактивируем кнопку отправки
                    //$('input[type=submit]').attr('disabled', true);
                    
                }else{
                    //Иначе, если длина первого пароля больше шести символов, то мы также проверяем, если они  совпадают. 
                    if(password.val() !== confirm_password.val()){
                        //Выводим сообщение об ошибке
                        $('#valid_confirm_password_message').text('Пароли не совпадают');

                        // Дезактивируем кнопку отправки
                        //$('input[type=submit]').attr('disabled', true);
                    }else{
                        // Убираем сообщение об ошибке у поля для ввода повторного пароля
                        $('#valid_confirm_password_message').text('');

                        //Активируем кнопку отправки
                        $('input[type=submit]').attr('disabled', false);
                    }

                    // Убираем сообщение об ошибке у поля для ввода пароля
                    $('#valid_password_message').text('');
                }

            }else{
                $('#valid_password_message').text('Введите пароль');
            }
        });

        //(1) — Место для следующего куска кода

        confirm_password.blur(function(){
            //Если пароли не совпадают
            if(password.val() !== confirm_password.val()){
                //Выводим сообщение об ошибке
                $('#valid_confirm_password_message').text('Пароли не совпадают');

                // Дезактивируем кнопку отправки
                //$('input[type=submit]').attr('disabled', true);
            }else{
                //Иначе, проверяем длину пароля
                if(password.val().length > 6){

                    // Убираем сообщение об ошибке у поля для ввода пароля
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                }

                // Убираем сообщение об ошибке у поля для ввода повторного пароля
                $('#valid_confirm_password_message').text('');
            }

        });

    });

    //Таймер для тестов
    var javascript_countdown = function () {
        var time_left = 10; //number of seconds for countdown
        var output_element_id = 'javascript_countdown_time';
        var keep_counting = 1;
        var no_time_left_message = 'Время вышло!';
     
        function countdown() {
            if(time_left < 2) {
                keep_counting = 0;
            }
     
            time_left = time_left - 1;
        }
     
        function add_leading_zero(n) {
            if(n.toString().length < 2) {
                return '0' + n;
            } else {
                return n;
            }
        }
     
        function format_output() {
            var hours, minutes, seconds;
            seconds = time_left % 60;
            minutes = Math.floor(time_left / 60) % 60;
            hours = Math.floor(time_left / 3600);
     
            seconds = add_leading_zero( seconds );
            minutes = add_leading_zero( minutes );
            hours = add_leading_zero( hours );
     
            return hours + ':' + minutes + ':' + seconds;
        }
     
        function show_time_left() {
            document.getElementById(output_element_id).innerHTML = format_output();//time_left;
        }
     
        function no_time_left() {
            submitIt();
            document.getElementById(output_element_id).innerHTML = no_time_left_message;
        }
     
        return {
            count: function () {
                countdown();
                show_time_left();
            },
            timer: function () {
                javascript_countdown.count();
     
                if(keep_counting) {
                    setTimeout("javascript_countdown.timer();", 1000);
                } else {
                    no_time_left();
                }
            },
            //Kristian Messer requested recalculation of time that is left
            setTimeLeft: function (t) {
                time_left = t;
                if(keep_counting == 0) {
                    javascript_countdown.timer();
                }
            },
            init: function (t, element_id) {
                time_left = t;
                output_element_id = element_id;
                javascript_countdown.timer();
            }
        };
    }();
     
    //time to countdown in seconds, and element ID
    javascript_countdown.init(10200, 'javascript_countdown_time');
    
    //Отправка формы по окончанию времени
    function submitIt()
    {
        document.getElementById("formtest").submit();
    }

    function testAlert() {
        alert("ВНИМАНИЕ! Сасат");
      }