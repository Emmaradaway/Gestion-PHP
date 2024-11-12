function showOption(selectedCheckbox) {
    // Obtener todos los checkboxes con el nombre 'option'
    const checkboxes = document.querySelectorAll('input[name="option"]');
    
    // Iterar sobre cada checkbox
    checkboxes.forEach(checkbox => {
        const optionId = 'option_' + checkbox.value;
        const optionElement = document.getElementById(optionId);
        
        if (checkbox === selectedCheckbox) {
            // Si es el checkbox seleccionado, mostrar su sección
            checkbox.checked = true;
            optionElement.style.display = 'block';
        } else {
            // Desmarcar y ocultar secciones de otros checkboxes
            checkbox.checked = false;
            optionElement.style.display = 'none';
        }
    });
}