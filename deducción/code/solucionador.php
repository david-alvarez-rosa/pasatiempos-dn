<?php
$dict = file_get_contents('diccionario.txt');
$first = true;
$first_sol = array();

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

$letters = array();
for ($i = 0; $i < 5; ++$i)
    for ($j = 0; $j < 5; ++$j)
	if (!in_array($deduc_w[$i][$j], $letters))
	    $letters[] = $deduc_w[$i][$j];

$used = array_fill(0, sizeof($letters), false);
$sol = array_fill(0, 5, -1);


function last_check() {
    global $sol, $deduc_w, $deduc_n, $first, $first_sol;
    
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

    if ($first) {
	$first = false;
	$first_sol = $sol;
    }

    global $dict;
    if (stripos($dict, ' '.implode($sol).' ') !== false)
	return true;

    return false;
}


function check($i, $l) {
    global $sol, $deduc_w, $deduc_n;
    $sol[$i] = $l;
    for ($ip = 0; $ip < 5; ++$ip) {
	$cont1 = $cont2 = 0;
	for ($jp = 0; $jp < 5; ++$jp)
	    if (in_array($sol[$jp], $deduc_w[$ip])) {
		++$cont1;
		if ($sol[$jp] == $deduc_w[$ip][$jp])
		    ++$cont2;
	    }
	if ($cont1 > $deduc_n[$ip][0] or $cont2 > $deduc_n[$ip][1]) {
	    $sol[$i] = -1;
	    return false;
	}
    }

    $sol[$i] = -1;

    return true;
}


function solve($i) {
    global $letters, $sol, $used;
    
    if ($i == 5) {
	if (last_check()) return true;
	return false;
    }    

    for ($j = 0; $j < sizeof($letters); ++$j)
	if (!$used[$j] and check($i, $letters[$j])) {
	    $sol[$i] = $letters[$j];
	    $used[$j] = true;
	    if (solve($i + 1)) return true;
	    $sol[$i] = -1;
	    $used[$j] = false;	    
	}

    return false;
}


$exists_sol = solve(0);
if (!$first and !$exists_sol) {
    $exists_sol = true;
    $sol = $first_sol;
}
?>
