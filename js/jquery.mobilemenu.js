/**
 * jQuery Mobile Menu 
 * Turn unordered list menu into dropdown select menu
 * version 1.0(31-OCT-2011)
 * 
 * Built on top of the jQuery library
 *   http://jquery.com
 * 
 * Documentation
 * 	 http://github.com/mambows/mobilemenu
 */
(function($){
$.fn.mobileMenu = function(options) {
	
	var defaults = {
			defaultText: 'Navigate to...',
			className: 'select-menu',
			subMenuClass: 'sub-menu',
			subMenuDash: '&ndash;'
		},
		settings = $.extend( defaults, options ),
		el = $(this);
	
	this.each(function(){
		// ad class to submenu list
		el.find('ul').addClass(settings.subMenuClass);

		// Create base menu
		$('<div class="select-nav">').insertAfter( el );
		$('<select />',{
			'class' : settings.className
		}).appendTo( el.next($(this)) );

		// Create default option
		$('<option />', {
			"value"		: '#',
			"text"		: settings.defaultText
		}).appendTo( '.' + settings.className );

		// Create select option from menu
		el.find('a').each(function(){
			var $this 	= $(this),
					optText	= '&nbsp;' + $this.text(),
					optSub	= $this.parents( '.' + settings.subMenuClass ),
					len			= optSub.length,
					dash;
			
			// if menu has sub menu
			if( $this.parents('ul').hasClass( settings.subMenuClass ) ) {
				dash = Array( len+1 ).join( settings.subMenuDash );
				optText = dash + optText;
			}

			// Now build menu and append it
			$('<option />', {
				"value"	: this.href,
				"html"	: optText,
				"selected" : (this.href == window.location.href)
			}).appendTo( '.' + settings.className );

		}); // End el.find('a').each

		// Change event on select element
		$('.' + settings.className).change(function(){
			var locations = $(this).val();
			if( locations !== '#' ) {
				window.location.href = $(this).val();
			};
		});

	}); // End this.each

	return this;

};

function is_ie6(){
	var isIE=!!window.ActiveXObject;
	var isIE6=isIE&&!window.XMLHttpRequest;
	return isIE6;
}

/* sidebar scroll !ie6
	 * ====================================================
	*/
	if( !is_ie6() && $('.sidebar').length ){
		var rollbox = $('.sidebar .widget'), rolllen = rollbox.length;
		if( rolllen && 0<_deel.roll[0]<=rolllen && 0<_deel.roll[1]<=rolllen ){
			$(window).scroll(function(){
				var roll = document.documentElement.scrollTop+document.body.scrollTop;
				if( roll>rollbox.eq(rolllen-1).offset().top+rollbox.eq(rolllen-1).height() ){
					if( $('.widgetRoller').length==0 ){
						rollbox.parent().append( '<div class="widgetRoller"></div>' );
						rollbox.eq(_deel.roll[0]-1).clone().appendTo('.widgetRoller');
						if( _deel.roll[0]!==_deel.roll[1] )
							rollbox.eq(_deel.roll[1]-1).clone().appendTo('.widgetRoller')
						var toper = 10;
						if($('.navbar-wrap').css('position')=='fixed') toper = 62;
						$('.widgetRoller').css({position:'fixed',top:toper,zIndex:0,width:360});
					}else{
						$('.widgetRoller').fadeIn(300);
					}
				}else{
					$('.widgetRoller').hide();
				}
			})
		}

		$(window).scroll(function(){
			var scroller = $('.rollto');
			document.documentElement.scrollTop+document.body.scrollTop>200?scroller.fadeIn():scroller.fadeOut();
		})
	}
})(jQuery);