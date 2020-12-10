function changepass(a) {
  $("#loading").addClass("fa fa-spinner fa-spin");
  var info = $("#newpass").val();
  var info2 = $("#confirmpass").val();
  $.ajax({
    url: "passwordControl.php",
    data: { uId: a, nPass: info, cPass: info2 },
    type: "POST",
    success: function (data) {
      $("#loading").removeClass("fa fa-spinner fa-spin");
      $("#confirmchange").html(data);
    },
    error: function () { }
  });
}
