function like(a, b) {
  var i = a;
  var e = b;

  $('#ilike' + a).toggleClass(function () {
    return "notLiked";

  });
  $('#ilike' + a).toggleClass(function () {
    return "liked";
  });
  $.ajax({
    url: "likeProcess.php",
    data: { pid: a, uid: b },
    type: "POST",
    success: function (data) {
      $("#like" + a).html(data);
    },
    error: function () { },
  });
}
function dislike(a, b) {
  var i = a;
  var e = b;

  $('#ilike' + a).toggleClass(function () {
    return "liked";
  });
  $('#ilike' + a).toggleClass(function () {
    return "notLiked";
  });

  $.ajax({
    url: "likeProcess.php",
    data: { pid: a, uid: b },
    type: "POST",
    success: function (data) {
      $("#like" + a).html(data);
    },
    error: function () { },
  });
}

// COMMENTS LIKE


function likecomment(a, b) {

  $('#lkdc' + a).toggleClass(function () {
    return "notLiked";

  });
  $('#lkdc' + a).toggleClass(function () {
    return "liked";
  });
  $.ajax({
    url: "likeProcessC.php",
    data: { cid: a, pid: b },
    type: "POST",
    success: function (data) {
      $("#likecom" + a).html(data);
    },
    error: function () { },
  });
}

function dislikecomment(a, b) {


  $('#lkdc' + a).toggleClass(function () {
    return "liked";

  });
  $('#lkdc' + a).toggleClass(function () {
    return "notLiked";
  });
  $.ajax({
    url: "likeProcessC.php",
    data: { cid: a, pid: b },
    type: "POST",
    success: function (data) {
      $("#likecom" + a).html(data);
    },
    error: function () { },
  });
}