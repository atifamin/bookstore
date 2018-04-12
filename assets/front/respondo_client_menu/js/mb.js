(function($)
{
  $(document).ready(function()
  {
    $(".nav-button").on("click", function()
    {
      if ($('nav').hasClass("right"))
      {
        $(this).addClass('right');
      }

      if ($('nav').hasClass("right"))
		{
			 $(this).addClass('right');
		}
	      
	    if ($("#mainmenu_preview").length) {
			if ($('#mainmenu').css('display') !== 'block' && $('#mainmenu_preview').css('display') === 'block') {
				$("#mainmenu_preview").slideUp('fast', function() {
					$(this).addClass('activate').css({'display': '', 'overflow': ''});
					$('#mainmenu').removeClass('activate');
				});
			}
			if ($('#mainmenu').css('display') === 'block' && $('#mainmenu_preview').css('display') === 'none') {
				$("#mainmenu").slideUp('fast', function() {
					$(this).addClass('activate').css({'display': '', 'overflow': ''});
					$('#mainmenu_preview').removeClass('activate');
				});
			}
			if ($('#mainmenu').css('display') !== 'block' && $('#mainmenu_preview').css('display') === 'none') {
				if ($("#mainmenu").hasClass('activate')) {
					$("#mainmenu").slideDown('fast', function() {
						$(this).removeClass('activate');
					});
				} else {
					$("#mainmenu").slideDown('fast', function() {
						$(this).removeClass('activate');
					});
				}
			}
		} else {
			if ($('#mainmenu').css('display') !== 'block') { // Hide submenu - Single button
				$("#mainmenu").slideDown('fast').css('overflow', '');
			} else {
				$("#mainmenu").slideUp('fast', function() {
					$(this).css({'display': '', 'overflow': ''});
				});
			}
		}
     });

    var lockNavBar = false;

    if (window.Modernizr.touch || navigator.userAgent.match(/Windows Phone/i))
    {
      $('ul > .has-flyout > a').on('click', function(e)
      {
        var flyout = $(this).siblings('.flyout').first();
        if (flyout.css('display') === 'none')
        {
          e.preventDefault();
          $('.flyout').not(flyout).slideUp(400);
          flyout.slideDown(400, function()
          {
            lockNavBar = true;
          });
        }
      });
      $('.nav>li.has-flyout', this).addClass('is-touch');
    }
    else
    {
      $('li.has-flyout').on("mouseenter",

      function()
      {
        $(this).children('.flyout').show();
      });
      $('li.has-flyout').on("mouseleave",

      function()
      {
        $(this).children('.flyout').hide();
      });
    }

    $(".select-nav").tinyNav();

    $(".tabs").delegate("li", "click", function(e)
    {
      e.preventDefault();
      $(".active").removeClass('active');
      $(this).addClass('active');
      var thisPane = $(this).children('a').attr('href');
      $(thisPane).addClass('active');
    });

    // unbind mouse events when outside iframe
    if ( $('iframe', parent.document).html() !== undefined ) {
      $('li.has-flyout').off("mouseenter");
      $('li.has-flyout').off("mouseleave");
    }

  });
})(jQuery);
