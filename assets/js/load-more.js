(function ($) {
  //   https://stackoverflow.com/questions/31587210/load-more-posts-ajax-button-in-wordpress

  $("#more_posts").click(function (e) {
    e.preventDefault();
    var catButton = $(".filter_btn.active");
    var pageNumber = +catButton.attr("pn");
    var categoryId = catButton.data("id");
    //Ajax Call
    pageNumber = parseInt(pageNumber) + 1;
    var data = {
      action: "more_post_ajax",
      postType: $("#blogs").data("type"),
      categoryId: categoryId,
      latestId: $(".latest-blog").data("id"),
      pageNumber: pageNumber,
      ppp: $("#blogs").data("ppp"),
      security: ajax_posts.security,
    };
    $.post(ajax_posts.ajaxurl, data, function (response) {
      $("#blogs").append(response);
      if (response.length) {
        $(this).attr("disabled", false);
        var newBlogs = $(`.column.${categoryId}`);
        newBlogs.not(".show").addClass("show");
        catButton.attr("pn", pageNumber);
      } else {
        catButton.attr("max", 1);
        $("#display_blogs .unavailable").css("display", "block");
        $("#more_posts").css("display", "none");
      }
    });
  });

  $(".filter_btn").click(function () {
    var categoryId = $(this).data("id");
    var blogs = $(`.column.${categoryId}.show`);
    if (blogs.length != 0) {
      blogs.remove();
      $("#blogs").prepend(blogs);
      if ($(this).attr("max") != 1 ) {
        $("#more_posts").css("display", "flex");
      }
      return;
    }
    var data = {
      action: "fetch_post_ajax",
      postType: $("#blogs").data("type"),
      categoryId: categoryId,
      pageNumber: $(this).data("pn"),
      ppp: $("#blogs").data("ppp"),
      security: ajax_posts.security,
    };
    $.post(ajax_posts.ajaxurl, data, function (response) {
      $("#blogs").prepend(response);
      if (response.length) {
        var newBlogs = $(`.column.${categoryId}`);
        newBlogs.not(".show").addClass("show");
        $("#more_posts").css("display", "flex");
      }
    });
  });
})(jQuery);
