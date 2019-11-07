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
	$n = $_SESSION['sizei'];
	$m = $_SESSION['sizej'];

	$grid = array();

	if (isset($_POST['i0j0']))
	    for ($i = 0; $i < $n; ++$i) {
		$grid[$i] = array();
		for ($j = 0; $j < $m; ++$j)
		    $grid[$i][$j] = $_POST['i'.$i.'j'.$j];
	    }
	else
	    $grid = $_SESSION['sopa'];

	$_SESSION['sopa'] = $grid;

	$min_len = 4;
	if (isset($_POST['min_len']))
	    $min_len = $_POST['min_len'] - 1;
	else if (isset($_SESSION['min_len']))
	    $min_len = $_SESSION['min_len'];

	$_SESSION['min_len'] = $min_len;

	include('code/encuentra.php');
	?>

	
	<table id="externo" align="center">
	    <?php
	    $colors = ['red', 'orange', 'green', 'blue', 'yellow', 'orange', 'violet', 'purple', 'chocolate', 'tomato', 'silver', 'salmon', 'pink', 'orchid', 'olive', 'maroon', 'khaki', 'gold', 'DeppSkyBlue', 'ForestGreen', 'tan', 'teal', 'YellowGreen', 'Thistle', 'Sienna', 'RoyalBlue', 'Plum', 'Peru', 'PaleVioletRed', 'OliveDrab', 'MediumTurquoise', 'Lime', 'GoldenRod', 'DrakKhaki'];
	    $sc = sizeof($colors);
	    for ($i = $sc; $i < sizeof($words); ++$i)
		$colors[] = $colors[$i - $sc];
	    for ($i = 0; $i < $n; ++$i) {
		echo '<tr>';
		for ($j = 0; $j < $m; ++$j) {
		    $finished = false;
		    for ($k = 0; $k < sizeof($words_pos) and !$finished; ++$k)
			if (in_array('i'.$i.'j'.$j, $words_pos[$k]) and isset($_POST['s'.strlen($words[$k]).'n'.$k]))
			    $finished = true;
		    if ($finished)
			echo '<td id="normal" bgcolor="'.$colors[$k - 1].'"><input type="text" value="'.$grid[$i][$j].'" style="color: black;" disabled /></td>';			
		    else 
			echo '<td id="normal"><input type="text" value="'.$grid[$i][$j].'" style="color: black;" disabled /></td>';
		}		    
		echo '</tr>';
	    }
	    ?>
	</table>

	<br /><br />
	
	<?php
	$max_size = 0;
	for ($i = 0; $i < sizeof($words); ++$i)
	    if (strlen($words[$i]) > $max_size)
		$max_size = strlen($words[$i]);

	?>

	<br /><br />
	<form action="encuentra.php" method="post">
	    <?php 
	    if (isset($_POST['san-1']))
		echo '<p align="center" style="text-decoration: underline;"><strong>Palabras encontradas</strong>&nbsp;<input type="checkbox" name="san-1" onclick="toggle(this, \'\')" checked /></p>';
	    else
		echo '<p align="center" style="text-decoration: underline;"><strong>Palabras encontradas</strong>&nbsp;<input type="checkbox" name="san-1" onclick="toggle(this, \'\')" /></p>';
	    ?>
	    
	    <table width="66%" style="text-align: top;" align="center">
		<?php
		$cont = 0;
		for ($i = $max_size; $i >= 0; --$i) {
		    $first = true;
		    for ($j = 0; $j < sizeof($words); ++$j)
			if (strlen($words[$j]) == $i) {
			    if ($first) {
				if ($cont%2 == 0)
				    echo '<tr>';
				echo '<td width="33%" style="min-width: 250px; vertical-align: top;">';
				echo '<table align="center" width="100%">';
				if (isset($_POST['s'.$i.'n-1']))
				    echo '<tr><td colspan="3"><br /><br /><p align="center"><strong>Palabras de '.$i.' letras</strong>&nbsp;&nbsp;<input type="checkbox" name="s'.$i.'n-1" onclick="toggle(this, \'s'.$i.'\')" checked /></p></td>';
				else
				    echo '<tr><td colspan="3"><br /><br /><p align="center"><strong>Palabras de '.$i.' letras</strong>&nbsp;&nbsp;<input type="checkbox" name="s'.$i.'n-1" onclick="toggle(this, \'s'.$i.'\')" /></p></td>';				    
				$first = false;
				++$cont;
			    }
			    if (isset($_POST['s'.$i.'n'.$j])) {
				echo '<tr><td><div style="text-align: center;"><span style="background: '.$colors[$j].';">'.$words[$j].'</span></div></td><td><input type="checkbox" name="s'.$i.'n'.$j.'" checked /></td>';
				echo '<td>';
				echo '<a title="Búscame en el diccionario" href="http://dle.rae.es/?w='.$words[$j].'" target="_blank">';
				echo '<img src="../img/search.png" height="20px;" style="margin-left: 15px; margin-top: 5px;"/>';
				echo '</a></td></tr>';
			    }
			    else {
				echo '<tr><td><p align="center">'.$words[$j].'</p></td><td><input type="checkbox" name="s'.$i.'n'.$j.'" /></td>';
				echo '<td>';
				echo '<a title="Búscame en el diccionario" href="http://dle.rae.es/?w='.$words[$j].'" target="_blank">';
				echo '<img src="../img/search.png" height="25px;" style="margin-left: 15px; margin-top: 5px;"/>';
				echo '</a></td></tr>';
			    }
			}
		    if (!$first) {
			echo '</table>';
			echo '</td>';
			if ($cont%2 == 0)
			    echo '</tr>';
		    }
		}
		?>
	    </table>

	    <br /><br /><br />
	    <table width="75%" align="center">
		<tr>
		    <td width="25%" style="text-align: center; min-width: 250px;">
			<button type="button" onclick="window.location.href='index.php'">RETROCEDE</button>
		    </td>
		    
		    <td width="25%" style="text-align: center; min-width: 250px;">
			<button type="submit">MARCA SELECCIONADAS</button>
		    </td>
		    
		    <td width="25%" style="text-align: center; min-width: 250px;">
			<button type="button" onclick="window.location.href='opciones.html'">OPCIONES AVANZADAS</button>
		    </td>
		</tr>
	    </table>
	</form>

	<br /><br /><br /><br />

    </body>
</html>
