<?php
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


include("conexao.php");

 
if (isset($enviar)) {

   if(isset($email)){ 
 
      #Recebe o Email Postado
      $emailPostado = $email;
   
      $sql = mysqli_query($conect, "SELECT * FROM perfil WHERE email = '{$emailPostado}'") or print mysql_error();
      #Se o retorno for maior do que zero, diz que já existe um.
      if(mysqli_num_rows($sql)>0) 
          echo '<script>
          alert("Email já cadastrado, favor usar outro email!");
          window.location="index.php";
          
          </script>'; 
      else 
   

$perfil = "INSERT INTO perfil (id, nome, celular, email, github, escolaridade, curso, anoconclusao, nvidioma, idioma, resumo) 
VALUES ('NULL','$nome' , '$celular', '$email', '$github', '$escolaridade', '$curso', '$anoconclusao','$nvidioma', '$idioma', '$resumo')";
$perfil = mysqli_query($conect,$perfil);


$exp = "INSERT INTO experiencias (email_cand, anoadm1, anodem1, empresa1, cargo1, anoadm2, anodem2, empresa2, 
cargo2,anoadm3, anodem3, empresa3, cargo3) 
VALUES ('$email', '$anoadm1', '$anodem1', '$empresa1', '$cargo1', '$anoadm2', '$anodem2', '$empresa2', 
'$cargo2','$anoadm3', '$anodem3', '$empresa3', '$cargo3')";
$exp = mysqli_query($conect, $exp);

$comp = "INSERT INTO competencias (email_cand, comp1, comp2, comp3, comp4, comp5, comp6) 
VALUES ('$email', '$comp1', '$comp2', '$comp3', '$comp4', '$comp5', '$comp6')";
$comp  = mysqli_query($conect, $comp );



   $query = "INSERT INTO imagem (email_cand, arquivo) VALUES ('$email','$imagem')";
   $query = mysqli_query($conect,$query);


} 

 }

?>

<script>
alert("cadastrado realizado com sucesso!");
window.location="index.php";

</script>