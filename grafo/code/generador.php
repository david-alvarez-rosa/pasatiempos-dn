<?php
$sol = $used = $grafo = array();

$connect1 = [
    [0, 1, 2],
    [0, 2, 3, 5],
    [1, 2, 4, 6],
    [2, 5, 6],
    [3, 5, 7],
    [4, 6, 8],
    [5, 6, 7, 8],
];

$connect2_ntf = [
    [0, 1],
    [0, 2],
    [0, 1, 2, 3],
    [1, 4],
    [2, 5],
    [1, 3, 4],
    [2, 3, 5],
    [4],
    [5],
];


function check_ntf($i, $j) {
    global $grafo, $connect1, $connect2_ntf, $sol;
    for ($k = 0; $k < sizeof($connect2_ntf[$i]); ++$k) {
	$kv = $connect2_ntf[$i][$k];
	$filled = true;
	$value = 0;
	for ($l = 0; $l < sizeof($connect1[$kv]); ++$l) {
	    if ($sol[$connect1[$kv][$l]] == 0) $filled = false;
	    $value += $sol[$connect1[$kv][$l]];
	}
	if ($filled and $value != $grafo[$kv]) return false;
    }
    return true;
}


function solve_ntf($i) {
    global $used, $sol;
    
    if ($i == 9)
	return true;

    for ($j = 1; $j < 10; ++$j)
	if (!$used[$j]) {
	    $sol[$i] = $j;
	    $used[$j] = true;
	    if (check_ntf($i, $j))
		if (solve_ntf($i + 1)) return true;
	    $sol[$i] = 0;
	    $used[$j] = false;
	}

    return false;
}


function prepare() {
    global $used, $sol;
    $sol = array_fill(0, 9, 0);
    $used = array_fill(0, 10, false);
}


function generate($n) {
    $cont = 0;
    $grafos = array();
    global $grafo, $sol;

    while ($cont < $n) {
	for ($i = 0; $i < 6; ++$i) {
	    if ($i == 0 or $i == 3 or $i == 4 or $i == 5)
		$grafo[$i] = rand(6, 24);
	    else
		$grafo[$i] = rand(10, 31);
	}
	$grafo[6] = -1;

	prepare();
	if (solve_ntf(0)) {
	    $grafo[6] = $sol[5] + $sol[6] + $sol[7] + $sol[8];
	    $grafos[sizeof($grafos)] = $grafo;
	    ++$cont;
	}
    }

    return $grafos;
}
?>
