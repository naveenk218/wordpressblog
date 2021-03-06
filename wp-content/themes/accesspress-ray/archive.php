<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Ray
 */

get_header(); 
global $accesspress_ray_options;
$accesspress_ray_settings = get_option( 'accesspress_ray_options', $accesspress_ray_options );
$accesspress_ray_template_design = $accesspress_ray_settings['accesspress_ray_template_design'];
?>

<div class="ak-container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main clearfix">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* translators: %s : author */
							printf( esc_html__( 'Author: %s', 'accesspress-ray' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							/* translators: %s : day */
							printf( esc_html__( 'Day: %s', 'accesspress-ray' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							/* translators: %s : month */
							printf( esc_html__( 'Month: %s', 'accesspress-ray' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'accesspress-ray' ) ) . '</span>' );

						elseif ( is_year() ) :
							/* translators: %s : year */
							printf( esc_html__( 'Year: %s', 'accesspress-ray' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'accesspress-ray' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							esc_html_e( 'Asides', 'accesspress-ray' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							esc_html_e( 'Galleries', 'accesspress-ray');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							esc_html_e( 'Images', 'accesspress-ray');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							esc_html_e( 'Videos', 'accesspress-ray' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							esc_html_e( 'Quotes', 'accesspress-ray' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							esc_html_e( 'Links', 'accesspress-ray' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							esc_html_e( 'Statuses', 'accesspress-ray' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							esc_html_e( 'Audios', 'accesspress-ray' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							esc_html_e( 'Chats', 'accesspress-ray' );

						else :
							esc_html_e( 'Archives', 'accesspress-ray' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						/* translators: %s : term description */
						printf( '<div class="taxonomy-description">%s</div>', esc_html($term_description) );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php 
			while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content-summary' );
				?>

			<?php endwhile; ?>
            <div class="clear"></div>
			<?php accesspress_ray_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar('right'); ?>
</div>
<?php 
	if( $accesspress_ray_template_design == 'style1_template' ) {
		get_footer('two');
	}else{
		get_footer();
	}
?>