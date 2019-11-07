<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">    
	<title>Grafo - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/grafo.css">
    </head>

    
    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Grafo - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
    

	<?php
	// Leer grafo introducido por el usuario.
	$grafo = array();
	for ($i = 0; $i < 7; ++$i)
	    $grafo[$i] = $_POST['i'.$i];

	// Guardar grafo introducido por usuario en variable superglobal.
	$_SESSION['grafo'] = $grafo;

	// Resolver grafo.
	include("code/solucionador.php");

	// Mostrar solución (si existiera).
	if (!$exists_sol)
	    echo '<p align="center">No existe solución.</p>';
	else {
	    echo '<div id="positioner1">';
	    echo '<input id="circle" name="s0" style="top: 150px; left: 200px; color: red; background: white;" value="'.$sol[0].'" disabled>';
	    echo '<input id="circle" name="s1" style="top: 150px; left: 350px; color: red; background: white;" value="'.$sol[1].'" disabled>';
	    echo '<input id="circle" name="s2" style="top: 250px; left: 275px; color: red; background: white;" value="'.$sol[2].'" disabled>';
	    echo '<input id="circle" name="s3" style="top: 325px; left: 75px; color: red; background: white;" value="'.$sol[3].'" disabled>';
	    echo '<input id="circle" name="s4" style="top: 325px; left: 475px; color: red; background: white;" value="'.$sol[4].'" disabled>';
	    echo '<input id="circle" name="s5" style="top: 375px; left: 200px; color: red; background: white;" value="'.$sol[5].'" disabled>';
	    echo '<input id="circle" name="s6" style="top: 375px; left: 350px; color: red; background: white;" value="'.$sol[6].'" disabled>';
	    echo '<input id="circle" name="s7" style="top: 500px; left: 175px; color: red; background: white;" value="'.$sol[7].'" disabled>';
	    echo '<input id="circle" name="s8" style="top: 500px; left: 400px; color: red; background: white;" value="'.$sol[8].'" disabled>';
	    
	    echo '<input id="square" name="i0" style="top: 180px; left: 275px; color: black; background: white;" value="'.$grafo[0].'" disabled>';
	    echo '<input id="square" name="i1" style="top: 260px; left: 160px; color: black; background: white;" value="'.$grafo[1].'" disabled>';
	    echo '<input id="square" name="i2" style="top: 260px; left: 400px; color: black; background: white;" value="'.$grafo[2].'" disabled>';
	    echo '<input id="square" name="i3" style="top: 340px; left: 275px; color: black; background: white;" value="'.$grafo[3].'" disabled>';
	    echo '<input id="square" name="i4" style="top: 410px; left: 140px; color: black; background: white;" value="'.$grafo[4].'" disabled>';
	    echo '<input id="square" name="i5" style="top: 410px; left: 420px; color: black; background: white;" value="'.$grafo[5].'" disabled>';
	    echo '<input id="square" name="i6" style="top: 475px; left: 275px; color: black; background: white;" value="'.$grafo[6].'" disabled>';

	    echo '<canvas id="myCanvas1" width="500" height="500"></canvas>';
	    echo '</div>';
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

	<script src="../js/grafo.js"></script>
    </body>
</html>
