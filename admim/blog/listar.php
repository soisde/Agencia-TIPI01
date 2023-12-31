<?php

    require_once('class/blog.php');
    $listaBlog = new BlogClass();
    $listarB = $listaBlog->ListarBlog();
?>

<div>
    <table>
        <caption>Lstar Blogs</caption>
        <thead>
            <th>ID</th>
            <th>TITULO</th>
            <th>IMG</th>
            <th>ALT</th>
            <th>TEXTO</th>
            <th>LINK</th>
            <th>STATUS</th>
            <th>INSERIR</th>
            <th>ATUALIZAR</th>
            <th>DESATIVAR</th>


        </thead>
        <tbody>
            <?php foreach($listarB as $linha):?>
            <tr>
                <td><?php echo $linha['idBlog']?></td>
                <td><?php echo $linha['tituloBlog']?></td>
                <td><?php echo '<img src="../img/'.$linha['fotoBlog'].'" alt="'.$linha['descricaoFotoBlog'].'">' ?></td>
                <td><?php echo $linha['descricaoFotoBlog']?></td>
                <td><?php echo $linha['descricaoBlog']?></td>
                <td><?php echo $linha['urlBlog']?></td>
                <td><?php echo $linha['statusBlog']?></td>
                <td><a href="index.php?p=blog&b=inserir">INSERIR</a></td>
                <td><a href="index.php?p=blog&b=atualizar&id=<?php echo $linha['idBlog']?>">ATUALIZAR</a></td>
                <td><a href="index.php?p=blog&b=desativar&id=<?php echo $linha['idBlog']?>">DESATIVAR</a></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>