<?php
$connect1 = [
    [0, 1, 2],
    [0, 2, 3, 5],
    [1, 2, 4, 6],
    [2, 5, 6],
    [3, 5, 7],
    [4, 6, 8],
    [5, 6, 7, 8],
];


function correct() {
    global $grafo, $sol, $connect1;
    $used = array_fill(0, 10, false);
    
    for ($i = 0; $i < 9; ++$i) {
	if ($sol[$i] >= 1 and $sol[$i] <= 9)
	    $used[$sol[$i]] = true;
	else return false;
    }
    
    for ($i = 1; $i < 9; ++$i)
	if ($used[$i] == false)
	    return false;

    for ($k = 0; $k < 7; ++$k) {
	$value = 0;
	for ($l = 0; $l < sizeof($connect1[$k]); ++$l)
	    $value += $sol[$connect1[$k][$l]];
	if ($value != $grafo[$k])
	    return false;
    }
    
    return true;
}
?>
