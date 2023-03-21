<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<style>



.dados {
    width: 200px;
    height: 25px;    
    box-sizing: border-box;
    margin: 10px;
}

.resumo {
    width: 600px;
    height: 50px;    
    box-sizing: border-box;
    margin: 10px;
}

</style>

</head>

<body>






<form method="POST" enctype="multipart/form-data">
  <label for="conteudo">Enviar imagem:</label>
  <input type="file" name="pic" accept="image/*" class="form-control">

  <div align="center">
    <button type="submit" name="carregar" class="btn btn-success">Enviar imagem</button>
  </div>
</form>

   <form action="atualizar.php" method="POST">
   <fieldset>
   <br>
   <legend>Dados pessoais</legend>
<?php
error_reporting(0);
session_start(); # Deve ser a primeira linha do arquivo
$_SESSION['emailperfil'] = $_GET["up"];

$_SESSION['emailperfil'];

include("conexao.php");
$up = $_GET["up"];
$carregarimg = $_POST['carregar'];
$imagem = $_POST['pic'];
$sql = "SELECT * FROM imagem WHERE email_cand='$up'";
$res = mysqli_query($conect, $sql);      

if (isset($carregarimg)) {


     $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
     $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
     $dir = './perfil/'; //Diretório para uploads
     move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 


echo '<input type="image" id="imagem" name="imagem"  src="perfil/'.$new_name.'" width="150" higth="150" > <br>';

echo '<label>Arquivo: <input type="text" name="img"  value="'.$new_name.'" readonly="readonly"><br>';
}

else {




 while ($r = mysqli_fetch_array($res)) {
     $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
     $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
     $dir = './perfil/'; //Diretório para uploads
     move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 


echo '<input type="image" id="imagem" name="imagem"  src="perfil/'.$r['arquivo'].'" width="150" higth="150" > <br>';

echo '<label>Arquivo: <input type="text" name="img"  value="'.$r['arquivo'].'" readonly="readonly"><br>';
 }
}

$perfil = "SELECT * FROM perfil WHERE email='$up'";
$resp = mysqli_query($conect, $perfil);      


 while ($rp = mysqli_fetch_array($resp)) {

       
      echo ' <label>Identificador:<input type="text" name="id" size="1"  value="'.$rp['id'].'" readonly="readonly"><br><br>
      <label>Nome:  <input class="dados" type="text"  value="'.$rp['nome'].'" name="nome" /></label><br />
        <label>Celular:<input class="dados" type="text"  value="'.$rp['celular'].'" name="celular" /></label><br />
        <label>E-mail: <input class="dados" type="text"  value="'.$rp['email'].'" name="email" /></label><br />
        <label>Github: <input class="dados" type="text"  value="'.$rp['github'].'"name="github" /></label><br />
   </fieldset>';


   
   
  echo'<fieldset>
        <legend>Formação Acadêmica</legend>
        <label>Escolaridade:
        <select name="escolaridade"> 
          <option value="'.$rp['escolaridade'].'"> '.$rp['escolaridade'].' </option>
             <option value="Ensino Médio"> Ensino Médio </option>
             <option value="Técnico"> Nível Técnico </option>
             <option value="Superior"> Nível Superior </option>
        </select>
        </label>
        <br />
        <label>Curso:<input class="dados" type="text" name="curso" value="'.$rp['curso'].'" /></label><br />
        <label>Ano Conclusão:<input class="dados" type="date" name="anoconclusao" value="'.$rp['anoconclusao'].'" /></label><br />
        </label>
   </fieldset>
   
   
   <fieldset>
        <legend>Idiomas</legend>
        <label>Nivel:
        <select name="nvidioma">
        <option value="'.$rp['nvidioma'].'"> '.$rp['nvidioma'].' </option>
             <option value="Básico"> Básico </option>
             <option value="Intermediário"> Intermediário </option>
             <option value="Avançado"> Avançado </option>
        </select>
        </label>
        <br/>
        <label>
          <input type="radio" name="idioma" value="'.$rp['idioma'].'" checked>Idioma cadastrado é o: '.$rp['idioma'].'
             <input type="radio" name="idioma" value="ingles"> Inglês
             <input type="radio" name="idioma" value="espanhol" > Espanhol
       </label>
   </fieldset>
   
   <fieldset>
        <legend>Resumo</legend>
        <textarea class="resumo" type="text" name="resumo">'.$rp['resumo'].'</textarea><br />';

     }
        

     $exp = "SELECT * FROM experiencias WHERE email_cand='$up'";
