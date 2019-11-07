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
	<br/><br/><br/>

	<?php
	include('code/generador.php');
	if (isset($_POST['percentage'])) {
	    $percentage = $_POST['percentage']*11 + 30;
	    $_SESSION['percentage'] = $percentage;
	}
	else
	    $percentage = $_SESSION['percentage'];

	echo '<table align="center" id="externo">';
	for ($i = 0; $i < 9; ++$i) {
	    if ($i == 2 or $i == 5)
		echo '<tr id="grande">';
	    else
		echo '<tr id="normal">';
	    for ($j = 0; $j < 9; ++$j) {
		if ($j == 2 or $j == 5)
		    echo '<td id="lateral_gran">';
		else
		    echo '<td id="lateral_nor">';
		if (rand(0, 100) > $percentage)
		    echo '<input style="color: black;" value="'.$sudoku[$i][$j].'"  disabled></td>';
		else {
		    echo '<input style="color: black;" disabled></td>';
		    $sudoku[$i][$j] = 0;
		}
	    }
	    echo '</tr>';
	}
	echo '</table>';

	// Guardar el sudoku generado como variable superglobal.
	$_SESSION['sudoku'] = $sudoku;
	?>	    

	<table style="position: absolute; top: 575px;" width="100%">
	    <tr>
		<td width="33%" style="min-width: 200px;">
		    <div align="center">
			<button type="button" onclick="window.location.href='generador_op.php'">RETROCEDE</button>
		    </div>
		</td>

		<td width="33%" style="min-width: 200px;">
		    <div align="center">
			<form action="generador.php">
			    <button>GENERAR OTRO</button>
			</form>
		    </div>
		</td>

		<td width="33%" style="min-width: 200px;">
		    <div align="center">
			<form action="solucionador_sg.php">
			    <button>RESOLVER SUDOKU</button>
			</form>
		    </div>
		</td>
	    </tr>
	</table>
	
	<br/><br/><br/><br/>

    </body>
</html>
