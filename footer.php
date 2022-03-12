<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coalition_Technologies
 */

?>

			</div>

			<footer id="colophon" class="site-footer">
				<div class="main-footer">
					<div class="container">

						<div class="header-inner__left">

							<!-- LOGO & Description -->
							<div class="footer-description">
								<?php
									$logo = get_field('footer-logo', 'option');
									if($logo):
								?>
										<a href="<?php echo get_site_url(); ?>" class="logo d-block">
											<?php echo wp_get_attachment_image($logo, 'full');?>	
										</a>
								<?php endif; ?>
	
								<?php
									$footerText = get_field('footer-text', 'option');
									if($footerText){
										echo '<p>'.$footerText.'</p>';
									}
								?>
							</div>
							<!-- LOGO & Description END -->

							<div class="navigation-wrap">
								<!-- Menu -->
								<div class="menu-wrapper">
									<?php
										$phone = get_field('phone', 'option');
										$email = get_field('email', 'option');
	
										if(is_active_sidebar('footer-1')){
											dynamic_sidebar( 'footer-1' );
										}
									?>
								</div>
								<!-- Menu END -->
	
								<!-- Contact Details -->
								<div class="contact-details">
									<h6>Contact</h6>
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

									<!-- Social Icons -->
									<?php if(have_rows('social-media-profiles', 'option')): ?>
										<div class="social-icons d-none d-tablet-block">
											<ul>
												<?php while(have_rows('social-media-profiles', 'option')): the_row();
													if (get_sub_field('visibility') == true):
												?>
													<li>
														<a href="<?php the_sub_field('url'); ?>" target="_blank">
															<?php the_sub_field('font-awesome-icon'); ?>
														</a>
													</li>
												<?php endif; endwhile; ?>
											</ul>
										</div>
									<?php endif; ?>
									<!-- Social Icons End-->

								</div>
								<!-- Contact Details END -->
							</div>
						</div>

						<!-- Social Icons -->
						<?php if(have_rows('social-media-profiles', 'option')): ?>
							<div class="social-icons d-tablet-none">
								<ul>
									<?php while(have_rows('social-media-profiles', 'option')): the_row();
										if (get_sub_field('visibility') == true):
									?>
										<li>
											<a href="<?php the_sub_field('url'); ?>" target="_blank">
												<?php the_sub_field('font-awesome-icon'); ?>
											</a>
										</li>
									<?php endif; endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
						<!-- Social Icons End-->
					</div>
				</div>

				<div class="secondary-footer">
					<div class="container">
						<nav class="footer-navigation">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer',
										'menu_id'        => 'footer-menu',
									)
								);
							?>
						</nav>

						<!-- Copyright Text -->
						<?php
							if(get_field('copyright-text', 'option')):
								$copyright = get_field('copyright-text', 'option');
						?>
								<div>
									<p class="copyright">&copy; Copyright <?php echo date('Y') . ' ' . $copyright; ?></p>
								</div>
						<?php endif; ?>
						<!-- Copyright Text End -->

					</div>
				</div>
			</footer>
		</div>
	</div>

<?php
	wp_footer();
	the_field('footer-script', 'option');
	if (function_exists('the_field')):
		the_field('footer_code', 'option');
	endif;
?>

</body>
</html>
