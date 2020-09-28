<?php get_header() ?>

<main class="contenedor pagina seccion con-sidebar">

    <?php get_sidebar('portafolios'); ?>
    
    <div class="contenido-principal informacion-portafolio">
        <?php get_template_part('template-parts/paginas') ?>
    </div>

</main>

<?php get_footer() ?>