$rexp = mysqli_query($conect, $exp);      


 while ($rex = mysqli_fetch_array($rexp)) {


     echo'</label>
   </fieldset>
   
   <fieldset>
        <legend>Experiência 1</legend>
        <table>
        <tr><td width="200"><label>Ano Admissão:<input class="dados" type="text" value="'.$rex['anoadm1'].'" name="anoadm1" /></label></td>
        <td width="200"><label>Ano Demissão:<input class="dados" type="text" name="anodem1" value="'.$rex['anodem1'].'" /></label></td></tr>
        <tr><td width="200"><label>Empresa: <input class="dados" type="text" name="empresa1" value="'.$rex['empresa1'].'" /></label></td>
        <td width="200"><label>Cargo: <input class="dados" type="text" name="cargo1" value="'.$rex['cargo1'].'" /></label><br /></td>
   </table>
   </fieldset>
   
   <fieldset>
        <legend>Experiência 2</legend>
        <table>
        <tr><td width="200"><label>Ano Admissão:<input class="dados" type="text" name="anoadm2" value="'.$rex['anoadm2'].'" /></label></td>
        <td width="200"><label>Ano Demissão:<input class="dados" type="text" name="anodem2" value="'.$rex['anodem2'].'" /></label></td></tr>
        <tr><td width="200"><label>Empresa: <input class="dados" type="text" name="empresa2" value="'.$rex['empresa2'].'" /></label></td>
        <td width="200"><label>Cargo: <input class="dados" type="text" name="cargo2" value="'.$rex['cargo2'].'" /></label><br /></td>
        </table>
   </fieldset>
   
   <fieldset>
        <legend>Experiência 3</legend>
        <table>
        <tr><td width="200"><label>Ano Admissão:<input class="dados" type="text" name="anoadm3" value="'.$rex['anoadm3'].'" /></label></td>
        <td width="200"><label>Ano Demissão:<input class="dados" type="text" name="anodem3" value="'.$rex['anodem3'].'" /></label></td></tr>
        <tr><td width="200"><label>Empresa: <input class="dados" type="text" name="empresa3" value="'.$rex['empresa3'].'" /></label></td>
        <td width="200"><label>Cargo: <input class="dados" type="text" name="cargo3" value="'.$rex['cargo3'].'" /></label><br /></td>
        </table>
   </fieldset>';

}

$comp = "SELECT * FROM competencias WHERE email_cand='$up'";
$rcomp = mysqli_query($conect, $comp);      


 while ($rc = mysqli_fetch_array($rcomp)) {
   
   
   echo '<fieldset>
        <legend>Competências</legend>
        <label>Competência 1:<input class="dados" type="text" name="comp1" value="'.$rc['comp1'].'" /></label><br/>
        <label>Competência 2:<input class="dados" type="text" name="comp2" value="'.$rc['comp2'].'"/></label><br/>
        <label>Competência 3:<input class="dados" type="text" name="comp3" value="'.$rc['comp3'].'"/></label><br/>
        <label>Competência 4:<input class="dados" type="text" name="comp4" value="'.$rc['comp4'].'"/></label><br/>
        <label>Competência 5:<input class="dados" type="text" name="comp5" value="'.$rc['comp5'].'"/></label><br/>
        <label>Competência 6:<input class="dados" type="text" name="comp6" value="'.$rc['comp6'].'"/></label><br/>';

     }

        ?>
        </table>
   </fieldset>
   <center><input type="submit" name="enviar" /></center>
   </form>
   <br>
   
  


</body>
</html>