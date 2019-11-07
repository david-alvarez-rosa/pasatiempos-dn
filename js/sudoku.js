// Función para solo aceptar números o teclas especiales.
function justNumbers(current, e) {
    if (current.getAttribute && current.value.length == 1)
	return false;
    
    // Allow: backspace, delete, tab, escape, enter and .    
    if (e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 27 || e.keyCode == 13 ||
        // Allow: Ctrl/cmd+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+C
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+X
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
    }
    
    // Ensure that it is a number and stop the keypress
    var keynum = window.event ? window.event.keyCode : e.which;
    return /\d/.test(String.fromCharCode(keynum));
}
