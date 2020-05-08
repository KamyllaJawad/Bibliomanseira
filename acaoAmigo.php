<?php
	include "seguranca.php";
	include "conexao.php";
	
	$acao    = $_POST['cAcao'];
	$codigo  = $_POST['cCodigo'];
	$nome  = $_POST['cNome'];
	$email   = $_POST['cEmail'];
	$telefone = $_POST['cTelefone'];
	
	if ($acao == "i")
	{
		$sql = "insert into amigos (amiNome, amiEmail, amiTelefone) values ('$nome','$email','$telefone')";
		mysqli_query($conexao, $sql);
	}
	if ($acao == "a")
	{
		$sql = "update amigos set 
        amiNome  = '$nome', 
        amiEmail   = '$email', 
        amiTelefone = '$telefone'
				where amiCodigo = $codigo";
		mysqli_query($conexao, $sql);
	}
	else if ($acao == "e")
	{
		$sql = "delete from amigos where amiCodigo=".$codigo;
		mysqli_query($conexao, $sql);
	}
	
	header("Location: listaAmigos.php");
	//echo $sql;
?>