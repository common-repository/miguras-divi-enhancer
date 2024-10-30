  /*== STICKY FUNCTION ==*/
  function free_divienhancer_sticky(){

          var x = 0;
          jQuery('.divienhancer-sticky').each(function(){
            var $this = jQuery(this);
            var $headerheight = jQuery('#main-header').outerHeight();
            var $adminbarheight = jQuery('#wpadminbar').outerHeight();
            var $topdistance = jQuery(this).attr('data-destickytop');
            var $bottomdistance = jQuery(this).attr('data-destickybottom');
            var $zindex = jQuery(this).parents('.et_pb_section').css('z-index');
            if($zindex = 'auto') {
              $zindex = '';
            }
            x=x+1
    
            jQuery(this).parents('.et_pb_row').css({zIndex: 999-x});
            jQuery(this).parents('.et_pb_column').css({zIndex: 999-x});
    
            if(jQuery('body').hasClass('admin-bar')){
              $headerheight = $headerheight + $adminbarheight;
            }
    
            if (jQuery(window).width() <= 980 ) {
              $headerfinalheight = 0;
            }
            if(jQuery('body').hasClass('et_fixed_nav') && jQuery(window).width() > 980 ){
              $headerfinalheight = $headerheight;
            }
            else {
              $headerfinalheight = 0;
              if(jQuery('body').hasClass('admin-bar')){
                $headerfinalheight = $adminbarheight;
              }
            }
    
            jQuery(this).sticky({
              topSpacing:$headerfinalheight + parseInt($topdistance),
              bottomSpacing: parseInt($bottomdistance)
            });
    
            jQuery(window).scroll(function(){
              if(jQuery('.sticky-wrapper').hasClass('is-sticky')){
                $this.parents('.et_pb_section').css({zIndex: 9999})
              }
              else {
                $this.parents('.et_pb_section').css({zIndex: $zindex})
              }
            });
    
    
          })

  }

  jQuery(document).ready(function () {
    free_divienhancer_sticky();
  });