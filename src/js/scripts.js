(function( root, $, undefined ) {
  "use strict";

  $(function () {
    // DOM ready, take it away

    //Header Size on Scroll
    var scrollPrev = $(window).scrollTop();

    $(window).scroll(function(){
      var scrollPos = $(window).scrollTop();

      if(scrollPos > 0) {
        $(".header").addClass("compact");
      } else {
        $(".header").removeClass("compact");
      }
    });


    //Parallax Featured Images on Posts


  });

} ( this, jQuery ));
