document.addEventListener('DOMContentLoaded', function () {
    
    const btnAbrirModalPago = document.getElementById("openModalBtn3");
    const modalPago = document.getElementById("modal_pago");
    const btnCerrarModalPago = document.querySelectorAll(".close");
    const formPago = document.getElementById("form_pago");
    const idCampoPago = document.getElementById("id_pago"); 
    const botonesEditarPago = document.querySelectorAll(".btn-editar3");

    function limpiarCampos() {
        formPago.reset();
        idCampoPago.value = ''; 
    }

    function recargarPagina() {
        location.reload();
    }

    btnAbrirModalPago.addEventListener("click", function () {
        limpiarCampos(); 
        modalPago.style.display = "block";
    });

    btnCerrarModalPago.forEach(function (btn) {
        btn.addEventListener("click", function () {
            modalPago.style.display = "none";
            limpiarCampos();
            recargarPagina();
        });
    });

    window.addEventListener("click", function (event) {
        if (event.target === modalPago) {
            modalPago.style.display = "none";
            limpiarCampos();
        }
    });

    formPago.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(formPago);

        if (idCampoPago.value) {
            formData.append('id', idCampoPago.value); 
            fetch('PHP/update_pago.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Forma de pago actualizada exitosamente.');
                    modalPago.style.display = "none";
                    recargarPagina();
                } else {
                    console.log('Error al actualizar la forma de pago: ' + data);
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "PHP/insert_pago.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Forma de pago registrada correctamente");
                    modalPago.style.display = "none";
                    recargarPagina();
                }
            };
            xhr.send(formData);
        }
    });

    botonesEditarPago.forEach(boton => {
        boton.addEventListener('click', function () {
            const id = boton.getAttribute('data-id');
            fetch(`PHP/get_pago.php?id=${id}`)
                .then(response => {
                    if (!response.ok) { 
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    
                    document.getElementById('pago').value = data.Descripcion; 

                    idCampoPago.value = id; 
                    modalPago.style.display = "block"; 
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
