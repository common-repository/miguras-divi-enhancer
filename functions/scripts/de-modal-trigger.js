  /*================================== MODAL POPUP ============================*/
  /*============================================================================*/
  function divienhancer_modal_popup(){

        jQuery('.divienhancer-modalpopup').each(function(){
          var $this = jQuery(this);
          var $effect = jQuery(this).attr('data-effect');
          var $overlay = jQuery(this).attr('data-overlay');
          var $buttontext = jQuery(this).attr('data-button-text');
          var $image = jQuery(this).attr('data-image');
          var $imageAlignment = jQuery(this).attr('data-image-alignment');
          var $cssClass = jQuery(this).attr('data-css-class');
          var $buttonalignment = jQuery(this).attr('data-button-alignment');
          var $buttoncss = jQuery(this).attr('data-button-css');
          var $imagecss = jQuery(this).attr('data-image-css');
          var $trigger = jQuery(this).attr('data-trigger');
          var $autotime = jQuery(this).attr('data-autotime');
          var $css = jQuery(this).attr('data-css');
          
        
          jQuery(this).after('<span class="de-modal-marker"></span>');
          var $position = jQuery(this).next('.de-modal-marker').offset();
          var $positionTop = $position.top;
    
          jQuery(this).attr('data-pos', $positionTop);
    
    
          jQuery(this).css({display: 'block'});
          if($trigger == 'button'){
            jQuery(this).before('<button class="de-modal-launch de-modal-'+$buttonalignment+' '+$cssClass+'" data-overlay-color="'+$overlay+'">'+$buttontext+'</button>');
            jQuery(this).prev('.de-modal-launch').attr('style', $buttoncss);
          }
          if($trigger == 'image'){
            jQuery(this).before('<a style="text-align:'+$imageAlignment+'; " class="de-modal-img-launch '+$cssClass+'"><img src="'+$image+'"/ alt="popup-launcher"></a>');
            var imageStyle = jQuery(this).prev('.de-modal-img-launch').attr('style');
            jQuery(this).prev('.de-modal-img-launch').attr('style', imageStyle + $imagecss);
          }
    
          jQuery(this).after('<div class="md-overlay"><span style="font-family: ETmodules!important;" class="divienhancer-modal-close md-close">Q</span></div>');
          jQuery(this).wrap('<div style="'+$css+'" class="nifty-modal '+$effect+'"><div class="md-content"></div></div>');
    
    
          if($trigger == 'auto'){
            setTimeout(function(){
              $this.parents('.nifty-modal').nifty('show');
              jQuery('.md-overlay').css({backgroundColor: $overlay})
            }, parseInt($autotime));
    
          }
    
          if($trigger == 'position'){
    
            jQuery(window).scroll(function(){
              $scroll = jQuery(window).scrollTop();
    
              if($scroll + $windowheight > $positionTop){
                if(!$this.hasClass('de-modal-launched')){
                  $this.addClass('de-modal-launched');
                  $this.parents('.nifty-modal').nifty('show');
                  jQuery('.md-overlay').css({backgroundColor: $overlay})
                }
              }
    
            });
    
          }
    
          jQuery('.de-modal-launch, .de-modal-img-launch').on('click', function(){
    
            var $overlayback = jQuery(this).attr('data-overlay-color');
            jQuery(this).next('.nifty-modal').nifty('show');
            jQuery('.md-overlay').css({backgroundColor: $overlayback})
          })
    
    
    
          jQuery('.nifty-modal').on('show.nifty.modal', function(){
            jQuery('.et_pb_column').css({zIndex: -1});
            jQuery(this).parents('.et_pb_section').css({zIndex: 999999});
            jQuery(this).parents('.et_pb_column').css({zIndex: 9});
            jQuery(this).parents('.et_builder_inner_content').css({zIndex: 999999});

            var $windowheight = window.screen.availHeight;
            var $modalheight = jQuery(this).outerHeight();

    
            if($modalheight > ($windowheight * 0.8)){
              $this.css({maxHeight: ($windowheight * 0.8)+'px', overflowY: 'scroll'});
            }
    
          })
    
          jQuery('.nifty-modal').on('hide.nifty.modal', function(){
            jQuery('.et_pb_column').css({zIndex: 9});
            jQuery(this).parents('.et_pb_section').css('z-index', '');
            jQuery(this).parents('.et_builder_inner_content').css({zIndex: ''});
          })
    
        })


}

jQuery(document).ready(function () {
    divienhancer_modal_popup();
   
});

