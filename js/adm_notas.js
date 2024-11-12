document.addEventListener('DOMContentLoaded', function () {
    
    const btn_servicio = document.getElementById("openModalBtn");
    const modal_servicio = document.getElementById("modal_carro");
    const cerrar_servicio = document.querySelectorAll(".close");
    const form_servicio = document.getElementById("form_nota");
    const idCampo = document.getElementById("id_nota"); 
    const botonesEditar = document.querySelectorAll('.btn-editar');

    
    function limpiar() {
        form_servicio.reset();
        idCampo.value = ''; 
    }

    
    function recargarPagina() {
        location.reload();
    }

    
    btn_servicio.addEventListener("click", function () {
        limpiar(); 
        modal_servicio.style.display = "block";
    });

    
    cerrar_servicio.forEach(function (btn) {
        btn.addEventListener("click", function () {
            modal_servicio.style.display = "none";
            limpiar();
            recargarPagina();
        });
    });

    
    window.addEventListener("click", function (event) {
        if (event.target === modal_servicio) {
            modal_servicio.style.display = "none";
            limpiar();
        }
    });

    
    form_servicio.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(form_servicio);

        if (idCampo.value) {
            
            formData.append('id', idCampo.value); 
            fetch('PHP/update_nota.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Nota actualizado exitosamente.');
                    modal_servicio.style.display = "none";
                    recargarPagina();
                } else {
                    console.log('Error al actualizar el nota: ' + data);
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "php/insert_nota.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Nota registrado correctamente");
                    modal_servicio.style.display = "none";
                    recargarPagina();
                }
            };
            xhr.send(formData);
        }
    });

    
    botonesEditar.forEach(boton => {
        boton.addEventListener('click', function () {
            const id = boton.getAttribute('data-id');
            fetch(`php/get_notas.php?id=${id}`)
                .then(response => {
                    if (!response.ok) { 
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    document.getElementById('servicio').value = data.servicio_id; 
                    document.getElementById('cajero').value = data.cajero_id;      
                    document.getElementById('fecha').value = data.fecha;  
                    document.getElementById('f_p').value = data.forma_pago_id;    
                    document.getElementById('total').value = data.total;
                       

                    
             
                    idCampo.value = id; 
                    modal_servicio.style.display = "block"; 
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
