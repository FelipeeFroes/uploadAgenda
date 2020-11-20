<?php
include("db/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo-padrao.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <title>Agenda JN MOURA</title>
    
</head>
<body>
    <div>
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                    <div class="container">
                    <img src="img/newlogo.png" width="50" height="50" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?menuop=home">Home <span class="sr-only">(página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menuop=contatos">Contatos</a>
                    </li>
                    </ul>
                    </div>

                </div>
                </nav>
            
        </header>
    </div>
        <main>
        <div>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
            switch ($menuop) {
                case 'home':
                    include("paginas/home/home.php");
                    break;
                case 'contatos':
                    include("paginas/contatos/contatos.php");
                    break;
                case 'cad-contato':
                    include("paginas/contatos/cad-contato.php");
                    break;
                case 'inserir-contato':
                    include("paginas/contatos/inserir-contato.php");
                    break;
                case 'editar-contato':
                    include("paginas/contatos/editar-contato.php");
                    break;
                case 'atualizar-contato':
                    include("paginas/contatos/atualizar-contato.php");
                    break;
                case 'excluir-contato':
                    include("paginas/contatos/excluir-contato.php");
                    break;
                default:
                    include("paginas/home/home.php");
                    break;
            }
            
        ?>
        </div>
        </main>   

        <footer class="container-fluid fixed-bottom bg-light">
        <div class="text-center">Agenda Telefônica Moura Informática</div>
        </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>