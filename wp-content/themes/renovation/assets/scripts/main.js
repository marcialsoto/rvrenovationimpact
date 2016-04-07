/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $( '.gallery>dl>dt>a' ).attr('data-lightbox', 'gallery');

        $('[data-toggle="tooltip"]').tooltip();
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        var sld__main = $('#slider__main');
        sld__main.owlCarousel({
          items: 1,
          loop: true,
          nav: false,
          dots: false,
          autoplay: true,
          lazyLoad:true,
          autoplayHoverPause: true
         });  

          $('.mainNextBtn').click(function() {
            sld__main.trigger('next.owl.carousel');
              console.log('siguiente');
          });

          $('.mainPrevBtn').click(function() {
          // With optional speed parameter
          // Parameters has to be in square bracket '[]'
          sld__main.trigger('prev.owl.carousel', [300]);
            console.log('atras');
          });

        
        var crs__a = $('#carousel__achievements');

        crs__a.owlCarousel({
          loop:true,
          margin:10,
          nav:false,
          dots: false,
          autoplay: true, 
          responsive:{
              0:{
                  items:3
              },
              600:{
                  items:3
              },
              1000:{
                  items:5
              }
          }
      });

       
      $('.customNextBtn').click(function() {
        crs__a.trigger('next.owl.carousel');
        console.log('siguiente');
      });

      $('.customPrevBtn').click(function() {
          // With optional speed parameter
          // Parameters has to be in square bracket '[]'
          crs__a.trigger('prev.owl.carousel', [300]);
          console.log('atras');
      });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },
    // About us page, note the change from about-us to about_us.
    'realisations': {
      init: function() {
        // JavaScript to be fired on the about us page
              // Slider achievements
      var sld__a = $('#slider__achievements');

        sld__a.owlCarousel({
          loop:true,
          nav:false,
          dots: false,
          autoplay: true,
          items: 1,
          autoHeight:true
      });

          $('.aNextBtn').click(function() {
            sld__a.trigger('next.owl.carousel');
              console.log('siguiente');
          });

          $('.aPrevBtn').click(function() {
          // With optional speed parameter
          // Parameters has to be in square bracket '[]'
          sld__a.trigger('prev.owl.carousel', [300]);
            console.log('atras');
          });

      $( '.item>a' ).attr('data-lightbox', 'gallery');

      }
    },
    'achievements': {
      init: function() {
        // JavaScript to be fired on the about us page
              // Slider achievements
      var sld__a = $('#slider__achievements');

        sld__a.owlCarousel({
          loop:true,
          nav:false,
          dots: false,
          autoplay: true,
          items: 1,
          autoHeight:true
      });

          $('.aNextBtn').click(function() {
            sld__a.trigger('next.owl.carousel');
              console.log('siguiente');
          });

          $('.aPrevBtn').click(function() {
          // With optional speed parameter
          // Parameters has to be in square bracket '[]'
          sld__a.trigger('prev.owl.carousel', [300]);
            console.log('atras');
          });

      $( '.item>a' ).attr('data-lightbox', 'gallery');

      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
