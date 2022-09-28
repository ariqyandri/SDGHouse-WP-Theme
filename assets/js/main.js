(function ($) {
  //Loading
  $(document).ready(function () {
    $("#loading").fadeOut(1000);
  });
  //

  // Show Map in Post
  $(".show_map").click(function () {
    const postId = $(this).attr("post-id");
    const map = $(`.post_img[post-id="${postId}"] iframe`);
    map.show();
    $(this).hide();
  });
  //

  // Default Button
  $(".wp-block-buttons .btn-default").click(function () {
    window.location = $(this).find("a").attr("href");
    return false;
  });
  $(".calendar-item").click(function () {
    window.location = $(this).find("a").attr("href");
    return false;
  });
  //

  // Acordian Function
  $(".slide-out").click(function () {
    $(".slide-out")
      .not(this)
      .children(".slide-title")
      .toggleClass("active", false);
    $(".slide-out").not(this).children(".slide-content").slideUp();
    $(this).find(".slide-out, .slide-content").slideToggle("slow");
    $(this).find(".slide-title").toggleClass("active");
  });
  //

  // SCROLL TO TOP/ Disount
  $(window).scroll(function () {
    if ($(this).scrollTop() >= 250) {
      $(".to-top").addClass("active");
    } else {
      $(".to-top").removeClass("active");
    }
  });

  // ===== Scroll to Top ====
  $(".to-top").click(function () {
    $("body,html").scrollTop(0);
  });
  //

  AOS.init({
    once: true, // whether animation should happen only once - while scrolling down
  });

  // window.location.replace("https://redirect.dcoders.nl/");
})(jQuery);
