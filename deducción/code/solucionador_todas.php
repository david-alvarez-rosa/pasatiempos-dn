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

$letters = array();
for ($i = 0; $i < 5; ++$i)
    for ($j = 0; $j < 5; ++$j)
	if (!in_array($deduc_w[$i][$j], $letters))
	    $letters[] = $deduc_w[$i][$j];

$sol = array_fill(0, 5, -1);
$sols = array();


function save_sol() {
    global $sols, $sol;
    $sols[] = $sol;
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
    global $letters, $sol;
    
    if ($i == 5) {
	if (last_check())
	    return save_sol();
	else
	    return;
    }
    
    for ($j = 0; $j < sizeof($letters); ++$j)
	if (check($i, $letters[$j])) {
	    $sol[$i] = $letters[$j];
	    solve($i + 1);
	    $sol[$i] = -1;
	}
}


function re_sort2() {

}


$sols_no = $sols_yes = array();
function re_sort() {
    global $dict, $sols, $sols_no, $sols_yes;
    for ($k = 0; $k < sizeof($sols); ++$k) {
	if (stripos($dict, ' '.implode($sols[$k]).' ') !== false)
	    $sols_yes[] = $sols[$k];
	else
	    $sols_no[] = $sols[$k];		
    }

    re_sort2();
    $sols = array_merge($sols_yes, $sols_no);

    return sizeof($sols_yes);
}


solve(0);
$dict = file_get_contents('diccionario.txt');

$dict_div = re_sort();
?>
