<?php
require_once '../controler/init.php';

$result_supervisao = "select * from topico";

$resultado_supervisao = mysqli_query($conn, $result_supervisao);


$result_sup = "select * from docente";

$resultado_sup = mysqli_query($conn, $result_sup);

session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <script src="js/validate.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.responsive.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src= "js/bootbox.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
   


</head>
<body>

<nav  class="navbar navbar-inverse navbar-fixed-top no-margin" role="navigation">
		<div class="container-fluid">
	        <a href="#" id="b" class="navbar-brand"><span class="glyphicon glyphicon-education"></span>
	        
	        <?php
	        
	        echo "Usuario : ". $_SESSION['username'];
	        
            ?>
	        
	        
	        
	        </a><!---------Admin Profile Here------------>
	        
	        <button  type="button" class="navbar-toggle" data-toggle="collapse" data-target = ".navHeaderCollapse">

				<span class="sr-only">navegacao</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			</button>

			<div class="collapse navbar-collapse navHeaderCollapse navbar-right" > 

	        	<ul id="menu" class="nav navbar-nav">
                    <li  role= "apresentation" class="active"><a href="admin.php"><div class="icon-file"><i class="fa fa-home" aria-hidden="true"></i> Home</div></a></li>
	        		
	        		
	        		<li class="dropdown">
                            
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registos<b class="caret"></b></a>

                            <ul class="dropdown-menu">
                                <li><a href="regcursos.php"> Topicos</a></li>
                                 
                            </ul>
                        </li>
	        		
	

	        		<li class="dropdown">
                            
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-education"></span><b class="caret"></b></a>

                            <ul class="dropdown-menu">
                                
                                
                       			<li><a href="index.php"><div class="icon-file"><i class="fa fa-close" aria-hidden="true"></i> Sair</div></a></li>
                            </ul>
                        </li>
	        	</ul>
	        	
			</div>

		</div>

	</nav>
	<!--fim do menu-->
	
	<div class="container">
       <br>
       <br>
        <div class="page-header">
                <h3>Pag Inicial</h3>
        </div>


        
        
        <!-----------------------Conteudo------------------------------>
               <div class="row">
                  <div class="col-sm-6">
                    <div class="thumbnail small bg-gray">
                      <div class="caption">
                        <h2>Lista os Topicos</h2>
                        
                        <p><a href="#profess" class="btn btn-success" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-th-list"></span></a></p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="thumbnail small bg-gray">
                      <div class="caption">
                        <h2>Detalhes dos Topicos</h2>
                        
                        <p><a href="#estud" class="btn btn-success" role="button" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-th-list"></span></a></p>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="collapse" id="profess">
                 <br>
                  <div class="well">
                   <br>
                   
                   <div class="form-group">
                       		<div class="input-group">
                       			<span class="input-group-addon small bg-gray"><div class="icon-file"><i class="fa fa-search" aria-hidden="true"></i> Pesquise</div> </span>
                       			<input type="text" name="search_text" id="search_text" placeholder="Pesquise o Nome do Docente" class="form-control" />
                       		</div>
                       		<br />
    						<div id="result"></div>
                       </div>
                  	</div>
                </div>
                
                <div class="collapse" id="estud">
                  <div class="well">
                       
                       <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                       
                        <table class="table" id="listaDeTemas">
                            <thead>
                                <tr>
                                    <th class="success">Titulo do Topioc</th>
                                    <th class="success">Estado</th>
                                    <th class="success">Descrisao</th>
                                    <th class="success">Data</th>
                                    <th class="success"></th>
                                    <th class="success"></th>
                                    <th class="success"></th>
                                </tr>
                            </thead>
                               <tbody>
                                   <?php while($rows_supervisao = mysqli_fetch_assoc($resultado_supervisao)){ ?>
                                <tr>
                                    <td><?php echo $rows_supervisao['titulo']; ?></td>
                                    <td><?php echo $rows_supervisao['estado']; ?></td>
                                    <td><?php echo $rows_supervisao['descrisao']; ?></td>
                                    <td><?php echo $rows_supervisao['data']; ?></td>

                                    <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#myModal<?php echo $rows_supervisao['id']; ?>">Detalhes</button></td>
                                     
<!--
                                     <td><button type="button" class="btn btn-xs btn-success aprovar" idEstudante = "<?php echo $rows_supervisao['id']; ?>">Aprovar</button></td>

                                     <td><button type="button" class="btn btn-xs btn-danger reprovar" idEstudante = "<?php echo $rows_supervisao['id']; ?>">Reprovar</button></td>
-->
                                </tr>
                                
                                <!-----------------Modal------------>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal<?php echo $rows_supervisao['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_supervisao['titulo']; ?></h4>
                                      </div>
                                      <div class="modal-body">
                                       
                                        <p> <b>Topico : </b><?php echo $rows_supervisao['titulo']; ?></p>
                                        <p> <b>Descrisao : </b><?php echo $rows_supervisao['descrisao']; ?></p>
                                        <p> <b>Data : </b><?php echo $rows_supervisao['data']; ?></p>
                                        <p> <b>Estado </b><?php echo $rows_supervisao['estado']; ?></p>
                                                                              
                                      </div>
                                    </div>
                                  </div>
                                </div>        
                                
                                <!----------------Modal-------------->
                               <?php } ?> 
                            </tbody>
                        </table>   
                    </div>
                </div>
                
                <div class="container">
                	<div class="form-group has-feedback  col-md-8 col-md-offset-2">
                        <label for="">Comentario: </label>
                        <textarea id="" maxlength="200" cols="55" rows="10"  name="descrisao" class="form-control" required>
                        </textarea><br>
                    </div>
                </div>
        <!-----------------------Conteudo------------------------------>
	</div>
	
	<!---------------editar estado supervisao-------------------------->
	
	

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Tema id: </h4>
              </div>
              
              
              <div class="modal-body">
                <form method="post" action="http://localhost/Projecto PHP3/view/admin.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Tema:</label>
                    <input name="titulo" type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Situacao:</label>
                    <textarea name="status" class="form-control" id="detalhes-text"></textarea>
                  </div>
                  
                  <input type="hidden" id="id" name="id">
                  <!---recupera id invisib=vel-->
                  
                  
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
	
	
	
	<!---------------editar estado supervisao-------------------------->

<!--<script src="js/slid.js"></script>-->
<script type="text/javascript">
 $("#listaDeTemas").on("click", ".aprovar", function () {
    var button = $(this);
    var id = button.attr("idEstudante");

    bootbox.confirm({
      message: "Tem certeza de que pretende aprovar este tema?",
      buttons: {
        confirm: {
              label: 'Sim',
              className: 'btn-success'
        },
        cancel: {
              label: 'Nao, cancelar',
              className: 'btn-danger'
        }                    
      },
      callback: function (result) {
        if(result)
        {
          $.ajax({
            url: 'aprovar.php',
            data: {Id: id},
            dataType: "JSON",
            type: "POST",
            
            success: function (data) {
              var resposta = $.parseJSON(data);      
              
               if(resposta == 1)
              {
                bootbox.alert("Caro utilizador, este tema ja foi aprovado!");
              }
              else
              { 
                if(resposta == 2)
                {
                  bootbox.alert("Caro utilizador, este tema se encontra reprovado! Nao pode aprovar um tema ja reprovado.");
                } 
                else
                {
                  window.location.reload(); 
                }   
              }        
            }, 

            error: function (response)
            {
              console.log(response);
            },

            failure: function (response)
            {        
              console.log(response);
            }
          });
        }               
      }
    });    
  });

  $("#listaDeTemas").on("click", ".reprovar", function () {
    var button = $(this);
    var id = button.attr("idEstudante");

    bootbox.confirm({
      message: "Tem certeza de que pretende reprovar este tema?",
      buttons: {
        confirm: {
              label: 'Sim',
              className: 'btn-success'
        },
        cancel: {
              label: 'Nao, cancelar',
              className: 'btn-danger'
        }                    
      },
      callback: function (result) {
        if(result)
        {
          $.ajax({
            url: 'reprovar.php',
            data: {Id: id},
            dataType: "JSON",
            type: "POST",
            
            success: function (data) {
              var resposta = $.parseJSON(data);      
              
              if(resposta == 1)
              {
                bootbox.alert("Caro utilizador, este tema ja foi reprovado!");
              }
              else
              { 
                if(resposta == 2)
                {
                  bootbox.alert("Caro utilizador, este tema se encontra aprovado! Nao pode reprovar um tema ja aprovado.");
                } 
                else
                {
                  window.location.reload(); 
                }   
              }        
            }, 

            error: function (response)
            {
              console.log(response);
            },

            failure: function (response)
            {        
              console.log(response);
            }
          });
        }               
      }
    });    
  });
//modal

  
</script>

</body>
</html>


<script>
  $(document).ready(function(){

   load_data();

     function load_data(query){
      $.ajax({
         url:"pesquisa.php",
         method:"POST",
         data:{query:query},
         success:function(data){
          $('#result').html(data);
         }
      });
     }

     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != ''){
       load_data(search);
      }
      else{
       load_data();
      }
     });

  });
</script>


<?php $conn->close() ?>