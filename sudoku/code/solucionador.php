<?php
// Declaraciones de las variables principales.
$rows = $columns = array();
for ($i = 0; $i < 9; ++$i) {
    $rows[$i] = $columns[$i] = array();
    for ($j = 0; $j < 10; ++$j)
	$rows[$i][$j] = $columns[$i][$j] = false;
}

$squa = array();
for ($i = 0; $i < 3; ++$i) {
    $squa[$i] = array();
    for ($j = 0; $j < 3; ++$j) {
	$squa[$j] = array();
	for ($k = 0; $k < 10; ++$k)
	    $squa[$i][$j][$k] = false;
    }
}


function fill() {
    global $sudoku, $rows, $columns, $squa;    
    for ($i = 0; $i < 9; ++$i)
	for ($j = 0; $j < 9; ++$j) {
	    $x = $sudoku[$i][$j];
	    $rows[$i][$x] = $columns[$j][$x] = $squa[floor($i/3)][floor($j/3)][$x] = true;
	}
}


function update($i, $j, $k, $to) {
    global $rows, $columns, $squa;
    $rows[$i][$k] = $columns[$j][$k] = $squa[floor($i/3)][floor($j/3)][$k] = $to;
}


function posible($i, $j, $k) {
    global $rows, $columns, $squa;
    if (!$rows[$i][$k] and !$columns[$j][$k]
	and !$squa[floor($i/3)][floor($j/3)][floor($k)]) return true;
    return false;
}


function solve($i, $j) {
    global $sudoku, $rows, $columns, $squa;
    if ($i == 9) return true;
    if ($j == 9) {
	if (solve($i + 1, 0)) return true;
	return false;
    }
    if ($sudoku[$i][$j] != 0) {
	if (solve($i, $j + 1)) return true;
	return false;
    }

    for ($k = 1; $k <= 9; ++$k)
	if (posible($i, $j, $k)) {
	    $sudoku[$i][$j] = $k;
	    update($i, $j, $k, true);
	    if (solve($i, $j + 1)) return true;
	    $sudoku[$i][$j] = 0;
	    update($i, $j, $k, false);
	}

    return false;
}


fill();
$exists_sol = solve(0, 0);
?>
