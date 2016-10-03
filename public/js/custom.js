// Handle panel collapse
(function() {
  $('.closed[data-toggle="collapse"]').click(function(e) {
    var labelElement = null, label = '';

    if ($('#details-content').hasClass('in')) {
      $(this).removeClass('open').addClass('closed');
      $(this).find('i.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
      labelElement = $(this).find('.collapse-label');
      label = $(labelElement).text().replace('Hide', 'Show');
      $(labelElement).text(label);
    } else {
      $(this).removeClass('closed').addClass('open');
      $(this).find('i.fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
      labelElement = $(this).find('.collapse-label');
      label = $(labelElement).text().replace('Show', 'Hide');
      $(labelElement).text(label);
    }
  });
})();

  $(document).ready(function() {

    /* Autohide non-important alert messages */

    $('.alert').delay(5000).slideUp(300);

    $('.input-daterange input').each(function() {
      $(this).datepicker();
    });

    $("#upload-multiple-locations-btn").click(function(e) {
      e.preventDefault();
      var file_data = $('#multipleLocationsFile').prop('files')[0];

      var form_data = new FormData();
      form_data.append('file', file_data);
      // alert(form_data);

      $.ajax({
        url: '/data/allocateWeatherPoint/multiple/uploadLocations',
        type: "post",
        data: form_data,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          var status = '';
          var message = '';
          var errors = '';

          $.each(data, function(index, element) {
            if (index === 'status') {
              status = element;
            }

            if (index === 'message') {
              message = element;
            }

            if (index === 'errors') {
              errors = element;
            }
          });

          if (status === 'success') {

            $('#uploadResultSuccess').css('display', 'block');
            $('#uploadResultSuccess').append('<p>' + message + '<p>');

          } else if (status === 'error') {

            $('#uploadResultError').css('display', 'block');
            $('#uploadResultError').append('<p>' + message + '<p>');
            $('#uploadResultError').append('<p>' + errors + '<p>');

          }
        }
      });
    });
  });


  /*
    $(window).resize(function()
    {
      if($(window).width() >= 765){
        $(".sidebar #nav").slideDown(350);
      }
      else{
        $(".sidebar #nav").slideUp(350);
      }
    }); */

  $(".has_sub > a").click(function(e) {
    e.preventDefault();
    var menu_li = $(this).parent("li");
    var menu_ul = $(this).next("ul");

    if (menu_li.hasClass("open")) {
      menu_ul.slideUp(350);
      menu_li.removeClass("open")
    } else {
      $("#nav > li > ul").slideUp(350);
      $("#nav > li").removeClass("open");
      menu_ul.slideDown(350);
      menu_li.addClass("open");
    }

    $(".sidebar-dropdown a").on('click', function(e) {
      e.preventDefault();

      if (!$(this).hasClass("open")) {
        // open our new menu and add the open class
        $(".sidebar #nav").slideDown(350);
        $(this).addClass("open");
      } else {
        $(".sidebar #nav").slideUp(350);
        $(this).removeClass("open");
      }
    });

    /* Widget close */

    $('.wclose').click(function(e) {
      e.preventDefault();
      var $wbox = $(this).parent().parent().parent();
      $wbox.hide(100);
    });

    /* Widget minimize */

    $('.wminimize').click(function(e) {
      e.preventDefault();
      var $wcontent = $(this).parent().parent().next('.widget-content');
      if ($wcontent.is(':visible')) {
        $(this).children('i').removeClass('fa fa-chevron-up');
        $(this).children('i').addClass('fa fa-chevron-down');
      } else {
        $(this).children('i').removeClass('fa fa-chevron-down');
        $(this).children('i').addClass('fa fa-chevron-up');
      }
      $wcontent.toggle(500);
    });

    /* Scroll to Top */


    $(".totop").hide();

    $(function() {
      $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
          $('.totop').fadeIn();
        } else {
          $('.totop').fadeOut();
        }
      });

      $('.totop a').click(function(e) {
        e.preventDefault();
        $('body,html').animate({
          scrollTop: 0
        }, 500);
      });
    });

    $('.noty-alert').click(function(e) {
      e.preventDefault();
      noty({
        text: 'Some notifications goes here...',
        layout: 'topRight',
        type: 'alert',
        timeout: 2000
      });
    });

    $('.noty-success').click(function(e) {
      e.preventDefault();
      noty({
        text: 'Some notifications goes here...',
        layout: 'top',
        type: 'success',
        timeout: 2000
      });
    });

    $('.noty-error').click(function(e) {
      e.preventDefault();
      noty({
        text: 'Some notifications goes here...',
        layout: 'topRight',
        type: 'error',
        timeout: 2000
      });
    });

    $('.noty-warning').click(function(e) {
      e.preventDefault();
      noty({
        text: 'Some notifications goes here...',
        layout: 'bottom',
        type: 'warning',
        timeout: 2000
      });
    });

    $('.noty-information').click(function(e) {
      e.preventDefault();
      noty({
        text: 'Some notifications goes here...',
        layout: 'topRight',
        type: 'information',
        timeout: 2000
      });
    });

    /* Modal fix */

    $('.modal').appendTo($('body'));

    /**
     * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
     */
    $(function() {
      function reposition() {
        var modal = $(this),
          dialog = modal.find('.modal-dialog');
        modal.css('display', 'block');

        // Dividing by two centers the modal exactly, but dividing by three
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
      }
      // Reposition when a modal is shown
      $('.modal').on('show.bs.modal', reposition);
      // Reposition when the window is resized
      $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
      });
    });
  });


  function hideSidebar() {
    $('.sidebar').addClass('hide');
    $('.mainbar').css('margin-left', '0');
  }

  function fullScreen() {
    $('header').addClass('hide');
    $('.sidebar').addClass('hide');
    $('body').css({
      'padding-top': '0',
      'background': '#fff'
    });
    $('.mainbar').css({
      'margin-left': '0',
      'min-height': 'auto'
    });
  }