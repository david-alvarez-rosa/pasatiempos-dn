<?php
function correct($sudoku) {
    // Comprobación general del tablero.
    for ($i = 0; $i < 9; ++$i)
	for ($j = 0; $j < 9; ++$j)
	    if (!($sudoku[$i][$j] > 0 and $sudoku[$i][$j] < 10)) return false;
    
    // Comprobación de filas.
    for ($i = 0; $i < 9; ++$i) {
	$used = array_fill(0, 10, false);
	for ($j = 0; $j < 9; ++$j) {
	    if ($used[$sudoku[$i][$j]]) return false;
	    else $used[$sudoku[$i][$j]] = true;
	}
    }

    // Comprobación de columnas.
    for ($j = 0; $j < 9; ++$j) {
	$used = array_fill(0, 10, false);
	for ($i = 0; $i < 9; ++$i) {
	    if ($used[$sudoku[$i][$j]]) return false;
	    else $used[$sudoku[$i][$j]] = true;
	}
    }

    // Comprobación de cuadrados.
    for ($ip = 0; $ip < 3; ++$ip) {
	for ($jp = 0; $jp < 3; ++$jp) {
	    $used = array_fill(0, 10, false);	    
	    for ($i = 0; $i < 3; ++$i) {
		for ($j = 0; $j < 3; ++$j) {
		    if ($used[$sudoku[$ip*3 + $i][$jp*3 + $j]]) return false;
		    else $used[$sudoku[$ip*3 + $i][$jp*3 + $j]] = true;
		}
	    }
	}
    }

    return true;
}
?>
