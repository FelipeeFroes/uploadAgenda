<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo-padrao.css">
<link href="fontawesome/css/all.css" rel="stylesheet">
<header>
    <h3>Atualizar Contato</h3>
</header>
<?php
    $idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]);
    $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
    $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
    $cepContato = mysqli_real_escape_string($conexao, $_POST["cepContato"]);
    $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
    $bairroContato = mysqli_real_escape_string($conexao, $_POST["bairroContato"]);
    $cidadeContato = mysqli_real_escape_string($conexao, $_POST["cidadeContato"]);
    $estadoContato = mysqli_real_escape_string($conexao, $_POST["estadoContato"]);
    $sql = "UPDATE tbcontatos SET
    nomeContato = '{$nomeContato}',
    telefoneContato = '{$telefoneContato}',
    cepContato = '{$cepContato}',
    enderecoContato = '{$enderecoContato}',
    bairroContato = '{$bairroContato}',
    cidadeContato = '{$cidadeContato}',
    estadoContato = '{$estadoContato}'
    WHERE idContato = '{$idContato}'
    ";
        mysqli_query($conexao,$sql) or die("Erro ao executar a consulta." . mysqli_error($conexao));

        echo "O registro foi atualizado com sucesso! Aguarde...";
        header("Refresh: 2; URL=index.php?menuop=contatos");
?>