<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootp.min.cssstra">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="css/dashboardstyle.css">
    <title>Painel de Administração</title>
</head>

<body>
    <div class="wrapper">

        <nav class="sidebar">
            <div>
                <h1>Cyber Company</h1>
                <!--<img src="img/GdN_o1SFSuqw1ym502_Weg_31550668_380.png" alt="">-->
            </div>
            <ul>
                <li><a href="index.php?p=site">Site</a></li>
                <li><a href="index.php?p=sobre">Sobre</a></li>
                <li><a href="index.php?p=servico">serviços</a></li>
                <li><a href="index.php?p=contato">Contato</a></li>
                <li><a href="index.php?p=blog">Blog</a></li>
                <li><a href="index.php?p=galeria">Galeria</a></li>
                <li><a href="index.php?p=depoimento">Depoimento</a></li>
            </ul>
        </nav>
        <div>


            <header class="topbar">
                <h1>Painel de Administração</h1>
                <div class="user-menu">
                    <img src="img/cliente-perfil-02.svg" alt="">
                    <a href="#">Usuário</a>
                    <a href="#">Sair</a>
                </div>
            </header>
            <main class="content">
                <?php

                $pagina = @$_GET['p'];
                switch ($pagina) {

                    case 'site';
                        require_once('site/site.php');
                        break;

                    case 'sobre';
                        require_once('sobre/sobre.php');
                        break;

                    case 'servico';
                        require_once('servico/servico.php');
                        break;

                    case 'contato';
                        require_once('contato/contato.php');
                        break;

                    case 'blog';
                        require_once('blog/blog.php');
                        break;

                    case 'galeria';
                        require_once('galeria/galeria.php');
                        break;

                    case 'depoimento';
                        require_once('depoimento/depoimento.php');
                        break;

                    default:
                        echo 'Dashboard';
                        break;
                }
                ?>
                <!-- Conteúdo da área de administração vai aqui -->
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootp.min.cssstra"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>