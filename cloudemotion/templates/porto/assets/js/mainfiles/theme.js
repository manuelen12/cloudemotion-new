/*
Name: 			Theme Base
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	5.7.2
*/

// Theme
window.theme = {};

// Theme Common Functions
window.theme.fn = {

	getOptions: function(opts) {

		if (typeof(opts) == 'object') {

			return opts;

		} else if (typeof(opts) == 'string') {

			try {
				return JSON.parse(opts.replace(/'/g,'"').replace(';',''));
			} catch(e) {
				return {};
			}

		} else {

			return {};

		}
	}
};
//new progress bar
function InitProgressBar(selector) {
	var $el = $(selector);
	setTimeout(function(){
	$el = $(selector);
		
		$el.each(function(index){
			var totalWidth = ($(this).attr('data-width-animation')/5)*100;
			$(this).animate({
				width: totalWidth+'%'
			}, 1500, 'easeOutQuad', function(){
				$(this).find('.myBar').animate({
					opacity: 1
				}, 500, 'easeOutQuad');
			});
		})
	}, 1000);             
	return $el;
}
//Owl-
function initOwl(selector) {
	setTimeout(function() {
		$(selector).owlCarousel({
          loop:false,
          margin:0,
          nav:false,    
          responsive:{
            0:{
              items:1,                                                                    
            },500:{
             items:2,
           }
         }
   		});
   	},1000);
}
function initOwlCourse(selector) {
	setTimeout(function() {
		$(selector).owlCarousel({
	          loop: false,
	          margin: 3,
	          nav: true,
	          navText: [
	          "<i class='fa fa-left'></i>",
	          "<i class='fa fa-right'></i>"
	          ],              
	          responsive: {
	            0: {
	              items: 1
	            },
	            500: {
	              items: 2
	            },
	            1000: {
	              items: 2
	            }
	          }
	        })
	},1000);
}
//sort
function initSort(selector){
	
}

//animation
function initAnimation(theme, jQuery) {

	theme = theme || {};

	var instanceName = '__animate';

	var PluginAnimate = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginAnimate.defaults = {
		accX: 0,
		accY: -150,
		delay: 1,
		duration: '1s'
	};

	PluginAnimate.prototype = {
		initialize: function($el, opts) {
			if ($el.data(instanceName)) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend(true, {}, PluginAnimate.defaults, opts, {
				wrapper: this.$el
			});

			return this;
		},

		build: function() {
			var self = this,
				$el = this.options.wrapper,
				delay = 0,
				duration = '1s';

			$el.addClass('appear-animation animated');

			if (!$('html').hasClass('no-csstransitions') && $(window).width() > 767) {

				$el.appear(function() {

					$el.one('animation:show', function(ev) {
						delay = ($el.attr('data-appear-animation-delay') ? $el.attr('data-appear-animation-delay') : self.options.delay);
						duration = ($el.attr('data-appear-animation-duration') ? $el.attr('data-appear-animation-duration') : self.options.duration);

						if (duration != '1s') {
							$el.css('animation-duration', duration);
						}

						setTimeout(function() {
							$el.addClass($el.attr('data-appear-animation') + ' appear-animation-visible');
						}, delay);
					});

					$el.trigger('animation:show');

				}, {
					accX: self.options.accX,
					accY: self.options.accY
				});

			} else {

				$el.addClass('appear-animation-visible');

			}

			return this;
		}
	};
	// expose to scope
	$.extend(theme, {
		PluginAnimate: PluginAnimate
	});

	// jquery plugin
	$.fn.themePluginAnimate = function(opts) {
		return this.map(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginAnimate($this, opts);
			}

		});
	};
}

// Progress Bar
function initProgressBar(theme,jQuery) {
	
	theme = theme || {};

	var instanceName = '__progressBar';

	var PluginProgressBar = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginProgressBar.defaults = {
		accX: 0,
		accY: -50,
		delay: 1
	};

	PluginProgressBar.prototype = {
		initialize: function($el, opts) {
			if ($el.data(instanceName)) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend(true, {}, PluginProgressBar.defaults, opts, {
				wrapper: this.$el
			});

			return this;
		},

		build: function() {
			if (!($.isFunction($.fn.appear))) {
				return this;
			}

			var self = this,
				$el = this.options.wrapper,
				delay = 1;

			$el.appear(function() {

				delay = ($el.attr('data-appear-animation-delay') ? $el.attr('data-appear-animation-delay') : self.options.delay);

				$el.addClass($el.attr('data-appear-animation'));

				setTimeout(function() {

					$el.animate({
						width: $el.attr('data-appear-progress-animation')
					}, 1500, 'easeOutQuad', function() {
						$el.find('.progress-bar-tooltip').animate({
							opacity: 1
						}, 500, 'easeOutQuad');
					});

				}, delay);

			}, {
				accX: self.options.accX,
				accY: self.options.accY
			});

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginProgressBar: PluginProgressBar
	});

	// jquery plugin
	$.fn.themePluginProgressBar = function(opts) {
		return this.map(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginProgressBar($this, opts);
			}

		});
	}
}


