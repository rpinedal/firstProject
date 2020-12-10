function openModal(a) {
  var modal = document.getElementById("myModal" + a);

  var btn = document.getElementById("comentar" + a);

  modal.style.display = "block";

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}

function loginNeeded(a) {
  var modal = document.getElementById("LoginModal" + a);

  modal.style.display = "block";

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}


function Editar(a) {
  var modal = document.getElementById("Editar" + a);

  modal.style.display = "block";

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}
