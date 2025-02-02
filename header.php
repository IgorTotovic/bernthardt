<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bernhardt_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bernhardt_theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
		<div class="header-img">
                <?php
                if ( has_header_image() ) :
                ?>
                    <img src="<?php header_image(); ?>" alt="Header Image" class="custom-header-image">
                <?php endif; ?>
            </div>

            <!-- Title for Single Post -->
            <?php if ( is_single() ) : ?>
                <div class="title-single-post">
                    <h2><?php the_title(); ?></h2>
                </div>
            <?php endif; ?>

            <div class="header-ui">
                <!-- Add other UI elements here if needed -->
            </div>

            <div class="logo">
                <?php the_custom_logo(); ?>
            </div>
			

			

			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			
			endif;
			$bernhardt_theme_description = get_bloginfo( 'description', 'display' );
			if ( $bernhardt_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $bernhardt_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bernhardt_theme' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
