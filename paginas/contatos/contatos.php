<header class="mb-2">
    <h4><i class="fas fa-address-card"></i> Contatos</h4>
    <div class="row">
    <div class="col-sm-2">
        <a href="index.php?menuop=cad-contato" class="btn btn-success"><i class="fas fa-user-plus"></i>Novo Contato</a>
        </div>
        <div class="col-sm-10">
        <form action="index.php?menuop=contatos" method="post" class="form-inline my-2 my-lg-0">
            <input name="txtpesquisa" class="form-control col-sm-10 mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    </div>
</header>
<table class="table table-sm table-light table-bordered">
    <thead>
        <tr>
            <th><spam class="text-primary">ID</spam></th>
            <th><spam class="text-primary">Nome</spam></th>
            <th><spam class="text-primary">Telefone</spam></th>
            <th><spam class="text-primary">CEP</spam></th>
            <th><spam class="text-primary">Endereço</spam></th>
            <th><spam class="text-primary">Bairro</spam></th>
            <th><spam class="text-primary">Cidade</spam></th>
            <th><spam class="text-primary">Estado</spam></th>
            <th><spam class="text-primary">Editar</spam></th>
            <th><spam class="text-primary">Excluir</spam></th>             
        </tr>
    </thead>
    <tbody>
    <?php

    $quantidade = 10;
    $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
    $inicio = ($quantidade * $pagina) - $quantidade;

    $txtpesquisa = (isset($_POST["txtpesquisa"]))?$_POST["txtpesquisa"]:"";
    $sql = "SELECT
    idContato,
    upper(nomeContato) AS nomeContato,
    telefoneContato,
    cepContato,
    upper(enderecoContato) AS enderecoContato,
    upper(bairroContato) AS bairroContato,
    upper(cidadeContato) AS cidadeContato,
    upper(estadoContato) AS estadoContato
FROM tbcontatos 
WHERE 
idContato='{$txtpesquisa}' or
nomeContato LIKE '%{$txtpesquisa}%'
ORDER BY nomeContato ASC
LIMIT $inicio , $quantidade
";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
    while($dados = mysqli_fetch_assoc($rs) ){

    ?>
        <tr>
            <td><?=$dados["idContato"] ?></td>
            <td><?=$dados["nomeContato"] ?></td>
            <td><?=$dados["telefoneContato"] ?></td>
            <td><?=$dados["cepContato"] ?></td>
            <td><?=$dados["enderecoContato"] ?></td>
            <td><?=$dados["bairroContato"] ?></td>
            <td><?=$dados["cidadeContato"] ?></td>
            <td><?=$dados["estadoContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"] ?>"><img src="img/pencil.png" alt="editar" title="Editar" width="25px"></a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"] ?>" onclick="return confirm('Deseja realmente excluir <?=$dados["nomeContato"] ?>?')"><img src="img/lixeiramoderna.png" alt="excluir" title="Excluir" width="25px"></a></td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>
<br>
<?php
    $sqltotal = "SELECT idContato FROM tbcontatos";
    $qrtotal = mysqli_query($conexao,$sqltotal) or die(mysqli_error($conexao));
    $numtotal = mysqli_num_rows($qrtotal);
    $totalpagina = ceil($numtotal/$quantidade);
    echo "Total de registros: $numtotal <br> ";
    echo '<a href="?menuop=contatos&pagina=1">Primeira pagina</a> ';
if($pagina>6){
    ?>
        <a href="?menuop=contatos&pagina=<?php echo $pagina-1?>"> << </a>
    <?php
}

    for($i=1;$i<=$totalpagina;$i++){
        
        if($i>=($pagina-5) && $i<= ($pagina+5)){
            if($i==$pagina){
                echo $i;
            }else{
                echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a>  ";
            }
        }
    }
    
    if($pagina<($totalpagina-5)){
        ?>
            <a href="?menuop=contatos&pagina=<?php echo $pagina+1?>"> >> </a>
        <?php
    }
   
    echo "<a href=\"?menuop=contatos&pagina=$totalpagina\">Última pagina</a> ";

?>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>