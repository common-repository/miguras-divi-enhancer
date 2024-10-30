  /*================================== FLIPBOX ============================*/
  /*============================================================================*/
  function divienhancer_flipbox(){
    
    jQuery('.divienhancer-flipper').each(function(){
        
        var $firstBox = jQuery(this).find('.divienhancer_flipBoxChild:nth-child(1)');
        var $secondBox = jQuery(this).find('.divienhancer_flipBoxChild:nth-child(2)');
        var $axis = jQuery(this).attr('data-axis');
        var $speed = jQuery(this).attr('data-speed');
        var $firstwidth = $firstBox.find('.divienhancer_flipbox_box').outerWidth();
        var $firstheight = $firstBox.outerHeight();
        var $secondwidth = $secondBox.find('.divienhancer_flipbox_box').outerWidth();
        var $secondheight = $secondBox.outerHeight();


        if($firstwidth < $secondwidth) {
        $secondBox.find('.divienhancer_flipbox_box').css({width: $firstwidth, margin:' 0 auto' })
        }
        else {
        $firstBox.find('.divienhancer_flipbox_box').css({width: $secondwidth, margin:' 0 auto'  })
        }

        if(!jQuery(this).find('.divienhancer_flipBoxChild').parents().hasClass('.divienhancer_child_element_wrapper')){
        jQuery(this).find('.divienhancer_flipBoxChild').wrap('<div class="divienhancer_child_element_wrapper"></div>');
        }
        $firstBox.parent('.divienhancer_child_element_wrapper').addClass('front');
        $secondBox.parent('.divienhancer_child_element_wrapper').addClass('back');


        if($firstheight < $secondheight) {
        jQuery(this).parents('.divienhancer-flip-container').css({height: $secondheight});
        jQuery(this).find('.divienhancer_flipBoxChild').css({height:$secondheight});
        }
        else {
        jQuery(this).parents('.divienhancer-flip-container').css({height: $firstheight});
        jQuery(this).find('.divienhancer_flipBoxChild').css({height:$firstheight});
        }



        if(!jQuery(this).hasClass('.divienhancer_flipbox_launched')){


        jQuery(this).flip({
        axis: $axis,
        trigger: 'hover',
        speed: $speed,

        }).addClass('divienhancer_flipbox_launched');

        }


    }) // end of each


  }

  jQuery(document).ready(function(){
    divienhancer_flipbox();
  })