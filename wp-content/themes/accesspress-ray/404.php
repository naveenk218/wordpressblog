<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package AccessPress Ray
 */

get_header(); 
global $accesspress_ray_options;
$accesspress_ray_settings = get_option( 'accesspress_ray_options', $accesspress_ray_options );
$accesspress_ray_template_design = $accesspress_ray_settings['accesspress_ray_template_design'];
?>
<div class="ak-container">
		<main id="main" class="site-main">

			<section class="not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'accesspress-ray' ); ?></h1>
				</header><!-- .page-header -->

				<div class="error-404">
                <span class="breeze-404"><?php esc_html_e('404' , 'accesspress-ray' ); ?></span> 
                <span class="breeze-error"><?php esc_html_e('error' , 'accesspress-ray' ); ?></span>   
                </div>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'accesspress-ray' ); ?></p>
				</div><!-- .page-content -->
           
			</section><!-- .error-404 -->

		</main><!-- #main -->
</div>
<?php 
	if( $accesspress_ray_template_design == 'style1_template' ) {
		get_footer('two');
	}else{
		get_footer();
	}
?>