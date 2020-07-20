<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<style>
	section#mini-carro{
		display: none;
	}
</style>
<!-- <div class="menu-check">
<div class="promo-category-wrap"> 
	<div class="promo-content-wrap">
		<div class="promo-category-content">
			<div class="promo-category-img">		
				<img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/significado-logos-famosos-carrefour.jpg" alt="Sports">			
			</div>
			<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_1"); ?> 
		</div>

		<div class="promo-category-content">
			<div class="promo-category-img">		
				<img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/vea-cencosud.png" alt="Sports">			
			</div>
			<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_2"); ?> 
		</div>
		<div class="promo-category-content">
			<div class="promo-category-img">		
				<img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/logo-atomo.jpg" alt="Sports">			
			</div>
			<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_3"); ?> 
		</div>
		<div class="promo-category-content">
			<div class="promo-category-img">		
				<img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/Walmart_logo_transparent_png.png" alt="Sports">			
			</div>
			<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_4"); ?> 
		</div>
		<div class="promo-category-content">
			<div class="promo-category-img">		
				<img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/logo-coto.png" alt="Sports">			
			</div>
			<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_5"); ?> 
		</div>
		<div class="promo-category-content">
			<div class="promo-category-img">		
				<img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/Logo_Jumbo_Cencosud.png" alt="Sports">			
			</div>
			<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_6"); ?> 
		</div>

	</div> 
			
	</div>-->
	<label class="container">
		<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_1"); ?> 
		<span class="checkmark"></span>
	</label>
	<label class="container">
		<input onclick="descheckeo()" type="checkbox" name="mostrar-super-2" class="mostrar-super" id="mostrar-super-2"> Mostrar los precios de <?php the_field("super_2"); ?> 
		<span class="checkmark"></span>
	</label>
	<label class="container">
		<input onclick="descheckeo()" type="checkbox" name="mostrar-super-3" class="mostrar-super" id="mostrar-super-3"> Mostrar los precios de <?php the_field("super_3"); ?> 
		<span class="checkmark"></span>
	</label>
	<label class="container">
		<input onclick="descheckeo()" type="checkbox" name="mostrar-super-4" class="mostrar-super" id="mostrar-super-4"> Mostrar los precios de <?php the_field("super_4"); ?> 
		<span class="checkmark"></span>
	</label>
	<label class="container">
		<input onclick="descheckeo()" type="checkbox" name="mostrar-super-5" class="mostrar-super" id="mostrar-super-5"> Mostrar los precios de <?php the_field("super_5"); ?> 
		<span class="checkmark"></span>
	</label>
	<label class="container">
		<input onclick="descheckeo()" type="checkbox" name="mostrar-super-6" class="mostrar-super" id="mostrar-super-6"> Mostrar los precios de <?php the_field("super_6"); ?> 
		<span class="checkmark"></span>
	</label>


 <!-- <div class="menu-check has-pale-ocean-gradient-background">
 	<input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_1"); ?> 
	<input onclick="descheckeo()" type="checkbox" name="mostrar-super-2" class="mostrar-super" id="mostrar-super-2"> Mostrar los precios de <?php the_field("super_2"); ?> <br>
	<input onclick="descheckeo()" type="checkbox" name="mostrar-super-3" class="mostrar-super" id="mostrar-super-3"> Mostrar los precios de <?php the_field("super_3"); ?> <br>
	<input onclick="descheckeo()" type="checkbox" name="mostrar-super-4" class="mostrar-super" id="mostrar-super-4"> Mostrar los precios de <?php the_field("super_4"); ?> <br>
	<input onclick="descheckeo()" type="checkbox" name="mostrar-super-5" class="mostrar-super" id="mostrar-super-5"> Mostrar los precios de <?php the_field("super_5"); ?> <br>
	<input onclick="descheckeo()" type="checkbox" name="mostrar-super-6" class="mostrar-super" id="mostrar-super-6"> Mostrar los precios de <?php the_field("super_6"); ?> <br>
</div>  -->
<br>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function descheckeo() {
	var mostrarsuper1 = document.getElementById("mostrar-super-1");
	var mostrarsuper2 = document.getElementById("mostrar-super-2");
	var mostrarsuper3 = document.getElementById("mostrar-super-3");
	var mostrarsuper4 = document.getElementById("mostrar-super-4");
	var mostrarsuper5 = document.getElementById("mostrar-super-5");
	var mostrarsuper6 = document.getElementById("mostrar-super-6");
	
	if (mostrarsuper1.checked == true){
    $("#mi-carro .super1").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super1").addClass("no-mostrar");
  }
  	if (mostrarsuper2.checked == true){
    $("#mi-carro .super2").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super2").addClass("no-mostrar");
  }
  	if (mostrarsuper3.checked == true){
    $("#mi-carro .super3").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super3").addClass("no-mostrar");
	}
  	if (mostrarsuper4.checked == true){
    $("#mi-carro .super4").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super4").addClass("no-mostrar");
	}
  	if (mostrarsuper5.checked == true){
    $("#mi-carro .super5").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super5").addClass("no-mostrar");
	}
  	if (mostrarsuper6.checked == true){
    $("#mi-carro .super6").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super6").addClass("no-mostrar");
	}
	
	
}

</script>



<form id="mi-carro" class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th colspan="3" class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>

			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

$terms = get_the_terms( $product_id, 'product_cat' );
foreach ($terms as $term) {
   $product_cat = $term->name;
};

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item ', $cart_item, $cart_item_key ) ), $product_cat; ?>">

						<td class="product-remove">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</td>

						<td class="product-thumbnail">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						</td>

						<td class="product-name" colspan="3" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="nombre-producto">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						// Acá trae nombre de los súper
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						</td>



						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>

						
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

				
					<!-- Botón de actualizar carrito -->
					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Actualizar Changuito', 'woocommerce' ); ?>"><?php esc_html_e( 'Actualizar Changuito', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<!-- Trae lista de los súper y los precios -->
			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			
		</tbody>
	</table>

	<!-- Footer de la tabla, donde sale botón COMPARTIR -->
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>


<?php do_action( 'woocommerce_after_cart' ); ?>

