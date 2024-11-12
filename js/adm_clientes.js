document.addEventListener('DOMContentLoaded', function () {
    // Selección de elementos del DOM
    const btn_servicio = document.getElementById("openModalBtn");
    const modal_servicio = document.getElementById("modal_cliente");
    const cerrar_servicio = document.querySelectorAll(".close");
    const form_servicio = document.getElementById("form_agregar_cliente");
    const idCampo = document.getElementById("id_cliente"); // Campo oculto para el ID de servicio
    const botonesEditar = document.querySelectorAll('.btn-editar');

    // Función para limpiar el formulario
    function limpiar() {
        form_servicio.reset();
        idCampo.value = ''; // Limpia el campo ID
    }

    // Función para recargar la página
    function recargarPagina() {
        location.reload();
    }

    // Mostrar el modal para agregar un nuevo servicio
    btn_servicio.addEventListener("click", function () {
        limpiar(); // Limpia el formulario para asegurarse de que no haya datos previos
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
        if (event.target === modal_servicio) {
            modal_servicio.style.display = "none";
            limpiar();
        }
    });

    // Función para manejar el envío del formulario (inserción o actualización)
    form_servicio.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(form_servicio);

        if (idCampo.value) {
            // Si el campo `id` tiene un valor, se trata de una edición
            formData.append('id', idCampo.value); // Asegura que el ID se envíe en la actualización
            fetch('PHP/update_cliente.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Cliente actualizado exitosamente.');
                    modal_servicio.style.display = "none";
                    recargarPagina();
                } else {
                    console.log('Error al actualizar el servicio: ' + data);
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            // Si el campo `id` está vacío, se trata de una inserción
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "php/insert_cliente.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Cliente registrado correctamente");
                    modal_servicio.style.display = "none";
                    recargarPagina();
                }
            };
            xhr.send(formData);
        }
    });

    // Abrir el formulario en modo de edición
    botonesEditar.forEach(boton => {
        boton.addEventListener('click', function () {
            const id = boton.getAttribute('data-id');
            fetch(`php/get_cliente.php?id=${id}`)
                .then(response => {
                    if (!response.ok) { 
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Asignar los datos al formulario
                    document.getElementById('nombre').value = data.Nombre;
                    document.getElementById('telefono').value = data.Telefono;
                    document.getElementById('direccion').value = data.Direccion;
                    document.getElementById('correo').value = data.correo;
             
                    idCampo.value = id; // Establecer el ID en el campo oculto
                    modal_servicio.style.display = "block"; // Mostrar el modal para editar
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
