<?php

    require_once('admim/calss/servico.php');
    require_once('admim/calss/blog.php');
    $listaServico = new ServicoClass();
    $listaBlog = new BlogClass();
    $listarS = $listaServico->ListarServico();
    $listarB = $listaBlog->ListarBlog();
    //var_dump($listar);  
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/slick.css">
    <link rel="stylesheet" href="style/slick-theme.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="style/style.css">

</head>

<body>
<?php require_once('conteudo/topo.php'); ?>

    <main>

 <?php require_once('conteudo/banner.php'); ?>

 <?php require_once('conteudo/sobre.php'); ?>

 <?php require_once('conteudo/servico.php'); ?>

 <?php require_once('conteudo/galeria.php'); ?>

 <?php require_once('conteudo/depoimento.php'); ?>

 <?php require_once('conteudo/blog.php'); ?>

 <?php require_once('conteudo/footer.php'); ?>

     </main>
     
</body>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="js/slick.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="js/main.js"></script>

</html>