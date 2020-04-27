<?php
	include "seguranca.php";
	include "conexao.php";

	$sql = "select * from generos";
	$resultado = mysqli_query($conexao, $sql);
	
	$listaGeneros = array();
	while ($gen = mysqli_fetch_assoc($resultado))
	{
		$listaGeneros[] = $gen;
	}
?>


<html>
	<head>
        <!-- Required meta tags -->
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Biblioteca</title>
	</head>
	
	<body>
		<h1>Lista de Generos</h1>
	
		<p><a href="formGenero.php?acao=i">Incluir</a> | <a href="principal.php">Principal</a></p>
		<table border=1>
			<tr>
				<td>Código</td>
				<td>Nome</td>
				<td colspan=2>Opções</td>
			</tr>
			
			<?php foreach ($listaGeneros as $gen) : ?>
			<tr>
				<td><?php echo $gen['genCodigo']; ?></td>
				<td><?php echo $gen['genNome']; ?></td>
                <td><a href="formGenero.php?acao=a&cod=<?php echo $gen['genCodigo']; ?>">Alterar</a></td>
                <td><a href="formGenero.php?acao=e&cod=<?php echo $gen['genCodigo']; ?>">Excluir</a></td>

			</tr>
			<?php endforeach; ?>
			
		</table>
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	</body>
</html>