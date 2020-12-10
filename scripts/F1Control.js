function follow(a, b) {
  event.preventDefault();
  $.ajax({
    url: "followProcess.php",
    data: {
      fid: a
    },
    type: "POST",
    success: function (data) {
      if (b) {
        $("#F1C" + b).html(data);
        $("#F1C" + b).attr("onclick", "unfollow(" + a + ", " + b + ")");
        $("#F1C" + b).attr("id", "F1U" + a);
      } else {
        $("#F1C").html(data);
        $("#F1C").attr("onclick", "unfollow(" + a + ", " + b + ")");
        $("#F1C").attr("id", "F1U");
      }
    },
    error: function () { }
  });
}

function unfollow(a, b) {
  event.preventDefault();
  $.ajax({
    url: "unfollowProcess.php",
    data: {
      fid: a
    },
    type: "POST",
    success: function (data) {
      if (b) {
        $("#F1U" + b).html(data);
        $("#F1U" + b).attr("onclick", "follow(" + a + ", " + b + ")");
        $("#F1U" + b).attr("id", "F1C" + a);
      } else {
        $("#F1U").html(data);
        $("#F1U").attr("onclick", "follow(" + a + "," + b + ")");
        $("#F1U").attr("id", "F1C");
      }
    },
    error: function () { }
  });
}
