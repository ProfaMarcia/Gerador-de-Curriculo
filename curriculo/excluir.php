
<form method="POST">
    <h2> Deseja mesmo Excluir?
    <button name="sim" type="submit">Sim</button>
    <button name="nao"  type="submit">Não</button>
</form>

<?php
include("conexao.php");
error_reporting(0);
$ex = $_GET["ex"];
$sim = $_POST["sim"];
$nao = $_POST["nao"];


if (isset($ex)) {
if (isset($sim)) {

   
   //Excluir perfil
    $sql = "DELETE FROM perfil WHERE email='$ex'";
	if(mysqli_query($conect, $sql)){
      
	} 
	else{
    echo "Erro ao deletar os dados $sqlm. ". mysqli_error($conect);
}


 //Excluir imagem
    $sql = "DELETE FROM imagem WHERE email_cand='$ex'";
	if(mysqli_query($conect, $sql)){
      
	} 
	else{
    echo "Erro ao deletar os dados $sqlm. ". mysqli_error($conect);
}


 //Excluir competencias
    $sql = "DELETE FROM competencias WHERE email_cand='$ex'";
	if(mysqli_query($conect, $sql)){
      
	} 
	else{
    echo "Erro ao deletar os dados $sqlm. ". mysqli_error($conect);
}

 //Excluir experiencias

    $sql = "DELETE FROM experiencias WHERE email_cand='$ex'";
	if(mysqli_query($conect, $sql)){
      
	} 
	else{
    echo "Erro ao deletar os dados $sqlm. ". mysqli_error($conect);
}
echo '<script>
window.location="pesquisar.php";
</script>';

}


if (isset($nao)) {

    echo '<script>
    window.location="pesquisar.php";
    </script>';

}
}

?>

