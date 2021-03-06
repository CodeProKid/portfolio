
(function($) {
	$.fn.slideTextLeft = function(words, delay) {
		var isSingleWord = false;

		// map arguments
		var opts = $.fn.slideTextLeft.defaults;

		if (typeof delay === "number") {
			opts.delay = delay;
		}

		if ($.isArray(words)) {
			opts.words = words;
		} else if (typeof words === "string") {
			opts.words = words;
			isSingleWord = true;
		} else if ($.isPlainObject(words)) {
			opts = $.extend({}, $.fn.slideTextLeft.defaults, words);
		}

		// iterate and reformat each matched element
		return this.each(function() {
			var $this = $(this);
			var initialText = $this.text();
			var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
			var i = 0;

			if (!o.words.length) {
				return;
			}

			$this.css({
				"white-space": "nowrap",
				"overflow": "hidden",
				"vertical-align": "bottom"
			});

			if (!initialText.length || initialText === o.words[0]) {
				$this.text(o.words[0]);
				i = 1;
			}

			// start animation
			(function loop() {
				var word = isSingleWord ? o.words : o.words[i];
				var callback = isSingleWord ? null : loop;

				transitionText(word, $this, o.delay, callback);
				i = (i + 1) % o.words.length;
			})();
		});
	};

	function transitionText(text, $this, delay, callback) {
		$this.delay(delay)
			.animate({ "width": "toggle" }, $.proxy($this.text, $this, text))
			.animate({ "width": "toggle" }, callback);
	}

	// plugin defaults
	$.fn.slideTextLeft.defaults = {
		words: [],
		delay: 2000
	};
})(jQuery);

jQuery(function() {
	jQuery(".tagline .right").slideTextLeft({ 
		words: ["Problem Solver", "Band Geek", "Nerd", "Audiophile", "Thinker"], // multiple words to tranistion through in a loop
		delay: 2000 // the time to wait before the transistion
	});
});

//initiate functions when dom is ready.
jQuery(document).ready(function($){

	var winHeight = $(window).height();
	
	$('.hero').height( winHeight );
	
	var headerHeight = $('.hero hgroup').height();
	var hgroupTop = (winHeight/2) - (headerHeight/2);
	
	//alert(headOffset);
	
	$('.hero hgroup').css({ 'top': hgroupTop });
	
	$(window).scroll(function(){
		var scrollPos = $(this).scrollTop();
		
		$('.hero hgroup').css({
			'top': hgroupTop - (scrollPos/2),
			'opacity': 1-(scrollPos/300)
		});
		
	});
	
	$('.flexslider').flexslider({
		animation: "slide"
	});
	
	$('.mobileMenu').click(function(){
		if ( !$('aside.main').hasClass('clicked') ){
			$('aside.main').addClass('clicked');
		}else{
			$('aside.main').removeClass('clicked');
		}
		
	});
	
	
});