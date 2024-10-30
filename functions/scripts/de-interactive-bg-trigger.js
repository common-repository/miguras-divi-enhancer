 /*=================== DIVIENHANCER INTERACTIVE BACKGROUND IMAGE =============*/
 function divienhancer_interactive_background(){
    jQuery(function($){

        $('.divienhancer-interactive_bg').each(function(){
            var $background = $(this).css('background-image')
            var $interactivebgstrength = $(this).attr('data-interactivebgstrength');
            $interactivebgstrength = $interactivebgstrength.replace('px', ' ');

            var $interactivebgscale = $(this).attr('data-interactivebgscale');
            $interactivebgscale = $interactivebgscale.replace('px', ' ');
            $interactivebgscale = '1.'+$interactivebgscale;

            var $interactivebganimationspeed = $(this).attr('data-interactivebganimationspeed');
            $interactivebganimationspeed = $interactivebganimationspeed.replace('px', ' ');
            $interactivebganimationspeed = $interactivebganimationspeed+'ms';

            $background = $background.replace('url(','').replace(')','').replace(/\"/gi, "");
            $(this).attr('data-ibg-bg', $background);
            $(this).css('background-image', 'none');

            $(this).interactive_bg({
            strength: parseInt($interactivebgstrength),              // Movement Strength when the cursor is moved. The higher, the faster it will reacts to your cursor. The default value is 25.
            scale: parseInt($interactivebgscale),               // The scale in which the background will be zoomed when hovering. Change this to 1 to stop scaling. The default value is 1.05.
            animationSpeed: $interactivebganimationspeed,   // The time it takes for the scale to animate. This accepts CSS3 time function such as "100ms", "2.5s", etc. The default value is "100ms".
            contain: true,             // This option will prevent the scaled object/background from spilling out of its container. Keep this true for interactive background. Set it to false if you want to make an interactive object instead of a background. The default value is true.
            wrapContent: false         // This option let you choose whether you want everything inside to reacts to your cursor, or just the background. Toggle it to true to have every elements inside reacts the same way. The default value is false
          });

          });
     
 
    })
  }

  jQuery(document).ready(function(){
    divienhancer_interactive_background();
  })