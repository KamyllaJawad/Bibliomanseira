<?php
	include "seguranca.php";
	include "conexao.php";
	
	$acao       = $_POST['cAcao'];
	$codigo     = $_POST['cCodigo'];
	$dataEmp    = $_POST['cDataEmp'];
	$codLiv     = $_POST['cCodLivro'];
	$codAmi     = $_POST['cCodAmigo'];
	$empDataDev = $_POST['cDataDev'];
	
	
	if ($acao == "i")
	{
		$sql = "insert into emprestimos (empDataEmp, livCodigo, amiCodigo) 
		        values ('$dataEmp',$codLiv,$codAmi)";
		mysqli_query($conexao, $sql);
	}
	if ($acao == "d")
	{
		$sql = "update emprestimos set				                 
					empDataDev	    = '$empDataDev'
					where empCodigo = $codigo";
		mysqli_query($conexao, $sql);
	}
	else if ($acao == "e")
	{
		//
	}
	
	header("Location: listaEmprestimos.php");
	//echo $sql;
