<?php

include '../controler/init.php';

$output = '';

if(isset($_POST["query"])){
   $search = mysqli_real_escape_string($conn, $_POST["query"]);
   $query = " SELECT estado,titulo,descrisao,data
              FROM topico WHERE estado LIKE '%".$search."%'";  
    
  } 
  else{ 
      $query = "SELECT estado,titulo,descrisao,data
                FROM topico 
                ORDER BY titulo ASC";
    }


$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
   $output .= '<div class="table-responsive">
               <table class="table table bordered">
                  <tr>
                     <th>Estado do Topico</th>
                     <th>Titulo do Topico</th>
                     <th>Descrisao</th>
                     <th>Data</th>
                     
                  </tr>';


   while($row = mysqli_fetch_array($result)){
    $output .= '<tr>
                  <td>'.$row["estado"].'</td>
                  <td>'.$row["titulo"].'</td>
                  <td>'.$row["descrisao"].'</td>
                  <td>'.$row["data"].'</td>
                 
               </tr>';
      

   }

    
  $nrsps='<h4>'. mysqli_num_rows($result).' topicos</h4> </br>' ;
  echo $nrsps;
  echo $output;

}else{
 
  echo  ' Docente <b>'.($search) .'</b>   não tem nenhuma topico de momento';
  }

?>