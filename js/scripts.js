    var $ = jQuery.noConflict();

    $('.slider-home').slick({
        arrows: true,
        dots: true,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,    
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><svg id="arrow-left" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M229.9 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L94.569 282H436c6.627 0 12-5.373 12-12v-28c0-6.627-5.373-12-12-12H94.569l155.13-155.13c4.686-4.686 4.686-12.284 0-16.971L229.9 38.101c-4.686-4.686-12.284-4.686-16.971 0L3.515 247.515c-4.686 4.686-4.686 12.284 0 16.971L212.929 473.9c4.686 4.686 12.284 4.686 16.971-.001z" class=""></path></svg></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><svg id="arrow-right" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M218.101 38.101L198.302 57.9c-4.686 4.686-4.686 12.284 0 16.971L353.432 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h341.432l-155.13 155.13c-4.686 4.686-4.686 12.284 0 16.971l19.799 19.799c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L235.071 38.101c-4.686-4.687-12.284-4.687-16.97 0z" class=""></path></svg></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    arrow: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1                       
                }
            }          
        ]           
    });     

	$('.slider').slick({
		arrows: false,
		dots: true,
	  	slidesToShow: 1,
	  	slidesToScroll: 1,
	  	autoplay: true,
	  	autoplaySpeed: 5000,  	
        responsive: [
            {
                breakpoint: 767,
                settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }
            },
            {
                breakpoint: 468,
                settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }
            }            
        ]	  	
  	}); 	

	$('#slider-testimonios').slick({
		arrows: false,
		dots: true,
	  	slidesToShow: 3,
	  	slidesToScroll: 1,
	  	autoplay: true,
	  	autoplaySpeed: 6000,  
        responsive: [
            {
                breakpoint: 767,
                settings: {
	                slidesToShow: 2,
	                slidesToScroll: 2	                	
                }
            },
            {
                breakpoint: 468,
                settings: {            	
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }
            }            
        ]			  		
  	});	  		  	

	$('.carrusel-testimonios-convenios').slick({
		arrows: false,
		dots: true,
	  	slidesToShow: 1,
	  	slidesToScroll: 1,
	  	autoplay: true,
	  	autoplaySpeed: 5000,  
        responsive: [
            {
                breakpoint: 767,
                settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }
            },
            {
                breakpoint: 468,
                settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }
            }            
        ]			  		
  	});	 

	$('.carrusel-logos-convenios').slick({
		arrows: true,
		dots: false,
	  	slidesToShow: 5,
	  	slidesToScroll: 5,
	  	autoplay: true,
	  	autoplaySpeed: 5000,  
        responsive: [
            {
                breakpoint: 1200,
                settings: {
	                slidesToShow: 4,
	                slidesToScroll: 4	                	
                },	            	
                breakpoint: 767,
                settings: {
	                slidesToShow: 3,
	                slidesToScroll: 3	                	
                },
                breakpoint: 468,
                settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }	                
            }           
        ]			  		
  	});	 

	$('.carrusel-logos-convenios-interna').slick({
	    dots: true,
	    arrows: false,
	    slidesPerRow: 4,
	    rows: 2,
	    responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesPerRow: 3,
	        rows: 3,
	      },			      	    	
	      breakpoint: 767,
	      settings: {
	      	arrows: true,
	      	dots: false,
	        slidesPerRow: 2,
	        rows: 2,
	      }
	    }
	  ]
	});

    $('.carrusel-alianzas-estrategicas').slick({
        dots: true,
        arrows: false,
        slidesPerRow: 3,
        rows: 3,
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesPerRow: 3,
            rows: 3,
          },                            
          breakpoint: 767,
          settings: {
            arrows: true,
            dots: false,
            slidesPerRow: 2,
            rows: 2,
          }
        }
      ]
    });

    $('.carrusel-consejo-directivo').slick({
        arrows: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,  
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    dots: true,                     
                    slidesToShow: 2,
                    slidesToScroll: 1                       
                }
            },
            {
                breakpoint: 468,
                settings: {
                    arrows: false,
                    dots: true,                             
                    slidesToShow: 1,
                    slidesToScroll: 1                       
                }
            }            
        ]                   
    });  

	$('.slider-noticias').slick({
		arrows: false,
		dots: false,
	  	slidesToShow: 3,
	  	autoplay: true,
	  	autoplaySpeed: 5000,  
        responsive: [
            {
                breakpoint: 800,
                settings: {                         	
	                slidesToShow: 2,
	                slidesToScroll: 1	                	
                }
            },
            {
                breakpoint: 468,
                settings: { 	
					dots: true,	    	                                	
	                slidesToShow: 1,
	                slidesToScroll: 1	                	
                }
            }            
        ]			  		
  	});	 

    $('.carrusel-actividades').slick({
        arrows: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,  
        responsive: [
            {
                breakpoint: 800,
                settings: {                             
                    slidesToShow: 2,
                    slidesToScroll: 1                       
                }
            },
            {
                breakpoint: 468,
                settings: {     
                    dots: false,                                             
                    slidesToShow: 1,
                    slidesToScroll: 1                       
                }
            }            
        ]                   
    });  

    $('.mega-menu-item-651 a').addClass('go-to');
    
    $('a.go-to').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });    

    $('.ancla-forms').click(function(){
        $(this).tab('show');        
        $('.tab-content form').css('padding-top','70px')
    });

    $( "#open-dropdown" ).click(function() {
      $( "#dropdown-carreras" ).fadeToggle( "slow", "linear" );
    });

    $( "#dropdown-carreras a" ).click(function() {
      $( "#dropdown-carreras" ).fadeToggle( "slow", "linear" );
    });
        
    $( "#open-menu" ).click(function() {
      $( "#wrapper-navbar" ).fadeToggle( "slow", "linear" );
      $( ".toggle-mobile" ).fadeToggle( "slow", "linear" );
    });

    $( ".open-submenu" ).click(function() {
		$(this).find(".sub-menu").fadeToggle( "slow", "linear" );
      //$( ".open-submenu .sub-menu" ).fadeToggle( "slow", "linear" );
      $( this ).find("> a").toggleClass("activo");
    });

	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();
	    if (scroll >= 500) {
	        $(".cabecera-site").addClass("cabecera-site-fija");
	    } else {
	    	$(".cabecera-site").removeClass("cabecera-site-fija");
	    }
	});  

    $("#combo-temas").change(function(e){
      window.location = $(this).val();
    });    

    function init() {
      var vidDefer = document.getElementsByTagName('iframe');
      for (var i=0; i<vidDefer.length; i++) {
        if(vidDefer[i].getAttribute('data-src')) {
          vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
    } } }
    window.onload = init;    

