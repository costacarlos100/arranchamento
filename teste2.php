<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arranchamento 2.0</title>
</head>
<body>
  <?php
    require_once "./inc/conf.php";
    require_once "./inc/funcoes.php";
    session_start();
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location:index.php');
    }
    $logado = $_SESSION['login'];

    $conexao = new mysqli($host, $user, $pass, $db);
      mysqli_set_charset($conexao, "utf8");
      if(!$conexao){
        die("A conexão falhou: " . $conexao->connect_error);
      }

      $seleciona = "SELECT datacomeco FROM datateste WHERE companhia = 'CCAP'";
      $result = $conexao->query($seleciona);
      $row = $result->fetch_object();

      foreach($row as $r){
        #print($r);
      }

      function retornaInfo($conexao, $data, $cpf){
        $query = "SELECT * FROM arranchamento, militares WHERE arranchamento.cpf = $cpf AND arranchamento.data = '$data'";
        $result = $conexao->query($query);
        $row1 = $result->fetch_object();

        return $row1;
      }

    ?>
    <?php
        $i = 1;
        $dia1 = date('Y/m/d', strtotime("+{$i} days",strtotime($r)));
        $dia1Info = retornaInfo($conexao, $dia1, $logado);
        $i = 2;
        $dia2 = date('Y/m/d', strtotime("+{$i} days",strtotime($r))); 
        $dia2Info = retornaInfo($conexao, $dia2, $logado);
        $i = 3;
        $dia3 = date('Y/m/d', strtotime("+{$i} days",strtotime($r))); 
        $dia3Info = retornaInfo($conexao, $dia3, $logado);
        $i = 4;
        $dia4 = date('Y/m/d', strtotime("+{$i} days",strtotime($r))); 
        $dia4Info = retornaInfo($conexao, $dia4, $logado);
        $i = 5;
        $dia5 = date('Y/m/d', strtotime("+{$i} days",strtotime($r))); 
        $dia5Info = retornaInfo($conexao, $dia5, $logado);
        $i = 6;
        $dia6 = date('Y/m/d', strtotime("+{$i} days",strtotime($r)));
        $dia6Info = retornaInfo($conexao, $dia6, $logado);
        $i = 7;
        $dia7 = date('Y/m/d', strtotime("+{$i} days",strtotime($r))); 
        $dia7Info = retornaInfo($conexao, $dia7, $logado);
        print(str_replace("/","", $dia1)."j");

        
    ?>
    <img src="img/cafe.png" alt="" width="20px">
    <img src="img/almoco.png" alt="" width="20px">
    <img src="img/jantar.png" alt="" width="20px"><br>
    <form action="teste3.php" method="post">
        <input type="data" name='data1' value="<?php echo $dia1; ?>">
        
        <input type='checkbox' id='inputBox' name='segundac' value='S' <?php if(isset($dia1Info)){ if($dia1Info->cafe == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='segundaa' value='S' <?php if(isset($dia1Info)){ if($dia1Info->almoco == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='segundaj' value='S' <?php if(isset($dia1Info)){ if($dia1Info->jantar == 'S'){echo 'checked=""';}} ?>  ><br>
        
        <input type="data" name='data2' value="<?php echo $dia2; ?>">
        <input type='checkbox' id='inputBox' name='tercac' value='S' <?php if(isset($dia2Info)){ if($dia2Info->cafe == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='tercaa' value='S' <?php if(isset($dia2Info)){ if($dia2Info->almoco == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='tercaj' value='S' <?php if(isset($dia2Info)){ if($dia2Info->jantar == 'S'){echo 'checked=""';}} ?>  ><br>

        <input type="data" name='data3' value="<?php echo $dia3; ?>">
        <input type='checkbox' id='inputBox' name='quartac' value='S' <?php if(isset($dia3Info)){ if($dia3Info->cafe == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='quartaa' value='S' <?php if(isset($dia3Info)){ if($dia3Info->almoco == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='quartaj' value='S' <?php if(isset($dia3Info)){ if($dia3Info->jantar == 'S'){echo 'checked=""';}} ?>  ><br>

        <input type="data" name='data4' value="<?php echo $dia4; ?>">
        <input type='checkbox' id='inputBox' name='quintac' value='S' <?php if(isset($dia4Info)){ if($dia4Info->cafe == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='quintaa' value='S' <?php if(isset($dia4Info)){ if($dia4Info->almoco == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='quintaj' value='S' <?php if(isset($dia4Info)){ if($dia4Info->jantar == 'S'){echo 'checked=""';}} ?>  > <br>

        <input type="data" name='data5' value="<?php echo $dia5; ?>">
        <input type='checkbox' id='inputBox' name='sextac' value='S' <?php if(isset($dia5Info)){ if($dia5Info->cafe == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='sextaa' value='S' <?php if(isset($dia5Info)){ if($dia5Info->almoco == 'S'){echo 'checked=""';}} ?>  >
        <input type='checkbox' id='inputBox' name='sextaj' value='S' <?php if(isset($dia5Info)){ if($dia5Info->jantar == 'S'){echo 'checked=""';}} ?>  >

        <input type="submit" value="enviar">
    </form>
</body>
</html>