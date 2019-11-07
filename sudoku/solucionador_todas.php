<?php
session_start();
?>


<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Sudoku - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/sudoku.css">
    </head>
    
    
    <body background="../img/background.jpg">
	<h1 align="center">Sudoku - David Álvarez</h1>
	<br>
	
	<?php
	// Leer el sudoku introducido por usuario.
	$sudoku = $_SESSION['sudoku'];
	
	// Guardar copia del sudoku inicial.
	$data = $sudoku;

	// Encontrar todas las soluciones del sudoku.
	include("code/solucionador_todas.php");

	// Mostrar soluciones (si existiera alguna).
	$n = sizeof($sols);
	if ($n == 0)
	    echo '<p align="center">No existe solución.</p>';
	for ($k = 0; $k < $n; ++$k) {
	    if ($n == 1)
		echo '<p align="center">Solución única:</p>';
	    else
		echo '<p align="center">Solución número '.($k + 1).':</p>';
	    echo '<table align="center" id="externo">';
	    for ($i = 0; $i < 9; ++$i) {
		if ($i == 2 or $i == 5)
		    echo '<tr id="grande">';
		else
		    echo '<tr id="normal">';
		for($j = 0; $j < 9; ++$j) {
		    if ($j == 2 or $j == 5)
			echo '<td id="lateral_gran">';
		    else
			echo '<td id="lateral_nor">';
		    if ($data[$i][$j] == 0)
			echo '<input style="color: red;" value="'.$sols[$k][$i][$j].'" disabled></td>';
		    else
			echo '<input style="color: black;" value="'.$sols[$k][$i][$j].'" disabled></td>';
		}
		echo '</tr>';
	    }
	    echo '</table>';
	    echo '<br/><br/><br/>';
	}
	?>
	<br/>
	<div align="center">
	    <button onclick="javascript:history.go(-2)">RETROCEDE</button>
	</div>

	<br/><br/><br/><br/>

    </body>
</html>
