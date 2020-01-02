<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and the theme's header section.
 *
 * @package WPCasa Sylt
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
			
	<?php
		// Check if info text should be displayed
		$display_top_info = get_option( 'wpcasa_header_top_info_display' );
		
		// Check if top menu is acitve
		$display_top_menu = has_nav_menu( 'top' );
	?>
	
	<?php if( $display_top_info || $display_top_menu ) : ?>
	
	<div class="site-header-top">
	
		<div class="container">
		
			<div class="row">
			
				<?php if( $display_top_info ) : ?>
				<div class="<?php echo $display_top_info && $display_top_menu ? '4u 12u(medium)' : '12u'; ?>">		
					<div class="site-header-top-info">
						<?php echo get_option( 'wpcasa_header_top_info', '<i class="icon fa-mobile-phone"></i> Call Us Today: 1-234-567-8910' ); ?>
					</div>		
				</div>
				<?php endif; ?>
				
				<?php if( $display_top_menu ) : ?>				
				<div class="<?php echo $display_top_info && $display_top_menu ? '8u 12u(medium)' : '12u'; ?>">	
					<?php wpsight_sylt_menu( 'top', array( 'container' => 'div', 'align' => 'right' ) ); ?>				
				</div>				
				<?php endif; ?>
			
			</div>
		
		</div>

	</div><!-- .site-header-top -->
	
	<?php endif; ?>

	<header class="site-header site-section" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	
		<div class="container clearfix">
		
			<div class="site-header-title">
			
				<?php $animate = is_front_page() ? ' animated fadeIn' : ''; ?>
			
				<?php if( get_option( 'wpcasa_logo', get_stylesheet_directory_uri() . '/assets/images/logo.png' ) ) : ?>					
					<div class="site-title site-title-logo<?php echo $animate; ?>">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_option( 'wpcasa_logo', get_stylesheet_directory_uri() . '/assets/images/logo.png' ); ?>" alt="logo"></a>
					</div>
				<?php else : ?>			
					<h1 class="site-title site-title-text" itemprop="headline">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php endif; ?>
				
				<?php
					// Check if description should be displayed
					$display_description = get_option( 'wpcasa_header_description_display' );
				?>
				
				<?php if( $display_description ) : ?>
				<div class="site-description<?php echo $animate; ?>" itemprop="description"><?php bloginfo( 'description' ); ?></div>
				<?php endif; ?>
			
			</div><!-- .site-header-title -->

            <div class="header-bottom">
                <?php wpsight_sylt_menu( 'primary', array( 'align' => 'left', 'menu_class' => 'wpsight-menu' ) ); ?>

                <div class="header-search-btn">
                    <svg class="icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                            s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                            c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                            s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                </div>

                <div class="wrap-header-search">
                  <?php get_search_form(); ?>
                </div>
            </div>

		</div>
	</header>

	<?php wpsight_sylt_menu( 'secondary', array( 'container' => 'div', 'container_class' => 'container' ) ); ?>

