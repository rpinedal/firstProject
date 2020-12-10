function recover() {
  $("#loading").addClass("fa fa-spinner fa-spin");
  var info = $("#forgotpassword").val();
  $.ajax({
    url: "phpmail.php",
    data: { umail: info },
    type: "POST",
    success: function(data) {
      $("#loading").removeClass("fa fa-spinner fa-spin");
      $("#forgot").html(data);
    },
    error: function() {}
  });
}
