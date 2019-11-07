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
	<h1 align="center">Deducción - David Álvarez</h1>
	<br/><br/>

	<?php
	// Leer la deducción introducida por el usuario.
	$deduc = $_SESSION['deduc'];

	// Buscar todas las soluciones.
	include('code/solucionador_todas.php');
	
	// Mostrar soluciones (si existiera alguna).
	$n = sizeof($sols);
	if ($n == 0)
	    echo '<p align="center">No existe solución.</p>';
	for ($k = 0; $k < $n; ++$k) {
	    if ($k == $dict_div)
		echo '<br/><br/><br/><br/><p align="center" style="font-weight: bold;">Palabras que no están registradas en el diccionario.</p><br/>';
	    
	    if ($n == 1)
		echo '<p align="center">Solución única:</p>';
	    else
		echo '<p align="center">Solución número '.($k + 1).':</p>';
	    
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
		    echo '<td id="big_top_bottom_left"><input type="text" value="'.$sols[$k][$j].'" style="color: red;" disabled></td>';
		else if ($j == 4)
		    echo '<td id="big_top_bottom_right"><input type="text" value="'.$sols[$k][$j].'" style="color: red;" disabled></td>';
		else
		    echo '<td id="big_top_bottom"><input type="text" value="'.$sols[$k][$j].'" style="color: red;" disabled></td>';
	    }

	    echo '<td id="separator">';
	    echo '</td>';
	    echo '<td>';
	    echo '<a title="Búscame en el diccionario" href="http://dle.rae.es/?w='.implode($sols[$k]).'" target="_blank">';	    
	    echo '<img src="../img/search.png" height="25px;" style="margin-left: 15px; margin-top: 5px;"/>';
	    echo '</a></td>';
	    
	    echo '</tr></table>';
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
