<?php
include "seguranca.php";
include "conexao.php";

$sql = "select * from amigos";
$resultado = mysqli_query($conexao, $sql);

$listaAmigos = array();
while ($amigos = mysqli_fetch_assoc($resultado)) {
    $listaAmigos[] = $amigos;
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

        <!-- Image and text -->
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


  
  <h1 class="display-4">Bem vindo a seus amigos!</h1>
  <p class="lead">lorem ipsum</p>
  <p class="lead">lorem ipsum</p>
  <a class="btn btn-success" role="button" href="formamigo.php?acao=i">Incluir amigo</a>


    <h1>Lista de Amigos </h1>

<br>

    <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col-md-2">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th colspan="2">Opções</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($listaAmigos as $amigos) : ?>
            <tr>
                <th><?php echo $amigos['amiCodigo']; ?></th>
                <td><?php echo $amigos['amiNome']; ?></td>
                <td><?php echo $amigos['amiEmail'];  ?></td>
                <td><?php echo $amigos['amiTelefone'];  ?></td>
                <td><button type="button" class="btn btn-link"> <a href="formamigo.php?acao=a&cod=<?php echo $amigos['amiCodigo']; ?>">Alterar</a></button></td>
                <td><button type="button" class="btn btn-danger"> <a href="formamigo.php?acao=e&cod=<?php echo $amigos['amiCodigo']; ?>">Excluir</a></button></td>

            </tr>
        <?php endforeach; ?>

    </tr>

  </tbody>
</table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>