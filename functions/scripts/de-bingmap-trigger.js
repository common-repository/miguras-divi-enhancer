/*================================= DIVIENHANCER BING MAP =====================================*/

  function divienhancer_bing_map_script(origin) {
      window.deBingMaps = [];
    
      let bingMapLoader = () => {
    
    
        jQuery('.divienhancer_bing_map').each(function () {
          var self = jQuery(this);
          self.attr('data-id', `de-bing-map-${Math.floor((Math.random() * 1000) + 1) + Math.random().toString(36).substring(2, 15)}`);
          var dataId = self.attr("data-id");
          self.find('.divienhancer_bing_map_load').attr('id', dataId)
          var mapid = jQuery(this).find('.divienhancer_bing_map_load').attr('id');
          var zoom = jQuery(this).attr('data-zoom');
          var maptypedata = jQuery(this).attr('data-type');
          var maptype = 'Microsoft.Maps.MapTypeId.' + maptypedata;
          var mapcenter = jQuery(this).attr("data-address")

    
    
    
          if (Microsoft) {
            window.deBingMaps[mapid] = new Microsoft.Maps.Map(document.getElementById(mapid), {
            });
            window.deBingMaps[mapid].setView({
              zoom: parseInt(zoom),
              mapTypeId: eval(maptype)
            });
    
    
            if(window.deBingMaps[mapid]){
              
    
              Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
    
                self.attr("data-valid", "Invalid Address");
        
                var searchManager = new Microsoft.Maps.Search.SearchManager(window.deBingMaps[mapid]);
                var requestOptions = {
                  bounds: window.deBingMaps[mapid].getBounds(),
                  where: mapcenter,
                  callback: function (answer, userData) {
                    self.attr("data-valid", "Valid Address")
                    jQuery(".divienhancer_bing_map_loading").css({display: "none"});
                    window.deBingMaps[mapid].setView({ 
                      center: answer.results[0].location,
                      mapTypeId: eval(maptype)
                    });
                    
                  }
                };
                searchManager.geocode(requestOptions);
              });
    
    
            }
            
            
            
          }
    
    
        });
    
    
    
        jQuery('.divienhancer_bing_map_pin').each(function () {
          let self = jQuery(this);
          let parentid = jQuery(this).parents('.divienhancer_bing_map').attr('data-id');
          let mapType = jQuery(this).parents('.divienhancer_bing_map').attr('data-type');
          let map = window.deBingMaps[parentid];
          let address = jQuery(this).attr("data-address");
          let title = jQuery(this).attr("data-title");
    
          
          Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
        
    
            var searchManager = new Microsoft.Maps.Search.SearchManager(map);
            var requestOptions = {
              bounds: map.getBounds(),
              where: address,
              callback: function (answer, userData) {
        
                let pinAddress = answer.results[0].location;
              
                let pin = new Microsoft.Maps.Pushpin(pinAddress, {
                  title: title,
                });
                map.entities.push(pin);

                // function to display pin content on click
                Microsoft.Maps.Events.addHandler(pin, 'click', function (e) { 
                  let pinLeft = e.point.x;
                  let pinTop = e.point.y;
                  let pinWrapper = self.parents('.divienhancer_bingMapChild');
                  
                  //hide all pins before display the clicked one
                  jQuery('.divienhancer_bingMapChild').css({display: "none"});

                  // display pin before get height, then get height to adjust position
                  pinWrapper.css({display: "block"});
                  self.parents('.divienhancer_bingMapChild').find('.divienhancer_bing_map_pin_content').css({display: "block"});
                  let contentHeight = pinWrapper.outerHeight();
                  pinWrapper.css({left: (pinLeft - 40), top: (pinTop - contentHeight - 30)});
                });


                //function to hide pin content when users moves the map
                Microsoft.Maps.Events.addHandler(map, 'viewchange', function () { 
                  self.parents('.divienhancer_bingMapChild').css({display: "none"});
                });

                jQuery('.divienhancer_bing_map_pin_close').on("click", function(){
                  self.parents('.divienhancer_bingMapChild').css({display: "none"});
                })


              }
            };
            searchManager.geocode(requestOptions);
          });
    
    
        });
    

      }
    
    
      if (origin == "front") {
        window.addEventListener("load", function () {
          bingMapLoader();
        });
      }
      else if (origin == "back") {
        setTimeout(function () {
          bingMapLoader();
        }, 2000);
      }
 
  } // end of divienhancer_bing_map_script



jQuery(document).ready(function () {
    divienhancer_bing_map_script("front");
});


