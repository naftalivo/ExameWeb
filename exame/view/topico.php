
		
		<?php
		
		include  '../controler/init.php';
	
	
		
		$estado=$_POST['f_estado'];
		$titulo=$_POST['titulo'];
		$descrisao=$_POST['descrisao'];
		$data=$_POST['data'];

		$sql="insert into topico values (NULL,'$estado','$titulo','$descrisao','$data')";
		
		
		$res=mysqli_query($conn, $sql);
		mysqli_close($conn);

		echo "Registado";
	
		echo "<a href='admin2.php' target=_self>Voltar</a>";
		
		
		?>
		