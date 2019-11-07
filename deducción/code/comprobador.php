<?php
$deduc_w = array();
for ($i = 0; $i < 5; ++$i) {
    $deduc_w[$i] = array();
    for ($j = 0; $j < 5; ++$j)
	$deduc_w[$i][$j] = $deduc[$i][$j];
}

$deduc_n = array();
for ($i = 0; $i < 5; ++$i) {
    $deduc_n[$i] = array();
    for ($j = 5; $j < 7; ++$j)
	$deduc_n[$i][] = $deduc[$i][$j];
}

function last_check() {
    global $sol, $deduc_w, $deduc_n;
    for ($ip = 0; $ip < 5; ++$ip) {
	$cont1 = $cont2 = 0;
	for ($jp = 0; $jp < 5; ++$jp)
	    if (in_array($sol[$jp], $deduc_w[$ip])) {
		++$cont1;
		if ($sol[$jp] == $deduc_w[$ip][$jp])
		    ++$cont2;
	    }
	if ($cont1 != $deduc_n[$ip][0] or $cont2 != $deduc_n[$ip][1])
	    return false;
    }

    return true;
}


$correct = last_check();
?>
