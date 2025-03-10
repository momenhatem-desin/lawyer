
$(document).ready(function(){

    'use strict';
    
    $('.navbar ul li').on("click",function(){

        $(this).addClass('nav-active').siblings().removeClass('nav-active');
   
      });

    

    $(window).scroll(function(){
       if($(this).scrollTop() > 160){

        $('#scroll-up').addClass('scroll-to-up').removeClass('secondary-color');
    }else{
      $('#scroll-up').removeClass('scroll-to-up').addClass('secondary-color');
    
       }
    });


    $('#scroll-up').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        
    });


   
     
   
  

});


//color function

$(function(){

  //coloe
 // 'use strict'   	
 // $('.color-body').on('change',function(){
 ////   var color = $(".color-body").val();
  //  $('body').css('background-color',color);

 // });

    //place holder
    $('[placeholder]').focus(function() {
      $(this).attr('data-text',$(this).attr('placeholder'));

      $(this).attr('placeholder','');
    }).blur(function(){
    
    $(this).attr('placeholder',$(this).attr('data-text'));

    });

//required
    $('input').each(function(){

      if ($(this).attr('required')==='required') {
  
        $(this).after('<span class="asterisk">*</span>')
      }
  
  
      });

          //confirm message box on button
    $('.confirm').click(function(){
    
      return confirm('Are You Sure ?')
  
      });


       //convert password field to text field on hover

    var passfield=$('.password');

    $('.show-pass').hover(function(){

    	passfield.attr('type','text');

    },function(){

    	passfield.attr('type','password');

    });
    

});



    
   

