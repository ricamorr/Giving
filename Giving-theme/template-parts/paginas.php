<?php while (have_posts()) : the_post(); ?>

    <?php
    if (has_post_thumbnail()) :
        the_post_thumbnail('blog', array('class' => 'imagen-destacada'));
    endif;
    ?>
    <div class="contenido">
        <h1 class="text-center texto-primario"><?php the_title(); ?></h1>
        <?php
        //Revisar si el custom post type es clases
        if (get_post_type() === 'giving_portafolios') {
        ?>
            <p class="tipo-portafolio"><?php the_field('tipo_de_portafolio') ?></p>
        <?php } ?>

        <?php the_content(); ?>
    </div>
<?php endwhile; ?>