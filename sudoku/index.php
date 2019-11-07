<!DOCTYPE html>

<html>
   <head>
      <meta charset="UTF-8">
      <title>Sudoku - David Álvarez</title>
      <link rel="stylesheet" type="text/css" href="../css/sudoku.css" />
      <script src="../js/sudoku.js"></script>
   </head>

   
   <body background="../img/background.jpg">
      <h1 align="center" style="margin-left: 40px; margin-right: 40px;">Sudoku - David Álvarez</h1>
      <a href="../index.html">
	 <img src="../img/home.png" height="30px" style="position: absolute; top: 22px; left: 15px;" />
      </a>
      <br/><br/><br/><br/>

      
      <table width="100%" height="100%" name="form1">
	 <tr>
	    <td width="50%" style="min-width: 400px;">
	       <form action="solucionador.php" method="post">
		  <table align="center" id="externo">
		     <?php
		     for ($i = 0; $i < 9; ++$i) {
			 if ($i == 2 or $i == 5)
			     echo '<tr id="grande">';
			 else
			     echo '<tr id="normal">';
			 for ($j = 0; $j < 9; ++$j) {
			     if ($j == 2 or $j == 5)
				 echo '<td id="lateral_gran"><input name="'.$i.$j.'" onkeypress="return justNumbers(this, event)" type="number" /></td>';
			     else
				 echo '<td id="lateral_nor"><input name="'.$i.$j.'" onkeypress="return justNumbers(this, event)" type="number" /></td>';
			 }
		     }
		     ?>
		  </table>

		  <br/><br/><br/>
		  <div align="center">
		     <button type="submit">RESOLVER SUDOKU</button>
		  </div>
	       </form>
	    </td>

	    <td width="50%" style="min-width: 400px;">
	       <form action="comprobador.php" method="post">
		  <table align="center" id="externo">
		     <?php
		     for ($i = 0; $i < 9; ++$i) {
			 if ($i == 2 or $i == 5)
			     echo '<tr id="grande">';
			 else
			     echo '<tr id="normal">';
			 for ($j = 0; $j < 9; ++$j) {
			     if ($j == 2 or $j == 5)
				 echo '<td id="lateral_gran"><input name="'.$i.$j.'" onkeypress="return justNumbers(this, event)" type="number" /></td>';
			     else
				 echo '<td id="lateral_nor"><input name="'.$i.$j.'" onkeypress="return justNumbers(this, event)" type="number" /></td>';
			 }
		     }
		     ?>
		  </table>

		  <br/><br/><br/>
		  <div align="center">
		     <button type="submit">COMPROBAR SOLUCIÓN</button>
		  </div>
	       </form>
	    </td>
	 </tr>

	 
	 <tr>
	    <td style="text-align: right;">
	       <form action="generador_op.php", method="post">
		  <button type="submit" style="margin-right: -65px; margin-top: 25px;">
		     GENERAR SUDOKU
		  </button>
	       </form>
	    </td>
	 </tr>
      </table>

   </body>
</html>
