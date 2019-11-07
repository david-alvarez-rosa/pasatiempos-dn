<?php
session_start();
?>


<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Deducción - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/deduccion.css">
    </head>

    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Deducción - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
	<br/><br/><br/><br/><br/>
	
	<?php 
	// Leer deducción introducida.
	$deduc = array();
	for ($i = 0; $i < 5; ++$i) {
	    $deduc[$i] = array();
	    for ($j = 0; $j < 7; ++$j)
		$deduc[$i][$j] = $_POST['i'.$i.$j];
	}

	// Leer la solución introducda.
	$sol = array();
	for ($i = 0; $i < 5; ++$i)
	    $sol[$i] = $_POST['s'.$i];

	// Guardar deducción introducida por usuario en variable superglobal.
	$_SESSION['deduc'] = $deduc;

	// Comprobar solución.
	include('code/comprobador.php');
	$imagen; $value;
	if ($correct) {
	    $imagen = 'check';
	    $value = 'correcta';
	}
	else {
	    $imagen = 'wrong';
	    $value = 'incorrecta';	    
	}
	?>

	<table width="100%" height="100%">
	    <tr>
		<td width="50%" style="min-width: 300px;">
		    <table align="center">		    
			<?php 
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
			echo '</tr>';

			?>
		    </table>
		</td>
		
		<td width="50%" style="min-width: 300px;">
		    <?php
		    echo '<img src="../img/'.$imagen.'.png" height="250px" style="margin-left: 150px;"';
		    ?>			       
		</td>
	    </tr>

	    <tr>
		<td style="text-align: right;">
		    <br/><br/><br/>
		    <p id="informer">Solución <?php echo $value ?>.</p>
		</td>
	    </tr>

	    <tr>
		<td style="text-align: right">
		    <button onclick="javascript:history.go(-1)" style="margin-top: 40px; margin-right: 70px;">RETROCEDE</button>
		</td>
		<td style="text-align: left;">
		    <?php
		    if ($value == 'correcta') {
			echo '<form action="solucionador_todas.php">';
			echo '<button type="submit" style="margin-left: 25px; margin-top: 40px;">ENCONTRAR MÁS SOLUCIONES</button>';
			echo '</form>';
		    }
		    else {
			echo '<form action="solucionador_sg.php">';
			echo '<button type="submit" style="margin-left: 30px; margin-top: 40px;">RESOLVER DEDUCCIÓN</button>';
			echo '</form>';
		    }
		    ?>
		</td>
	    </tr>
	</table>
	
	<br/><br/><br/><br/>	
    </body>
</html>
