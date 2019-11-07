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


function toggle(source, disti) {
    var eles = [];
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
	if (checkboxes[i].name.indexOf(disti) == 0) {
            eles.push(checkboxes[i]);
	}
    }

    for (var i = 0; i < eles.length; i++) {
        if (eles[i] != source)
            eles[i].checked = source.checked;
    }
}
