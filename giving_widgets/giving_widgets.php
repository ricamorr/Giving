<?php
/*
    Plugin Name: Giving Theme - Widgets
    Plugin URI: 
    Description: Añade Widgets Personalizados al sitio Giving
    Version: 1.0.0
    Author: Ricardo Morales Ramírez
    Author URI: https://www.linkedin.com/in/moralesricardo/
    Text Domain: Giving-theme
*/

if (!defined('ABSPATH')) die();

/**
 * Adds Giving_Portafolio_Widget widget.
 */
class Giving_Portafolio_Widget extends WP_Widget
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct()
	{
		parent::__construct(
			'Giving_Portafolio', // Base ID
			esc_html__('Giving Portafolio', 'Giving-theme'), // Name
			array('description' => esc_html__('Agrega los Portafolios como Widget', 'Giving-theme'),) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];
		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
		}
		$cantidad = $instance['cantidad'];
        if($cantidad == ''){
            $cantidad = 3;
        }
?>

		<ul>
			<?php
			$args = array(
				'post_type' => 'giving_portafolios',
				'posts_per_page' => $cantidad
			);
			$clases = new WP_Query($args);
			while ($clases->have_posts()) : $clases->the_post();
			?>

				<li class="portafolio-sidebar">
					<div class="imagen">
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>

					<div class="contenido-portafolio">
						<h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<p><?php the_field('tipo_de_portafolio') ?></p>
					</div>
				</li>

			<?php endwhile;
			wp_reset_postdata(); ?>
		</ul>
	<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance)
	{
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Portafolio', 'Giving-theme' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Título:', 'Giving-theme' ); ?></label> 
        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
        </p>
    <?php
		$cantidad = ! empty( $instance['cantidad'] ) ? $instance['cantidad'] : esc_html__( '¿Cuántos Portafolios deseas mostrar?', 'Giving-theme' ); ?>
		<p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>">
            <?php esc_attr_e( '¿Cuántos Portafolios deseas mostrar?', 'Giving-theme' ); ?>
        </label> 

        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'cantidad' ) ); ?>" 
            type="number" 
            value="<?php echo esc_attr( $cantidad ); ?>" >
    	</p>
<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';
        return $instance;
	}
}

function giving_registrar_widget()
{
	register_widget('Giving_Portafolio_Widget');
}
add_action('widgets_init', 'giving_registrar_widget');
