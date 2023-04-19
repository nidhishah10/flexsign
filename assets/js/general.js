/* Custom General jQuery
/*--------------------------------------------------------------------------------------------------------------------------------------*/
;(function($, window, document, undefined) {
	//Genaral Global variables
	//"use strict";
	var $win = $(window);
	var $doc = $(document);
	var $winW = function(){ return $(window).width(); };
	var $winH = function(){ return $(window).height(); };
	var $screensize = function(element){  
			$(element).width($winW()).height($winH());
		};
		
		var screencheck = function(mediasize){
			if (typeof window.matchMedia !== "undefined"){
				var screensize = window.matchMedia("(max-width:"+ mediasize+"px)");
				if( screensize.matches ) {
					return true;
				}else {
					return false;
				}
			} else { // for IE9 and lower browser
				if( $winW() <=  mediasize ) {
					return true;
				}else {
					return false;
				}
			}
		};

	$doc.ready(function() {
/*--------------------------------------------------------------------------------------------------------------------------------------*/		
		// Remove No-js Class
		$("html").removeClass('no-js').addClass('js');
		
		
		
		/* Get Screen size
		---------------------------------------------------------------------*/
		$win.on('load', function(){
			$win.on('resize', function(){
				$screensize('your selector');	
			}).resize();	
		});
		
		
		/* Menu ICon Append prepend for responsive
		---------------------------------------------------------------------*/
		$(window).on('resize', function(){
			if (screencheck(1023)) {
				if(!$('#menu').length){
					$('#mainmenu').prepend('<a href="#" id="menu" class="menulines-button"><span class="menulines"></span> <em>Menu</em></a>');
				}
			} else {
				$("#menu").remove();
			}
		}).resize();

		
		/* Tab Content box 
		---------------------------------------------------------------------*/
		var tabBlockElement = $('.tab-data');
			$(tabBlockElement).each(function() {
				var $this = $(this),
					tabTrigger = $this.find(".tabnav li"),
					tabContent = $this.find(".tabcontent");
					var textval = [];
					tabTrigger.each(function() {
						textval.push( $(this).text() );
					});	
				$this.find(tabTrigger).first().addClass("active");
				$this.find(tabContent).first().show();

				$(tabTrigger).on('click',function () {
					$(tabTrigger).removeClass("active");
					$(this).addClass("active");
					$(tabContent).hide().removeClass('visible');
					var activeTab = $(this).find("a").attr("data-rel");
					$this.find('#' + activeTab).fadeIn('normal').addClass('visible');
								
					return false;
				});
			
				var responsivetabActive =  function(){
				if (screencheck(767)){
					if( !$this.find('.tabMobiletrigger').length ){
						$(tabContent).each(function(index) {
							$(this).before("<h2 class='tabMobiletrigger'>"+textval[index]+"</h2>");	
							$this.find('.tabMobiletrigger:first').addClass("rotate");
						});
						$('.tabMobiletrigger').click('click', function(){
							var tabAcoordianData = $(this).next('.tabcontent');
							if($(tabAcoordianData).is(':visible') ){
								$(this).removeClass('rotate');
								$(tabAcoordianData).slideUp('normal');
								//return false;
							} else {
								$this.find('.tabMobiletrigger').removeClass('rotate');
								$(tabContent).slideUp('normal');
								$(this).addClass('rotate');
								$(tabAcoordianData).not(':animated').slideToggle('normal');
							}
							return false;
						});
					}
						
				} else {
					if( $('.tabMobiletrigger').length ){
						$('.tabMobiletrigger').remove();
						tabTrigger.removeClass("active");
						$this.find(tabTrigger).removeClass("active").first().addClass('active');
						$this.find(tabContent).hide().first().show();				
					}		
				}
			};
			$(window).on('resize', function(){
				if(!$this.hasClass('only-tab')){
					responsivetabActive();
				}
			}).resize();
		});
		
		/* Accordion box JS
		---------------------------------------------------------------------*/
		$('.accordion-databox').each(function() {
			var $accordion = $(this),
				$accordionTrigger = $accordion.find('.accordion-trigger'),
				$accordionDatabox = $accordion.find('.accordion-data');
				
				$accordionTrigger.first().addClass('open');
				$accordionDatabox.first().show();
				
				$accordionTrigger.on('click',function (e) {
					var $this = $(this);
					var $accordionData = $this.next('.accordion-data');
					if( $accordionData.is($accordionDatabox) &&  $accordionData.is(':visible') ){
						$this.removeClass('open');
						$accordionData.slideUp(400);
						e.preventDefault();
					} else {
						$accordionTrigger.removeClass('open');
						$this.addClass('open');
						$accordionDatabox.slideUp(400);
						$accordionData.slideDown(400);
					}
				});
		});
		
		
		/* Mobile menu click
		---------------------------------------------------------------------*/
		$(document).on('click',"#menu", function(){
			$(this).toggleClass('menuopen');
			$(this).next('ul').slideToggle('normal');
			return false;
		});


		/* Header Sticky
		---------------------------------------------------------------------*/
		if($("#header").length) {
			$(window).scroll(function() {
				var headerHeight = $('#header').outerHeight() + 100;
				if( $(this).scrollTop() > headerHeight ) {
					$("#header").addClass("sticky");
				} else {
					$("#header").removeClass("sticky");
				}
			});
			var header = document.querySelectorAll('#header');
			Stickyfill.add(header);
		}


		if($('.project-main-slide').length) {
			$('.project-main-slide').owlCarousel({
				loop:false,
				nav:false,
				dots:true,
				margin:40,
				items: 2,
				smartSpeed: 900,
				responsive:{
					0:{
						items:1
					},
					768:{
						items:2
					},
					1024:{
						items:2
					}
				}
			})
		}

		// Read more button for Projects slider
		if($('.readmore-trigger').length) {
			var readMore = $('.readmore-trigger'),
				moreText = "Lees meer",
				lessText = "Less minder";
			readMore.on('click', function () {
				// console.log(moreText);
				// console.log(lessText);
				var $this = $(this),
					moreDataParent = $this.parents('.prj-detail-block'),
					moreData = $this.parents('.prj-detail-block').find('.more-data');
					// moreText = $this.text(),
					// lessText = $this.attr('data-less');

				if(moreData.is(':hidden')){
					moreData.show();
					moreDataParent.addClass('active');
					$this.addClass('active');
					$this.find('span').text(lessText);
				} else {
					moreData.hide();
					moreDataParent.removeClass('active');
					$this.removeClass('active');
					$this.find('span').text(moreText);
				}
				return false
				
			})
		}

		if($('.prj-img-slide').length) {
			$('.prj-img-slide').owlCarousel({
				loop:false,
				nav:true,
				dots:false,
				items: 1,
				smartSpeed: 700,
			})
		}

		$(".about-content .close").click(function(){
			$(this).parents(".about-content").fadeOut(200);
			return false
		});

		$(".mtr-info .close").click(function(){
			$(this).parents(".mtr-info").fadeOut(200);
			return false
		});
		
		// $(".mtr-details").click(function(){
		// 	$(".mtr-info").show();
		// });


		// Get the last item of row
		function calculateLIsInRow() {
			var lisInRow = 0;
			$('.material-row .mtr-details').each(function() {
				$(this).removeClass("last-item");
				if($(this).prev().length > 0) {
					if($(this).position().top != $(this).prev().position().top) {
						$(this).prev().addClass("last-item");
					}
					lisInRow++;
				}
				else {
					lisInRow++;   
				}
				if($(this).next().length > 0) {
				}
				else {
					$(this).addClass("last-item");
				}
			});
		}
		calculateLIsInRow();
		$(window).resize(calculateLIsInRow);



		$(document).on('click', '.mtr-details', function(){
			if($(this).children('.mtr-info').is(':visible')) {
				$(this).children('.mtr-info').fadeOut(300);
			} else {
				$('.mtr-info').fadeOut(300);
				$(this).children('.mtr-info').fadeIn(300);
			}
			return false;
		})

		$(document).on('click', '.work-info-block', function(){
			if($(this).children('.about-content').is(':visible')) {
				$(this).children('.about-content').fadeOut(300);
			} else {
				$('.about-content').fadeOut(300);
				$(this).children('.about-content').fadeIn(300);
			}
			return false;
		})

		// More click
		$(document).on('click', '.see-more a', function(){
			$(this).parents('.see-more').fadeOut(300);
			return false;
		})

		// character-control
		
		
/*--------------------------------------------------------------------------------------------------------------------------------------*/		
	});	

/*All function need to define here for use strict mode
----------------------------------------------------------------------------------------------------------------------------------------*/


	
/*--------------------------------------------------------------------------------------------------------------------------------------*/
})(jQuery, window, document);