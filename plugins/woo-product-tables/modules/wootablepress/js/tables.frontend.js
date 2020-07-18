(function ($, app) {
	"use strict";
	$.fn.dataTable.ext.errMode = 'none';

	function WtbpFrontendPage() {
		this.$obj = this;
		return this.$obj;
	}

	WtbpFrontendPage.prototype.init = (function () {
		var _thisObj = this.$obj;
		//$('<meta>', {name: 'viewport', content: 'user-scalable=no'}).appendTo('head');
		_thisObj.initializeTable();
		_thisObj.eventsFrontend();
	});

	WtbpFrontendPage.prototype.initializeTable = (function () {
		var _thisObj = this.$obj;

		$('.wtbpTableWrapper').on( 'change', '.quantity .qty', function() {
			var qtyInput = $( this );
			var wrapper = qtyInput.closest('.wtbpAddToCartWrapper');
			var row = qtyInput.closest('tr');
			if(row.hasClass('child')){
				row = row.prev();
				var wrapperMain = row.find('td.add_to_cart');
				wrapperMain.find('.add_to_cart_button ').attr( 'data-quantity', qtyInput.val());
				wrapperMain.find('.qty').val(qtyInput.val());
				wrapperMain.find('.wtbpAddMulty').attr( 'data-quantity', qtyInput.val());
			}
			wrapper.find('.wtbpAddToCartButWrapp .wtbpAddToCart').attr( 'data-quantity', qtyInput.val());
			wrapper.find('.wtbpAddMulty').attr( 'data-quantity', qtyInput.val());
			wrapper.find('.add_to_cart_button').attr( 'data-quantity', qtyInput.val());
			wrapper.find('.add_to_cart_button').data( 'quantity', qtyInput.val());
		});

		$('.wtbpTableWrapper').each(function( ) {
			var tableWrapper = $(this);
			app.initializeTable(tableWrapper, function(){
				lightbox.option({
					'resizeDuration': 200,
					'wrapAround': true
				});

				setTimeout(function() {
					tableWrapper.css({'visibility':'visible'});
					tableWrapper.find('.wtbpLoader').addClass('wtbpHidden');
					jQuery('body').find('.product_mpc').each(function(){
						var title = jQuery('.product_mpc').closest('form').find('.single_add_to_cart_button').html();
						jQuery(this).html(title);
					});
					if (!tableWrapper.is(':visible')) {
						var maxTime = 600000,
    					startTime = Date.now();
						var interval = setInterval(function () {
        					if (tableWrapper.is(':visible')) {
        						app.getTableInstanceById(tableWrapper.data('table-id')).columns.adjust();
        						//$(window).trigger('resize');
					            clearInterval(interval);
        					} else {
				         	   if (Date.now() - startTime > maxTime) {
				            	    clearInterval(interval);
            					}
        					}
    					}, 200);
					}
				}, 200);
			});
		});

		jQuery('body').on('change keyup click', '.amount_needed', function(){
			var itemVal = jQuery(this).val();
			jQuery(this).closest('form.cart').find('#_measurement_needed').val(itemVal);
		})

		//Set Ajax function for MPC add_to_cart button
		jQuery('.wtbpTableWrapper').on('click', '.add_to_cart_button.product_mpc', function(e) {
			var settings = app.getSetting(false, jQuery(this).closest('.wtbpContentTable'));
			e.preventDefault();

			var form = jQuery(this).closest('form'),
				button = jQuery(this),
				value = jQuery(this).attr('data-product_id'),
				addtocart = '';

			//Add product_id input to form for ?wc-ajax=add_to_cart
			if (form.find('.product_id').length == 0) {
				form.append('<input type="hidden" class="product_id" name="product_id" value="'+value+'">');
			}

			//Prepare URL and check MPC required field
			var url = '/?wc-ajax=add_to_cart',
			 	formSerialize = form.serialize(),
			 	amountInput = jQuery(this).closest('form').find('.amount_needed'),
				amountInputVal = amountInput.val();

			//If MPC required field not empty
			if (amountInputVal !== '') {
				button.attr('disabled',true).prop('disabled',true).addClass('loading');
				amountInput.attr('style', '');
				jQuery.ajax({
				  url: url,
				  type: "POST",
				  data: formSerialize,
				  success: function (response) {
				  	if (response) {
                        button.attr('disabled',false).prop('disabled',false).removeClass('loading');
				  		if (response.error) {
							var translatedText = app.checkSettings(settings, 'product_not_added_to_cart', 'Product not added to cart');
                            $.sNotify({
                                'icon': 'fa fa-warning',
                                'content': '<span> '+translatedText+'</span>',
                                'delay' : 3500
                            });
						} else {
                            $(document.body).trigger('wc_fragment_refresh');
                            $(document.body).trigger('wc_cart_button_updated', [button]);
														var translatedText = app.checkSettings(settings, 'product_added_to_cart', 'Product added to cart');
                            $.sNotify({
                                'icon': 'fa fa-check',
                                'content': '<span> '+translatedText+'</span>',
                                'delay': 1500
                            });
                        }
					}
				   },
				});
			} else {
				amountInput.attr('style', 'border:1px solid red');
				return false;
			}

		});
		$('.wtbpTableWrapper').on('click', '.add_to_cart_button.product_type_variation', function(e) {
			e.preventDefault();
			var $this = jQuery(this);
			if($this.closest('.wtbpAddToCartWrapper').hasClass('wtbpDisabledLink')) return false;
			var	selectedProduct = [],
				product = {id: $this.attr('data-product_id'), varId: $this.attr('data-variation_id'), quantity: $this.attr('data-quantity')},
				variation = {};

			$.each(this.attributes, function() {
			    if(this.name.indexOf('data-attribute_') === 0) {
      				variation[this.name.replace('data-', '')] = this.value;
    			}
  			});
  			product['variation'] = variation;
  			selectedProduct.push(product);
			
			var data = {
				mod: 'wootablepress',
				action: 'multyProductAddToCart',
				selectedProduct: selectedProduct,
				pl: 'wtbp',
				reqType: "ajax"
			};
			jQuery.ajax({
				url: url,
				data: data,
				type: 'POST',
				success: function (res) {
					var added = 1;
					try{
						var result = JSON.parse(res);
						var message = result.messages;
					}catch(e){
						var message = 'Error!';
					}
					if(typeof result != 'undefined' && 'data' in result && 'added' in result.data){
						added = result.data.added;
					}
					if(added) {
						$(document.body).trigger('added_to_cart', [null, null, $this]);
						$(document.body).trigger('wc_fragment_refresh');
					}
					$.sNotify({
						'icon': 'fa fa-'+(added ? 'check' : 'exclamation'),
						'content': '<span>'+message+'</span>',
						'delay' : 2500
					});
				}
			});

			return false;
		});
		$('.wtbpTableWrapper').on('click', '.wtbpDisabledLink .add_to_cart_button', function(e) {
			e.preventDefault();
			var settings = app.getSetting(false, jQuery(this).closest('.wtbpContentTable'));
			$.sNotify({
				'icon': 'fa fa-warning',
				'content': '<span style="padding-left:10px;">'+app.checkSettings(settings, 'select_attributes_text', 'Select attributes before add the product to the cart')+'.</span>',
				'delay' : 2500
			});
			return false;
		});

		$('.wtbpTableWrapper').on('click', '.wtbpAddToCartButWrapp .wtbpAddToCart', function(e) {
			e.preventDefault();
			var button = jQuery(this);
			if(button.closest('.wtbpAddToCartWrapper').hasClass('wtbpDisabledLink')) return false;
			var selectedProduct = [];
			var pushObj = {};

			pushObj.id = button.attr('data-product_id');
			pushObj.varId = button.attr('data-variation_id');
			pushObj.quantity = button.attr('data-quantity');
			selectedProduct.push(pushObj);
			jQuery.sendFormWtbp({
				data: {
					mod: 'wootablepress',
					action: 'multyProductAddToCart',
					selectedProduct: selectedProduct,
				},
				onSuccess: function(res) {
					var message = res.messages;

					$( document.body ).trigger( 'wc_fragment_refresh' );
					button.closest('.wtbpAddToCartWrapper').find('.quantity .qty').val('1').trigger('change');
					button.closest('.wtbpAddToCartWrapper').find('.added_to_cart').removeClass('wtbpHidden');
					$( document.body ).trigger( 'wc_cart_button_updated', [ button ] );
					$.sNotify({
						'icon': 'fa fa-check',
						'content': '<span>'+message+'</span>',
						'delay' : 1500
					});
				}
			});
		});

	});

	WtbpFrontendPage.prototype.eventsFrontend = (function () {
	});

	$(document).ready(function () {
		var wtbpFrontendPage = new WtbpFrontendPage();
		wtbpFrontendPage.init();
	});


}(window.jQuery, window.woobewoo.WooTablepress));
