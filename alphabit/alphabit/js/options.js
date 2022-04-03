var teslaThemes = {
	
	init: function () {
		this.module();
	},

	module: function () {
		this.fullPageInit();
		this.isotopeInit();
		this.navigationToggle();
		this.scrollToggle();
		this.timeLineScrollBox();
		this.testimonialsBoxScrollBox();
		this.contactFormToggles();
		this.testimonialsSlider();
		this.projectCoverSlider();
		this.horizontalNavigation();
		this.scrollToTop();	
		this.accordion();
	},

	fullPageInit: function () {
		if (jQuery('#fullpage').length) {
			jQuery('#fullpage').fullpage({
		    	scrollOverflow: true,
		    	resize: false,
		    	sectionSelector: '.section',
				slideSelector: '.slide',
		    	anchors: ['main', 'about', 'portfolio', 'blog', 'contact'],
		    	menu: '#fp-nav',
		    	controlArrows: false,
				verticalCentered: false,
				normalScrollElements: '.single-project-slide, .blogpost-slide',
				afterLoad: function(anchorLink, index){
					teslaThemes.logoFix();
				}
		    });
		}

		if (jQuery('#blog-page').length) {
			jQuery('#blog-page').fullpage({
		    	scrollOverflow: true,
		    	resize: false,
		    	sectionSelector: '.section',
				slideSelector: '.slide',
		    	anchors: ['blog'],
		    	controlArrows: false,
				verticalCentered: false,
				normalScrollElements: '.blogpost-slide',
				afterLoad: function(anchorLink, index){
					teslaThemes.logoFix();
				}
		    });
		}

	},

	isotopeInit: function () {
		jQuery(window).load(function () {
			var container = jQuery('.portfolio-container .portfolio-items-wrapper');

			if (container.length) {
				container.isotope({
			        filter: '*',
			        animationOptions: {
			            duration: 600,
			            easing: 'swing',
			            queue: false
			        }
			    });
			 
			    jQuery('.portfolio-filters a').on('click', function () {
			    	jQuery('.portfolio-filters .current').removeClass('current');
			        jQuery(this).addClass('current');
			 
			        var selector = jQuery(this).attr('data-filter');
			        container.isotope({
			            filter: selector,
			            animationOptions: {
			                duration: 750,
			                easing: 'linear',
			                queue: false
			            }
			         });
			         return false;
			    });
			}
		});
	},

	navigationToggle: function () {
		jQuery('.nav-toggle').on('click', function () {
			jQuery('nav').addClass('open');
		});
		jQuery('.nav-close').on('click', function () {
			jQuery('nav').removeClass('open');
		});

		jQuery('nav ul li a').on('click', function () {
			jQuery('nav').removeClass('open');
		});
	},

	scrollToggle: function () {
		jQuery('.scroll-toggle.down i').on('click', function () {
			jQuery.fn.fullpage.moveSectionDown();
		});

		jQuery('.scroll-toggle.up i').on('click', function () {
			$.fn.fullpage.moveTo('main');
		});
	},

	timeLineScrollBox: function () {
		if (jQuery('.timeline-box').length) {
			jQuery('.timeline-box > ul').mCustomScrollbar({
				mouseWheelPixels: 175
			});
		}
	},

	testimonialsBoxScrollBox: function () {
		if (jQuery('.testimonials-box').length) {
			jQuery('.testimonials-box li').mCustomScrollbar({
				mouseWheelPixels: 170
			});
		}
	},

	contactFormToggles: function () {
		jQuery('.contact-form .input-group input, .contact-form .input-group textarea, .search-form input').focusout(function () {
			var text_val = jQuery(this).val();

			if (text_val === "") {
				jQuery(this).removeClass('has-value');
			} else {
				jQuery(this).addClass('has-value');
			}
		});

		jQuery('.search-form input').keyup(function () {
			var text_val = jQuery(this).val();

			if (text_val.length === 0) {
				jQuery(this).removeClass('has-value');
			} else {
				jQuery(this).addClass('has-value');
			}
		});
	},

	testimonialsSlider: function () {
		if (jQuery('.testimonials-box').length) {

			jQuery('.testimonials-box .testimonials-slider').owlCarousel({
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem:true,
				pagination: false,
				navigation: false
			});

			var owl = jQuery('.testimonials-box .testimonials-slider');
 			owl.owlCarousel();

			// Custom Navigation Events
			jQuery(".slider-navigation .next").on('click', function () {
				owl.trigger('owl.next');
			});

			jQuery(".slider-navigation .prev").on('click', function () {
				owl.trigger('owl.prev');
			});
		}
	},

	projectCoverSlider: function () {
		if (jQuery('.project-cover').length) {
			jQuery('.project-cover ul').owlCarousel({
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem:true,
				pagination: false,
				navigation: false,
				rewindNav: false,
				afterInit: function () {
					jQuery('.project-cover .slider-nav span').text(this.owl.currentItem+1 + " from " + this.owl.owlItems.length);
				},
				afterAction: function () {
					jQuery('.project-cover .slider-nav span').text(this.owl.currentItem+1 + " from " + this.owl.owlItems.length);
				}
			});

			var owl = jQuery('.project-cover ul');
 			owl.owlCarousel();

			// Custom Navigation Events
			jQuery(".project-cover .next").on('click', function () {
				owl.trigger('owl.next');
			});

			jQuery(".project-cover .prev").on('click', function () {
				owl.trigger('owl.prev');
			});
		}
	},

	horizontalNavigation: function () {
		jQuery('.portfolio-item .details, .blog-item .view-post').on('click', function (e) {
			e.preventDefault();
			jQuery('body').addClass('opening-slide');

			setTimeout(function () {
				jQuery('body').removeClass('opening-slide');
			}, 2000);

			setTimeout(function () {
				jQuery.fn.fullpage.moveSlideRight();
			}, 1900);
		});

		jQuery('.go-back i').on('click', function () {
			jQuery.fn.fullpage.moveSlideLeft();
			jQuery('.slimScrollDiv').slimScroll({ scrollTo : '0px' });
		});
	},

	scrollToTop: function () {
		jQuery('.scroll-up i').on('click', function () {
			$('.slimScrollDiv').slimScroll({ scrollTo : '0px' });
		});
	},

	logoFix: function () {
		if (jQuery('body').hasClass('fp-viewing-portfolio') || jQuery('body').hasClass('fp-viewing-blog')) {
			jQuery('.brand img').attr('src', 'img/logo_black.png');
			jQuery('.mobile-brand').attr('src', 'img/logo_black.png');
		} else {
			jQuery('.brand img').attr('src', 'img/logo.png');
			jQuery('.mobile-brand').attr('src', 'img/logo.png');
		}
	},

	accordion: function () {
		jQuery('.collapse').on('shown.bs.collapse', function(){
			jQuery(this).parent().find(".fa").removeClass("fa-angle-down").addClass("fa-angle-up");
		}).on('hidden.bs.collapse', function(){
			jQuery(this).parent().find(".fa").removeClass("fa-angle-up").addClass("fa-angle-down");
		});
	}
};

(function () {
	'use strict';
	jQuery(document).ready(function(){
		teslaThemes.init();

		setTimeout(function(){
			jQuery('body').addClass('dom-ready');
		}, 2500);
	});
}());