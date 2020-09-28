<?php

function giving_lista_portafolios($cantidad = -1) { ?>
    <ul class="lista-portafolios">
        <?php
            $args = array(
                'post_type' => 'giving_portafolios',
                'posts_per_page' => $cantidad,
                'order' => 'ASC',
                'orderby' => 'title'
            );
            $portafolios = new WP_Query($args);
            while( $portafolios->have_posts() ): $portafolios->the_post();
        ?>

        <li class="portafolio card">
            <?php the_post_thumbnail('mediano'); ?>
            <div class="contenido">
                <h4>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
                <p><?php the_field('tipo_de_portafolio') ?></p>
            </div>
        </li>

        <?php endwhile; wp_reset_postdata(); ?>
    
    </ul>
<?php }