document.addEventListener('DOMContentLoaded', function () {
    
    const btn_servicio = document.getElementById("openModalBtn1");
    const modal_servicio = document.getElementById("modal_mecanico");
    const cerrar_servicio = document.querySelectorAll(".close");
    const form_servicio = document.getElementById("form_mecanicos");
    const idCampo = document.getElementById("id_mecanico"); 
    const botonesEditar = document.querySelectorAll(".btn-editar");

    
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
            fetch('PHP/update_mecanico.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Mecanico actualizado exitosamente.');
                    modal_servicio.style.display = "none";
                    recargarPagina();
                } else {
                    console.log('Error al actualizar el servicio: ' + data);
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "php/insert_mecanico.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Mecanico  registrado correctamente");
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
            fetch(`php/get_mecanico.php?id=${id}`)
                .then(response => {
                    if (!response.ok) { 
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    
                    document.getElementById('nombre_mecanico').value = data.Nombre_mecanico; 
                    document.getElementById('telefono').value = data.telefono;      
                    document.getElementById('direccion').value = data.DIreccion;  
                    document.getElementById('rfc').value = data.RFC;    
                    document.getElementById('n_estudios').value = data.N_estudios;     
                    document.getElementById('curp').value = data.CURP;     
                    document.getElementById('carrera').value = data.Carrera;     
                     

                    
             
                    idCampo.value = id; 
                    modal_servicio.style.display = "block"; 
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
