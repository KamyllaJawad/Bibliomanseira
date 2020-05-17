<?php
include "seguranca.php";
include "conexao.php";

$acao = $_GET['acao'];

if ($acao  == "d" || $acao == "e") {
    //comandos para Devolver ou Excluir um emprestimo
    $codigo    = $_GET['cod'];
    $sql       = "select * from emprestimos where empCodigo=" . $codigo;
    $resultado = mysqli_query($conexao, $sql);
    $emprestimo     = mysqli_fetch_array($resultado);

} else // a ação é "i"
{
    $emprestimo = array();
    $emprestimo['empCodigo'] = null;
    $emprestimo['empDataEmp'] = "";
    $emprestimo['livCodigo']   = 0;
    $emprestimo['amiCodigo'] = 0;
    $emprestimo['empDataDev'] = "";    
}

if ($acao == "i") {
    $titulo = "Emprestar um livro";
    $etiqueta = "Emprestar";
    $status = "";
    $msgConfirma = "Confirma empréstimo?";
} else if ($acao == "d") {
    $titulo      = "Devolução de livro";
	$etiqueta    = "Devolver livro";
	$status      = "readonly";
	$msgConfirma = "Confirma Devolução?";
} else if ($acao == "e") {
    //
} else {
    $titulo = "Erro";
}

//recupera a lista de livros
$sql_livros = "select * from livros order by livTitulo";
$resultado_livros = mysqli_query($conexao, $sql_livros);

//recupera a lista de amigos
$sql_amigos = "select * from amigos order by amiCodigo";
$resultado_amigos = mysqli_query($conexao, $sql_amigos);

?>

<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD de livros</title>
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

    <h2><?php echo $titulo ?></h2>

    <form action="acaoEmprestimo.php" method="POST">
        <input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">
        <table border=0>
            <tr>
                <td>Codigo</td>
                <td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $emprestimo['empCodigo']; ?>" size="4"></td>
            </tr>
            
            <tr>
                <td>Data do Emprestimo</td>
                <td><input <?php echo $status;?> type="date" name="cDataEmp" id="cDataEmp" value="<?php echo $emprestimo['empDataEmp']; ?>" size="20"></td>
            </tr>
            
            <?php if ($acao == "d") { ?>
            <tr>
                <td>Data da Devolução</td>
                <td><input type="date" name="cDataDev" id="cDataDev" value="<?php echo $emprestimo['empDataDev']; ?>" size="20"></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Livro</td>
                <td>
                    <select name="cCodLivro" id="cCodLivro">

                        <?php foreach ($resultado_livros as $livros) 
                        { 
                            if ($emprestimo['livCodigo'] == $livros['livCodigo'])
                            {
                                $sel = "selected";
                            }
                            else
                            {
                                 $sel = "";   
                            }
                        ?>
                            <option value="<?php echo $livros['livCodigo']; ?>" <?php echo $sel;?>>
                                <?php echo $livros['livTitulo']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Amigo</td>
                <td>
                    <select name="cCodAmigo" id="cCodAmigo">

                        <?php foreach ($resultado_amigos as $amigo) 
                        { 
                            if ($emprestimo['amiCodigo'] == $amigo['amiCodigo'])
                            {
                                $sel = "selected";
                            }
                            else
                            {
                                 $sel = "";   
                            }
                        ?>
                        <option value="<?php echo $amigo['amiCodigo']; ?>" <?php echo $sel;?>>
                            <?php echo $amigo['amiNome']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="<?php echo $etiqueta; ?>" onclick="return confirma();">
                </td>

                <td>
                    <input type="button" value="Voltar" onclick="history.go(-1);">
                </td>
                
                <td>
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