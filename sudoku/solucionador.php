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
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Sudoku - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
	<br/><br/>
	
	<?php
	// Leer el sudoku introducido por usuario.
	$sudoku = array();
	for ($i = 0; $i < 9; ++$i) {
	    $sudoku[$i] = array();
	    for ($j = 0; $j < 9; ++$j) {
		if ($_POST[$i.$j] != '')
		    $sudoku[$i][$j] = $_POST[$i.$j];
		else $sudoku[$i][$j] = 0;
	    }
	}
	
	// Guardar sudoku introducido por el usuario en variable superglobal.
	$_SESSION['sudoku'] = $sudoku;
	
	// Guardar copia del sudoku inicial.
	$data = $sudoku;
	
	// Resolver sudoku.
	include("code/solucionador.php");

	// Mostrar solución (si exsitiera).
	if (!$exists_sol)
	    echo '<p align="center">No existe solución.</p>';
	else {
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
			echo '<input style="color: red;" value="'.$sudoku[$i][$j].'"  disabled></td>';
		    else
			echo '<input style="color: black;" value="'.$sudoku[$i][$j].'" disabled></td>';
		}
		echo '</tr>';
	    }
	    echo '</table>';
	}
	?>

	<div id="positioner_but1">
	    <button onclick="javascript:history.go(-1)">RETROCEDE</button>
	</div>
	
	<div id="positioner_but2">
	    <form action="solucionador_todas.php">
		<button>BUSCAR MÁS SOLUCIONES</button>
	    </form>
	</div>
	
    </body>
</html>
