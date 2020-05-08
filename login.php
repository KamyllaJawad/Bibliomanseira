<?php
include "funcoes.php";

$hoje = dataCompletaExtenso();
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
    <title>Biblioteca Particular</title>
</head>

<body>
<!-- <div class="col-md-7">
<div class="container">
    <div class="row">
        
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100"  src="css/leitor2.jpg" data-holder-rendered="true">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ler faz bem!</h5>
          <p>Mantenha seu cerebro ativo!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100"  src="css/manseira.jpg" data-holder-rendered="true">
        <div class="carousel-caption d-none d-md-block">
          <h5>Obrigada Profê!</h5>
          <p>Professor Paulo manseira como mestre desse projeto.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    </div>
</div> 
</div> -->
    <!-- card de login -->
    <div class="col-md-6">
    <div class="container">
        <div class="row">
 
            
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Biblioteca Particular</h4>
                    <hr>
                    <p class="text-secondary text-center"><?php echo $hoje; ?></p>
                    <form action="entrar.php" method="post">

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input class="form-control" placeholder="Usuário" type="text" id="fUsuario" name="fUsuario">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input class="form-control" placeholder="******" type="password" id="fSenha" name="fSenha">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group// -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Entrar </button>
                                </div> <!-- form-group// -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-primary btn-block"> Limpar </button>
                                </div> <!-- form-group// -->
                            </div>
                        </div>
                        <p class="text-center"><a href="#" class="text-info">Esqueceu a senha?</a></p>
                        
                    </form>
                </article>
            </div> <!-- card.// -->

            </aside> <!-- col.// -->
        </div> <!-- row.// -->

    </div>
    </div>
    <!--container end.//-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>