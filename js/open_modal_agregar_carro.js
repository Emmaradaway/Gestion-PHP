// Selección de elementos
const btn_carro = document.getElementById("openModalBtn_3");
const modal_carro = document.getElementById("modal_carro");
const cerrar_carro = document.querySelectorAll(".close");
const form_carro = document.getElementById("form_carro");

// Función para limpiar el formulario
function limpiar() {
  form_carro.reset();
}

// Función para recargar la página
function recargarPagina() {
  location.reload();
}

// Mostrar el modal cuando se hace clic en el botón
btn_carro.addEventListener("click", function () {
  modal_carro.style.display = "block";
});

// Cerrar el modal cuando se hace clic en los botones de cierre
cerrar_carro.forEach(function (btn) {
  btn.addEventListener("click", function () {
    modal_carro.style.display = "none";
    limpiar();
    recargarPagina();
  });
});

// Cerrar el modal al hacer clic fuera de él
window.addEventListener("click", function (event) {
  if (event.target == modal_carro) {
    modal_carro.style.display = "none";
    limpiar();
  }
});

// Enviar el formulario con AJAX
form_carro.addEventListener("submit", function (event) {
  event.preventDefault();

  const formData = new FormData(form_carro);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert_carro.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert("Registrado correctamente");
      modal_carro.style.display = "none";
      recargarPagina();
    }
  };
  xhr.send(formData);
});
