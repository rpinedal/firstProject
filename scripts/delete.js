function forDelete(a, b) {
  $.ajax({
    url: "delete.php",
    data: { pid: a, uid: b },
    type: "POST",
    beforeSend: function() {
      return confirm("Esta Seguro? Esto Borrara todo.");
    },
    success: function(data) {
      $("#delete" + a).html(data);
    },
    error: function() {}
  });
}


function commentDelete(c) {
  $.ajax({
    url: "comDelete.php",
    data: { cid: c },
    type: "POST",
    beforeSend: function() {
      return confirm("Esta Seguro? Esto Borrara el comentario.");
    },
    success: function(data) {
      $("#comdelete").html(data);
    },
    error: function() {}
  });
}