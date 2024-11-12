document.addEventListener('DOMContentLoaded', function () {
    
    const btnAbrirModal = document.getElementById("openModalBtn2");
    const modalCajero = document.getElementById("modal_cajero");
    const btnCerrarModal = document.querySelectorAll(".close");
    const formCajero = document.getElementById("form_cajero");
    const idCampoCajero = document.getElementById("id_cajero"); 
    const botonesEditarCajero = document.querySelectorAll(".btn-editar2");

    function limpiarCampos() {
        formCajero.reset();
        idCampoCajero.value = ''; 
    }

    
    function recargarPagina() {
        location.reload();
    }

    
    btnAbrirModal.addEventListener("click", function () {
        limpiarCampos(); 
        modalCajero.style.display = "block";
    });

    
    btnCerrarModal.forEach(function (btn) {
        btn.addEventListener("click", function () {
            modalCajero.style.display = "none";
            limpiarCampos();
            recargarPagina();
        });
    });

    
    window.addEventListener("click", function (event) {
        if (event.target === modalCajero) {
            modalCajero.style.display = "none";
            limpiarCampos();
        }
    });

    
    formCajero.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(formCajero);

        if (idCampoCajero.value) {
            formData.append('id', idCampoCajero.value); 
            fetch('PHP/update_cajero.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Cajero actualizado exitosamente.');
                    modalCajero.style.display = "none";
                    recargarPagina();
                } else {
                    console.log('Error al actualizar el cajero: ' + data);
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "PHP/insert_cajero.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Cajero registrado correctamente");
                    modalCajero.style.display = "none";
                    recargarPagina();
                }
            };
            xhr.send(formData);
        }
    });

    
    botonesEditarCajero.forEach(boton => {
        boton.addEventListener('click', function () {
            const id = boton.getAttribute('data-id');
            fetch(`PHP/get_cajero.php?id=${id}`)
                .then(response => {
                    if (!response.ok) { 
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    
                    document.getElementById('Nombre_cajero').value = data.Nombre; 
                    document.getElementById('Telefono_cajero').value = data.Telefono;      
                    document.getElementById('Correo_cajero').value = data.Correo;  

                    idCampoCajero.value = id; 
                    modalCajero.style.display = "block"; 
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
