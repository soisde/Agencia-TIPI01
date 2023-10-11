<?php

    require_once('class/servico.php');
    $listaServico = new ServicoClass();
    $listarS = $listaServico->ListarServico();
?>
<ul class="botaoC">
    <li class="botaoC"><a href="index.php?p=servico&s=inserir">Inserir</a></li>
</ul>
<div>
    <table>
        
        <caption>Lstar Serviços</caption>
        <thead>
            <th>ID</th>
            <th>TITULO</th>
            <th>IMG</th>
            <th>ALT</th>
            <th>TEXTO</th>
            <th>LINK</th>
            <th>STATUS</th>
            <th>ATUALIZAR</th>
            <th>DESATIVAR</th>


        </thead>
        <tbody>
            <?php foreach($listarS as $linha):?>
            <tr>
                <td><?php echo $linha['idServico']?></td>
                <td><?php echo $linha['tituloServico']?></td>
                <td><?php echo '<img src="../img/'.$linha['fotoServico'].'" alt="'.$linha['descricaoFotoServico'].'">' ?></td>
                <td><?php echo $linha['descricaoFotoServico']?></td>
                <td><?php echo $linha['descricaoServico']?></td>
                <td><?php echo $linha['urlServico']?></td>
                <td><?php echo $linha['	statusServico']?></td>
                <td><a href="index.php?p=servico&s=atualizar&id=<?php echo $linha['idServico']?>">ATUALIZAR</a></td>
                <td><a href="index.php?p=servico&s=desativar&id=<?php echo $linha['idServico']?>">DESATIVAR</a></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>