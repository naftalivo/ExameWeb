<?php

$output = null;
global $mensagem;



?>

<!----------------Reg Estudants-------------------->

	<?php

		$output = null;
		global $mensagem;


if(isset($_POST['estudante'])){
    //Conexao co bd
    $mysqli = new mysqli('localhost', 'root','','exame');
    

    
     $nome = $mysqli->real_escape_string($_POST['nome']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $perfil = $mysqli->real_escape_string($_POST['perfil']);
    $coment = $mysqli->real_escape_string($_POST['comentario']);
    
    $query = $mysqli->query("select * from usuarios where nome = '$nome'");
    
//	if($nome && $username && $password && $curso_id && $perfil){
		if(userExists($username) === TRUE){
			$mensagem = "<center><div class='icon-file'><i class='fa fa-remove' aria-hidden='true'></i> Usuario ja esta registado no Sistema!!!</div></center>";
		}else{
	 $insert = $mysqli->query("insert into user (username,password, perfil) values ('$username', '$password', '$perfil')");
	
    
    $result = $mysqli->query("select max(id) from user");
    
    while($resulto = mysqli_fetch_array($result)){
//        print_r($resulto); ---imprime o id do estudante-----
        
        $idest = $resulto[0];
        
       //echo $resulto['id'];
			
    
     $insert = $mysqli->query("insert into usuarios (nome,user_id,comentario) values ('$nome','$idest','$coment')");
			} $mensagem = "<center><div class='icon-file'><i class='fa fa-check' aria-hidden='true'></i> Registado com sucesso!!!</div></center>";
			
		}
//    }
}

	?>

<!----------------Reg Estudants-------------------->


<!---------------Reg ComCientifica------------------>
<?php

		$output = null;

if(isset($_POST['cientifica'])){
    //Conexao co bd
    $mysqli = new mysqli('localhost', 'root','','exame');
    

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $perfil = $mysqli->real_escape_string($_POST['perfil']);
    
    $query = $mysqli->query("select * from admin where username = '$username'");
	
	
	if($username && $password && $perfil){
		if(userExists($username) === TRUE){
			echo  $_POST['username'] . " ja se encontra registado no Sistema!!!";
		}else{
	$insert = $mysqli->query("insert into user (username,password, perfil) values ('$username', '$password', '$perfil')");
	
	
    
     $resultcom = $mysqli->query("select max(id) from user");
    
     while($resultoCom = mysqli_fetch_array($resultcom)){
        print_r($resulto); //---imprime o id do estudante-----
        
        $idcom = $resultoCom[0];  
    
	
	$insert = $mysqli->query("insert into ccientifica (user_id) values ('$idcom')");
	} echo "Registado com Sucesso";
		}
	}
    
     
}

	?>


<!---------------Reg ComCientifica------------------>


<!-- Verificacao de Existencia de Usuario -->

<?php

function userExists($username) {
	global $conn;

	$sql = "SELECT * FROM user WHERE username = '$username'";
	$query = $conn->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$conn->close();

}


function userdata($username) {
	global $conn;
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$query = $conn->query($sql);
	$result = $query->fetch_assoc();
	if($query->num_rows == 1) {
		return $result;
	} else {
		return false;
	}

	$conn->close();
	
}


function areaExists($nome) {
	global $conn;

	$sql = "SELECT * FROM area WHERE nome = '$nome'";
	$query = $conn->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$conn->close();

}

function cursoExists($nome) {
	global $conn;

	$sql = "SELECT * FROM curso WHERE nome = '$nome'";
	$query = $conn->query($sql);
	if($query->num_rows == 1) {
		return true;
	} else {
		return false;
	}

	$conn->close();

}
?>

<!-- Verificacao de Existencia de Usuario -->