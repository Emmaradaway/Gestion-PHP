document.addEventListener('DOMContentLoaded', function () {
    
    const botonesEliminar = document.querySelectorAll('.btn-eliminar');

    
    botonesEliminar.forEach(boton => {
        boton.addEventListener('click', function () {
            const id = boton.getAttribute('data-id');

            
            if (confirm('¿Estás seguro de que quieres eliminar este doctor?')) {
                
                fetch(`php/delete_servicio.php?id=${id}`, {
                    method: 'POST'
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        boton.closest('tr').remove();
                        alert('Doctor eliminado exitosamente.');
                    } else {
                        alert('Error al eliminar el doctor.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});
