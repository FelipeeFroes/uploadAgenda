<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo-padrao.css">
<link href="fontawesome/css/all.css" rel="stylesheet">

<?php
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tbcontatos WHERE idContato= {$idContato}";
$rs = mysqli_query($conexao,$sql) or die("Erro ao recuperar os dados do registro. " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>
<header>
    <h3>Editar Contato</h3>
</header>

<div>
<form action="index.php?menuop=atualizar-contato" method="post">
    <div class="input-group mb-3" style="width: 50%">
    <div class="input-group-prepend">
        <label for="idContato" class="input-group-text" id="inputGroup-sizing-default">ID</label>
    </div>
        <input type="text" name="idContato" value="<?=$dados["idContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default">
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
     </div>
    <input type="text" name="nomeContato" value="<?=$dados["nomeContato"]?>" class="form-control" id="nomeContato" aria-describedby="inputGroup-sizing-default">
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Telefône</span>
     </div>
    <input type="text" name="telefoneContato" value="<?=$dados["telefoneContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">CEP</span>
     </div>
    <input type="text" name="cepContato" value="<?=$dados["cepContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default" id="cepContato" onblur="pesquisacep(this.value);">
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Endereço</span>
     </div>
    <input type="text" name="enderecoContato" id="enderecoContato" value="<?=$dados["enderecoContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Bairro</span>
     </div>
    <input type="text" name="bairroContato" id="bairroContato" value="<?=$dados["bairroContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default">
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Cidade</span>
     </div>
    <input type="text" name="cidadeContato" id="cidadeContato" value="<?=$dados["cidadeContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
     </div>
    <input type="text" name="estadoContato" id="estadoContato" value="<?=$dados["estadoContato"]?>" class="form-control" aria-describedby="inputGroup-sizing-default">
    </div>

    <div>
        <input type="submit" value="Atualizar" name="btnAtualizar">
    </div>
</form>
</div>