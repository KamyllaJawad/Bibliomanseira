<?php
include "seguranca.php";
include "conexao.php";

$sql = "select * from emprestimos e, livros l, amigos a
        where e.livCodigo = l.livCodigo and
              e.amiCodigo = a.amiCodigo and
              e.empDataDev = ''
        order by e.empDataEmp";

$resultado = mysqli_query($conexao, $sql);

$listaEmprestimos = array();


while ($emprestimo = mysqli_fetch_assoc($resultado)) {
    $listaEmprestimos[] = $emprestimo;
}

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

    <title>Biblioteca</title>
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

    <h1 class="display-4">Lista Empréstimos</h1>
    
    <a type="button" class="btn btn-success" href="formEmprestimo.php?acao=i">Emprestar Livro</a>

    <br>
    <br>

    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col-md-2">Código do empréstimo</th>
                <th scope="col">Data do Emprestimo</th>
                <th scope="col">Livro</th>
                <th scope="col">Para quem</th>
                <th colspan="2">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaEmprestimos as $emprestimo) : ?>
                <tr>
                <th><?php echo $emprestimo['empCodigo']; ?></th>
                    <th><?php echo $emprestimo['empDataEmp']; ?></th>
                    <td><?php echo $emprestimo['livTitulo'];  ?></td>
                    <td><?php echo $emprestimo['amiNome'];  ?></td>
                    <td><a type="button" class="btn btn-link" href="formEmprestimo.php?acao=d&cod=<?php echo $emprestimo['empCodigo']; ?>">Devolver</a></td>
                    <td><a type="button" class="btn btn-danger" href="#">Excluir</a></td>
                    <!-- href=formEmprestimo.php?acao=e&cod=?php echo $emprestimo['empCodigo']; ? -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>