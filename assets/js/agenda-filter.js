(function ($) {
  function dateString(a) {
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var day = a.getDate();
    return (
      year +
      "-" +
      (month < 10 ? `0${month}` : month) +
      "-" +
      (day < 10 ? `0${day}` : day)
    );
  }
  var today = new Date();
  var nextWeek = new Date(today.getTime() + 7 * 24 * 60 * 60 * 1000);
  var nextMonth = new Date(today.getTime() + 30 * 24 * 60 * 60 * 1000);

  $(document).ready(function () {
    var items = $(".calendar-item");
    for (let i = 0; i < items.length; i++) {
      const item = items.eq(i);
      //https://stackoverflow.com/questions/33023806/typeerror-1-attr-is-not-a-function/33023820
      var dateTime = item.find(".agenda-date").attr("datetime");
      if (dateTime == dateString(today)) {
        // Today
        item.addClass("today");
      }
      if (dateTime >= dateString(today) && dateTime <= dateString(nextWeek)) {
        // This Week
        item.addClass("this-week");
      }
      if (dateTime >= dateString(today) && dateTime <= dateString(nextMonth)) {
        // This Month
        item.addClass("this-month");
      }
    }
  });
})(jQuery);
