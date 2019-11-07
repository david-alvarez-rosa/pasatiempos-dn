<?php
session_start();
?>

<!DOCTYPE html>


<html>
    <head>
	<meta charset="UTF-8">
	<title>Grafo - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/grafo.css">
	<style type="text/css">
	 <?php
	 // Leer el grafo introducido por el usuario.
	 $grafo = $_SESSION['grafo'];

	 // Encontrar todas las soluciones posibles del grafo.
	 include("code/solucionador_todas.php");
	 ?>
	 
	 <?php
	 $n = sizeof($sols);
	 for ($i = 2; $i < $n + 1; ++$i) {
	     echo '#positioner'.$i.'{';
	     echo 'position: absolute;';
	     echo 'top: '.(550*($i - 1)).'px;';
	     echo 'left: 30%;';
	     echo '}';
	     echo '#myCanvas'.$i.'{';
	     echo 'position: absolute;';
	     echo 'top: 140px;';
	     echo 'left: 80px;';
	     echo 'z-index: -1;';
	     echo '}';
	 }
	 
	 echo '#positioner_but {';
	 echo 'position: absolute;';
	 echo 'top: '.(550*$n + 70).'px;';
	 echo 'left: 48%;';
	 echo '}';
	 ?>
	</style>
    </head>


    <body background="../img/background.jpg">
	<h1 align="center">Grafo - David Álvarez</h1>

	<?php
	// Mostrar las soluciones (si existiera alguna).
	if ($n == 0)
	    echo '<p align="center">No existe solución.</p>';
	for ($k = 0; $k < $n; ++$k) {
	    echo '<div id="positioner'.($k + 1).'">';	    
	    if ($n == 1)
		echo '<p align="center">Solución única:</p>';
	    else
		echo '<p align="center">Solución número '.($k + 1).':</p>';
	    echo '<input id="circle" name="s0" style="top: 150px; left: 200px; color: red; background: white;" value="'.$sols[$k][0].'" disabled>';
	    echo '<input id="circle" name="s1" style="top: 150px; left: 350px; color: red; background: white;" value="'.$sols[$k][1].'" disabled>';
	    echo '<input id="circle" name="s2" style="top: 250px; left: 275px; color: red; background: white;" value="'.$sols[$k][2].'" disabled>';
	    echo '<input id="circle" name="s3" style="top: 325px; left: 75px; color: red; background: white;" value="'.$sols[$k][3].'" disabled>';
	    echo '<input id="circle" name="s4" style="top: 325px; left: 475px; color: red; background: white;" value="'.$sols[$k][4].'" disabled>';
	    echo '<input id="circle" name="s5" style="top: 375px; left: 200px; color: red; background: white;" value="'.$sols[$k][5].'" disabled>';
	    echo '<input id="circle" name="s6" style="top: 375px; left: 350px; color: red; background: white;" value="'.$sols[$k][6].'" disabled>';
	    echo '<input id="circle" name="s7" style="top: 500px; left: 175px; color: red; background: white;" value="'.$sols[$k][7].'" disabled>';
	    echo '<input id="circle" name="s8" style="top: 500px; left: 400px; color: red; background: white;" value="'.$sols[$k][8].'" disabled>';
	    
	    echo '<input id="square" name="i0" style="top: 180px; left: 275px; color: black; background: white;" value="'.$grafo[0].'" disabled>';
	    echo '<input id="square" name="i1" style="top: 260px; left: 160px; color: black; background: white;" value="'.$grafo[1].'" disabled>';
	    echo '<input id="square" name="i2" style="top: 260px; left: 400px; color: black; background: white;" value="'.$grafo[2].'" disabled>';
	    echo '<input id="square" name="i3" style="top: 340px; left: 275px; color: black; background: white;" value="'.$grafo[3].'" disabled>';
	    echo '<input id="square" name="i4" style="top: 410px; left: 140px; color: black; background: white;" value="'.$grafo[4].'" disabled>';
	    echo '<input id="square" name="i5" style="top: 410px; left: 420px; color: black; background: white;" value="'.$grafo[5].'" disabled>';
	    echo '<input id="square" name="i6" style="top: 475px; left: 275px; color: black; background: white;" value="'.$grafo[6].'" disabled>';

	    echo '<canvas id="myCanvas'.($k + 1).'" width="500" height="500"></canvas>';
	    echo '</div>';
	}
	?>

	<div id="positioner_but">
	    <button onclick="javascript:history.go(-2)">RETROCEDE</button>
	    <br/><br/><br/><br/><br/>
	</div>

	<script src="../js/grafo.js"></script>	

	<script type="text/javascript">
	 <?php
	 for ($i = 3; $i < $n + 1; ++$i) {
	     echo 'var canvas = document.getElementById("myCanvas'.$i.'");';
	     echo 'var ctx = canvas.getContext("2d");';

	     echo 'ctx.lineWidth = 4;';

	     echo 'ctx.beginPath();';
	     echo 'ctx.arc(220, 220, 200, 0, 2*Math.PI);';
	     echo 'ctx.stroke();';

	     echo 'ctx.beginPath();';
	     echo 'ctx.arc(220, 220, 90, 0, 2*Math.PI);';
	     echo 'ctx.stroke();';

	     echo 'ctx.moveTo(142, 40);';
	     echo 'ctx.lineTo(210, 125);';
	     echo 'ctx.stroke();';

	     echo 'ctx.moveTo(290, 40);';
	     echo 'ctx.lineTo(230, 125);';
	     echo 'ctx.stroke();';

	     echo 'ctx.moveTo(20, 215);';
	     echo 'ctx.lineTo(130, 260);';
	     echo 'ctx.stroke();';

	     echo 'ctx.moveTo(140, 270);';
	     echo 'ctx.lineTo(120, 380);';
	     echo 'ctx.stroke();';

	     echo 'ctx.moveTo(300, 260);';
	     echo 'ctx.lineTo(400, 220);';
	     echo 'ctx.stroke();';

	     echo 'ctx.moveTo(300, 260);';
	     echo 'ctx.lineTo(350, 400);';
	     echo 'ctx.stroke();';
	 }
	 ?>
	</script>

    </body>
</html>
