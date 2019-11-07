<?php
session_start();
?>


<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8" />
	<title>Sopa de Letras - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/sopa.css" />
	<script src="../js/sopa.js"></script>
    </head>

    
    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Sopa de Letras - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
	<br/><br/>
	

	<?php
	if (isset($_POST['sizei']) and isset($_POST['sizej'])) {
	    $n = $_POST['sizei'];
	    $m = $_POST['sizej'];
	}
	else if (isset($_SESSION['sizei']) and isset($_SESSION['sizej'])) {
	    $n = $_SESSION['sizei'];
	    $m = $_SESSION['sizej'];
	}
	else {	
	    $n = 10;
	    $m = 12;
	}

	$_SESSION['sizei'] = $n;
	$_SESSION['sizej']= $m;
	?>


	<form action="encuentra.php" method="post" name="sopa">
	    <table id="externo" align="center">
		<?php
		if (!isset($_GET['empty']) and isset($_SESSION['sopa']) and !isset($_POST['sizei'])) {
		    $grid = $_SESSION['sopa'];
		    for ($i = 0; $i < $n; ++$i) {
			echo '<tr>';
			for ($j = 0; $j < $m; ++$j) {
			    if ($j == $m - 1)
				echo '<td id="normal"><input type="text" name="i'.$i.'j'.$j.'" onkeydown="upperCaseF(this, document.sopa.i'.($i + 1).'j0)" maxlength="1" value='.$grid[$i][$j].' /></td>';
			    else 
				echo '<td id="normal"><input type="text" name="i'.$i.'j'.$j.'" onkeydown="upperCaseF(this, document.sopa.i'.$i.'j'.($j + 1).')" maxlength="1" value='.$grid[$i][$j].' /></td>';
			}
			echo '</tr>';
		    }
		}

		else
		    for ($i = 0; $i < $n; ++$i) {
			echo '<tr>';
			for ($j = 0; $j < $m; ++$j) {
			    if ($j == $m - 1)
				echo '<td id="normal"><input type="text" name="i'.$i.'j'.$j.'" onkeydown="upperCaseF(this, document.sopa.i'.($i + 1).'j0)" maxlength="1" /></td>';
			    else 
				echo '<td id="normal"><input type="text" name="i'.$i.'j'.$j.'" onkeydown="upperCaseF(this, document.sopa.i'.$i.'j'.($j + 1).')" maxlength="1" /></td>';
			}
			echo '</tr>';
		    }
		?>
	    </table>


	    <br/><br/><br/>
	    <table width="75%" align="center">
		<tr>
		    <td width="25%" style="min-width: 200px;">
			<div align="center">
			    <button type="button" onclick="window.location.href='tamaño.html'">CAMBIAR TAMAÑO</button>
			</div>
		    </td>

		    <td width="25%" style="min-width: 200px;">
			<div align="center">
			    <button type="button" onclick="window.location.href='index.php?empty=true'">VACIAR TABLERO</button>
			</div>
		    </td>

		    <td width="25%" style="min-width: 200px;">
			<div align="center">			
			    <button type="submit">ENCUENTRA</button>
			</div>
		    </td>
		</tr>
	    </table>
	</form>

	<br/><br/><br/><br/>
	
    </body>
</html>
