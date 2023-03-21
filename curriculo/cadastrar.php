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
    <button type="submit" class="btn btn-success">Enviar imagem</button>
  </div>
</form>

   <form action="cadastro.php" method="POST">
   <fieldset>
   <br>
   <legend>Dados pessoais</legend>
<?php
 error_reporting(0);
$ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
   $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   $dir = './perfil/'; //Diretório para uploads
   move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

$imagem = $new_name;

echo '<input type="image" id="imagem" name="imagem"  src="perfil/'.$imagem.'" width="150" higth="150" > <br>';

echo '<label>Arquivo: <input type="text" name="img"  value="'.$new_name.'" readonly="readonly"><br>';
  
?>



       
        <label>*Nome:  <input class="dados" type="text" name="nome" required="required"/></label><br />
        <label>*Celular:<input class="dados" type="text" name="celular" required="required"/></label><br />
        <label>*E-mail: <input class="dados" type="text" name="email" required="required"/></label><br />
        <label>*Github: <input class="dados" type="text" name="github" /></label><br />
   </fieldset>
   
   
   <fieldset>
        <legend>Formação Acadêmica</legend>
        <label>*Escolaridade:
        <select name="escolaridade" required="required">
             <option value="Ensino Médio"> Ensino Médio </option>
             <option value="Técnico"> Nível Técnico </option>
             <option value="Superior"> Nível Superior </option>
        </select>
        </label>
        <br />
        <label>*Curso:<input class="dados" type="text" name="curso" required="required"/></label><br />
        <label>*Ano Conclusão:<input class="dados" type="date" name="anoconclusao" required="required"/></label><br />
        </label>
   </fieldset>
   
   
   <fieldset>
        <legend>Idiomas</legend>
        <label>*Nivel:
        <select name="nvidioma" required="required">
             <option value="Básico"> Básico </option>
             <option value="Intermediário"> Intermediário </option>
             <option value="Avançado"> Avançado </option>
             <option value="Não Tenho"> Não Tenho </option>
        </select>
        </label>
        <br/>
        <label>
             <input type="radio" name="idioma" value="Inglês" checked> Inglês
             <input type="radio" name="idioma" value="Espanhol" > Espanhol
       </label>
   </fieldset>
   
   <fieldset>
        <legend>*Resumo</legend>
        <textarea class="resumo" type="text" name="resumo" required="required"></textarea><br />
        </label>
   </fieldset>
   
   <fieldset>
        <legend>*Experiência 1</legend>
        <table>
        <tr><td width="200"><label>Ano Admissão:<input class="dados" type="text" name="anoadm1" required="required"/></label></td>
        <td width="200"><label>Ano Demissão:<input class="dados" type="text" name="anodem1" required="required"/></label></td></tr>
        <tr><td width="200"><label>Empresa: <input class="dados" type="text" name="empresa1" required="required"/></label></td>
        <td width="200"><label>Cargo: <input class="dados" type="text" name="cargo1" required="required"/></label><br /></td>
   </table>
   </fieldset>
   
   <fieldset>
        <legend>Experiência 2</legend>
        <table>
        <tr><td width="200"><label>Ano Admissão:<input class="dados" type="text" name="anoadm2" /></label></td>
        <td width="200"><label>Ano Demissão:<input class="dados" type="text" name="anodem2" /></label></td></tr>
        <tr><td width="200"><label>Empresa: <input class="dados" type="text" name="empresa2" /></label></td>
        <td width="200"><label>Cargo: <input class="dados" type="text" name="cargo2" /></label><br /></td>
        </table>
   </fieldset>
   
   <fieldset>
        <legend>Experiência 3</legend>
        <table>
        <tr><td width="200"><label>Ano Admissão:<input class="dados" type="text" name="anoadm3" /></label></td>
        <td width="200"><label>Ano Demissão:<input class="dados" type="text" name="anodem3" /></label></td></tr>
        <tr><td width="200"><label>Empresa: <input class="dados" type="text" name="empresa3" /></label></td>
        <td width="200"><label>Cargo: <input class="dados" type="text" name="cargo3" /></label><br /></td>
        </table>
   </fieldset>
   
   <fieldset>
        <legend>Competências</legend>
        <label>*Competência 1:<input class="dados" type="text" name="comp1" required="required"/></label><br/>
        <label>*Competência 2:<input class="dados" type="text" name="comp2" required="required"/></label><br/>
        <label>*Competência 3:<input class="dados" type="text" name="comp3" required="required"/></label><br/>
        <label>Competência 4:<input class="dados" type="text" name="comp4" /></label><br/>
        <label>Competência 5:<input class="dados" type="text" name="comp5" /></label><br/>
        <label>Competência 6:<input class="dados" type="text" name="comp6" /></label><br/>
        </table>
   </fieldset>
   <center><input type="submit" name="enviar" /></center>
   </form>
   <br>
   



</body>
</html>