<?php
	include "seguranca.php";
	include "conexao.php";
	
	$acao   = $_POST['cAcao'];
	$codigo = $_POST['cCodigo'];
	$nome   = $_POST['cNome'];
	
	if ($acao == "i")
	{
		$sql = "insert into generos (genNome) values ('$nome')";
		mysqli_query($conexao, $sql);
	}
	if ($acao == "a")
	{
		$sql = "update generos set 
					genNome = '$nome' 
					where genCodigo = $codigo";
		mysqli_query($conexao, $sql);
	}
	else if ($acao == "e")
	{
		$sqlDependencia = "select * from livros where genCodigo=".$codigo;
		$resDependencia = mysqli_query($conexao, $sqlDependencia);
		
		if (mysqli_affected_rows($conexao) == 0)
		{
			$sql = "delete from generos where genCodigo=".$codigo;
			mysqli_query($conexao, $sql);
		}
		
	}
	
	header("Location: listaGeneros.php");
	//echo $sql;
?>