// Scroll to Top
function initScrollTop(theme,jQuery) {
	// body...
	theme = theme || {};

	$.extend(theme, {

		PluginScrollToTop: {

			defaults: {
				wrapper: $('body'),
				offset: 150,
				buttonClass: 'scroll-to-top',
				iconClass: 'fa fa-chevron-up',
				delay: 1000,
				visibleMobile: false,
				label: false,
				easing: 'easeOutBack'
			},

			initialize: function(opts) {
				initialized = true;

				this
					.setOptions(opts)
					.build()
					.events();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts);

				return this;
			},

			build: function() {
				var self = this,
					$el;

				// Base HTML Markup
				$el = $('<a />')
					.addClass(self.options.buttonClass)
					.attr({
						'href': '#',
					})
					.append(
						$('<i />')
						.addClass(self.options.iconClass)
				);

				// Visible Mobile
				if (!self.options.visibleMobile) {
					$el.addClass('hidden-mobile');
				}

				// Label
				if (self.options.label) {
					$el.append(
						$('<span />').html(self.options.label)
					);
				}

				this.options.wrapper.append($el);

				this.$el = $el;

				return this;
			},

			events: function() {
				var self = this,
					_isScrolling = false;

				// Click Element Action
				self.$el.on('click', function(e) {
					e.preventDefault();
					$('body, html').animate({
						scrollTop: 0
					}, self.options.delay, self.options.easing);
					return false;
				});

				// Show/Hide Button on Window Scroll event.
				$(window).scroll(function() {

					if (!_isScrolling) {

						_isScrolling = true;

						if ($(window).scrollTop() > self.options.offset){

							self.$el.stop(true, true).addClass('visible');
							_isScrolling = false;

						} else {

							self.$el.stop(true, true).removeClass('visible');
							_isScrolling = false;
						}
					}
				});
				return this;
			}
		}
	});


}
// Masonry
function initMasonry(theme,jQuery) {
	// body...
	theme = theme || {};

	var instanceName = '__masonry';

	var PluginMasonry = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginMasonry.defaults = {
		itemSelector: 'li'
	};

	PluginMasonry.prototype = {
		initialize: function($el, opts) {
			if ($el.data(instanceName)) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend(true, {}, PluginMasonry.defaults, opts, {
				wrapper: this.$el
			});

			return this;
		},

		build: function() {
			if (!($.isFunction($.fn.isotope))) {
				return this;
			}

			var self = this,
				$window = $(window);

			self.$loader = false;

			if (self.options.wrapper.parents('.masonry-loader').get(0)) {
				self.$loader = self.options.wrapper.parents('.masonry-loader');
				self.createLoader();
			}

			self.options.wrapper.one('layoutComplete', function(event, laidOutItems) {
				self.removeLoader();
			});

			self.options.wrapper.waitForImages(function() {
				self.options.wrapper.isotope(this.options);
			});

			setTimeout(function() {
				self.removeLoader();
			}, 3000);

			return this;
		},

		createLoader: function() {
			var self = this;

			var loaderTemplate = [
				'<div class="bounce-loader">',
					'<div class="bounce1"></div>',
					'<div class="bounce2"></div>',
					'<div class="bounce3"></div>',
				'</div>'
			].join('');

			self.$loader.append(loaderTemplate);

			return this;
		},

		removeLoader: function() {

			var self = this;

			if (self.$loader) {

				self.$loader.removeClass('masonry-loader-showing');

				setTimeout(function() {
					self.$loader.addClass('masonry-loader-loaded');
				}, 300);

			}

		}
	};
	// expose to scope
	$.extend(theme, {
		PluginMasonry: PluginMasonry
	});

	// jquery plugin
	$.fn.themePluginMasonry = function(opts) {
		return this.map(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginMasonry($this, opts);
			}

		});
	}
}

