/* Main JS */

;(function($) {

   'use strict'

   // Header image
   $.fn.SydneyHeaderImage = function(options) {

     var settings = $.extend({
       title: '',
       subtitle: '',
       buttonText: '',
       buttonURL: '',
       height: 300
     }, options);

     var $this = $(this);
     var headerImg = $this.find('.header-image');

     headerImg.height(settings.height);

     var maintitle = function() {
       if(settings.title != undefined) {
         return '<h2 class="maintitle">' + settings.title + '</h2>';
       }
     }

     var subtitle = function() {
       if(settings.subtitle != undefined) {
         return '<p class="subtitle">' + settings.subtitle + '</p>';
       }
     }

     var button = function() {
       if(settings.buttonText != undefined && settings.buttonURL != undefined) {
         return '<a href="' + settings.buttonURL + '" class="roll-button button-slider">' + settings.buttonText + '</a>';
       }
     }

     var headerText = '<div class="header-image-text">' +
                     '<div class="inner"><div>' +
                     maintitle() +
                     subtitle() +
                     button() +
                     '</div></div>' +
                     '</div>';

     if( headerImg.length ) {
       headerImg.append(headerText);
     }

   };

   // Main menu search form
   if( $('.top-search-menu').length ) {
     var $searchArea = $('.top-search-menu');

     $searchArea.click(function(){
       $(this).addClass('input-expanded');
     });

     $(document).mouseup(function (e){

         var container = $(".top-search-menu");

         if (!$searchArea.is(e.target) && $searchArea.has(e.target).length === 0){
           $searchArea.removeClass('input-expanded');
         }

     });
   }

})(jQuery);
