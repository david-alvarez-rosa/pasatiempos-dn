function upperCaseF(a, to) {
    setTimeout(function() {
        a.value = a.value.toUpperCase();
	if (to != "not")
	    autoTab(a, to);
    }, 1);
}

function autoTab(current, to) {
    if (current.getAttribute && current.value.length==current.getAttribute("maxlength"))
        to.focus();
}
