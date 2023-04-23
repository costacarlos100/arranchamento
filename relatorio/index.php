<!DOCTYPE html>
<html>
<!-- MEMO: update me with `git checkout gh-pages && git merge master && git push origin gh-pages` -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../favicon.ico">
  

  <!--Includes do Calendário-->  
<link rel="stylesheet" type="text/css" href="./calendario/calpopup.css">
<script src="./calendario/calpopup.js" type="text/javascript"></script>
<script type="text/javascript" src="./calendario/dateparse.js"></script>  
  
  <title>Arranchamento Digital - EASA</title>
  
  <!--CSS de complemento-->
  <link href="../complemento.css" rel="stylesheet">    
  <link href="../css/stylesAdm.css" rel="stylesheet">    


  <!-- Fonte -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">

  <link href="../material_design/dependencias/snackbar.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onLoad="document.formlogin.login.focus();" onclick="diminui();">


<div class="containerRel">
  <!-- Form 
================================================== -->  
  <div class="panel panel-info" >

    <div class="panel-heading">
        <table style="width:100%">
            <tr>
                <th> <img src="../img/arranchamento.png" height="48" id="admImg">
                    <span id="funcao"><b>Opções de Relatório</span>
                </th>
                <th >
                    <button onclick="history.back();" class="buttonvoltar"></button>
                </th>
            </tr>
        </table>
    </div>

    <div class="panel-body" method="post" onclick="diminui();">
        <form class="form-horizontal" method="post" action="relatorio.php" id="frm" name="frm">
           <center>
            <label class="infoRel">Selecione a data no calendário</label><br>

            <div class="inputRel">
                <input type="date" name="calendario_data" id="calendario_data" onblur="dp_dateFormat='d-mm-yyyy'"; size="11"  >
            </div>
            </center>
            <center>
            <label class="infoRel">Companhia</label><br>

            <div class="inputRel">
              <select name="companhia" id="companhiaRel">
                <option value="ccap" selected>CCAP</option>
                <option value="cdm">CDM</option>
                <option value="csm">CSM</option>
              </select>
            </div>
            </center>

       
        <div class="form-group" style="width:230px;margin-left:auto;margin-right:auto;">  
              
               <div id="radioPerson">
        <div class="radio-container">
            <label for="radio">
                <input type="radio" id="radio" name="optionsRadios" value="oficial"/>
                <div class="custom-radio">
                <span></span>
                </div>
                <span>Oficiais</span>
            </label>
            </div>

            <div class="radio-container">
            <label for="radio1">
                <input type="radio" id="radio1" name="optionsRadios" value="subsgt"/>
                <div class="custom-radio">
                <span></span>
                </div>
                <span>Sub Ten e Sgt</span>
            </label>
            </div>

            <div class="radio-container">
            <label for="radio2">
                <input type="radio" id="radio2" name="optionsRadios" value="cbsd" checked=""/>
                <div class="custom-radio">
                <span></span>
                </div>
                <span>Cabos e Soldados</span>
            </label>
            </div>
        </div>                             
                  <br>
                  <input type="submit" value="Gerar Relação" id="botaoRel"> 
               </div>
            </div>
        </div>    
        
        </form>
    </div>
  </div>

<br>
<script src="../material_design/dependencias/jquery-1.10.2.min.js"></script>
<script src="../material_design/dependencias/bootstrap.min.js"></script>
<script>
</script>
<script src="../material_design/dist/js/ripples.min.js"></script>
<script src="../material_design/dist/js/material.min.js"></script>
<script src="../material_design/dependencias/snackbar.min.js"></script>

<script src="../material_design/dependencias/jquery.nouislider.min.js"></script>


<script>
  $(function () {
    $.material.init();
    $(".shor").noUiSlider({
      start: 40,
      connect: "lower",
      range: {
        min: 0,
        max: 100
      }
    });

    $(".svert").noUiSlider({
      orientation: "vertical",
      start: 40,
      connect: "lower",
      range: {
        min: 0,
        max: 100
      }
    });
  });
</script>
</body>
</html>
