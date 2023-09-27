<section class="servico">
<div class="site">
        <h2>Serviços</h2>
    <div>
        <?php foreach(array_slice( $listarS, 0, 3) as $linha): ?>
        <div data-aos="fade-up">
            <h3><?php echo $linha ['tituloServico'] ?></h3>
            <img src="img/<?php echo $linha['fotoServico']?>" alt="<?php echo $linha ['descricaoFotoServico']?>">
            <p><?php echo $linha ['descricaoServico'] ?></p>
            <button href="<?php echo $linha['urlServico']   ?>" >leia mais</button>
    </div>
    <?php endforeach; ?>
</div>
</section>