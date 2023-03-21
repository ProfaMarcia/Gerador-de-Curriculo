<?php
session_start(); # Deve ser a primeira linha do arquivo
$_SESSION['emailperfil'];


error_reporting (0);
include("conexao.php");

$emailperfil = $_SESSION['emailperfil'];
$id = $_POST["id"];
$imagem = $_POST["img"];
$nome = $_POST["nome"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$github = $_POST["github"];
$escolaridade = $_POST["escolaridade"];
$curso = $_POST["curso"];
$anoconclusao = $_POST["anoconclusao"];
$nvidioma = $_POST["nvidioma"];
$idioma= $_POST["idioma"];
$resumo = $_POST["resumo"];

$anoadm1 = $_POST["anoadm1"];
$anodem1 = $_POST["anodem1"];
$empresa1 = $_POST["empresa1"];
$cargo1 = $_POST["cargo1"];

$anoadm2 = $_POST["anoadm2"];
$anodem2 = $_POST["anodem2"];
$empresa2 = $_POST["empresa2"];
$cargo2 = $_POST["cargo2"];

$anoadm3 = $_POST["anoadm3"];
$anodem3 = $_POST["anodem3"];
$empresa3 = $_POST["empresa3"];
$cargo3 = $_POST["cargo3"];

$comp1 = $_POST["comp1"];
$comp2 = $_POST["comp2"];
$comp3 = $_POST["comp3"];
$comp4 = $_POST["comp4"];
$comp5 = $_POST["comp5"];
$comp6 = $_POST["comp6"];

$enviar= $_POST["enviar"];



if (isset($enviar)) {


   
$altcomp = "UPDATE competencias  SET email_cand='$email', comp1='$comp1', comp2='$comp2', 
comp3='$comp3', comp4='$comp4', comp5='$comp5', comp6='$comp6' WHERE email_cand='$emailperfil'";
if(mysqli_query( $conect,$altcomp))
{  
 
}
else
{  
echo "Atualização falhou; ".mysqli_error($altcomp);  
}




$altexp = "UPDATE experiencias  SET email_cand='$email', anoadm1='$anoadm1', anodem1='$anodem1', empresa1='$empresa1', 
cargo1='$cargo1', anoadm2='$anoadm2', anodem2='$anodem2', empresa2='$empresa2', cargo2='$cargo2',anoadm3='$anoadm3',
anodem3='$anodem3', empresa3='$empresa3', cargo3='$cargo3' WHERE email_cand='$emailperfil'"; 
if(mysqli_query( $conect,$altexp))

{  

}
else
{  
echo "Atualização falhou; ".mysqli_error($altexp);  
}

$altimg = "UPDATE imagem  SET email_cand='$email', arquivo='$imagem' WHERE email_cand='$emailperfil'"; 
if(mysqli_query( $conect,$altimg))

{  

}
else
{  
echo "Atualização falhou; ".mysqli_error($altimg);  
}


$altper = "UPDATE perfil SET  nome='$nome', celular='$celular', email='$email', github='$github', escolaridade='$escolaridade', 
curso='$curso', anoconclusao='$anoconclusao', nvidioma='$nvidioma', idioma='$idioma', resumo='$resumo' WHERE email='$emailperfil'"; 
if(mysqli_query( $conect,$altper))

{  

}
else
{  
echo "Atualização falhou; ".mysqli_error($altper);  
}



echo'<script>
alert("Alteração de cadastrado realizado com sucesso!");
window.location="pesquisar.php";

</script>';

session_destroy();

session_unset(); //limpamos as variaveis globais das sessões


}













?>
