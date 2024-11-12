// Selección de elementos
const btn_servicio = document.getElementById("openModalBtn");
const modal_servicio = document.getElementById("modal_servicio");
const cerrar_servicio = document.querySelectorAll(".cerrar");
const form_servicio = document.getElementById("form_servicio");

// Función para limpiar el formulario
function limpiar() {
  form_servicio.reset();
}

// Función para recargar la página
function recargarPagina() {
  location.reload();
}

// Mostrar el modal cuando se hace clic en el botón
btn_servicio.addEventListener("click", function () {
  modal_servicio.style.display = "block";
});

// Cerrar el modal cuando se hace clic en los botones de cierre
cerrar_servicio.forEach(function (btn) {
  btn.addEventListener("click", function () {
    modal_servicio.style.display = "none";
    limpiar();
    recargarPagina();
  });
});

// Cerrar el modal al hacer clic fuera de él
window.addEventListener("click", function (event) {
  if (event.target == modal_servicio) {
    modal_servicio.style.display = "none";
    limpiar();
  }
});

// Enviar el formulario con AJAX
form_servicio.addEventListener("submit", function (event) {
  event.preventDefault();

  const formData = new FormData(form_servicio);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert_servicio.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert("Registrado correctamente");
      modal_servicio.style.display = "none";
      recargarPagina();
    }
  };
  xhr.send(formData);
});
