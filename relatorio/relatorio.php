<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
require_once "../inc/conf.php";
?>
<title>Sistema de Arranchamento / EASA</title>
<link rel="stylesheet" type="text/css" href="./stylesrelatorio.css">

<?php
//$turma = $_GET["turma"];
$data = $_POST["calendario_data"];
$companhia = $_POST['companhia'];
$select_filtro = $_POST["optionsRadios"];//Post vindo do arquivo index.php, com configurações de select
//echo $select_filtro;
    

?>
<meta charset="UTF-8">
</head>

<body>

<!--Botão para voltar a página-->
<button onclick="history.back();"></button>

<a class="titulo"><img src="../img/logo_dcmun.png" width="50px"><br><strong><?php echo "Depósito Central de Munição"; ?></strong></a><br>
<a>Relatório de Arranchamento</a>
<br>

<!--Define o título do relatório-->
<?php
if($select_filtro=="oficial") $titulo = "Oficiais";
if($select_filtro=="subsgt") $titulo = "Sub Ten e Sgt";
if($select_filtro=="cbsd") $titulo = "Cabos e Soldados";
?>

<h3><?php echo $titulo;?></h3>
<h1>Dia: <?php echo $data;?></h1>

<?php
#Pega a sigla da Graduação
$gradSigla = $select_filtro;

//Conexão
$conexao = new mysqli($host,$user,$pass,$db);
mysqli_set_charset($conexao , "utf8");
if (!$conexao){die("A conexão falhou: " . $conexao->connect_error);}

$data_sql = date('Y-m-d', strtotime($data));//converte Data para o formato do banco de dados
$queryPrincipal = "SELECT * FROM arranchamento, militares WHERE militares.cpf=arranchamento.cpf and data='$data_sql' and militares.gradSigla='$gradSigla' and militares.companhia = '$companhia' AND ";
$query = $queryPrincipal." cafe='S'";
//Calcula número de arranchados para o café
$result0 = $conexao->query($query);
$totalcaf = $result0->num_rows;

?>

<?php
//Calcula n�mero de arranchados para o almoço
$qntAlmoco =$queryPrincipal." almoco='S'";
$result0 = $conexao->query($qntAlmoco);
$totalaml = $result0->num_rows;
?>

<?php
//Calcula n�mero de arranchados para o jantar
$qntJantar = $queryPrincipal . " jantar='S'";
$result0 = $conexao->query($qntJantar);
$totaljan = $result0->num_rows;
?>


<!--Nomes-->
<a class="titulo" style="font-size:28px"></a><br>
<table style="width:100%;color:black;border: 1px solid black;font-size:14px;padding:4px">
  <tr>
    <th width="16%">Café: <?php echo $totalcaf ?> </th>
    <th width="16%">Almoço: <?php echo $totalaml ?> </th>
    <th width="16%">Jantar: <?php echo $totaljan ?> </th>
  </tr>
  <tr>
  
    <td style="border: 1px solid black;text-align:left;vertical-align:top;padding:10px">
    <?php
	$arranch0 = $queryPrincipal." cafe='S' ORDER BY arranchamento.hierarquia, militares.nomeguerra ASC";
	$query = $conexao->query($arranch0);
	while ($dados = $query->fetch_object()) {
  		echo '<div class=\'datapeq\'>'.'<img src=\'../img/box_select.png\' width=\'16px\'> '.$dados->posto.' '.$dados->nomeguerra.'</div>'.'<br>';
	}
    ?>
    </td>
    
    <td style="border: 1px solid black;text-align:left;vertical-align:top;padding:10px">
    <?php
	$arranch0 = $queryPrincipal." almoco='S' ORDER BY arranchamento.hierarquia, militares.nomeguerra ASC";
	$query = $conexao->query($arranch0);
        while ($dados = $query->fetch_object()) {
  		echo '<div class=\'datapeq\'>'.'<img src=\'../img/box_select.png\' width=\'16px\'> '.$dados->posto.' '.$dados->nomeguerra.'</div>'.'<br>';
	}
    ?>
    
    </td>
    
    <td style="border: 1px solid black;text-align:left;vertical-align:top;padding:10px">
    <?php
		$arranch0 = $queryPrincipal." jantar='S' and data='$data_sql' and arranchamento.cpf=militares.cpf or arranchamento.hierarquia = 14 and jantar='S'  and data='$data_sql' and arranchamento.cpf=militares.cpf ORDER BY arranchamento.hierarquia, militares.nomeguerra ASC";
	  $query = $conexao->query($arranch0);
	  while ($dados = $query->fetch_object()) {
  		  echo '<div class=\'datapeq\'>'.'<img src=\'../img/box_select.png\' width=\'16px\'> '.$dados->posto.' '.$dados->nomeguerra.'</div>'.'<br>';
	  }
    ?>
    
    </td>
    
  </tr>
</table>





</body>
</html>
