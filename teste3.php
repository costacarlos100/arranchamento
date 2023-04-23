<?php
    $data1 = $_POST['data1'];
    if(isset($_POST['segundac'])){ $segundac = $_POST['segundac']; }else{ $segundac = 'N';}
    if(isset($_POST['segundaa'])){ $segundaa = $_POST['segundaa']; }else{ $segundaa = 'N';}
    if(isset($_POST['segundaj'])){ $segundaj = $_POST['segundaj']; }else{ $segundaj = 'N';}

    $data2 = $_POST['data2'];
    if(isset($_POST['tercac'])){ $tercac = $_POST['tercac']; }else{ $tercac = 'N';}
    if(isset($_POST['tercaa'])){ $tercaa = $_POST['tercaa']; }else{ $tercaa = 'N';}
    if(isset($_POST['tercaj'])){ $tercaj = $_POST['tercaj']; }else{ $tercaj = 'N';}

    $data3 = $_POST['data3'];
    if(isset($_POST['quartac'])){ $quartac = $_POST['quartac']; }else{ $quartac = 'N';}
    if(isset($_POST['quartaa'])){ $quartaa = $_POST['quartaa']; }else{ $quartaa = 'N';}
    if(isset($_POST['quartaj'])){ $quartaj = $_POST['quartaj']; }else{ $quartaj = 'N';}

    $data4 = $_POST['data4'];
    if(isset($_POST['quintac'])){ $quintac = $_POST['quintac']; }else{ $quintac = 'N';}
    if(isset($_POST['quintaa'])){ $quintaa = $_POST['quintaa']; }else{ $quintaa = 'N';}
    if(isset($_POST['quintaj'])){ $quintaj = $_POST['quintaj']; }else{ $quintaj = 'N';}

    $data5 = $_POST['data5'];
    if(isset($_POST['sextac'])){ $sextac = $_POST['sextac']; }else{ $sextac = 'N';}
    if(isset($_POST['sextaa'])){ $sextaa = $_POST['sextaa']; }else{ $sextaa = 'N';}
    if(isset($_POST['sextaj'])){ $sextaj = $_POST['sextaj']; }else{ $sextaj = 'N';}

    $data1 = str_replace("/","-", $data1);
    print($data1);

    print($segundac. ' - ' .$segundaa. ' - ' .$segundaj);

    print($tercac. ' - ' .$tercaa. ' - ' .$tercaj);

    print($quartac. ' - ' .$quartaa. ' - ' .$quartaj);
    
    print($quintac. ' - ' .$quintaa. ' - ' .$quintaj);

    print($sextac. ' - ' .$sextaa. ' - ' .$sextaj);

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


    function salvar($conexao, $cpf, $data, $cafe, $almoco, $jantar){
        $query = "SELECT * FROM arranchamento, militares WHERE arranchamento.cpf = $cpf";
        $result = $conexao->query($query);
        $row2 = $result->fetch_object();
        $data1 = str_replace("/","-", $data);

        $query = "SELECT * FROM arranchamento WHERE arranchamento.cpf = '$cpf' AND data = '$data1'";
        $result = $conexao->query($query);
        $row = $result->fetch_object();

        if($row->Id >= 1){
            $querySeg = "UPDATE arranchamento SET cafe = '$cafe', almoco = '$almoco', jantar = '$jantar' WHERE Id = $row->Id";
        }else{
            $querySeg = "INSERT INTO arranchamento(Id,cpf, data, cafe, almoco, jantar, justificativa_sexta, hierarquia) VALUES (NULL, '$cpf','$data1','$cafe','$almoco','$jantar', NULL ,'$row2->hierarquia');";
        }

        $result = $conexao->query($querySeg);
    }


    salvar($conexao, $logado, $data1, $segundac, $segundaa, $segundaj);
    salvar($conexao, $logado, $data2, $tercac, $tercaa, $tercaj);
    salvar($conexao, $logado, $data3, $quartac, $quartaa, $quartaj);
    salvar($conexao, $logado, $data4, $quintac, $quintaa, $quintaj);
    salvar($conexao, $logado, $data5, $sextac, $sextaa, $sextaj);

    echo "<script>alert('Arranchamento Realizado com Suceso!');</script>";
    header("Location: teste2.php");
?>
