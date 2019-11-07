<?php
// Leer la contraseña.
$pw = $_POST['contraseña'];

if ($pw == '1234admin')
    header('Location: pasatiempos-dn.zip');
?>


<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Código - David Álvarez</title>
    </head>

    
    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Código - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
	<br><br><br><br/>

	<?php
	// Comparar.
	if ($pw != '1234admin') {
	    echo '<form action="index.html">';
	    echo '<p align="center">Contraseña incorrecta.</p>';
	    echo '<div align="center">';
	    echo '<br/><br/>';
	    echo '<button type="submit">RETROCEDE</button>';
	    echo '</div>';
	    echo '</form>';
	}
	?>	
    </body>
</html>
