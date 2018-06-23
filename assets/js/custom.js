;(function($) {

  'use strict'

  // Add title and subtitle on header image
  if( $('.sydney-hero-area').length ) {
    $('.sydney-hero-area').SydneyHeaderImage({
      title: std.header_image.title,
      subtitle: std.header_image.subtitle,
      buttonText: std.header_image.buttonText,
      buttonURL: std.header_image.buttonURL,
      height: std.header_image.height
    });

    if( std.header_image.hideBtn == true ) {
      $('body:not(.home) .header-image-text .button-slider').remove();
    }

  }

  // Display both logo and tagline
  if( std.header_branding.displayLogoAndTagline == true ) {
    $('.site-header .col-md-4').append('<h2 class="site-description">' + std.header_branding.site_desc + '</h2>');
  }

})(jQuery);
