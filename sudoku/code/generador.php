<?php
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


$percentage_build = 50;
$found = false;
while (!$found) {
    $sudoku = array_fill(0, 9, (array_fill(0, 9, 0)));
    $rows = $columns = array_fill(0, 9, array_fill(0, 10, false));
    $squa = array_fill(0, 3, array_fill(0, 3, array_fill(0, 10, false)));

    for ($i = 0; $i < 9; ++$i)
	for ($j = 0; $j < 9; ++$j)
	    if (rand(0, 100) > $percentage_build) {
		$bug = 0;
		while ($bug < 15) {
		    $x = rand(1, 9);
		    if (posible($i, $j, $x)) {
			$sudoku[$i][$j] = $x;
			update($i, $j, $x, true);			
			$bug = 20;
		    }
		    ++$bug;
		}
	    }

    if (solve(0, 0)) $found = true;
}
?>
