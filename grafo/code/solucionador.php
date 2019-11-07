<?php
$sol = array();
$used = array_fill(0, 10, false);

$connect1 = [
    [0, 1, 2],
    [0, 2, 3, 5],
    [1, 2, 4, 6],
    [2, 5, 6],
    [3, 5, 7],
    [4, 6, 8],
    [5, 6, 7, 8],
];

$connect2 = [
    [0, 1],
    [0, 2],
    [0, 1, 2, 3],
    [1, 4],
    [2, 5],
    [1, 3, 4, 6],
    [2, 3, 5, 6],
    [4, 6],
    [5, 6],
];


function check($i, $j) {
    global $grafo, $connect1, $connect2, $sol;
    for ($k = 0; $k < sizeof($connect2[$i]); ++$k) {
	$kv = $connect2[$i][$k];
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


function solve($i) {
    global $used, $sol;
    
    if ($i == 9)
	return true;

    for ($j = 1; $j < 10; ++$j)
	if (!$used[$j]) {
	    $sol[$i] = $j;
	    $used[$j] = true;
	    if (check($i, $j))
		if (solve($i + 1)) return true;
	    $sol[$i] = 0;
	    $used[$j] = false;
	}

    return false;
}


$exists_sol = solve(0);
?>
