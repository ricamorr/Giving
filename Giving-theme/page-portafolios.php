<?php
/*
* Template Name: Giving-Portafolios
*/

get_header() ?>

<main class="contenedor pagina seccion no-sidebar">

    <div class="text-center">

        <?php get_template_part('template-parts/paginas') ?>

        <?php giving_lista_portafolios(); ?>
    </div>
</main>

<?php get_footer() ?>