/**
 * @file
 * eventCategory 	text 	    yes 	Typically the object that was interacted with (e.g. 'Video')
   eventAction 	    text 	    yes 	The type of interaction (e.g. 'play')
   eventLabel 	    text 	    no 	    Useful for categorizing events (e.g. 'Fall Campaign')
   eventValue 	    integer 	no 	    A numeric value associated with the event (e.g. 42)
 */
(function($) {

	$.fn.gaEvent = function( options ) {

		// Establish our default settings
		var settings = $.extend({
			eventCategory         : 'Hello, World!',
			eventAction        : null,
			eventLabel    : null,
			eventValue	 : null
		}, options);

		return this.each( function() {
			$(this).text( settings.text );

			if ( settings.color ) {
				$(this).css( 'color', settings.color );
			}

			if ( settings.fontStyle ) {
				$(this).css( 'font-style', settings.fontStyle );
			}

			if ( $.isFunction( settings.complete ) ) {
				settings.complete.call(this);
			}
		});

	};

}(jQuery));

$(document).ready(function(){

	console.log("jquery ready");

});