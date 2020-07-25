<?php
	require ("SimpleDOM.php");
	require_once ("config.php");
	require_once ("funcoes.php");
	$buscar = !empty($_REQUEST["buscar"]) ? $_REQUEST["buscar"] : "";
	$opc	= !empty($_REQUEST["opc"]) ? $_REQUEST["opc"] : "nome";
	$order	= !empty($_REQUEST["order"]) ? $_REQUEST["order"] : "@nome";
	$id		= !empty($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	$by		= !empty($_REQUEST["by"]) ? $_REQUEST["by"] : "a";
	$byC	= ($by == "d") ? "a" : "d";

    $action = isset($_GET['action']) ? $_GET['action'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Ramais</title>
	<link rel="stylesheet" type="text/css" href="print.css" media="print" /> 
	
	
	<SCRIPT LANGUAGE="JavaScript1.2">
	//	function alerta(){
	//	alert('A página não pode ser salva.');
	//	return false;
	//	}
	//	function verificaBotao(oEvent){
	//	var oEvent = oEvent ? oEvent : window.event;
	//	var tecla = (oEvent.keyCode) ? oEvent.keyCode : oEvent.which;
	//	if(tecla == 17 || tecla == 44|| tecla == 106){
	//	alerta();
	//	}
	//	}
	</SCRIPT>
	<SCRIPT LANGUAGE="JavaScript1.2">
		//document.onkeypress = verificaBotao;
		//document.onkeydown = verificaBotao;
		//document.oncontextmenu = alerta;
	</script>




    <!-- Bootstrap -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>
<body>
<div id="naoimprime"> 
<div align="right"><font size="2" ><a href="../agenda/">Acessar como Administrador</a><font color="white">+++...</font></font></div><div align="right"><font size="2" ><a href="../">Voltar ao Menu Principal</a><font color="white">+++...</font></font></div>
    <div class="container">
        <h1>LISTA DE RAMAIS</h1>
<br>
    
        <div class="row">
            <div class="col-md-5">

    
                <?php
                if($_REQUEST){
                    switch ($action){
                        case "add":
                            // adicionando
                            include ('xml-adicionar.php');
                            break;
                        case "del":
                            // apagando
                            include ('xml-deletar.php');
                            break;
                        case "edt":
                            // editando
                            include ('xml-editar.php');
                            break;
                    }
                }
                ?>
            </div><!-- col-md-4 -->
    
            <div class="col-md-8">
                <?php require 'xml-buscar.php' ?>
            </div><!-- col-md-8 -->
    
        </div><!-- row -->
    
    </div><!-- container -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="js/main.js" type="text/javascript"></script>
    <!-- MakedInput -->
    <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $("#linkExcluir").click(function (e) {

                var $modal = $('#modalExclusao');
                parent = $(this).closest('tr');
                $modal.data("parent", parent);
                $modal.modal('show');

                $modal.find("#btnExcluir").on('click', function(){
                    var parent = $modal.data("parent");

                    $modal.modal('hide');

                    parent.fadeOut(400, function () {
                        parent.remove();
                    });
                    var href = $("#linkExcluir").attr("href");
                    window.location.href = href;
                });

                // prevenindo clique no link
                e.preventDefault();
            });
        });
    </script>
</div> 
<div id="imprime">
<p>
Lista apenas para consulta!.
<br>
</p>
</div>

<div align=right>
<img src='https://contador.s12.com.br/img-c8w3Bby5d4w2cC6W-27.gif' border='0' >
<script type='text/javascript' src='https://contador.s12.com.br/ad.js?id=c8w3Bby5d4w2cC6W'>
</script>
</div>


</body>
</html>
