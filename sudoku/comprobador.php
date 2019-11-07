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
	<br/><br/><br/>
	
	<?php
	// Leer el sudoku introducido por usuario.
	$sudoku = array();
	for ($i = 0; $i < 9; ++$i) {
	    $sudoku[$i] = array();
	    for ($j = 0; $j < 9; ++$j)
		    $sudoku[$i][$j] = $_POST[$i.$j];
	}

	// Guardar sudoku introducido por el usuario en variable superglobal.
	$_SESSION['sudoku'] = $sudoku;

	// Comprobar solución.
	include("code/comprobador.php");
	$imagen; $value;
	if (correct($sudoku)) {
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
		<td width="50%" style="min-width: 400px;">
		    <table align="center" id="externo">		    
			<?php 
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
				echo '<input style="color: black;" value="'.$sudoku[$i][$j].'" disabled></td>';
			    }
			    echo '</tr>';
			}
			?>
		    </table>

		</td>
		
		<td width="50%" style="min-width: 400px;">
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
		<td style="text-align: right;">
		    <br/><br/>
		    <button onclick="javascript:history.go(-1)" style="left: 50%; margin-right: -45px;">RETROCEDE</button>  
		    <br/><br/><br/><br/>
		</td>
	    </tr>
	    
	</table>
	
    </body>
</html>
