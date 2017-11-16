
$(document).ready(function(){

	var login = $('#login_form');
	var recover = $('#recoverform');
	var register = $('#registerform');
	var speed = 400;

	$('#to-recover').click(function(){
		
		$("#login_form").hide();
		$("#recoverform").fadeIn();
		$("#registerform").hide();
	});
	
	$('#to-login').click(function(){
		
		$("#registerform").hide();
		$("#recoverform").hide();
		$("#login_form").fadeIn();
	});
	
	$('#to-login1').click(function(){
		
		$("#registerform").hide();
		$("#recoverform").hide();
		$("#login_form").fadeIn();
	});
	
	$('#to-register').click(function(){
		
		$("#registerform").fadeIn();
		$("#recoverform").hide();
		$("#login_form").hide();
	});
    
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
        var input = $(this);       
       
        $(input).val(input.attr('placeholder'));
               
        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });
       
        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });

        
        
    }
});