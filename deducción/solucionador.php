<?php
session_start();
?>


<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Deducción - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/deduccion.css">
	<script src="../js/deduccion.js"></script>
    </head>

    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Deducción - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
	<br/><br/><br/><br/>

	<?php
	// Leer deducción introducida.
	$deduc = array();
	for ($i = 0; $i < 5; ++$i) {
	    $deduc[$i] = array();
	    for ($j = 0; $j < 7; ++$j)
		$deduc[$i][$j] = $_POST['i'.$i.$j];
	}

	// Guardar deducción introducida por el usuario en variable superglobal.
	$_SESSION['deduc'] = $deduc;

	// Buscar solución.
	include('code/solucionador.php');

	// Mostrar solución (si existiera).
	if (!$exists_sol)
	    echo '<p align="center">No existe solución.</p>';

	else {
	    echo '<table align="center">';
	    
	    for ($i = 0; $i < 5; ++$i) {
		echo '<tr>';
		for ($j = 0; $j < 7; ++$j) {
		    if ($j == 5)
			echo '<td id="separator"></td>';
		    else if ($j == 6)
			echo '<td id="separator2"></td>';
		    if ($i == 0 and $j == 0)
			echo '<td id="big_top_left"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 0 and $j == 4)
			echo '<td id="big_top_right"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 0 and ($j == 5 or $j == 6))
			echo '<td id="big_top_right_left"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 0)
			echo '<td id="big_top"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 4 and $j == 0)
			echo '<td id="big_bottom_left"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 4 and $j == 4)
			echo '<td id="big_bottom_right"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 4 and ($j == 5 or $j == 6))
			echo '<td id="big_bottom_right_left"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($i == 4)
			echo '<td id="big_bottom"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($j == 0)
			echo '<td id="big_left"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($j == 4)
			echo '<td id="big_right"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else if ($j == 5 or $j == 6)
			echo '<td id="big_right_left"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		    else
			echo '<td id="normal"><input type="text" value="'.$deduc[$i][$j].'" style="color: black;" disabled></td>';
		}
		echo '</tr>';
	    }
	    
	    echo '<tr height="20px">';
	    echo '</tr>';
	    echo '<tr>';
	    for ($j = 0; $j < 5; ++$j) {
		if ($j == 0)
		    echo '<td id="big_top_bottom_left"><input type="text" value="'.$sol[$j].'" style="color: red;" disabled></td>';
		else if ($j == 4)
		    echo '<td id="big_top_bottom_right"><input type="text" value="'.$sol[$j].'" style="color: red;" disabled></td>';
		else
		    echo '<td id="big_top_bottom"><input type="text" value="'.$sol[$j].'" style="color: red;" disabled></td>';
	    }

	    echo '<td id="separator">';
	    echo '</td>';
	    echo '<td>';
	    echo '<a title="Búscame en el diccionario" href="http://dle.rae.es/?w='.implode($sol).'" target="_blank">';
	    echo '<img src="../img/search.png" height="25px;" style="margin-left: 15px; margin-top: 5px;"/>';
	    echo '</a></td>';
	    
	    echo '</tr></table>';
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

	<br><br><br>
	
    </body>
</html>
