<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <style>

        body{
            background-color: #6495ED;
        }

        h1{
            text-size: 50px;
            color: #FF4500;
            text-shadow: 
               -1px -1px 0px #000, 
               -1px 1px 0px #000,                    
                1px -1px 0px #000,                  
                1px 0px 0px #000;
                text-align: center; 
        }

        img{
        width: 150px;
        height: 150px;
        }

        .wrapper{
            text-align: center;
            display: grid;
    grid-template-columns: 30fr 5fr 5fr 6fr;
    grid-template-rows: 100px;
    grid-gap: 10px;
        }

    </style>

</head>
<body>

<br>
<h1>GERADOR DE CURRICULOS</h1>
<br><br>
<div class="wrapper">
  <div class="box1"><a href="cadastrar.php"><img src="img/cadastro.png"></a></div>
  <div class="box2"><a href="pesquisar.php"><img src="img/pesquisa.png"></a></div>
</div>

    


</body>
</html>