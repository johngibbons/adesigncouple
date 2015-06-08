/* jshint undef: true, unused: true */
/* global google */

(function( root, $, undefined ) {
  "use strict";

  $(function () {
    // DOM ready, take it away

    // Common Variables
    var headerHeight = $("#header-bar").outerHeight();

    /**************************************************
      Mobile Navigation Sliding Menu
    **************************************************/

    $("html").on("click", "#nav-toggle, #nav-open-overlay", function() {
      $("#nav-toggle").toggleClass("close");
      $("body").toggleClass("is-pushed");
    });

    //Header Size on Scroll
    var scrollPrev = $(window).scrollTop();

    $(window).scroll(function(){
      var scrollPos = $(window).scrollTop();

      if (scrollPos < headerHeight) {

        $("#header-bar").css("top", -scrollPos);
        $("#header-bar").removeClass("compact");

      } else {

        $("#header-bar").addClass("compact");
        $("#header-bar").css("top", "");

        if (scrollPrev < scrollPos) {
          $("#header-bar").addClass("hidden");
        } else {
          $("#header-bar").removeClass("hidden");
        }
      }

      scrollPrev = $(window).scrollTop();
    });


    //Parallax Featured Images on Posts
    requestAnimationFrame(function(){parallax(".parallax", 0.4);});

    //Remove Overlaid Info On Scroll
    if ($(".post-header").length > 0) {
      var $overlay = $(".post-header").find(".overlay");
      var $content = $(".post-header").find(".content");
      var overlayOpacityInit = $overlay.css("opacity");
      var contentOpacityInit = $content.css("opacity");
      var endHeight = headerHeight;
      var scrollPos = $(window).scrollTop();

      $overlay.css("opacity", overlayOpacityInit * ((endHeight - scrollPos) / endHeight));
      $content.css("opacity", contentOpacityInit * ((endHeight - scrollPos) / endHeight));

      $(window).scroll(function(){
        scrollPos = $(window).scrollTop();

        if (scrollPos < endHeight) {
          $overlay.css("opacity", overlayOpacityInit * ((endHeight - scrollPos) / endHeight));
          $content.css("opacity", contentOpacityInit * ((endHeight - scrollPos) / endHeight));
        } else {
          $overlay.css("opacity", 0);
          $content.css("opacity", 0);
        }
      });
    }

  });

} ( this, jQuery ));


var parallax = function(e, speed){
  var top = $(window).scrollTop();
  top = +top.toFixed(2); //round numbers
  $(e).css({"-webkit-transform" : "translate3d(0, " + (top*speed)+"px, 0)"});
  $(e).css({"-ms-transform" : "translate3d(0, " + (top*speed)+"px, 0)"});
  $(e).css({"-moz-transform" : "translate3d(0, " + (top*speed)+"px, 0)"});
  $(e).css({"transform" : "translate3d(0, " + (top*speed)+"px, 0)"});
  requestAnimationFrame(function(){parallax(e, speed);});
};

var stylesArray = [
  {
    featureType: "all",
    stylers: [
    {hue: "#3D3F44"},
    {saturation: -80},
    {gamma: 1.5},
    ],
  },
];

var add_marker = function( $marker, map ) {

  // var
  var latlng = new google.maps.LatLng( $marker.attr("data-lat"), $marker.attr("data-lng") );

  // create marker
  var image = "wp-content/themes/adesigncouple/src/img/map_marker.svg";
  var marker = new google.maps.Marker({
    position  : latlng,
    map       : map,
    icon      : image,
  });

  // add to array
  map.markers.push( marker );

  // if marker contains HTML, add it to an infoWindow
  if( $marker.html() )
  {
    // create info window
    var infowindow = new google.maps.InfoWindow({
      content : $marker.html()
    });

    // show info window when marker is clicked
    google.maps.event.addListener(marker, "click", function() {

      infowindow.open( map, marker );

    });
  }

};

var center_map = function( map ) {

  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  // only 1 marker?
  if( map.markers.length === 1 )
  {
    // set center of map
    map.setCenter( bounds.getCenter() );
    map.setZoom( 16 );
  }
  else
  {
    google.maps.event.addListenerOnce(map, "zoom_changed", function() {
      var oldZoom = map.getZoom();
      map.setZoom(oldZoom - 1); //Or whatever
    });
    // fit to bounds
    map.fitBounds( bounds );
  }

};



var google_maps_init = function() {

  var mapOptions = {
    center: { lat: 40.8500330, lng: -95.65005230},
    zoom: 5,
    disableDefaultUI: true,
    zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL,
      position: google.maps.ControlPosition.LEFT_BOTTOM,
    },
    streetViewControl: true,
    styles: stylesArray,
    scrollwheel: false,
  };

  var map = new google.maps.Map(document.getElementById("map-canvas"),
      mapOptions);

  var $markers = $(".timeline").find(".marker");
  // add a markers reference
  map.markers = [];

  // add markers
  $markers.each(function(){

    add_marker( $(this), map );

  });

  // center map
  center_map( map );
};

google.maps.event.addDomListener(window, "load", google_maps_init);
