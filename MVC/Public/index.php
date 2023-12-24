<?php
 session_start();
   //ESTA E A PAGINA PRINCIPAL DO APP, RESPONSAVEL PELO GERENCIAMETO
  
   //INLUINDO ALGUNS ARQUIVOS NECESSARIOS
  include './../App/config.php';
  include './../App/autoload.php'; 
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=App_name?></title>
    <link rel="stylesheet" href="<?=URL?>/Public/Css/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?=URL?>/Public/Css/tudo.css">
    <link rel="stylesheet" href="<?=URL?>/Public/Css/home.css">
    <link rel="stylesheet" href="<?=URL?>/Public/Css/header.css">
    <link rel="stylesheet" href="<?=URL?>/Public/Css/footer.css">
    <style>
            *{  color: white;
                box-sizing: border-box;
                padding: 0;
                margin: 0;
                font-family: sans-serif, arial, verdana;
            }
            body{
                background-color:rgba(5, 6, 54, .7);
            }
    </style>
</head>
<body>
<?php

    //INSTANCIANDO A CLASSE RESPONSAVEL PELOS CAMINHOS OU ROTAS
        new rota();
?>
    
</body>
</html>