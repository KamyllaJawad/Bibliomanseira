<?php
	include "seguranca.php";
	include "conexao.php";
	
	$acao    = $_POST['cAcao'];
	$codigo  = $_POST['cCodigo'];
	$titulo  = $_POST['cTitulo'];
	$autor   = $_POST['cAutor'];
	$paginas = $_POST['cPaginas'];
	$genero  = $_POST['cGenero'];
	
	if ($acao == "i")
	{
		$sql = "insert into livros (livTitulo, livAutor, livPaginas, genCodigo) values ('$titulo','$autor',$paginas,$genero)";
		mysqli_query($conexao, $sql);
	}
	if ($acao == "a")
	{
		$sql = "update livros set 
					livTitulo  = '$titulo', 
					livAutor   = '$autor', 
					livPaginas = $paginas,
					genCodigo  = $genero
					where livCodigo = $codigo";
		mysqli_query($conexao, $sql);
	}
	else if ($acao == "e")
	{
		$sql = "delete from livros where livCodigo=".$codigo;
		mysqli_query($conexao, $sql);
	}
	
	header("Location: listaLivros.php");
	//echo $sql;
?>