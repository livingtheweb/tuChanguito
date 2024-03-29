<?php 

// Bootstrap
function styles_scrips() {
  wp_enqueue_style( 
    'bootstrap', 
    get_stylesheet_directory_uri() . "/css/bootstrap.min.css",    
    "all" 
  );
  wp_enqueue_script( 
    'bootstrap', 
    get_stylesheet_directory_uri() . "/js/bootstrap.min.js", 
    array('jquery'), 
    true
  );
}
add_action('wp_enqueue_scripts','styles_scrips');

// Muestra los custom fields en el carrito
// Muestra el precio de cada producto en cada súper en el Mini-changuito
add_filter( 'woocommerce_get_item_data', 'super_custom_field', 10, 2 );
function super_custom_field( $cart_data, $cart_item ) 
{
    $items_super = array();

    if( !empty( $cart_data ) )
        $custom_items = $cart_data;

    // Los busca desde el id
    $product_id = $cart_item['product_id'];
    
    // El súper lo trae
    $supermercado_1 = get_field('super_1',408);  
    $supermercado_2 = get_field('super_2',408);	
    $supermercado_3 = get_field('super_3',408);		
    $supermercado_4 = get_field('super_4',408);		
    $supermercado_5 = get_field('super_5',408);		
    $supermercado_6 = get_field('super_6',408);		

    // El precio asociado al súper lo trae
    if( $precio_1 = get_post_meta( $product_id, 'precio_1', true ))  
    if( $precio_2 = get_post_meta( $product_id, 'precio_2', true ))
    if( $precio_3 = get_post_meta( $product_id, 'precio_3', true ))  
    if( $precio_4 = get_post_meta( $product_id, 'precio_5', true ))  
    if( $precio_5 = get_post_meta( $product_id, 'precio_6', true ))  
    if( $precio_6 = get_post_meta( $product_id, 'precio_7', true ))  
        
        $items_super[] = array(
            'name'      => __( 'Precios en supermercados', 'woocommerce'),
            'display'   => '<div>
            				<p class="super1 supermercados"><strong>' . ($supermercado_1). '</strong> <span>$' . ($precio_1). '</span></p>
            				<p class="super2 supermercados"><strong>' . ($supermercado_2). '</strong> <span>$' . ($precio_2). '</span></p>
            				<p class="super3 supermercados"><strong>' . ($supermercado_3). '</strong> <span>$' . ($precio_3). '</span></p>
            				<p class="super4 supermercados"><strong>' . ($supermercado_4). '</strong> <span>$' . ($precio_4). '</span></p>
            				<p class="super5 supermercados"><strong>' . ($supermercado_5). '</strong> <span>$' . ($precio_5). '</span></p>
            				<p class="super6 supermercados"><strong>' . ($supermercado_6). '</strong> <span>$' . ($precio_6). '</span></p>
            				</div>',

        );

    return $items_super;
    
}


//Suma los custom field de precio 1
//Elige el lugar donde lo muestra
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_1', 10, 2 );
//este es despues del carro antes del checkout
add_action( 'woocommerce_cart_totals_before_shipping', 'suma_precio_1', 20 );
//este es en el checkout
add_action( 'woocommerce_review_order_before_shipping', 'suma_precio_1', 20 );


function suma_precio_1() {
    $total_1 = 0;

   	$supermercado_1 = get_field('super_1',408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_1 = (float) get_post_meta( $cart_item['product_id'], 'precio_1', true );
        $total_1  += $precio_super_1 * $cart_item['quantity'];
    }
    if( $total_1 > 0 ){

        // The Output
        echo ' <tr class="super1">
            <td colspan="5"><p><strong>' .$supermercado_1.  '</strong></td> <td colspan="" style="text-align:right;"><span>$' . number_format($total_1, 2) . '</span></p></td>
        </tr>';
    }
}


//Suma los custom field de precio 1
//Elige el lugar donde lo muestra
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_2', 10, 2 );
//este es despues del carro antes del checkout
add_action( 'woocommerce_cart_totals_before_shipping', 'suma_precio_2', 20 );
//este es en el checkout
add_action( 'woocommerce_review_order_before_shipping', 'suma_precio_2', 20 );