// Parallax
function initParallax(theme,jQuery) {
	// body...
	console.log('phla');
	theme = theme || {};

	var instanceName = '__parallax';

	var PluginParallax = function($el, opts) {
		return this.initialize($el, opts);
	};

	PluginParallax.defaults = {
		speed: 1.5,
		horizontalPosition: '50%',
		offset: 0
	};

	PluginParallax.prototype = {
		initialize: function($el, opts) {
			if ($el.data(instanceName)) {
				return this;
			}

			this.$el = $el;

			this
				.setData()
				.setOptions(opts)
				.build();

			return this;
		},

		setData: function() {
			this.$el.data(instanceName, this);

			return this;
		},

		setOptions: function(opts) {
			this.options = $.extend(true, {}, PluginParallax.defaults, opts, {
				wrapper: this.$el
			});

			return this;
		},

		build: function() {
			var self = this,
				$window = $(window),
				offset,
				yPos,
				bgpos,
				background;

			// Create Parallax Element
			background = $('<div class="parallax-background"></div>');

			// Set Style for Parallax Element
			background.css({
				'background-image' : 'url(' + self.options.wrapper.data('image-src') + ')',
				'background-size' : 'cover',
				'position' : 'absolute',
				'top' : 0,
				'left' : 0,
				'width' : '100%',
				'height' : '180%'
			});

			// Add Parallax Element on DOM
			self.options.wrapper.prepend(background);

			// Set Overlfow Hidden and Position Relative to Parallax Wrapper
			self.options.wrapper.css({
				'position' : 'relative',
				'overflow' : 'hidden'
			});

			// Parallax Effect on Scroll & Resize
			var parallaxEffectOnScrolResize = function() {
				$window.on('scroll resize', function() {
					offset  = self.options.wrapper.offset();
					yPos    = -($window.scrollTop() - (offset.top - 100)) / ((self.options.speed + 2 ) + (self.options.offset));
					plxPos  = (yPos < 0) ? Math.abs(yPos) : -Math.abs(yPos);
					background.css({
						'transform' : 'translate3d(0, '+ plxPos +'px, 0)',
						'background-position-x' : self.options.horizontalPosition
					});
				});

				$window.trigger('scroll');
			}

			if (!$.browser.mobile) {
				parallaxEffectOnScrolResize();
			} else {
				if( self.options.enableOnMobile == true ) {
					parallaxEffectOnScrolResize();
				} else {
					self.options.wrapper.addClass('parallax-disabled');
				}
			}

			return this;
		}
	};

	// expose to scope
	$.extend(theme, {
		PluginParallax: PluginParallax
	});

	// jquery plugin
	$.fn.themePluginParallax = function(opts) {
		return this.map(function() {
			var $this = $(this);

			if ($this.data(instanceName)) {
				return $this.data(instanceName);
			} else {
				return new PluginParallax($this, opts);
			}

		});
	}


}


// Validation
function initValidation(theme,jQuery) {
	// body...
	theme = theme || {};

	$.extend(theme, {

		PluginValidation: {

			defaults: {
				validator: {
					highlight: function(element) {
						$(element)
							.parent()
							.removeClass('has-success')
							.addClass('has-error');
					},
					success: function(element) {
						$(element)
							.parent()
							.removeClass('has-error')
							.addClass('has-success')
							.find('label.error')
							.remove();
					},
					errorPlacement: function(error, element) {
						if (element.attr('type') == 'radio' || element.attr('type') == 'checkbox') {
							error.appendTo(element.parent().parent());
						} else {
							error.insertAfter(element);
						}
					}
				},
				validateCaptchaURL: 'php/contact-form-verify-captcha.php',
				refreshCaptchaURL: 'php/contact-form-refresh-captcha.php'
			},

			initialize: function(opts) {
				initialized = true;

				this
					.setOptions(opts)
					.build();

				return this;
			},

			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts);

				return this;
			},

			build: function() {
				var self = this;

				if (!($.isFunction($.validator))) {
					return this;
				}

				self.addMethods();
				self.setMessageGroups();

				$.validator.setDefaults(self.options.validator);

				return this;
			},

			addMethods: function() {
				var self = this;

				$.validator.addMethod('captcha', function(value, element, params) {
					var captchaValid = false;

					$.ajax({
						url: self.options.validateCaptchaURL,
						type: 'POST',
						async: false,
						dataType: 'json',
						data: {
							captcha: $.trim(value)
						},
						success: function(data) {
							if (data.response == 'success') {
								captchaValid = true;
							}
						}
					});

					if (captchaValid) {
						return true;
					}

				}, '');

				// Refresh Captcha
				$('#refreshCaptcha').on('click', function(e) {
					e.preventDefault();
					$.get(self.options.refreshCaptchaURL, function(url) {
						$('#captcha-image').attr('src', url);
					});					
				});

			},

			setMessageGroups: function() {

				$('.checkbox-group[data-msg-required], .radio-group[data-msg-required]').each(function() {
					var message = $(this).data('msg-required');
					$(this).find('input').attr('data-msg-required', message);
				});

			}

		}

	});
}