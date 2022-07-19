$(document).ready(function () {
  jQuery(function ($) {
    var path = window.location.href;
    $(".nav-links").each(function () {
      if (this.href === path) {
        $(this).addClass("activated");
      }
    });
  });
});

$(document).ready(function () {
  jQuery(function ($) {
    var path = window.location.href;
    $(".contest").each(function () {
      if (this.href === path) {
        $(this).addClass("activated");
      }
      if (path.includes("contests")) {
        $(this).addClass("activated");
      } else {
        return null;
      }
    });
  });
});

$(document).ready(function () {
  jQuery(function ($) {
    $(".vote-btn").click(function () {
      $("#Modal").css({
        display: "block",
        color: "white",
      });
    });

    $("#dismiss").click(function () {
      $("#Modal").css({
        display: "none",
        color: "transparent",
      });
    });
  });
});

$(document).ready(function () {
  $(".carousel").slick({
    centerMode: true,
    centerPadding: "10px",
    // appendArrows:$('.app'),
    adaptiveHeight: true,
    focusOnSelect: true,
    slidesToShow: 3,
    prevArrow: $(".prev"),
    nextArrow: $(".next"),
    appendArrows: $(".carousel"),
    // prevArrow: $('#but'),
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: "10px",
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });
});

$(document).ready(function() {
  $('input[type="radio"]').click(function() {
      var inputValue = $(this).attr("value");
      if (inputValue === 'female') {
          $('#male-category').hide();
          $('#female-category').show();
      } else {
          $('#male-category').show();
          $('#female-category').hide();
      }
  });
});
