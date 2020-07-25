<style type="text/css">
body {
	background-color: #CCC;
}
</style>
<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
ini_set( 'display_errors', 0 );


$user = $_POST['user'];
$pass = $_POST['pass'];
 include("bd.php");
if($valida[$user]==$pass && $pass!=""){
setcookie("logado", "1");
 echo "<script>location.href='main.php'</script>";
 }
 else{
	echo "<center><img src=login.jpg>";
	echo "<br><br><br><br><br><br>";
	echo "<center><font face=verdana size=4>";
	echo "Usu&aacute;rio ou senha incorretos!";
	echo "<br>";
	echo "<a href=index.html>";
	echo "Clique aqui</a> para tentar novamente.";
	echo "</a></font>";
 }
?>