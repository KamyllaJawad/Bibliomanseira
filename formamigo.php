<?php
include "seguranca.php";
include "conexao.php";

$acao = $_GET['acao'];


if ($acao == "a" || $acao == "e") {
    $codigo = $_GET['cod'];
    $sql = "select * from amigos where amiCodigo=" . $codigo;

    $resultado = mysqli_query($conexao, $sql);
    $amigos = mysqli_fetch_array($resultado);
} else // a ação é "i"
{
    $amigos = array();
    $amigos['amiCodigo']  = null;
    $amigos['amiNome']  = "";
    $amigos['amiEmail']   = "";
    $amigos['amiTelefone'] = 0;
}

if ($acao == "i") {
    $nome = "Inclusão de amigo";
    $etiqueta = "Incluir amigo";
    $status = "";
    $msgConfirma = "Confirma Inclusão?";
} else if ($acao == "a") {
    $nome = "Alteração de amigo";
    $etiqueta = "Alterar amigo";
    $status = "";
    $msgConfirma = "Confirma Alteração?";
} else if ($acao == "e") {
    $nome = "Exclusão de amigo";
    $etiqueta = "Excluir amigo";
    $status = "readonly";
    $msgConfirma = "Confirma Exclusão?";
} else {
    $nome = "Erro";
}

?>
<html>
<!-- Required meta tags -->
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
    <title>CRUD de Amigos</title>
</head>

<body>
    <h1>CRUD de amigos</h1>
    <h2><?php echo $nome ?></h2>


    <form action="acaoAmigo.php" method="POST">

        <input type="hidden" name="cAcao" id="cAcao" value="<?php echo $acao; ?>">

        <table border=0>

            <tr>
                <td>Código</td>
                <td><input readonly type="text" name="cCodigo" id="cCodigo" value="<?php echo $amigos['amiCodigo']; ?>" size="4"></td>
            </tr>

            <tr>
                <td>Nome</td>
                <td><input <?php echo $status; ?> type="text" name="cNome" id="cNome" value="<?php echo $amigos['amiNome']; ?>" size="50"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input <?php echo $status; ?> type="text" name="cEmail" id="cEmail" value="<?php echo $amigos['amiEmail']; ?>" size="50"></td>
            </tr>

            <tr>
                <td>Telefone</td>
                <td><input <?php echo $status; ?> type="text" name="cTelefone" id="cTelefone" value="<?php echo $amigos['amiTelefone']; ?>" size="4"></td>
            </tr>


            <tr>
                <td>
                    <input type="submit" value="<?php echo $etiqueta; ?>" >
                </td>

                <td>
                    <input type="button" value="Voltar" onclick="history.go(-1);">

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