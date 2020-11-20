<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo-padrao.css">
<link href="fontawesome/css/all.css" rel="stylesheet">
<header>
    <h3>Cadastro de Contato</h3>
</header>
<div>
<form action="index.php?menuop=inserir-contato" method="post" onsubmit="return validar()" enctype="multipart/form-data">
    
    <div class="input-group mb-3" style="width: 50%">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
        </div>
            <input type="text" name="nomeContato" class="form-control" id="nomeContato" aria-describedby="inputGroup-sizing-default">
            <div id="errosn"></div>
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Telefone</span>
     </div>
    <input type="text" name="telefoneContato" class="form-control" id="telefoneContato" placeholder="(00) 00000-0000" aria-describedby="inputGroup-sizing-default" onkeyup="somenteNumeros(this);">
    <div id="erros"></div>
    </div>

    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">CEP</span>
     </div>
    <input type="text" name="cepContato" class="form-control" aria-describedby="inputGroup-sizing-default" id="cepContato" placeholder="00000000" value="" onblur="pesquisacep(this.value);" onkeyup="somenteNumeros(this);" required>
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Endereço</span>
     </div>
    <input type="text" name="enderecoContato" id="enderecoContato" placeholder="Rua, nº" class="form-control" aria-describedby="inputGroup-sizing-default" required>
    </div>

    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Bairro</span>
     </div>
    <input type="text" name="bairroContato" id="bairroContato" class="form-control" aria-describedby="inputGroup-sizing-default" required>
    </div>
    
    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Cidade</span>
     </div>
    <input type="text" name="cidadeContato" id="cidadeContato" class="form-control" aria-describedby="inputGroup-sizing-default" required>
    </div>

    <div class="input-group mb-3" style="width: 50%">
     <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
     </div>
    <input type="text" name="estadoContato" id="estadoContato" class="form-control" aria-describedby="inputGroup-sizing-default" required>
    </div>

    <div>
        <input type="submit" value="Adicionar" name="btnAdicionar">
    </div>
</form>
</div>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    
    function limpa_formulário_cepContato() {
            document.getElementById('enderecoContato').value=("");
            document.getElementById('bairroContato').value=("");
            document.getElementById('cidadeContato').value=("");
            document.getElementById('estadoContato').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('enderecoContato').value=(conteudo.logradouro);
            document.getElementById('bairroContato').value=(conteudo.bairro);
            document.getElementById('cidadeContato').value=(conteudo.localidade);
            document.getElementById('estadoContato').value=(conteudo.uf);
        }
        else {
            limpa_formulário_cepContato();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        var cepContato = valor.replace(/\D/g, '');

        if (cepContato != "") {

            var validacepContato = /^[0-9]{8}$/;

            if(validacepContato.test(cepContato)) {

                document.getElementById('enderecoContato').value="...";
                document.getElementById('bairroContato').value="...";
                document.getElementById('cidadeContato').value="...";
                document.getElementById('estadoContato').value="...";

                var script = document.createElement('script');

                script.src = 'https://viacep.com.br/ws/'+ cepContato + '/json/?callback=meu_callback';

                document.body.appendChild(script);

            } 
            else {
                limpa_formulário_cepContato();
                alert("Formato de CEP inválido.");
            }
        }
        else {
            limpa_formulário_cepContato();
        }
    }
</script>
<script>
        var enomeContato = document.getElementById("nomeContato");
        var etelefoneContato = document.getElementById("telefoneContato");
        var vnomeContato, vtelefoneContato;
        function validar()
        {
            
            vnomeContato = enomeContato.value;
            if(vnomeContato.length<4)
            {
                alert('Nome muito curto!');
                return false;
            }
            vtelefoneContato = etelefoneContato.value;
            if(vtelefoneContato.length>15)
            {
                alert('Número de telefone inválido! Exemplo:(00) 00000-0000');
                return false;
            }
            else if(vtelefoneContato.length<10)
            {
                alert('Número de telefone inválido! Exemplo:(00) 00000-0000');
                return false;
            }
        }

        function somenteNumeros(num) {
            var er = /[^0-9-./() ]/;
            er.lastIndex = 0;
            var campo = num;
            if (er.test(campo.value)) {
            campo.value = "";
            }
    }
</script>