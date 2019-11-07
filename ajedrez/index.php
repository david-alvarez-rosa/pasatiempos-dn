<?php
session_start();
?>


<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Ajedrez - David Álvarez</title>
	<link rel="stylesheet" type="text/css" href="../css/ajedrez.css" />
	<script src="../js/ajedrez.js"></script>
    </head>

    
    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Ajedrez - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px; height: 30px; width: 30px;" />
	</a>
	<br/><br/><br/>

	<form action="index.php" method="post">			
	    <table width="100%">
		<tr>
		    <td width="40%" style="min-width: 400px;" align="center">
			<table id ="externo">
			    <?php
			    for ($i = 0; $i < 8; ++$i) {
				echo '<tr>';
				for ($j = 0; $j < 8; ++$j) {
				    if (($i + $j)%2 == 1)
					echo '<td id="normal" bgcolor="gray">';
				    else
					echo '<td id="normal">';

				    echo '<input name="i'.$i.$j.'" onkeydown="upperCaseF(this)"';  
				    if (isset($_POST['i'.$i.$j]))
					echo 'value="'.$_POST['i'.$i.$j].'"';
				    echo '/></td>';
				}
				echo '</tr>';
			    }
			    ?>
			</table>
		    </td>

		    <td width="20%" style="min-width: 100px" align="center">
			<br/>
			<table align="center">
			    <tr>
				<td>
				    <button type="submit">ACTUALIZA</button>
				</td>
			    </tr>
			    <tr>
				<td align="center">
				    <img src="../img/info.png" height="30px" onclick="window.open('info.html')" style="margin-top: 3px; position: relative;" />
				</td>
			    </tr>
			</table>
		    </td>
		    
		    <td width="40%" style="min-width: 400px;" align="center">
			<table id ="externo">
			    <?php
			    for ($i = 0; $i < 8; ++$i) {
				echo '<tr>';
				for ($j = 0; $j < 8; ++$j) {
				    if (($i + $j)%2 == 1)
					echo '<td id="normal" bgcolor="gray">';
				    else
					echo '<td id="normal">';
				    if (isset($_POST['i'.$i.$j])) {
					if ($_POST['i'.$i.$j] == 'AB')
					    echo '<img src="piezas/blancas/alfil.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'DB')
					    echo '<img src="piezas/blancas/dama.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'RB')
					    echo '<img src="piezas/blancas/rey.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'CB')
					    echo '<img src="piezas/blancas/caballo.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'PB')
					    echo '<img src="piezas/blancas/peon.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'TB')
					    echo '<img src="piezas/blancas/torre.png" /></td>';
					
					else if ($_POST['i'.$i.$j] == 'AN')
					    echo '<img src="piezas/negras/alfil.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'DN')
					    echo '<img src="piezas/negras/dama.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'RN')
					    echo '<img src="piezas/negras/rey.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'CN')
					    echo '<img src="piezas/negras/caballo.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'PN')
					    echo '<img src="piezas/negras/peon.png" /></td>';
					else if ($_POST['i'.$i.$j] == 'TN')
					    echo '<img src="piezas/negras/torre.png" /></td>';
				    }
				    
				    echo '</td>';
				}
				echo '</tr>';
			    }
			    ?>
			</table>
		    </td>
		</tr>
	    </table>
	</form>

	<?php
	$grid = array();
	for ($i = 0; $i < 8; ++$i) {
	    $grid[$i] = array();
	    for ($j = 0; $j < 8; ++$j) {
		if (isset($_POST['i'.$i.$j]))
		    $grid[$i][$j] = $_POST['i'.$i.$j];
		else
		    $grid[$i][$j] = 0;
	    }
	}
	$_SESSION['ajedrez'] = $grid;
	?>
	
	<table width="100%" style="min-width: 900px;">
	    <tr>
		<td align="center">
		    <form action="resuelve.php">
			<br/><br/><br/>
			<select>
			    <option value="blancas">Blancas</option>
			    <option value="negras">Negras</option>		    
			</select>
			&nbsp;&nbsp;juegan y ganan.
			<br/><br/><br/><br/>
			<button type="submit">RESUELVE</button>
		    </form>			
		</td>
	    </tr>
	</table>
	
	<br/><br/><br/><br/>
	
    </body>
</html>
