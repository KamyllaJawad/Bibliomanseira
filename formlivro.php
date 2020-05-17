<?php
include "seguranca.php";
include "conexao.php";

$acao = $_GET['acao'];


if ($acao == "a" || $acao == "e") {
    $codigo = $_GET['cod'];
    $sql = "select * from livros where livCodigo=" . $codigo;

    $resultado = mysqli_query($conexao, $sql);
    $livro = mysqli_fetch_array($resultado);
} else // a ação é "i"
{
    $livro = array();
    $livro['livCodigo']  = null;
    $livro['livTitulo']  = "";
    $livro['livAutor']   = "";
    $livro['livPaginas'] = 0;
    $livro['genCodigo']  = 0;
}


if ($acao == "i") {
    $titulo = "Inclusão de livro";
    $etiqueta = "Incluir livro";
    $status = "";
    $msgConfirma = "Confirma Inclusão?";
} else if ($acao == "a") {
    $titulo = "Alteração de livro";
    $etiqueta = "Alterar livro";
    $status = "";
    $msgConfirma = "Confirma Alteração?";
} else if ($acao == "e") {
    $titulo = "Exclusão de livro";
    $etiqueta = "Excluir livro";
    $status = "readonly";
    $msgConfirma = "Confirma Exclusão?";
} else {
    $titulo = "Erro";
}



// recupera a lista de generos
$sql2 = "select * from generos";
$resultado2 = mysqli_query($conexao, $sql2);


?>
<html>
<!-- Required meta tags -->
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
    <title>CRUD de Livros</title>

    <script type="text/javascript">
        function confirma() {
            if (confirm("<?php echo $msgConfirma; ?>")) {
                return true;
            } else {
                return false;
            }
        }
    </script>



</head>

<body>

  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">

    <a class="navbar-brand" href="principal.php">
      <img src="css/icon3.png" width="30" height="30" class="d-inline-block align-top" alt=""> Home</a>
    <!-- Opções da Nav -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="listaLivros.php">Livros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listaGeneros.php">Gêneros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listaAmigos.php">Amigos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Empréstimo</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="listaEmprestimos.php">Lista de Empréstimo</a>
          <!-- <a class="dropdown-item" href="#">Solicitar</a>
          <a class="dropdown-item" href="#">Autorizar empréstimo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Devolver Livro</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Sair</a>
      </li>
    </ul>
  </nav>
  <!-- Fim total da nav bar -->


    <h1>CRUD de Livros</h1>
    <h2><?php echo $titulo ?></h2>


    <form action="acaoLivro.php" method="POST">

        <input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">

        <table border=0>

            <tr>
                <td>Código</td>
                <td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $livro['livCodigo']; ?>" size="4"></td>
            </tr>

            <tr>
                <td>Título</td>
                <td><input <?php echo $status; ?> type="text" name="cTitulo" id="cTitulo" value="<?php echo $livro['livTitulo']; ?>" size="50"></td>
            </tr>

            <tr>
                <td>Autor</td>
                <td><input <?php echo $status; ?> type="text" name="cAutor" id="cAutor" value="<?php echo $livro['livAutor']; ?>" size="50"></td>
            </tr>

            <tr>
                <td>Páginas</td>
                <td><input <?php echo $status; ?> type="text" name="cPaginas" id="cPaginas" value="<?php echo $livro['livPaginas']; ?>" size="4"></td>
            </tr>


            <tr>
                <td>Genero</td>
                <td>
                    <select name="cGenero" id="cGenero" <?php echo $status; ?>>

                        <?php foreach ($resultado2 as $genero) { ?>
                            <option value="<?php echo $genero['genCodigo']; ?>" <?php if ($livro['genCodigo'] == $genero['genCodigo']) echo "selected"; ?>>
                                <?php echo $genero['genNome']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="<?php echo $etiqueta; ?>" onclick="return confirma();"></td>

                <td><input type="button" value="Voltar" onclick="history.go(-1);">
                    <input type="reset" value="Recarregar">
                </td>
            </tr>
        </table>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>