function suma_precio_2() {
    $total_2 = 0;

   	$supermercado_2 = get_field('super_2', 408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_2 = (float) get_post_meta( $cart_item['product_id'], 'precio_2', true );
        $total_2  += $precio_super_2 * $cart_item['quantity'];
    }
    if( $total_2 > 0 ){

        // The Output
        // Muestra precio sumado de cada súper en el changuito
        echo ' <tr class="super2">
            
            <td colspan="5"><p><strong>' .$supermercado_2.  '</strong></td> <td colspan="" style="text-align:right;"><span>$' . number_format($total_2, 2) . '</span></p></td>
        </tr>';
    }
}


//Suma los custom field de precio 1
//Elige el lugar donde lo muestra
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_3', 10, 2 );
//este es despues del carro antes del checkout
add_action( 'woocommerce_cart_totals_before_shipping', 'suma_precio_3', 20 );
//este es en el checkout
add_action( 'woocommerce_review_order_before_shipping', 'suma_precio_3', 20 );


function suma_precio_3() {
    $total_3 = 0;

   	$supermercado_3 = get_field('super_3', 408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_3 = (float) get_post_meta( $cart_item['product_id'], 'precio_3', true );
        $total_3  += $precio_super_3 * $cart_item['quantity'];
    }
    if( $total_3 > 0 ){

        // The Output
        echo ' <tr class="super3">
            <td colspan="5"><p><strong>' .$supermercado_3.  '</strong></td> <td colspan="" style="text-align:right;"><span>$' . number_format($total_3, 2) . '</span></p></td>
        </tr>';
    }
}

//Suma los custom field de precio 4
//Elige el lugar donde lo muestra
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_4', 10, 2 );
//este es despues del carro antes del checkout
add_action( 'woocommerce_cart_totals_before_shipping', 'suma_precio_4', 20 );
//este es en el checkout
add_action( 'woocommerce_review_order_before_shipping', 'suma_precio_4', 20 );


function suma_precio_4() {
    $total_4 = 0;

   	$supermercado_4 = get_field('super_4', 408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_4 = (float) get_post_meta( $cart_item['product_id'], 'precio_4', true );
        $total_4  += $precio_super_4 * $cart_item['quantity'];
    }
    if( $total_4 > 0 ){

        // The Output
        echo ' <tr class="super4">
            <td colspan="5"><p><strong>' .$supermercado_4.  '</strong></td> <td colspan="" style="text-align:right;"><span>$' . number_format($total_4, 2) . '</span></p></td>
        </tr>';
    }
}


//Suma los custom field de precio 5
//Elige el lugar donde lo muestra
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_5', 10, 2 );
//este es despues del carro antes del checkout
add_action( 'woocommerce_cart_totals_before_shipping', 'suma_precio_5', 20 );
//este es en el checkout
add_action( 'woocommerce_review_order_before_shipping', 'suma_precio_5', 20 );


function suma_precio_5() {
    $total_5 = 0;

   	$supermercado_5 = get_field('super_5', 408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_5 = (float) get_post_meta( $cart_item['product_id'], 'precio_5', true );
        $total_5  += $precio_super_5 * $cart_item['quantity'];
    }
    if( $total_5 > 0 ){

        // The Output
        echo ' <tr class="super5">
            <td colspan="5"><p><strong>' .$supermercado_5.  '</strong></td> <td colspan="" style="text-align:right;"><span>$' . number_format($total_5, 2) . '</span></p></td>
        </tr>';
    }
}

//Suma los custom field de precio 6
//Elige el lugar donde lo muestra
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_6', 10, 2 );
//este es despues del carro antes del checkout
add_action( 'woocommerce_cart_totals_before_shipping', 'suma_precio_6', 20 );
//este es en el checkout
add_action( 'woocommerce_review_order_before_shipping', 'suma_precio_6', 20 );


