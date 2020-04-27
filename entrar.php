<?php
	session_start();
	
	include "conexao.php";
	
	$sqlBusca = "select * from usuarios where usuLogin='".$_POST['fUsuario']."' and usuSenha='".$_POST['fSenha']."'";
	$resultado = mysqli_query($conexao, $sqlBusca);
	$qtdLinhas = mysqli_num_rows($resultado);
	
	if ($qtdLinhas>0)
	{
		$tbUsuarios = mysqli_fetch_array($resultado);
		$_SESSION['usu']=$tbUsuarios['usuCodigo'];
		
		header("Location: principal.php"); 
	}
	else
	{
		$mensagem = "Usuário inexistente ou senha incorreta!";
	}
?>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Biblioteca Particular</title>
	</head>
	
	<body>
		<h1>Biblioteca Particular</h1>
		
		<p><?php echo $mensagem; ?></p>
        <p>Clique <a href="index.php">aqui</a> para voltar</p>


        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>