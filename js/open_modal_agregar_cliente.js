const bnt_cliente = document.getElementById("openModalBtn_2");
const modal_cliente= document.getElementById("modal_cliente");
const cerrar_cliente= document.querySelectorAll(".close");
const form_cliente = document.getElementById("form_agregar_cliente");
function limpiar() {
  form_cliente.reset();

}

function recargarPagina() {
  location.reload();
}

bnt_cliente.addEventListener("click", function () {
  modal_cliente.style.display = "block";
});

cerrar_cliente.forEach(function (btn) {
  btn.addEventListener("click", function () {
    modal_cliente.style.display = "none";
    limpiar();
    recargarPagina();
  });
});

window.addEventListener("click", function (event) {
  if (event.target == modal_cliente) {
    modal_cliente.style.display = "none";
    limpiar();
  }
});

form_cliente.addEventListener("submit", function (event) {
  event.preventDefault();

  const formData = new FormData(form_cliente);

  const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert_cliente.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status   === 200) {
      alert("Registrado correctamente");
      modal_cliente.style.display = "none";
    recargarPagina();
    }
  };
  xhr.send(formData);
});
