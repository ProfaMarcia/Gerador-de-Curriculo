<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo</title>

 <style>
* {
  box-sizing: border-box;
}

html, body {

  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
}

nav {
  float: left;
  width: 30%;
  height: 800px; 
  background: #4682B4;
  padding: 20px;
  text-align: center;

}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 800px; 
}

section::after {
  display: table;
  clear: both; 
}

#fotoperfil{
	width:200px;
	height:200px;
	background-color:#666;
	border-radius: 100px;
    margin: auto;
    display: block;
	}


    h1{
    color: #fff;
    font-size: 20px;

	}

    h3{
    background-color: black;
    color: #fff; 
    }

    .icone{
        color: #00ffff;
    }

    .dados{
    color: #fff;
text-align: justify;
}

.form_ano{
    color: #00ffff;
text-align: center;
font-weight: bold;
text-size: 20px;
}

.formacao{
color: #fff;
text-align: center;
font-weight: bold;

}

.idioma{
    color: #00ffff;
text-align: center;
font-weight: bold;
text-size: 20px;
}
.idiomanv{
color: #fff;
text-align: center;
font-weight: bold;

}

.resumo{
color: #000;
font-weight: bold;
}

.cargo{
color: #000;
font-weight: bold;
}

.empresa{
color: #000;
font-weight: bold;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }

  }

  @media print {
    @page {
        margin-top: 60px;
        margin-bottom: 60px;
       
       
    }
    body {
        padding-top: 72px;
        padding-bottom: 72px ;
       
    }

}

</style>
</head>
<body>
    
<section>
<nav>

<?php

$up = $_GET["up"];
include("conexao.php");

$perfil = "SELECT * FROM imagem WHERE email_cand='$up'";
$resp = mysqli_query($conect, $perfil);      

while ($rp = mysqli_fetch_array($resp)) {
 
echo'<img id="fotoperfil" src="perfil/'.$rp['arquivo'].'" >';

}

$sql = "SELECT * FROM perfil WHERE email='$up'";
$res = mysqli_query($conect, $sql);      
                        
  while ($r = mysqli_fetch_array($res)) {

echo '<h1>'.$r['nome'].' </h1>';
            
echo'<br>
<h3>Contato</h3>

<table>
    <tr>
        <td class="icone" width="50"> &#9742;</td><td class="dados">'.$r['celular'].'</td></tr>
          <tr>
        <td class="icone" width="50">&#9993;</td><td class="dados">'.$r['email'].'</td></tr>
        <tr>
        <td class="icone" width="50">&#9787;</td><td class="dados">'.$r['github'].'</td></tr>';
     
echo'</table>
<br>

<h3>Formação Acadêmica</h3>

<p class="form_ano">'.date('d/m/Y', strtotime($r['anoconclusao'])).'</p>
<p class="formacao"> '.$r['curso'].' </p>

<h3>Idiomas</h3>

<p class="idioma">'.$r['idioma'].'</p>
<p class="idiomanv">'.$r['nvidioma'].' </p>
   
</nav>

  <article>
    <h1 class="resumo">SOBRE MIM</h1>
    <p>'.$r['resumo'].'</p>
   
<br>';
}
 
    echo '<h1 class="resumo">EXPERIÊNCIAS PROFISSIONAIS</h1>
   <br>
    <table>
    <tr>';

    $exp = "SELECT * FROM experiencias WHERE email_cand='$up'";
$rexp = mysqli_query($conect, $exp);      
                        
  while ($rex = mysqli_fetch_array($rexp)) {

    //Exeperiencia profissional 1

      echo  '<td width="300">Admissão: '.$rex['anoadm1'].' </td><td width="300">Demissão: '.$rex['anodem1'].'</td></tr>
        <tr>
        <td width="300" class="empresa">Empresa: '.$rex['empresa1'].'</td><td width="300" class="cargo">Cargo: '.$rex['cargo1'].'</td></tr>';
        echo ' <tr heigth="20"><td colspan="2"><hr></td> </tr>';
        //Exeperiencia profissional 2  
        echo  '<td width="300">Admissão: '.$rex['anoadm2'].' </td><td width="300">Demissão: '.$rex['anodem2'].'</td></tr>
        <tr>
        <td width="300" class="empresa">Empresa: '.$rex['empresa2'].'</td><td width="300" class="cargo">Cargo: '.$rex['cargo2'].'</td></tr>';
       echo ' <tr heigth="20"><td colspan="2"><hr></td> </tr>';
           //Exeperiencia profissional 3
       
        echo  '<td width="300">Admissão: '.$rex['anoadm3'].' </td><td width="300">Demissão: '.$rex['anodem3'].'</td></tr>
        <tr>
        <td width="300" class="empresa">Empresa: '.$rex['empresa3'].'</td><td width="300" class="cargo">Cargo: '.$rex['cargo3'].'</td></tr>';
   
    echo '</table><br>';

    }

    $comp = "SELECT * FROM competencias WHERE email_cand='$up'";
    $rcomp = mysqli_query($conect, $comp);      
                            
      while ($rc = mysqli_fetch_array($rcomp)) {
   echo '<h1 class="resumo">COMPETÊNCIAS</h1>

    <table>
        <tr>
        <td width="300" class="empresa">'.$rc['comp1'].'</td></tr>
        <tr>
        <td width="300" class="empresa">'.$rc['comp2'].'</td></tr>
        <tr>
        <td width="300" class="empresa">'.$rc['comp3'].'</td></tr>
        <tr>
        <td width="300" class="empresa">'.$rc['comp4'].'</td></tr>
        <tr>
        <td width="300" class="empresa">'.$rc['comp5'].'</td></tr>
        <tr>
        <td width="300" class="empresa">'.$rc['comp6'].'</td></tr>';
        
        
      }
    ?>
    </tr>
     </table>
   
  </article>

 <center> 
  <form>
   <input type="button" value="Imprimir" onClick="window.print()" />
</form></center>

</section>
</body>
</html>