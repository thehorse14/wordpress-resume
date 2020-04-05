jQuery(document).ready(function($) {
  headerHeight = $(".header").height();
  $(window).scroll(function() {
    $(".section").each(function() {
      if ($(window).scrollTop() * 1.2 >= $(this).position().top) {
        $(".selected").removeClass("selected");
        var active_section;
        active_section = $(this);
        var active_link = $(
          '.navbar-list a[href="#' + active_section.attr("id") + '"]'
        );

        active_link.addClass("selected");
      }
    });

    if ($(window).scrollTop() >= headerHeight) {
      $(".navbar-list").addClass("navbar-background");
    } else {
      $(".navbar-background").removeClass("navbar-background");
    }
  });

  $("#sidebar").on("click", () => {
    $(".bar-container").removeClass("bar-container-hide");
    $(".sidebar").css({
      "left": "0px"
    });
  });

  $(".sidebar li a").on("click", () => {
    $(".bar-container").addClass("bar-container-hide");
    $(".sidebar").css({
      "left" : "-1000px"
    });
  })
});
