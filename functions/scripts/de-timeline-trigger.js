  /*================================== TIMELINE ============================*/
  /*============================================================================*/
  function divienhancer_timeline(){
    let windowWidth = window.screen.width;

    jQuery('.et_pb_module.divienhancer_timeLine').each(function(){


      jQuery('.divienhancer_timeLineChild').each(function(){
        var $contentHeight = jQuery(this).find('.divienhancer_timeline_child_inner').outerHeight();
        var $iconHeight = jQuery(this).find('.divienhancer_timeline_icon').outerHeight();
        var $dateHeight = jQuery(this).find('.divienhancer_timeline_date').outerHeight();
        
        if(windowWidth > 980){
          jQuery(this).find('.divienhancer_timeline_icon').css({top: $contentHeight/2, marginTop:-$iconHeight/2})
          jQuery(this).find('.divienhancer_timeline_date').css({top: $contentHeight/2, marginTop:-$dateHeight/2})
        }
        else {
          jQuery(this).find('.divienhancer_timeline_icon').css({ marginBottom: $iconHeight/2})
          
        }
        

      });

    }) // end of timeLine each

  }

  jQuery(document).ready(function(){
    divienhancer_timeline();
  })