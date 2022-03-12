<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coalition_Technologies
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
		wp_head();
		if (function_exists('the_field')): 
			the_field('header-script', 'option');
		endif; 
	?>
</head>

<body>
	<?php
		if (function_exists('the_field')): 
			the_field('body-script', 'option');
		endif; 
		wp_body_open();
	?>
	<div id="page">
		<div id="site-wrapper" <?php body_class( 'site' ); ?>>

			<!-- Hello Bar -->
			<?php
				$phone = get_field('phone', 'option');
				$email = get_field('email', 'option');

				if($phone || $email):
			?> 
					<div id="hello-bar">
						<div class="container">
							<div>
								<ul>
									<?php if($phone): ?>
										<li>
											<a href="tel:<?php echo $phone; ?>">
												<i class="fas fa-phone-alt"></i>
												<span><?php echo $phone; ?></span>
											</a>
										</li>
									<?php endif; ?>
											
									<?php if($email): ?>
										<li>
											<a href="mailto:<?php echo $email; ?>">
												<i class="fas fa-envelope"></i>
												<span><?php echo $email; ?></span>
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
			<?php endif; ?>
			<!-- Hello END -->

			<!-- Header -->
			<header id="masthead" class="site-header">
				<div class="container">

					<!-- LOGO -->
					<?php
						$logo = get_field('header-logo', 'option');
						if($logo):
					?>
							<div class="site-branding">
								<a href="<?php echo get_site_url(); ?>" class="logo d-block">
									<?php echo wp_get_attachment_image($logo, 'full');?>
								</a>
							</div>
					<?php endif; ?>
					<!-- LOGO END -->

					<div>
						<!-- Main Navigation -->
						<div class="menu-wrapper">
							<nav id="site-navigation" class="main-navigation">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_id'        => 'primary-menu',
										)
									);
								?>
							</nav>

							<div class="magnifier"><i class="fas fa-search"></i></div>
						</div>
						<!-- Main Navigation END -->

						<!-- Mobile Navigation -->
						<div class="mobile-navigation">
							<?php if($phone || $email): ?>
								<ul>
									<?php if($phone): ?>
										<li>
											<a href="tel:<?php echo $phone; ?>">
												<img src="<?php echo assets_uri(); ?>/images/icon-phone-mobile.svg" alt="" />
											</a>
										</li>
									<?php endif; ?>
											
									<?php if($email): ?>
										<li>
											<a href="mailto:<?php echo $email; ?>">
												<img src="<?php echo assets_uri(); ?>/images/icon-email-mobile.svg" alt="" />
											</a>
										</li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>

							<div class="magnifier"><i class="fas fa-search"></i></div>
							
							<div id="ham-icon-wrap">
								<div class="ham-icon">
									<div class="lines"></div>
								</div>
							</div>
						</div>
						<!-- Mobile Navigation END-->
					</div>

					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</header>
			<!-- Header END -->

			<!-- Overlay Mobile Menu -->
			<div id="overlay-menu">
				<nav>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
				</nav>
			</div>
			<!-- Overlay Mobile Menu End-->

			<div id="content" class="site-content">
