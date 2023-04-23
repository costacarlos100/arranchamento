<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="./favicon.ico">  
    <title>Arranchamento</title>
    
    <?php
    //Includes e teste de sessão
    require_once "./inc/conf.php";
    require_once "./inc/funcoes.php";
    session_start(); 
    
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) ) {
        unset($_SESSION['login']); 
        unset($_SESSION['senha']); 
        header('location:index.php'); } 
    
    //Se usuário não é administrador sai da página
    if($_SESSION['tipo_acesso']!='ADMINISTRADOR'){
        echo"<script>
                alert('Você não é administrador!');
                history.back();            
            </script>
            ";        
    }
    
    //Se chegou até aqui, a página abre
    $logado = $_SESSION['login'];
    ?>
    
    <!-- Complemento -->
    <link rel="stylesheet" href="./complemento.css" type="text/css">
    
    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">

    <!-- Material Design fonts -->
    <link rel="stylesheet" href="./material_design/dependencias/roboto.css" type="text/css">
    <link href="./material_design/dependencias/materialicons" rel="stylesheet">

    <link href="./material_design/dependencias/snackbar.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" href="css/stylesAdm.css">
    </head>
<body>
<div class="container" id="container">
        <div class="panel-heading">
            <table style="width:100%">
                <tr>
                    <th >
                        <img  id="admImg" src="./img/adm.png" height="48">
                        <span id="funcao"><b>Administrador</span>
                    </th>
                    <th style="text-align:right">
                        <a href="arranchamento_form.php" title="Arranchamento" id="arrancha" class="botaosair"><img src="./img/arranchamento.png" width="30px"></a>
                        <a href="logout.php" title="Sair" class="botaosair"><img src="./img/sair.png" width="30px"></a>
                    </th>
                </tr>
            </table>

        </div>
    </div>



    <!--Ícones da área de Administrador-->
    <div class="panel-body">
        <div style="margin-top:0px;
    display:                 -webkit-flex; /* Safari */
    display:                 flex;
    -webkit-flex-wrap:       wrap;         /* Safari 6.1+ */
    flex-wrap:               wrap;
    -webkit-justify-content: center;       /* Safari 6.1+ */
    justify-content:         center;
    ">
            <?php

        //icone_adm('','./img/bloquear.png','Bloqueio de Rancho - Em breve');
        icone_adm('','./img/expedientes_diferenciados.png','HORÁRIOS');
        //icone_adm('','./img/configuracoes.png','Gerenciamento de Contas - Em breve');
        icone_adm('./relatorio','./img/relatorios.png','RELATÓRIO');
        
        ?>
        </div>
    </div>
</div>


</body>
</html>