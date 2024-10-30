
  /*================================== BREADCRUMB ============================*/
  /*============================================================================*/
  function divienhancer_breadcrumb() {
    jQuery(function ($) {

      $('.de-breadcrumb').each(function () {

        var $this = $(this);
        var $parentHeight = $this.parents('.et_pb_module_inner').outerHeight();
        var $parentWidth = $this.parents('.et_pb_module_inner').outerWidth();
        var $item = $this.find('.de-crumb-item');
        var $itemnumber = $this.find('.de-crumb-item').length;
        var $maxWidthItem = $parentWidth / $itemnumber;
        var $delimiter = $this.find('.divienhancer-crumb-delimiter');
        var $styles = '';
        var $itembackground = $this.attr('data-background');
        var $itembackgroundhover = $this.attr('data-backgroundhover');
        var $id = $this.attr('id');
        if ($id == '' || typeof $id == 'undefined') {
          $this.attr('id', 'de-breadcrumb' + Math.floor((Math.random() * 1000) + 1) + Math.random().toString(36).substring(2, 15));
          $id = $this.attr('id');
        }

        if ($this.hasClass('de-crumb-basic')) {
          $item.css({ maxWidth: $maxWidthItem });
          $styles += '<style class="de-breadcrumb-styles" type="text/css">';
          $styles += '#' + $id + '.de-crumb-basic span.divienhancer-crumb-delimiter.et-pb-icon {font-size: inherit;} ';
          $styles += '#' + $id + '.de-crumb-basic span.divienhancer-crumb-delimiter.et-pb-icon {position: relative;} ';
          $styles += '#' + $id + '.de-crumb-basic span.divienhancer-crumb-delimiter.et-pb-icon {top: 0.15em;} ';
          $styles += '#' + $id + '.de-crumb-basic span.divienhancer-crumb-delimiter.et-pb-icon {padding: 0 0.5em;} ';
          $styles += '</style>';




        }
        else {
          $item.css({ maxWidth: '' });
        }

        if ($this.hasClass('de-crumb-styleone')) {
          $styles += '<style class="de-breadcrumb-styles" type="text/css">';
          $styles += '#' + $id + '.de-crumb-styleone .de-crumb-item:after {background-color:' + $itembackground + ';} ';
          $styles += '#' + $id + '.de-crumb-styleone .de-crumb-item {background-color:' + $itembackground + ';} ';
          $styles += '#' + $id + '.de-crumb-styleone .de-crumb-item:hover {background-color:' + $itembackgroundhover + ';} ';
          $styles += '#' + $id + '.de-crumb-styleone span.de-crumb-item {background-color:' + $itembackgroundhover + ';} ';
          $styles += '#' + $id + '.de-crumb-styleone span.de-crumb-item:after {background-color:' + $itembackgroundhover + ';} ';
          $styles += '#' + $id + '.de-crumb-styleone .de-crumb-item:hover:after {background-color:' + $itembackgroundhover + ';} ';
          $styles += '</style>';
        }

        $this.find('.de-breadcrumb-styles').remove();
        $this.append($styles);


      })



    })
  }

  jQuery(document).ready(function(){
    divienhancer_breadcrumb();
  })