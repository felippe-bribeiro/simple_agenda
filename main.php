
<?php
ini_set('default_charset','UTF-8');
if(IsSet($_COOKIE["logado"])){}
else{
echo '<meta http-equiv="refresh" content="0;url=/agenda/index.html">';
exit; 

}

if(isset($_GET['url'])){
  $url=$_GET['url'];
}
else {
  $url="";
}

$url=(empty($url))?"main":$url;

?>
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
<html lang="pt-br">
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Ramais</title>
	

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

    <div class="container">
        <h1>LISTA DE RAMAIS</h1>
<br>
    
        <div class="row">
            <div class="col-md-3">
    
                <?php if (empty($action)){ ?>
                    <a href="main.php?action=add" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> ADICIONAR CONTATO</a>
                <?php } ?>
    
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

</body>
</html>
