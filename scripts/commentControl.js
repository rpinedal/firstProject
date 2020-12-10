function setComment(a) {
  event.preventDefault();
  $("#" + a).css("color", "red");
  var info = $("#comment" + a).val();

  if (info) {
    $.ajax({
      url: "commentControl.php",
      data: { pid: a, comm: info },
      type: "POST",
      success: function (data) {
        $("#comments" + a).html(data);
      },
      error: function () { },
    });
  } else {
    alert("Se necesita su opinion.");
    return false;
  }
}
function setCommentFeed(a) {
  event.preventDefault();
  $("#" + a).css("color", "red");
  var info = $("#comment" + a).val();

  if (info) {
    $.ajax({
      url: "commentControl.php",
      data: { pid: a, comm: info },
      type: "POST",
      success: function (data) {
        $(data)
          .prependTo("#comments" + a)
          .html();

        $(data)
          .prependTo("#commentst2" + a)
          .html();
      },
      error: function () { },
    });
  } else {
    alert("Se necesita su opinion.");
    return false;
  }
}
