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
	<br><br><br>

	<?php
	// Leer el grafo introducido por usuario.
	$grafo = array();
	for ($i= 0; $i < 7; ++$i)
	    $grafo[$i] = $_POST['i'.$i];
	// Leer la solución introducida por usuario.
	$sol = array();      
	for ($i= 0; $i < 9; ++$i)
	    $sol[$i] = $_POST['s'.$i];

	// Guardar grafo introducido por usuario en variable superglobal.
	$_SESSION['grafo'] = $grafo;

	// Comprobar solución.
	include("code/comprobador.php");
	$imagen; $value;
	if (correct()) {
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
		<td width="50%" style="min-width: 500px;">
		    <?php 
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
		    ?>		    
		</td>

		
		<td width="50%" style="min-width: 500px;">		
		    <?php
		    echo '<img src="../img/'.$imagen.'.png" height="250px" style="margin-left: 150px; margin-top: 100px;"';
		    ?>			       
		</td>
	    </tr>

	    <tr>
		<td style="text-align: right;">
		    <br/><br/>
		    <p id="informer">Solución <?php echo $value ?>.</p>
		</td>
	    </tr>

	    <tr>
		<td style="text-align: right;">
		    <br/><br/>
		    <?php
		    if ($value == 'correcta') {
			echo '<form action="solucionador_todas.php" method="post">';
			echo '<button type="submit" style="left: 50%; margin-right: -100px; margin-top: 90px;">ENCONTRAR MÁS SOLUCIONES</button>';
			echo '</form>';
		    }
		    else {
			echo '<form action="solucionador_sg.php" method="post">';
			echo '<button type="submit" style="left: 50%; margin-right: -50px; margin-top: 90px;">RESOLVER GRAFO</button>';
			echo '</form>';
		    }
		    ?>
		    <br/><br/><br/><br/>
		</td>
	    </tr>
	</table>

	<script src="../js/grafo.js"></script>
	
    </body>
</html>
