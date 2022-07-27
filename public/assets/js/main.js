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

$(document).ready(function () {
  $('input[type="radio"]').click(function () {
    var inputValue = $(this).attr("value");
    if (inputValue === "female") {
      $("#male-category").hide();
      $("#female-category").show();
    } else {
      $("#male-category").show();
      $("#female-category").hide();
    }
  });
});

const findOverflows = () => {
  const documentWidth = document.documentElement.offsetWidth;

  document.querySelectorAll('*').forEach(element => {
      const box = element.getBoundingClientRect();

      if (box.left < 0 || box.right > documentWidth) {
          console.log(element);
          element.style.border = '1px solid red';
      }
  });
};
 $(" #verifyPassword").on("keyup", function () {
   if ($("#newPassword").val() == $("#verifyPassword").val()) {
     $("#errmsg").html("Password match").css("color", "green");
   } else $("#errmsg").html("Password do not match").css("color", "red");
 });

function validate() {

  return $("#newPassword").val() === $("#verifyPassword").val();
   
 }

  function togglePassword1(id) {
    var x = document.getElementById(id);
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  
// Execute findOverflows to find overflows on the page.
findOverflows();

  
