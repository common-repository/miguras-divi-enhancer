function divienhancer_ihover_function(){

    jQuery(function($){

      $('.et_pb_module.divienhancer_ihover').each(function(){

        var _this = $(this);
        var thisWidth = _this.outerWidth();
        var firstLink = _this.find('.ih-item.divienhancer_ihover').find('a').first();

        _this.find('.ih-item.divienhancer_ihover').css({width: thisWidth+'px', height: thisWidth+'px'})
        _this.find('.ih-item.divienhancer_ihover').find('.img').css({width: thisWidth+'px', height: thisWidth+'px'})

        if(!firstLink.hasClass('ihover-builder')){
          if(firstLink.attr('href')){
            firstLink.addClass('divienhancer_ihover_trigger');
          }
          else {
            firstLink.wrapInner('<div class="divienhancer_ihover_trigger"></div>');
            firstLink.replaceWith(firstLink.contents());
          }
          
        }
        _this.css({opacity: '1'});

      });

    });

  }

  jQuery(document).ready(function(){
    divienhancer_ihover_function();
  });