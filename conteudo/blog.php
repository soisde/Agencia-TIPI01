<section data-aos="fade-down" class="blog">
<div class="site">
    <h2>Blog</h2>
    <div>
        <?php foreach(array_slice( $listarB, 0, 3) as $linha): ?>
        <div data-aos="fade-up">
            <h3><?php echo $linha ['tituloBlog'] ?></h3>
            <img src="img/<?php echo $linha['fotoBlog']?>" alt="<?php echo $linha ['descricaoFotoBlog']?>">
            <p><?php echo $linha ['descricaoBlog'] ?></p>
            <button href="<?php echo $linha['urlBlog']   ?>" >leia mais</button>
    </div>
    <?php endforeach; ?>
    </div>
</div>
</section>