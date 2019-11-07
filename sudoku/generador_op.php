<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Sudoku - David Álvarez</title>
	<style type="text/css">
	 #positioner_but1 {
	     position: absolute;
	     top: 550px;
	     left: 20%;
	 }
	 #positioner_but2 {
	     position: absolute;
	     top: 550px;
	     left: 60%;
	 }
	</style>
    </head>

    
    <body background="../img/background.jpg">
	<h1 align="center" style="margin-left: 40px; margin-right: 40px;">Sudoku - David Álvarez</h1>
	<a href="../index.html">
	    <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
	</a>
	<br/><br/><br/>


	<div align="center">
	    <form action="generador.php" method="post">
		<p>Dificultad:</p>
		<br/>
		<input type="range" min="1" max="5" name="percentage">
		<br/><br/><br/>
		
		<p>Forzar solución única:</p>
		<input type="radio" name="unic" required disabled />Sí&nbsp;
		<input type="radio" name="unic" required checked />No

		<br/><br/><br/><br/>
		<table width="60%">
		    <tr>
			<td width="50%" style="min-width: 200px; text-align: center;">
			    <input type="button" onclick="window.location.href='index.php'" value="RETROCEDE" />
			</td>
			<td width="50%" style="min-width: 200px; text-align: center;">
			    <button type="submit">GENERA</button>
			</td>
		    </tr>
		</table>
		
	    </form>
	</div>

	<br/><br/><br/><br/>
	
    </body>
</html>