function suma_precio_6() {
    $total_6 = 0;

   	$supermercado_6 = get_field('super_6', 408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_6 = (float) get_post_meta( $cart_item['product_id'], 'precio_6', true );
        $total_6  += $precio_super_6 * $cart_item['quantity'];
    }
    if( $total_6 > 0 ){

        // The Output
        echo ' <tr class="super6">
            <td colspan="5"><p><strong>' .$supermercado_6.  '</strong></td> <td colspan="" style="text-align:right;"><span>$' . number_format($total_6, 2) . '</span></p></td>
        </tr>';
    }
    
}

// Muestra pecio antes de la tabla
// Probando repetir las funciones en una sola función
function suma_precio_mas_bajo() {
    $total_1 = 0;

    $supermercado_1 = get_field('super_1',408);

 // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
 foreach( WC()->cart->get_cart() as $cart_item ){
     $precio_super_1 = (float) get_post_meta( $cart_item['product_id'], 'precio_1', true );
     $total_1  += $precio_super_1 * $cart_item['quantity'];
 }

    $total_2 = 0;

    $supermercado_2 = get_field('super_2', 408);

 // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
 foreach( WC()->cart->get_cart() as $cart_item ){
     $precio_super_2 = (float) get_post_meta( $cart_item['product_id'], 'precio_2', true );
     $total_2  += $precio_super_2 * $cart_item['quantity'];
 }

    $total_3 = 0;

    $supermercado_3 = get_field('super_3', 408);

 // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
 foreach( WC()->cart->get_cart() as $cart_item ){
     $precio_super_3 = (float) get_post_meta( $cart_item['product_id'], 'precio_3', true );
     $total_3  += $precio_super_3 * $cart_item['quantity'];
 }

    $total_4 = 0;

    $supermercado_4 = get_field('super_4', 408);

 // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
 foreach( WC()->cart->get_cart() as $cart_item ){
     $precio_super_4 = (float) get_post_meta( $cart_item['product_id'], 'precio_4', true );
     $total_4  += $precio_super_4 * $cart_item['quantity'];
 }

    $total_5 = 0;

    $supermercado_5 = get_field('super_5', 408);

 // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
 foreach( WC()->cart->get_cart() as $cart_item ){
     $precio_super_5 = (float) get_post_meta( $cart_item['product_id'], 'precio_5', true );
     $total_5  += $precio_super_5 * $cart_item['quantity'];
 }


    $total_6 = 0;

   	$supermercado_6 = get_field('super_6', 408);

    // Busca en el loop del carro el cutom field en cada producto y los suma y multiplica por la cantidad
    foreach( WC()->cart->get_cart() as $cart_item ){
        $precio_super_6 = (float) get_post_meta( $cart_item['product_id'], 'precio_6', true );
        $total_6  += $precio_super_6 * $cart_item['quantity'];
    }
 
    // Muestra el precio más bajo según el súper  
    $calcular_minimo_por_supermercado = min($total_1, $total_2, $total_3, $total_4, $total_5, $total_6);
    $supers = array(
        $total_1 => $supermercado_1,
        $total_2 => $supermercado_2,   
        $total_3 => $supermercado_3,   
        $total_4 => $supermercado_4,   
        $total_5 => $supermercado_5,  
        $total_6 => $supermercado_6   
    );

    echo ' <tr class="precio-mas-bajo">
    <td colspan="5">Precio más bajo en: <h3><strong>' . ($supers[$calcular_minimo_por_supermercado]) .  '</strong></td> <td colspan="" style="text-align:center;font-size:18px;font-weight:bold"><span>$' .  $min = min($total_1, $total_2, $total_3, $total_4, $total_5, $total_6) . '</span></h3></td>
</tr>';



// $min = min($total_1, $total_2);
  
    
   
   
}
add_filter( 'woocommerce_after_cart_contents', 'suma_precio_mas_bajo');

// Modal
function modal_home() {
  if (is_page('Shop') ) {
    echo '<script>
    jQuery(window).load(function(){
      jQuery("#modal-bienvenida").modal("show");
    }); 
    </script>';
  } else {
    // Nada
  }
 
}
add_action( 'wp_footer', 'modal_home' );



 