<?php
/**
 * The template for displaying the footer.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

$shoppingcart_settings = shoppingcart_get_theme_options(); ?>
</div><!-- end #content -->
<!-- Footer Start ============================================= -->
<footer id="colophon" class="site-footer" role="contentinfo">
<?php

$footer_column = $shoppingcart_settings['shoppingcart_footer_column_section'];
	if( is_active_sidebar( 'shoppingcart_footer_1' ) || is_active_sidebar( 'shoppingcart_footer_2' ) || is_active_sidebar( 'shoppingcart_footer_3' ) || is_active_sidebar( 'shoppingcart_footer_4' )) { ?>
	<div class="widget-wrap">
		<div class="wrap">
			<div class="widget-area">
			<?php
				if($footer_column == '1' || $footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_1' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_1' );
					endif;
				echo '</div><!-- end .column'.absint($footer_column). '  -->';
				}
				if($footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_2' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_2' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_3' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_3' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_4' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_4' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).  '-->';
				}
				?>
			</div> <!-- end .widget-area -->
		</div><!-- end .wrap -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
	<div class="site-info">
	<div class="wrap">
	<?php do_action('shoppingcart_footer_menu');
	if($shoppingcart_settings['shoppingcart_buttom_social_icons'] == 0):
		do_action('shoppingcart_social_links');
	endif;

	if ( is_active_sidebar( 'shoppingcart_footer_options' ) ) :
		dynamic_sidebar( 'shoppingcart_footer_options' );
	else:
		echo '<div class="copyright">'; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
						<!-- <?php esc_html_e('Designed by:','shoppingcart'); ?> <a title="<?php echo esc_attr__( 'Theme Freesia', 'shoppingcart' ); ?>" target="_blank" href="<?php echo esc_url( 'https://themefreesia.com' ); ?>"><?php esc_html_e('Theme Freesia','shoppingcart');?></a> | -->
						<?php  echo '&copy; ' . date_i18n(__('Y','shoppingcart')) ; ?> <a title="<?php echo esc_attr__( 'Livingtheweb!', 'shoppingcart' );?>" target="_blank" href="<?php echo esc_url( 'https://livingthewebla.com' );?>"><?php esc_html_e('Livingtheweb!','shoppingcart'); ?></a>
					</div>
	<?php endif; ?>
			<div style="clear:both;"></div>
		</div> <!-- end .wrap -->
	</div> <!-- end .site-info -->
	<?php
		$disable_scroll = $shoppingcart_settings['shoppingcart_scroll'];
		if($disable_scroll == 0):?>
			<button type="button" class="go-to-top" type="button">
				<span class="screen-reader-text"><?php esc_html_e('Go to top','shoppingcart'); ?></span>
				<span class="icon-bg"></span>
				<span class="back-to-top-text"><i class="fa fa-angle-up"></i></span>
				<i class="fa fa-angle-double-up back-to-top-icon"></i>
			</button>
	<?php endif; ?>
	<div class="page-overlay"></div>
</footer> <!-- end #colophon -->
</div><!-- end .site-content-contain -->
</div><!-- end #page -->
<?php wp_footer(); ?>

<!-- Modal home -->
<!-- Modal bienvenida -->
<div class="modal fade pt-5" id="modal-bienvenida">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<img src="<?php echo site_url(); ?>/wp-content/uploads/2020/04/003-shopping-cart.svg" alt="" style="top: 0;
							    margin-right: 15px;
							    width: 40px;
							    position: relative;">
				<h5 class="modal-title modal-title-modal-home text-center" id="exampleModalLabel">¡Bienvenidos al TuChanguito!</h5>
			
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-6">
						<h3 class="pl-3">Aclaración sobre precios</h3>
						<p class="pl-3">Poner aclaración de que los pecios pueden variar</p>
					</div>
					<div class="col-md-6">
						<figure>
							<img src="<?php echo site_url(); ?>/wp-content/uploads/2020/07/ofertas.png" class="w-50 float-right" alt="">
						</figure>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>