//  ACTUALIZAR MODALS AL CERRARSE
$('.modal').on('hide.bs.modal', function() {
    var memory = $(this).html();
    $(this).html(memory);
});



    $('#slider-programas').slick({
        arrows: false,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,  
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2                       
                }
            },        
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2                       
                }
            },
            {
                breakpoint: 468,
                settings: {             
                    slidesToShow: 1,
                    slidesToScroll: 1                       
                }
            }            
        ]                   
    }); 

/*
var fixmeTop = $('#sidebar-novedades ').offset().top;       // get initial position of the element

$(window).scroll(function() {                  // assign scroll event listener

    var currentScroll = $(window).scrollTop(); // get current position

    if (currentScroll >= fixmeTop) {           // apply position: fixed if you
        $('#sidebar-novedades').css({                      // scroll to that element or below it
            position: 'fixed',
            top: '0',
            right: '0',
            zIndex: '1'
        });
    } else {                                   // apply position: static
        $('#sidebar-novedades').css({                      // if you scroll above it
            position: 'static'
        });
    }

});

*/

function moveScroller() {
    var $anchor = $("#scroller-anchor")
    var $scroller = $('#scroller')

    var move = function() {
        var st = $(window).scrollTop()
        var ot = $anchor.offset().top
        var scrollY = window.scrollY 
        var topft = window.scrollY + document.querySelector('#footer').getBoundingClientRect().top // Y
        if(st > ot) {
            $scroller.css({
                position: "fixed",
                top: "0px",
                maxWidth: "250px"
            });
        } else {
            $scroller.css({
                position: "relative",
                top: ""
            });
        }
        if (topft - scrollY <= 480) {
            //console.log('listo')
            $scroller.css({
                position: "relative",
                top: ""
            });            
        }
        //console.log('largo ventana ' + scrollY)
        //console.log('distancia footer ' + topft)
        
    };
    $(window).scroll(move);
    move();
}

if (window.matchMedia("(min-width: 992px)").matches) {
  $(function() {
    moveScroller();
  });
}