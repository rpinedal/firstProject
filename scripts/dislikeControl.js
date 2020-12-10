function dislike(a, b) {
  var i = a;
  var e = b;
  $("#lkd" + a).attr("src", "likeidle.png");
  $("#clickedLike" + a).attr("onclick", "likeTwo(" + i + "," + e + ")");
  $.ajax({
    url: "dislikeProcess.php",
    data: { pid: a, uid: b },
    type: "POST",
    success: function (data) {
      $("#dlkd" + a).attr("src", "DIconv2.png");
      $("#like" + a).html(data);
      $("#clickedDislike" + a).attr(
        "onclick",
        "dislikeTwo(" + i + "," + e + ")"
      );
    },
    error: function () {},
  });
}

function dislikeTwo(a, b) {
  var i = a;
  var e = b;
  $("#clickedLike" + a).attr("onclick", "like(" + i + "," + e + ")");
  $("#lkd" + a).attr("src", "likeidle.png");
  $.ajax({
    url: "dislikeProcess.php",
    data: { pid: a, uid: b },
    type: "POST",
    success: function (data) {
      $("#dlkd" + a).attr("src", "dislikeIDLE.png");
      $("#like" + a).html(data);
      $("#clickedDislike" + a).attr("onclick", "dislike(" + i + "," + e + ")");
    },
    error: function () {},
  });
}
function dislikeCOM(c, d) {
  var i = c;
  var e = d;
  $("#lkdc" + c).attr("src", "likeidle.png");
  $("#clickedcLike" + c).attr("onclick", "likeCOMTwo(" + i + "," + e + ")");
  $.ajax({
    url: "dislikeProcessC.php",
    data: { Cid: c, Pid: d },
    type: "POST",
    success: function (data) {
      $("#dlkdc" + c).attr("src", "DIconv2.png");
      $("#likeCOM" + c).html(data);
      $("#clickedcDislike" + c).attr(
        "onclick",
        "dislikeCOMTwo(" + i + "," + e + ")"
      );
    },
    error: function () {},
  });
}
function dislikeCOMTwo(c, d) {
  var i = c;
  var e = d;
  $("#lkdc" + c).attr("src", "likeidle.png");
  $("#clickedcLike" + c).attr("onclick", "likeCOM(" + i + "," + e + ")");
  $.ajax({
    url: "dislikeProcessC.php",
    data: { Cid: c, Pid: d },
    type: "POST",
    success: function (data) {
      $("#dlkdc" + c).attr("src", "dislikeIDLE.png");
      $("#likeCOM" + c).html(data);
      $("#clickedcDislike" + c).attr(
        "onclick",
        "dislikeCOM(" + i + "," + e + ")"
      );
    },
    error: function () {},
  });
}
