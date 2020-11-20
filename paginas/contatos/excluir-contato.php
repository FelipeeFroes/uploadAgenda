<header>
<h3>Excluir Contato</h3>
</header>
<?php
    $idContato = mysqli_real_escape_string($conexao,$_GET["idContato"]);
    
    $sql = "DELETE FROM tbcontatos WHERE idContato = '{$idContato}'";
       mysqli_query($conexao,$sql) or die("Erro ao executar a consulta. " . mysqli_error($conexao));
       echo "O registro foi excluido com sucesso! Aguarde...";
       header("Refresh: 2; URL=index.php?menuop=contatos");
?>