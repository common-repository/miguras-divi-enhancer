
function divienhancer_admin_scripts(){

  function divienhancer_display_products(){
    jQuery(function($){

      $('.pbc-market-product').each(function(){
        var $this = $(this);
        var $product = $this.attr('data-product');
        var $price = $this.attr('data-price');
        var $button = '<a class="de-pro-button" data-gumroad-single-product="true" href="https://gum.co/'+$product+'?wanted=true" target="_blank" rel="noopener noreferrer">Buy Now $'+$price+'</a>';


        $this.append($button);



      });




    });
  }


  return {
    divienhancer_display_products: divienhancer_display_products,
  }


}





jQuery(document).ready(function(){
  divienhancer_admin_scripts().divienhancer_display_products();
});
