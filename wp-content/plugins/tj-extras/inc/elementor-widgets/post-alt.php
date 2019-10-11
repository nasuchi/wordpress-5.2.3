<?php
/**
 * Post alternate widgets
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TJ_Extras_Widget_Post_Alt extends Widget_Base {

	public function get_name() {
		return 'tj-extras-post-alt';
	}

	public function get_title() {
		return esc_html__( 'Post Alternate', 'tj-extras' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_keywords() {
		return [ 'blog', 'post' ];
	}

	public function get_categories() {
		return [ 'tj_extras_elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_post',
			[
				'label' => esc_html__( 'Post Alternate', 'tj-extras' ),
			]
		);

		$this->add_control(
			'count',
			[
				'label'         => esc_html__( 'Posts Per Page', 'tj-extras' ),
				'description'   => esc_html__( 'You can enter "-1" to display all items.', 'tj-extras' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => '5',
				'label_block'   => true,
			]
		);

		$this->add_control(
			'order',
			[
				'label'         => esc_html__( 'Order', 'tj-extras' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''          => esc_html__( 'Default', 'tj-extras' ),
					'DESC'      => esc_html__( 'DESC', 'tj-extras' ),
					'ASC'       => esc_html__( 'ASC', 'tj-extras' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'         => esc_html__( 'Order By', 'tj-extras' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''              => esc_html__( 'Default', 'tj-extras' ),
					'date'          => esc_html__( 'Date', 'tj-extras' ),
					'title'         => esc_html__( 'Title', 'tj-extras' ),
					'name'          => esc_html__( 'Name', 'tj-extras' ),
					'modified'      => esc_html__( 'Modified', 'tj-extras' ),
					'author'        => esc_html__( 'Author', 'tj-extras' ),
					'rand'          => esc_html__( 'Random', 'tj-extras' ),
					'ID'            => esc_html__( 'ID', 'tj-extras' ),
					'comment_count' => esc_html__( 'Comment Count', 'tj-extras' ),
					'menu_order'    => esc_html__( 'Menu Order', 'tj-extras' ),
				],
			]
		);

		$this->add_control(
			'include_categories',
			[
				'label' 		=> __( 'Include Categories', 'tj-extras' ),
				'description' 	=> __( 'Enter the categories slugs seperated by a "comma"', 'tj-extras' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'exclude_categories',
			[
				'label' 		=> __( 'Exclude Categories', 'tj-extras' ),
				'description' 	=> __( 'Enter the categories slugs seperated by a "comma"', 'tj-extras' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'include_tags',
			[
				'label'         => esc_html__( 'Include Tags', 'tj-extras' ),
				'description'   => esc_html__( 'Enter the tags slugs seperated by a "comma"', 'tj-extras' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);

		$this->add_control(
			'offset',
			[
				'label'         => esc_html__( 'Offset', 'tj-extras' ),
				'description'   => esc_html__( 'Number of post to displace or pass over.', 'tj-extras' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'         => esc_html__( 'Pagination', 'tj-extras' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'enable',
				'options'       => [
					'enable'  => esc_html__( 'Enable', 'tj-extras' ),
					'disable' => esc_html__( 'Disable', 'tj-extras' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		// Vars
		$posts_per_page = $settings['count'];
		$order 			= $settings['order'];
		$orderby  		= $settings['orderby'];
		$include 		= $settings['include_categories'];
		$exclude 		= $settings['exclude_categories'];
		$tags           = $settings['include_tags'];
		$offset         = $settings['offset'];

		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		$args = array(
			'posts_per_page'    => $posts_per_page,
			'post_type'         => 'post',
			'paged'             => $paged,
			'order'             => $order,
			'orderby'           => $orderby
		);

		// Include category
		if ( ! empty( $include ) ) {

			// Sanitize category and convert to array
			$include = str_replace( ', ', ',', $include );
			$include = explode( ',', $include );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $include,
				'operator' => 'IN',
			);

		}

		// Exclude category
		if ( ! empty( $exclude ) ) {

			// Sanitize category and convert to array
			$exclude = str_replace( ', ', ',', $exclude );
			$exclude = explode( ',', $exclude );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $exclude,
				'operator' => 'NOT IN',
			);

		}

		// Include tag
		if ( ! empty( $tags ) ) {

			// Sanitize category and convert to array
			$tags = str_replace( ', ', ',', $tags );
			$tags = explode( ',', $tags );

			// Add to query arg
			$args['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => $tags,
				'operator' => 'IN',
			);

		}

		// Offset
		if ( ! empty( $offset ) ) {
			// Add to query arg
			$args['offset'] = $offset;
		}

		// Build the WordPress query
		$blog = new \WP_Query( $args );

		// Output posts
		if ( $blog->have_posts() ) :

			// Var
			$paging  = $settings['pagination'];

			// Wrapper classes
			$wrap_classes = array( 'posts-alternate' );
			$wrap_classes = implode( ' ', $wrap_classes );
			?>

			<div class="<?php echo esc_attr( $wrap_classes ); ?>">

				<?php

				// Start loop
				while ( $blog->have_posts() ) : $blog->the_post(); ?>

					<?php if ( $blog->current_post == 0 && !is_paged() ) { ?>
						<?php get_template_part( 'partials/content/content' ); ?>
					<?php } else { ?>
						<?php get_template_part( 'partials/content/content', 'list' ); ?>
					<?php } ?>

				<?php
				// End entry loop
				endwhile; ?>

			</div><!-- .posts -->

			<?php
				if ( get_query_var( 'page' ) ) {
					$paged = get_query_var( 'page' );
				} elseif ( get_query_var( 'paged' ) ) {
					$paged = get_query_var( 'paged' );
				} else {
					$paged = 1;
				}
				$pagination = paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $blog->max_num_pages,
					'current'      => max( 1, $paged ),
					'format'       => '?paged=%#%',
					'show_all'     => false,
					'prev_next'    => true,
					'add_args'     => false,
				) );

				if ( 'enable' == $paging ) :
			?>
				<nav class="navigation pagination">
					<div class="nav-links">
						<?php echo $pagination; ?>
					</div>
				</nav>
			<?php endif; ?>

			<?php
			// Reset the post data to prevent conflicts with WP globals
			wp_reset_postdata();

		else : ?>

			<?php get_template_part( 'partials/content/content', 'none' ); ?>

		<?php endif; ?>

	<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new TJ_Extras_Widget_Post_Alt() );
