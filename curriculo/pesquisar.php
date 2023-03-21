<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Pesquisa de curriculos</title>
  <style>

html, body {

width: 100%;
height: 100%;
margin: 0;
padding: 0;
font-family: Arial, Helvetica, sans-serif;
}


th{   background-color: #4CAF50;
    color: white;

} 
td {

    border-bottom: 1px solid #ddd;
    text-align: center;
}
    </style>
  
</head>
<body>

<center>
<h2> Lista de Curriculos Cadastrados </h2>
<br> 
<a href="index.php"><button name="voltar" >Voltar</button></a>
<div class ="card">
<table class="table">
  <thead class="thead-light">
  <tr>
  <th width="50" >Id</th>
  <th width="200" >Nome</th>
  <th width="200" >Email</th>
  <th width="300" >Formação</th>
  <th width="80" >Pesquisar</th>
  <th width="80" >Editar</th>
  <th width="80" >Excluir</th>
  </tr>
  </thead>
  <tbody>
     
<?php

include("conexao.php");
$sql = "SELECT * FROM perfil";
$res = mysqli_query($conect, $sql);      

 while ($r = mysqli_fetch_array($res)) {

    $emailperfil = $r['email'];

echo '<tbody>
<tr>
<td width="50">'.$r['id'].'</td>
 <td width="200">'.$r['nome'].'</td>
  <td width="200">'.$r['email'].'</td>
  <td width="300">'.$r['curso'].'</td>
  <td width="80" > 
 <a href="curriculo.php?up='.$emailperfil.'" ><img src="img/lupa.png" width="10" height="16" > </a> 
  </td>
  <td width="80" > 
 <a href="editar.php?up='.$emailperfil.'" ><img src="img/update.png" width="16" height="16" > </a> 
  </td>
  <td width="80" ><a href=excluir.php?ex='.$emailperfil.'><img src="img/excluir.png" width="16" height="16" > </a>  
  </td>
 </tr>';

}


?>

</body>
</html>