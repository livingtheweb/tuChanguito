<?php
$isPro = true;
if ( ! $isPro ) {
	$wtbpDisabled = 'wtbpDisabled';
} else {
	$wtbpDisabled = '';
}
$settings = $this->getTableSetting($this->settings, 'settings', array());

?>
<div id="wtbpTablePressEditTabs">
	<section>
		<div class="woobewoo-item woobewoo-panel">
			<div id="containerWrapper">
				<form id="wtbpTablePressEditForm" data-table-id="<?php echo esc_attr($this->table['id']); ?>" data-href="<?php echo esc_url($this->link); ?>">

					<div class="row">
						<div class="wtbpCopyTextCodeSelectionShell col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<div class="row">
								<div class="col-md-4 col-sm-5 col-xs-12 wtbpNamePadding">
									<span id="wtbpTableTitleWrapLabel"><?php esc_html_e('Table name:', 'woo-product-tables'); ?></span>
									<span id="wtbpTableTitleShell" title="<?php echo esc_attr(__('Click to edit', 'woo-product-tables')); ?>">
									<?php $tableTitle = isset($this->table['title']) ? $this->table['title'] : ''; ?>
										<span id="wtbpTableTitleLabel"><?php echo esc_html($tableTitle); ?></span>
										<?php 
											HtmlWtbp::text('title', array(
											'value' => $tableTitle,
											'attrs' => 'class="wtbpHidden" id="wtbpTableTitleTxt"',
											'required' => true,
											)); 
											?>
										<i class="fa fa-fw fa-pencil"></i>
								</span>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-6 wtbpShortcodeAdm">
									<select name="shortcode_example" id="wtbpCopyTextCodeExamples" class="woobewoo-flat-input">
										<option value="shortcode"><?php esc_html_e('Table Shortcode', 'woo-product-tables'); ?></option>
										<option value="phpcode"><?php esc_html_e('Table PHP code', 'woo-product-tables'); ?></option>
									</select>
									<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Table PHP code: lets display the table through themes/plugins files (for example in the site footer). You can use shortcode in this way. <a href="https://woobewoo.com/documentation/how-to-add-a-product-table-to-a-page" target="_blank">Read more.</a>', 'woo-product-tables')); ?>"></i>
								</div>
								<?php 
								$tableId = isset($this->table['id']) ? $this->table['id'] : '';
								if ($tableId) { 
									?>
									<div class="col-md-5 col-sm-6 col-xs-6 wtbpCopyTextCodeShowBlock wtbpShortcode shortcode">
										<?php
										HtmlWtbp::text('', array(
											'value' => '[' . WTBP_SHORTCODE . " id=$tableId]",
											'attrs' => 'readonly onclick="this.setSelectionRange(0, this.value.length);" class="woobewoo-flat-input"',
											'required' => true,
										));
										?>
									</div>
									<div class="col-md-5 col-sm-6 col-xs-6 wtbpCopyTextCodeShowBlock wtbpShortcode phpcode wtbpHidden">
										<?php
										HtmlWtbp::text('', array(
											'value' => "<?php echo do_shortcode('[" . WTBP_SHORTCODE . " id=$tableId]'); ?>",
											'attrs' => 'readonly onclick="this.setSelectionRange(0, this.value.length);" class="woobewoo-flat-input"',
											'required' => true,
										));
										?>
									</div>
								<?php } else { ?>
									<div class="col-md-5 col-sm-6 col-xs-12">
										<?php esc_html_e('Will be created after first save', 'woo-product-tables'); ?>
									</div>
								<?php } ?>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wtbpMainBtnsShell col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<ul class="wtbpSub control-buttons">
								<li>
									<button id="buttonSave" class="button">
										<i class="fa fa-floppy-o" aria-hidden="true"></i><span><?php esc_html_e('Save', 'woo-product-tables'); ?></span>
									</button>
								</li>
								<li>
									<button id="buttonClone" class="button">
										<i class="fa fa-files-o" aria-hidden="true"></i><span><?php esc_html_e('Clone', 'woo-product-tables'); ?></span>
									</button>
								</li>
								<li>
									<button id="buttonDelete" class="button">
										<i class="fa fa-trash-o" aria-hidden="true"></i><span><?php esc_html_e('Delete', 'woo-product-tables'); ?></span>
									</button>
								</li>
							</ul>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<ul class="wtbpSub tabs-wrapper wtbpMainTabs">
								<li>
									<a href="#row-tab-content" class="current button wtbpContentTab"><i class="fa fa-fw fa-th"></i><?php esc_html_e('Content', 'woo-product-tables'); ?></a>
								</li>
								<li>
									<a href="#row-tab-settings" class="button wtbpSettingTab"><i class="fa fa-fw fa-wrench"></i><?php esc_html_e('Settings', 'woo-product-tables'); ?></a>
								</li>
								<li>
									<a href="#row-tab-css" class="button wtbpCssTab"><i class="fa fa-fw fa-code"></i><?php esc_html_e('CSS', 'woo-product-tables'); ?></a>
								</li>
								<li>
									<a href="#row-tab-js" class="button wtbpJsTab"><i class="fa fa-fw fa-code"></i><?php esc_html_e('JS', 'woo-product-tables'); ?></a>
								</li>
							</ul>
							<span id="wtbpTableTitleEditMsg"></span>
						</div>
					</div>

					<div class="row row-tab active" id="row-tab-content">
						<!-- Save post id's -->
						<?php 
							HtmlWtbp::hidden('settings[productids]', array(
								'value' => ( isset($settings['productids']) ? $settings['productids'] : '' ),
							));
							?>

						<div class="col-xs-12">
							<h3 class="wtbpHeaders"><?php esc_html_e('Table Columns', 'woo-product-tables'); ?></h3>
							<div class="wtbp-content-block">
								<label><?php esc_html_e('Select properties to add to the table', 'woo-product-tables'); ?></label>
								<div class="woobewoo-input-group">
									<select id="chooseColumns">
										<?php
										$orderCols = array();
										$isDefault = true;
										$savedColumns = array();

										if (isset($settings['order']) && !empty($settings['order'])) {
											$optionsArr = json_decode($settings['order'], true);
											foreach ($optionsArr as $i => $column) {
												$orderCols[$column['slug']] = !empty($column['show_display_name']) ? $column['display_name'] : $column['original_name'];
												$savedColumns[$column['slug']] = $i;
											}
											$isDefault = false;
										}
										$enabledColumns = array();
										$sortableColumns = array('' => __('none', 'woo-product-tables'));
										$disableSort = array('thumbnail', 'add_to_cart');
										foreach ($this->table_columns as $column) {
											$slug = $column['slug'];
											if ($isDefault && $column['is_default']) {
												$orderCols[$slug] = $column['name'];
											}
											$enabled = $column['is_enabled'];
											$enabledColumns[$slug] = $enabled;
											if ('id' !== $slug) {
												echo '<option class="' . esc_attr( ( isset($orderCols[$slug]) && $enabled ? 'wtbpHidden ' : '' ) . ( empty($column['class']) ? '' : $column['class'] ) ) .
													'" data-type="' . esc_attr( empty($column['type']) ? $slug :  $column['type'] ) . '"';
												echo ' value="' . esc_attr($slug) . '" data-name="' . esc_attr($column['name']) . '" data-enabled="' . esc_attr($enabled) . '">' . ( $column['sub'] ? '&nbsp;&nbsp;&nbsp;' : '' ) . esc_html($column['name']) . '</option>';
												if (!in_array($slug, $disableSort)) {
													$sortableColumns[$slug] = $column['name'];
												}
											}
										}
										?>
									</select>
									<button id="wtbpAddButton" class="button button-small">
										<span><?php esc_html_e('Add', 'woo-product-tables'); ?></span>
									</button>
								</div>
								<span class="wtbpPro wtbpProInline wtbpProColumn" data-type="attribute">
									<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/example/product-table-with-attributes/">
										<?php esc_html_e('PRO option', 'woo-product-tables'); ?>
									</a>
								</span>
								<span class="wtbpPro wtbpProInline wtbpProColumn" data-type="sales">
									<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/documentation/how-to-display-sales-of-the-products/">
										<?php esc_html_e('PRO option', 'woo-product-tables'); ?>
									</a>
								</span>
								<span class="wtbpPro wtbpProInline wtbpProColumn" data-type="tags">
									<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/plugins/table-woocommerce-plugin/">
										<?php esc_html_e('PRO option', 'woo-product-tables'); ?>
									</a>
								</span>
							</div>
							<div class="wtbpPropertiesWrapp wtbp-content-block">
								<?php
								$curOrder = array();
								foreach ($orderCols as $slug => $name) {
									if (!isset($enabledColumns[$slug]) || !$enabledColumns[$slug]) {
										continue;
									}
									$curOrder[] = $isDefault ? array('slug' => $slug, 'original_name' => $name) : $optionsArr[$savedColumns[$slug]];
									echo '<div class="wtbpOptions" data-slug="' . esc_attr($slug) . '"><div class="content">' . esc_html($name) . '</div>';
									?>
										<div class="wtbpOptionHandlers">
											<div class="wtbpOptionDragHandler"><i class="fa fa-arrows-h"></i></div>
											<div class="wtbpOptionEditHandler"><i class="fa fa-fw fa-pencil"></i></div>
											<div class="wtbpOptionRemoveHandler"><i class="fa fa-fw fa-trash-o"></i></div>
										</div>
									</div>
									<?php
								}
								?>
								<!-- Save show elements name like columns order in content table -->
								<?php 
									HtmlWtbp::hidden('settings[order]', array(
									'value' => htmlentities(json_encode($curOrder)),
									));
									?>
							</div>
							<div class="wtpbAutoCategories wtbp-content-block">
								<?php 
								if ($this->is_pro) {
									DispatcherWtbp::doAction('addEditAdminSettings', 'partEditAdminAddAuto', array('settings' => $this->settings, 'categories_html' => $this->categories_html));
								} else { 
									?>
									<div class="woobewoo-check-group">
										<?php HtmlWtbp::checkbox('settings[auto_categories_enable]', array('checked' => '', 'disabled' => 1)); ?>
										<label>
											<?php esc_html_e('Add products automatically', 'woo-product-tables'); ?>
											<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Add products in this way and all the new products you will add to shop will be automatically added to the table and on frontend according to the selected category.', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/add_products_automatically.png') . '" height="175"></div>'); ?>"></i>
										</label>
									</div>
									<span class="wtbpPro wtbpProInline"><a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/all-products-in-one-table/"><?php esc_html_e('PRO option', 'woo-product-tables'); ?></a></span>
								<?php } ?>
							</div>
							<div class="wtbpSearchTableWrapp wtbpAdminTableWrapp wtbpHidden woobewoo-plugin">
								<div id="wtbpSearchTableFilters" class="wtbpDialogTableFilters">
									<label><?php esc_html_e('Select Products to add:', 'woo-product-tables'); ?></label>
									<select name="filter_in_table" class="woobewoo-flat-input">
										<option value=""><?php esc_html_e('In table', 'woo-product-tables'); ?></option>
										<option value="yes">yes</option>
										<option value="no">no</option>
									</select>
									<select name="filter_author" class="woobewoo-flat-input">
										<option value=""><?php esc_html_e('Select author', 'woo-product-tables'); ?></option>
										<?php HtmlWtbp::echoEscapedHtml($this->authors_html); ?>
									</select>
									<select name="filter_category" class="woobewoo-flat-input">
										<option value=""><?php esc_html_e('Select category', 'woo-product-tables'); ?></option>
										<?php HtmlWtbp::echoEscapedHtml($this->categories_html); ?>
									</select>
									<select name="filter_tag" class="woobewoo-flat-input">
										<option value=""><?php esc_html_e('Select tag', 'woo-product-tables'); ?></option>
										<?php HtmlWtbp::echoEscapedHtml($this->tags_html); ?>
									</select>
									<select name="filter_attribute" class="woobewoo-flat-input wtbp-mr30">
										<option value=""><?php esc_html_e('Select attribute', 'woo-product-tables'); ?></option>
										<?php HtmlWtbp::echoEscapedHtml($this->attributes_html); ?>
									</select>
									<div class="wtbpCreateTableFilter">
										<input type="checkbox" name="filter_attribute_exactly" value="1"> <?php esc_html_e('only current attribute', 'woo-product-tables'); ?>
									</div>
									<div class="wtbpSearchTableFilter">
										<input type="checkbox" name="show_variations" value="1"> <?php esc_html_e('show variations', 'woo-product-tables'); ?>
									</div>
									<div class="wtbpSearchTableFilter">
										<input type="checkbox" name="filter_private" value="1">	<?php esc_html_e('show private', 'woo-product-tables'); ?>
									</div>
								</div>
								<input type="hidden" id="wtbpSearchTableSelectAll" value="0">
								<input type="hidden" id="wtbpSearchTableSelectExclude" value="">
								<table id="wtbpSearchTable" class="wtbpSearchTable">
									<?php HtmlWtbp::echoEscapedHtml($this->search_table); ?>
								</table>
							</div>

							<div class="wtbpPropertiesChangeNameWrapp wtbpHidden woobewoo-plugin" title="<?php esc_html_e('Column settings', 'woo-product-tables'); ?>">
								<div class="wtbpOptionContainer">
									<div class="wtbpOptionTitle">
										<label>
											<?php esc_html_e('Title', 'woo-product-tables'); ?>
										</label>
									</div>
									<div>
										<input type="radio" name="show_display_name" class="wtbpNotOutline" value="0">
										<span class="originalName"></span>
										<span class="wtbp-mini-text">(<?php esc_html_e('default', 'woo-product-tables'); ?>)</span>
									</div>
									<div>
										<input type="radio" name="show_display_name" class="wtbpNotOutline" value="1">
										<input type="text" name="display_name"/>
									</div>
								</div>
								<div class="wtbpOptionContainer">
									<label><?php esc_html_e('Column width', 'woo-product-tables'); ?></label>
									<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('This setting sets the maximum width for the column, but the rest of the table content also affects its width - check how it looks on Preview.', 'woo-product-tables')); ?>"></i>
										<?php
											HtmlWtbp::text('width', array('attrs' => 'class="woobewoo-width60"'));
											HtmlWtbp::selectbox('width_unit', array(
												'options' => array('px' => 'px', '%' => '%'),
												'attrs' => 'class="woobewoo-width60"')
											);
											?>
								</div>
								<div class="wtbpOptionContainer">
									<input type="checkbox" name="always_hide" class="wtbpNotOutline" value="1" data-one-from="hide">
									<label>
										<?php esc_html_e('Always hide', 'woo-product-tables'); ?>
										<span class="wtbp-mini-text"> <?php esc_html_e('(use only for hidden attributes)', 'woo-product-tables'); ?></span>
									</label>
								</div>
								<div class="wtbpOptionContainer">
									<input type="checkbox" name="hide_on_mobile" class="wtbpNotOutline" value="1" data-one-from="hide">
									<label><?php esc_html_e('Hide on small screen', 'woo-product-tables'); ?></label>
								</div>
								<div class="wtbpOptionContainer">
									<input type="checkbox" name="show_only_on_mobile" class="wtbpNotOutline" value="1" data-one-from="hide">
									<label><?php esc_html_e('Show only on small screen', 'woo-product-tables'); ?></label>
								</div>
								<div class="wtbpOptionContainer" data-properties="product_title">
									<input type="checkbox" name="product_title_link" class="wtbpNotOutline wtbpDefaultChecked" value="1">
									<label><?php esc_html_e('Show link to the', 'woo-product-tables'); ?></label>
									<?php
									$titleLinks = array('' => __('Product page', 'woo-product-tables'));
									if ($this->is_pro && class_exists('YITH_WCQV_Frontend')) { 
										$titleLinks['quick'] = __('Quick view', 'woo-product-tables');
									}
									HtmlWtbp::selectbox('product_title_link_to', array(
										'options' => $titleLinks)
									);
									?>
								</div>
								<div class="wtbpOptionContainer" data-properties="product_title">
									<input type="checkbox" name="product_title_link_blank" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Open link on a new window', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="categories">
									<input type="checkbox" name="product_category_link" class="wtbpNotOutline wtbpDefaultChecked" value="1">
									<label>
										<?php esc_html_e('Show category link', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="categories">
									<input type="checkbox" name="product_category_link_blank" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Open category on a new window', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="categories">
									<input type="checkbox" name="product_category_new_line" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Display each category on a new line', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="tags">
									<input type="checkbox" name="product_tag_link" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Show tag link', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="tags">
									<input type="checkbox" name="product_tag_link_blank" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Open tag page on a new window', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="tags">
									<input type="checkbox" name="product_tag_new_line" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Display each tag on a new line', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-types="custom_tax">
									<input type="checkbox" name="product_ctax_link" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Show taxonomy link', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-types="custom_tax">
									<input type="checkbox" name="product_ctax_link_blank" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Open taxonomy page on a new window', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-types="attribute">
									<input type="checkbox" name="product_attribute_new_line" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Display each attribute on a new line', 'woo-product-tables'); ?>
									</label>
								</div>
								<div class="wtbpOptionContainer" data-properties="description">
									<input type="checkbox" name="cut_description_text" class="wtbpNotOutline wtbpDefaultChecked" value="1">
									<label>
										<?php esc_html_e('Cut description text', 'woo-product-tables'); ?>
									</label>
									<?php 
										HtmlWtbp::text('cut_description_text_size', array(
										'placeholder' => '100',
										'attrs' => 'data-parent="cut_description_text" class="wtbpHideByParent woobewoo-width60"'
										));
										?>
								</div>
								<div class="wtbpOptionContainer" data-properties="short_description">
									<input type="checkbox" name="cut_short_description_text" class="wtbpNotOutline" value="1">
									<label><?php esc_html_e('Cut short description text', 'woo-product-tables'); ?></label>
									<?php 
										HtmlWtbp::text('cut_short_description_text_size', array(
										'placeholder' => '100',
										'attrs' => 'data-parent="cut_short_description_text" class="wtbpHideByParent woobewoo-width60"'
										));
										?>
								</div>
								<div class="wtbpOptionContainer" data-properties="product_link">
									<label><?php esc_html_e('Button text', 'woo-product-tables'); ?></label>
									<?php 
										HtmlWtbp::text('product_link_text', array(
										'placeholder' => 'More',
										'attrs' => 'data-parent="product_link_text" class="wtbp-width200"'
										));
										?>
								</div>
								<div class="wtbpOptionContainer" data-properties="stock">
									<input type="checkbox" name="stock_show_icons" class="wtbpNotOutline" value="1">
									<label><?php esc_html_e('Show icons', 'woo-product-tables'); ?></label>
								</div>
								<div class="wtbpOptionContainer" data-properties="stock">
									<input type="checkbox" name="stock_show_text" class="wtbpNotOutline wtbpDefaultChecked" value="1">
									<label><?php esc_html_e('Show status text', 'woo-product-tables'); ?></label>
								</div>
								<div class="wtbpOptionContainer" data-properties="add_to_cart">
									<input type="checkbox" name="add_to_cart_hide_variation_attribute" class="wtbpNotOutline" value="1">
									<label>
										<?php esc_html_e('Hide variation attributes', 'woo-product-tables'); ?>
									</label>
								</div>
								<?php if ($this->is_pro) { ?>
									<div class="wtbpOptionContainer" data-properties="description">
										<input type="checkbox" name="description_popup" class="wtbpNotOutline" value="1" data-one-from="hide">
										<label>
											<?php esc_html_e('Description popup', 'woo-product-tables'); ?>
										</label>
										<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Open popup when click description with product full description on it.', 'woo-product-tables')); ?>"></i>
									</div>
									<div class="wtbpOptionContainer" data-properties="thumbnail">
										<input type="checkbox" name="add_cart_button" class="wtbpNotOutline" value="1" data-one-from="hide">
										<label><?php esc_html_e('Add cart button', 'woo-product-tables'); ?></label>
									</div>
									<div class="wtbpOptionContainer" data-properties="thumbnail">
										<input type="checkbox" name="display_secont_thumbnail" class="wtbpNotOutline" value="1">
										<label><?php esc_html_e('Add second thumbnail', 'woo-product-tables'); ?></label>
										<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Add first gallery image as a second column thumbnail.', 'woo-product-tables')); ?>"></i>
									</div>
									<div class="wtbpOptionContainer" data-types="link">
										<label><?php esc_html_e('Show as', 'woo-product-tables'); ?></label>
										<?php 
										HtmlWtbp::selectbox('acf_link_show_as', array(
											'options' => array(
												'link' => __('link', 'woo-product-tables'),
												'button' => __('button', 'woo-product-tables'),
												'icon' => __('icon', 'woo-product-tables'),
												'image' => __('image', 'woo-product-tables')
											),
											'attrs' => 'class="woobewoo-width100"')
										);
										?>
										<div class="wtbpHideByParentBlock">
											<?php 
											HtmlWtbp::selectFileBtn('acf_image_path', array(
												'type' => 'image',
												'value_attrs' => 'data-parent="acf_link_show_as" data-parent-value="image" class="wtbpHideByParent"',
											));
											?>
										</div>
									</div>
									<div class="wtbpOptionContainer" data-properties="featured">
										<label><?php esc_html_e('Show as', 'woo-product-tables'); ?></label>
										<?php 
										HtmlWtbp::selectbox('featured_show_as', array(
											'options' => array(
												'text' => __('text', 'woo-product-tables'),
												'icon' => __('icon', 'woo-product-tables'),
												'image' => __('image', 'woo-product-tables')
											),
											'attrs' => 'class="woobewoo-width100"')
										);
										?>
										<div class="wtbpHideByParentBlock">
											<?php 
											HtmlWtbp::selectFileBtn('featured_image_path', array(
												'type' => 'image',
												'value_attrs' => 'data-parent="featured_show_as" data-parent-value="image" class="wtbpHideByParent"',
											));
											?>
										</div>
									</div>
									<div class="wtbpOptionContainer" data-properties="downloads">
										<label><?php esc_html_e('Show as', 'woo-product-tables'); ?></label>
										<?php 
										HtmlWtbp::selectbox('downloads_show_as', array(
											'options' => array('icon' => __('icon', 'woo-product-tables'), 'button' => __('button', 'woo-product-tables'), 'link' => __('link', 'woo-product-tables'), 'audio' => __('audio', 'woo-product-tables'), 'video' => __('video', 'woo-product-tables')),
											'attrs' => 'class="woobewoo-width100"')
										);
										?>
									</div>
									<div class="wtbpOptionContainer" data-types="true_false">
										<label><?php esc_html_e('TRUE show as', 'woo-product-tables'); ?></label>
										<?php 
										HtmlWtbp::text('true_show_as', array(
											'placeholder' => 'true',
											'attrs' => 'class="woobewoo-width100"'
										));
										?>
									</div>
									<div class="wtbpOptionContainer" data-types="text">
										<input type="checkbox" name="acf_text_shortcode" class="wtbpNotOutline" value="0" data-one-from="hide">
										<label><?php esc_html_e('Do shortcodes?', 'woo-product-tables'); ?></label>
									</div>
									<div class="wtbpOptionContainer" data-types="quick_view">
										<label><?php esc_html_e('Button label', 'woo-product-tables'); ?></label>
										<?php 
										HtmlWtbp::text('button_label', array());
										?>
									</div>
									<div class="wtbpOptionContainer" data-not-properties="thumbnail add_to_cart">
										<input type="checkbox" name="disable_search" class="wtbpNotOutline" value="1" data-one-from="hide">
										<label><?php esc_html_e('Disable search on this column', 'woo-product-tables'); ?></label>
									</div>
									<div class="wtbpOptionContainer" data-properties="categories">
										<label><?php esc_html_e('Exclude terms ids', 'woo-product-tables'); ?></label>
										<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr__('Here you may exclude category terms by ids. Example input: 1,2,3', 'woo-product-tables'); ?>"></i>										
										<?php 
										HtmlWtbp::text('product_category_exclude', array(
											'attrs' => 'class="woobewoo-width100"'
										));
										?>
									</div>
								<?php } ?>
								<div class="wtbpOptionContainer" data-properties="downloads">
									<input type="checkbox" name="product_downloads_link_blank" class="wtbpNotOutline" value="1">
									<label><?php esc_html_e('Open link on a new window', 'woo-product-tables'); ?></label>
								</div>
								<div class="wtbpOptionContainer" data-properties="stock">
									<input type="checkbox" name="stock_item_counts" id="stock_item_counts" class="wtbpNotOutline" value="1">
									<label for="stock_item_counts"><?php esc_html_e('Show quantity items in stock', 'woo-product-tables'); ?></label>
									<?php if ($this->is_pro) { ?>
										<div class="wtbpOptionContainer" data-properties="stock">
											<label data-parent="stock_item_counts" data-parent-value="1" class="wtbpHideByParent">
												<?php esc_html_e('Max quantity input', 'woo-product-tables'); ?>
											</label>
											<?php
											HtmlWtbp::input('stock_max_quantity', array(
												'type' => 'number',
												'attrs' => 'data-parent="stock_item_counts" data-parent-value="1" class="wtbpHideByParent"',
											));
											?>
										</div>
									<?php } ?>
								</div>
								<div class="wtbpOptionContainer" data-properties="thumbnail">
									<label><?php esc_html_e('Responsive mod thumnbnail size', 'woo-product-tables'); ?></label>
									<?php 
										HtmlWtbp::text('mobile_thumbnail_size_width', array(
										'placeholder' => '150',
										'attrs' => 'class="wtbp-small-input"'
										));
										?>
									x
									<?php 
										HtmlWtbp::text('mobile_thumbnail_size_height', array(
										'placeholder' => '150',
										'attrs' => 'class="wtbp-small-input"'
										));
										?>
								</div>
							</div>

							<div class="wtbpCloneTableWrapp wtbpHidden" title="<?php echo esc_attr(__('Clone table', 'woo-product-tables')); ?>">
								<div class="wtbpOptionContainer">
									<input class="wtbpNotOutline woobewoo-width-full" type="text" name="gggg" value="" />
									<div class="wtbpCloneError">
										<p></p>
									</div>
								</div>
							</div>

							<div class="wtbpOptions wtbpOptionsEmpty wtbpHidden">
								<div class="content"></div>
								<div class="wtbpOptionHandlers">
									<div class="wtbpOptionDragHandler"><i class="fa fa-arrows-h"></i></div>
									<div class="wtbpOptionEditHandler"><i class="fa fa-fw fa-pencil"></i></div>
									<div class="wtbpOptionRemoveHandler"><i class="fa fa-fw fa-trash-o"></i></div>
								</div>
							</div>

							<h3 class="wtbpHeaders"><?php esc_html_e('Table Content', 'woo-product-tables'); ?>
								<button id="wtbpAddProducts" class="button button-small">
									<span><?php esc_html_e('Add Products', 'woo-product-tables'); ?></span>
								</button>
							</h3>
							<div id="wtbpSortTableContent" class="wtbpAdminTableWrapp">
								<input type="hidden" id="wtbpContentTableSelectAll" value="0">
								<input type="hidden" id="wtbpContentTableSelectExclude" value="">
								<table id="wtbpContentTable" class="wtbpContentAdmTable woobewoo-width-full"></table>
							</div>
						</div>
					</div>
					<div class="row row-tab" id="row-tab-settings">
						<div class="col-xs-12">
							<section class="wtbp-settings-section">
								<div class="wtbp-sub-tab woobewoo-input-group">
									<a href="#wtpb-tab-settings-main" class="button"><?php esc_html_e('Main', 'woo-product-tables'); ?></a>
									<a href="#wtpb-tab-settings-features" class="button disabled"><?php esc_html_e('Features', 'woo-product-tables'); ?></a>
									<a href="#wtpb-tab-settings-appearance" class="button disabled"><?php esc_html_e('Appearance', 'woo-product-tables'); ?></a>
									<a href="#wtpb-tab-settings-text" class="button disabled"><?php esc_html_e('Text', 'woo-product-tables'); ?></a>
								</div>
								<div class="wtbp-settings-wrap">
									<section class="settings-blocks">
										<section class="row-settings-block" id="wtpb-tab-settings-main">
											<div class="settings-block-title">
												<i class="fa fa-fw fa-tachometer"></i><?php esc_html_e('Main Settings', 'woo-product-tables'); ?>
											</div>
											<div class="setting-title">
												<?php esc_html_e('Table Elements', 'woo-product-tables'); ?>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Caption', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Check here if you want to show the name of the table above the table.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[caption_enable]', array(
														'checked' => ( isset($settings['caption_enable']) ? (int) $settings['caption_enable'] : '' ),
														'attrs' => ' data-not-redraw="1"'
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$this->getTableSetting($settings, 'caption_enable', false) ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[caption_enable]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Caption Text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::textarea('settings[caption_text]', array(
														'value' => ( isset($settings['caption_text']) ? $settings['caption_text'] : '' ),
														'attrs' => 'class="woobewoo-width-full"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Description', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" data-tooltip-content="" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('You can add short description to the table between title and table.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[description_enable]', array(
															'checked' => ( isset($settings['description_enable']) ? (int) $settings['description_enable'] : '' )
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$this->getTableSetting($settings, 'description_enable', false) ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[description_enable]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Description Text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::textarea('settings[description_text]', array(
															'value' => ( isset($settings['description_text']) ? $settings['description_text'] : '' ),
															'attrs' => 'class="woobewoo-width-full"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Header', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Check here if you want to show the table head.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[header_show]', array(
														'checked' => ( isset($settings['header_show']) ? (int) $settings['header_show'] : '' )
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$this->getTableSetting($settings, 'header_show', false) ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[header_show]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Fixed Header', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Allows to fix the table\'s header during table scrolling. Important! Header option must be enabled for using this feature.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[header_fixed]', array(
														'checked' => ( isset($settings['header_fixed']) ? (int) $settings['header_fixed'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Footer', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Check here if you want to show the table footer.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[footer_show]', array(
														'checked' => ( isset($settings['footer_show']) ? (int) $settings['footer_show'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Signature', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('You can add signature under table footer.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[signature_enable]', array(
														'checked' => ( isset($settings['signature_enable']) ? (int) $settings['signature_enable'] : '' )
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$this->getTableSetting($settings, 'signature_enable', false) ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[signature_enable]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Signature Text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::textarea('settings[signature_text]', array(
														'value' => ( isset($settings['signature_text']) ? $settings['signature_text'] : '' ),
														'attrs' => 'class="woobewoo-width-full"'
														));
														?>
												</div>
											</div>
											<div class="setting-title">
												<?php esc_html_e('Date Formats', 'woo-product-tables'); ?>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Date', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Set output format for date. For example: y-m-d - 1991-12-25, d.m.y - 25.12.1991', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[date_formats]', array(
														'options' => array('Y-m-d' => '1991-12-25', 'd.m.Y' => '25.12.1991'),
														'value' => ( isset($settings['date_formats']) ? $settings['date_formats'] : 'y-m-d' ),
														'attrs' => ' class="woobewoo-flat-input"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Time / Duration', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Set output format for time and duration. For example:  1) time - H:m - 18:00 , h:m a - 9:00 pm 2) duration h:m - 36:40, h:m:s - 36:40:12', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[time_formats]', array(
														'options' => array('H:i' => '18:00', 'h:i a' => '9:00 pm', 'h:i' => '36:40', 'h:i:s' => '36:40:12'),
														'value' => ( isset($settings['time_formats']) ? $settings['time_formats'] : 'H:m' ),
														'attrs' => ' class="woobewoo-flat-input"'
														));
														?>
												</div>
											</div>
										</section>
										<section class="row-settings-block" id="wtpb-tab-settings-features">
											<div class="settings-block-title">
												<i class="fa fa-fw fa-cogs"></i><?php esc_html_e('Features', 'woo-product-tables'); ?>
											</div>
											<div class="setting-title">
												<?php esc_html_e('General', 'woo-product-tables'); ?>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Table information', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Show pagination information after table.', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/table_info.png') . '" height="87"></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[table_information]', array(
														'checked' => ( isset($settings['table_information']) ? (int) $settings['table_information'] : '' )
														));
														?>
												</div>
											</div>
											<?php $sortingCustom = $this->getTableSetting($settings, 'sorting_custom', false); ?>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Use pre-sorting', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Use pre-sorting.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[sorting_custom]', array(
														'checked' => ( isset($settings['sorting_custom']) ? (int) $settings['sorting_custom'] : '' )
														));
														?>
												</div>
											</div>
											<?php $classHidden = $sortingCustom ? '' : 'wtbpHidden'; ?>
											<div class="setting-wrapper setting-wrapper-inline setting-suboption <?php echo esc_attr($classHidden); ?>">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Sorting type', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Select Manual option if you want to add a sort by drag-n-drop from the admin table preview to the frontend.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[pre_sorting]', array(
														'options' => array(
															'' => __('Manual', 'woo-product-tables'),
															'popularity' => __('Popularity', 'woo-product-tables'),
															'rating' => __('Rating', 'woo-product-tables'),
															'date' => __('Newness', 'woo-product-tables'),
															'price' => __('Price', 'woo-product-tables'),
															'rand' => __('Random', 'woo-product-tables'),
															'title' => __('Name', 'woo-product-tables')),
														'value' => ( isset($settings['pre_sorting']) ? $settings['pre_sorting'] : '' ),
														'attrs' => ' class="woobewoo-flat-input"'
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$sortingCustom || $this->getTableSetting($settings, 'pre_sorting', '') == '' ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Sorting descending', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Enable the checkbox if you want to sort by descending.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[pre_sorting_desc]', array(
														'checked' => ( isset($settings['pre_sorting_desc']) ? (int) $settings['pre_sorting_desc'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Frontend sorting', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Allow dynamic sorting with arrows. To use this option you must enable Header option <a href="https://woobewoo.com/documentation/sorting-product-table" target="_blank">Read more.</a>', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/sorting.png') . '" height="46"></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[sorting]', array(
														'checked' => ( isset($settings['sorting']) ? (int) $settings['sorting'] : '' )
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$this->getTableSetting($settings, 'sorting', false) || $sortingCustom ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-wrapper-inline setting-suboption <?php echo esc_attr($classHidden); ?>">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Auto sorting', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Select the column to sort by default. Works only with relevant columns enabled.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[sorting_default]', array(
														'options' => $sortableColumns,
														'value' => ( isset($settings['sorting_default']) ? $settings['sorting_default'] : '' ),
														'attrs' => ' class="woobewoo-flat-input"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Auto sorting descending', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Enable the checkbox if you want to sort by descending.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[sorting_desc]', array(
														'checked' => ( isset($settings['sorting_desc']) ? (int) $settings['sorting_desc'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Pagination', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Show table pagination.', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/pagination.png') . '" height="74"></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[pagination]', array(
														'checked' => ( isset($settings['pagination']) ? (int) $settings['pagination'] : '' ),
														'attrs' => ' data-need-save="1"'
														));
														?>
												</div>
											</div>
											<?php 
												$isPagination = $this->getTableSetting($settings, 'pagination', false);
												$isPaginationMenu = $isPagination && $this->getTableSetting($settings, 'pagination_menu', false);
												$classHidden = !$isPagination ? 'wtbpHidden' : '';
											?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[pagination]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Pagination menu', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Show drop down list to select the number of products on the page.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[pagination_menu]', array(
														'checked' => ( isset($settings['pagination_menu']) ? $settings['pagination_menu'] : '' )
														));
														?>
												</div>
											</div>
											<?php $classHidden = !$isPagination || !$isPaginationMenu ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-wrapper-inline setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main-reverse="settings[pagination_menu]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Products per Page', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Here you can set the number of products to display on one Pagination page.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[page_length]', array(
														'value' => ( isset($settings['page_length']) ? $settings['page_length'] : '10' ),
														'attrs' => ' class="woobewoo-flat-input woobewoo-width60"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[pagination_menu]">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Pagination List Content', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Here you can set the number of rows to display on one Pagination page. Establish several numbers separated by comma to let users choose it personally. First number will be displayed by default. Since that the number of Pagination Pages will be recounted also.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[pagination_menu_content]', array(
														'value' => ( isset($settings['pagination_menu_content']) ? $settings['pagination_menu_content'] : '10,20,50,100,All' )
														));
														?>
												</div>
											</div>
											<?php 
											if ($this->is_pro) {
												DispatcherWtbp::doAction('addEditAdminSettings', 'partEditAdminSSP', array('settings' => $this->settings));
											} else { 
												$classHidden = !$isPagination ? 'wtbpHidden' : '';
												?>
												<div class="setting-wrapper setting-wrapper-inline setting-suboption <?php echo esc_attr($classHidden); ?>"
													data-main="settings[pagination]">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Server-side Processing', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Show drop down list to select the number of products on the page.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro"><a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/plugins/table-woocommerce-plugin/?utm_source=plugin&utm_medium=pagination-ssp&utm_campaign=woo-product-table"><?php esc_html_e('PRO', 'woo-product-tables'); ?></a></span>
													</div>
												</div>
											<?php } ?>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Searching', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Show table searching field.<a href="https://woobewoo.com/documentation/searching-feature-of-product-table" target="_blank">Read more.</a>', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[searching]', array(
														'checked' => ( isset($settings['searching']) ? (int) $settings['searching'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Search by Columns', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Add search by table columns. Use a semicolon as separator for select any of the values.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[column_searching]', array(
														'checked' => ( isset($settings['column_searching']) ? (int) $settings['column_searching'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Print', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Show table print button.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[print]', array(
														'checked' => ( isset($settings['print']) ? (int) $settings['print'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Print captions', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Print table caption, description and signature.', 'woo-product-tables') . '</div></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[print_captions]', array(
														'checked' => ( isset($settings['print_captions']) ? (int) $settings['print_captions'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Hide out of stock items', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[hide_out_of_stock]', array(
														'checked' => ( isset($settings['hide_out_of_stock']) ? (int) $settings['hide_out_of_stock'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Show private products', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[show_private]', array(
														'checked' => ( isset($settings['show_private']) ? (int) $settings['show_private'] : '' )
														));
														?>
												</div>
											</div>
											<?php 
											if ($this->is_pro) {
												DispatcherWtbp::doAction('addEditAdminSettings', 'partEditAdminFeatures', array('settings' => $this->settings));
											} else { 
												?>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Show variation thumbnails', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Display the images of variations.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/documentation/show-variation-thumbnails/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Show first variation as default', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('The first variation will be selected by default.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/documentation/show-first-variation-as-default/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Show variation price in price column', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Works only with enabled price column.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/documentation/show-variation-price-in-price-column/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Multiple add to cart', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Multiple add to cart products. <a href="https://woobewoo.com/documentation/add-to-cart-button-and-variations/" target="_blank">Read more.</a>', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/add_selected_to_cart.png') . '" height="86"></div>'); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/quantities-and-add-selected-to-cart/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Add all to cart', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Add all to cart.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/quantities-and-add-selected-to-cart/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Hide view cart link', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Hide view cart link.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/quantities-and-add-selected-to-cart/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
											<?php } ?>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Hide quantity input', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Hide quantity input for add to cart button in the frontend', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[hide_quantity_input]', array(
														'checked' => ( isset($settings['hide_quantity_input']) ? (int) $settings['hide_quantity_input'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-title">
												<?php esc_html_e('Filters', 'woo-product-tables'); ?>
											</div>
											<?php 
											if ($this->is_pro) {
												DispatcherWtbp::doAction('addEditAdminSettings', 'partEditAdminFilters', array('settings' => $this->settings, 'columns' => $this->table_columns));
											} else { 
												?>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Attribute filter', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Attribute filter. Works only with enabled attribute columns. <a href="https://woobewoo.com/documentation/product-attribute-and-category-filters" target="_blank">Read more.</a>', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/filter_attr.png') . '" height="49"></div>'); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/filter-by-attributes/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-suboption">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Hide searching attributes from table', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Hide attribute column(s) and keep the filter to display. You don’t need to add attributes as a column to make filters available. Selected filters will be displayed. If you will add some attribute as a column manually, it will not be hidden even is “Hide searching attributes from a table” is enabled.', 'woo-product-tables') . '</div></div>'); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/filter-by-attributes/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Tags filter', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Tags filter. Works only with enabled tags column.', 'woo-product-tables') . '</div></div>'); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/filter-by-attributes/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php 
															esc_html_e('Custom taxonomy filter', 'woo-product-tables'); 
															/* translators: 1: link for Custom Post Type UI 2: link ACF 3: link for Read more */
															$tooltip = '<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . sprintf(__('Display filters for custom taxonomy created with the help of %1$s and %2$s plugins. %3$s', 'woo-product-tables'), '<a href="https://woobewoo.com/documentation/how-to-add-custom-taxonomy-to-the-table" target="_blank">Custom Post Type UI</a>', '<a href="https://woobewoo.com/documentation/how-to-add-custom-taxonomy-to-the-table" target="_blank">ACF</a>', '<a href="https://woobewoo.com/documentation/product-attribute-and-category-filters" target="_blank">' . __('Read more', 'woo-product-tables') . '</a>') . '</div></div>';
															?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr($tooltip); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/example/custom-fields/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Price filter', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Price filter. Works only with enabled Price column.', 'woo-product-tables') . '</div></div>'); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/filter-by-attributes/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php 
															esc_html_e('Category filter', 'woo-product-tables');
															$tooltip = '<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Category filter. Works only with enabled category column.', 'woo-product-tables') . ' <a href="https://woobewoo.com/documentation/product-attribute-and-category-filters/" target="_blank">' . __('Read more', 'woo-product-tables') . '</a></div><img src="' . esc_url($this->getModule()->getModPath() . 'img/filter_cat.png') . '" height="56"></div>';
															?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr($tooltip); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/filter-by-attributes/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Hide products before filtering', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr__('Hide all the products in the table until a user defines a search parameter or filter.', 'woo-product-tables'); ?>"></i>
														</label>
													</div>
													<div class="setting-check">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/feature/filter-by-attributes/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
											<?php } ?>
										</section>
										<section class="row-settings-block" id="wtpb-tab-settings-appearance">
											<div class="settings-block-title">
												<i class="fa fa-fw fa-picture-o"></i><?php esc_html_e('Appearance', 'woo-product-tables'); ?>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Fixed table width', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Set fixed table width in px or %.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[width][fixed_width]', array(
														'value' => ( isset($settings['width']['fixed_width']) ? $settings['width']['fixed_width'] : '100' ),
														'attrs' => 'class="wtbp-small-input"'
														));
														?>
													<?php 
														HtmlWtbp::selectbox('settings[width][width_unit]', array(
														'options' => array('pixels' => 'px', 'percents' => '%'),
														'value' => ( isset($settings['width']['width_unit']) ? $settings['width']['width_unit'] : 'percents' ),
														'attrs' => 'class="woobewoo-flat-input wtbp-small-input"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Thumbnail size', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Select the image size to display in the frontend', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/thumbnail_size.png') . '" height="86"></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php
													$sizesArr = getImageSizes();
													$sizes = array();
													foreach ($sizesArr as $key=>$size) {
														$sizes[$key] = ( isset($size['name']) ? $size['name'] : $key ) . ( isset($size['width']) ? ' ' . $size['width'] . ' x ' . $size['height'] : '' );
													}
													HtmlWtbp::selectbox('settings[thumbnail_size]', array(
														'options' => $sizes,
														'value' => ( isset($settings['thumbnail_size']) ? $settings['thumbnail_size'] : 'thumbnail' ),
													));
													?>
												</div>
											</div>
											<?php $classHidden = $this->getTableSetting($settings, 'thumbnail_size', '') != 'set_size' ? 'wtbpHidden' : ''; ?>
											<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[thumbnail_size]" data-main-value="set_size">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Custom image size', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Set width and height values in pixels (in that order).', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input textright">
													<?php 
													HtmlWtbp::text('settings[thumbnail_width]', array(
														'value' => ( isset($settings['thumbnail_width']) ? $settings['thumbnail_width'] : '' ),
														'attrs' => 'class="woobewoo-width60"'
														));
													echo ' x ';
													HtmlWtbp::text('settings[thumbnail_height]', array(
														'value' => ( isset($settings['thumbnail_height']) ? $settings['thumbnail_height'] : '' ),
														'attrs' => 'class="woobewoo-width60"'
													));
													?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Mobile screen width', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Select screen width to hide columns.  You can set which columns should be hidden on the Content tab in the column options.', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/hide_on_small_screens.png') . '" height="86"></div>'); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[mobile_width]', array(
														'options' => array('320' => '320 px', '480' => '480 px', '600' => '600 px', '768' => '768 px', '1024' => '1024 px', '1170' => '1170 px'),
														'value' => ( isset($settings['mobile_width']) ? $settings['mobile_width'] : '768' ),
														'attrs' => ' class="woobewoo-flat-input"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php 
														esc_html_e('Responsive Mode', 'woo-product-tables'); 
														$tooltip = __('Standard Responsive mode - in this mode if table content doesn\'t fit all columns become under each other with one cell per row.', 'woo-product-tables') . '<br><br>' . 
															__('Automatic column hiding - in this mode table columns will collapse from right to left if content does not fit to parent container width.', 'woo-product-tables') . '<br><br>' . 
															__('Horizontal scroll - in this mode scroll bar will be added if table overflows parent container width.', 'woo-product-tables') . '<br><br>' .
															__('Disable Responsivity - default table fluid layout.<a href="https://woobewoo.com/feature/fully-responsive" target="_blank">Read more.</a>', 'woo-product-tables'); 
														?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php	echo esc_attr($tooltip); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[responsive_mode]', array(
														'options' => array('responsive' => 'Responsive mode', 'hiding' => 'Automatic column hiding', 'horizontal' => 'Horizontal scroll', 'disable' => 'Disable Responsivity'),
														'value' => ( isset($settings['responsive_mode']) ? $settings['responsive_mode'] : 'horizontal' ),
														));
														?>
												</div>
											</div>
											<?php $classHidden = $this->getTableSetting($settings, 'responsive_mode', '') != 'horizontal' ? 'wtbpHidden' : ''; ?>
											
											<div class="setting-wrapper setting-wrapper-block setting-suboption <?php echo esc_attr($classHidden); ?>"
												data-main="settings[responsive_mode]" data-main-value="horizontal">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Horizontal scrollbar position', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Here you can set horizontal scrollbar position.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[horizontal_scroll]', array(
														'options' => array('footer' => 'Footer', 'header' => 'Header', 'two' => 'Header and Footer'),
														'value' => ( isset($settings['horizontal_scroll']) ? $settings['horizontal_scroll'] : 'footer' ),
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Force responsive mod', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Force enable responsive mod for automatic column hiding.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[responsive_column_hiding_force]', array(
														'checked' => ( isset($settings['responsive_column_hiding_force']) ? (int) $settings['responsive_column_hiding_force'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Row Striping', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Add automatic highlight for table odd rows', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[row_striping]', array(
														'checked' => ( isset($settings['row_striping']) ? (int) $settings['row_striping'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Highlighting by Mousehover', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Row highlighting by mouse hover.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[highlighting_mousehover]', array(
														'checked' => ( isset($settings['highlighting_mousehover']) ? (int) $settings['highlighting_mousehover'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Highlight Sorted Column', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('If checked - the current sorted column will be highlighted', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[highlighting_order_column]', array(
														'checked' => ( isset($settings['highlighting_order_column']) ? (int) $settings['highlighting_order_column'] : '' )
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Borders', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Cell - adds border around all four sides of each cell, Row - adds border only over and under each row. (i.e. only for the rows).', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::selectbox('settings[borders]', array(
														'options' => array('cell' => 'cell', 'rows' => 'rows', 'none' => 'none'),
														'value' => ( isset($settings['borders']) ? $settings['borders'] : 'cell' ),
														'attrs' => ' class="woobewoo-flat-input"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-inline">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Hide Table Loader', 'woo-product-tables'); ?>
														<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Enable / disable table loader icon before table will be completely loaded.', 'woo-product-tables')); ?>"></i>
													</label>
												</div>
												<div class="setting-check">
													<?php 
														HtmlWtbp::checkboxToggle('settings[hide_table_loader]', array(
														'checked' => ( isset($settings['hide_table_loader']) ? (int) $settings['hide_table_loader'] : '' )
														));
														?>
												</div>
											</div>
											<?php 
											if ($this->is_pro) {
												DispatcherWtbp::doAction('addEditAdminSettings', 'partEditAdminLoader', array('settings' => $this->settings));
											} else { 
												$classHidden = $this->getTableSetting($settings, 'hide_table_loader', false) ? 'wtbpHidden' : '';
												?>
												<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
													data-main-reverse="settings[hide_table_loader]">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Table Loader Icon', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr('<div class="wtbpTooltipsWrapper"><div class="wtbpTooltipsText">' . __('Choose icon for loader.', 'woo-product-tables') . '</div><img src="' . esc_url($this->getModule()->getModPath() . 'img/icon_loader.png') . '" height="248"></div>'); ?>"></i>
														</label>
													</div>
													<div class="setting-input">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/plugins/table-woocommerce-plugin/?utm_source=plugin&utm_medium=choose-icon-for-loader&utm_campaign=woo-product-table">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-wrapper setting-suboption <?php echo esc_attr($classHidden); ?>"
													data-main-reverse="settings[hide_table_loader]">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Table Loader Color', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Choose color for loader', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-input">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/plugins/table-woocommerce-plugin/?utm_source=plugin&utm_medium=choose-color-for-loader&utm_campaign=woo-product-table">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
											<?php } ?>

											<div class="setting-title">
												<?php esc_html_e('Table Styling', 'woo-product-tables'); ?>
											</div>
											<?php 
											if ($this->is_pro) {
												DispatcherWtbp::doAction('addEditAdminSettings', 'partEditAdminCustomStyles', array('settings' => $this->settings));
											} else {
												?>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Use custom table styles', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Choose your custom table styles below. Any settings you leave blank will default to your theme styles.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-input">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/documentation/appearance-settings/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
												<div class="setting-title">
													<?php esc_html_e('Buy Button Styling', 'woo-product-tables'); ?>
												</div>
												<div class="setting-wrapper setting-wrapper-inline">
													<div class="setting-label">
														<label>
															<?php esc_html_e('Use custom Buy Button styles', 'woo-product-tables'); ?>
															<i class="fa fa-question woobewoo-tooltip" title="<?php echo esc_attr(__('Choose your custom styles for button Add to cart. Any settings you leave blank will default.', 'woo-product-tables')); ?>"></i>
														</label>
													</div>
													<div class="setting-input">
														<span class="wtbpPro">
															<a target="_blank" class="woobewoo-pro-feature" href="https://woobewoo.com/documentation/appearance-settings/">
																<?php esc_html_e('PRO', 'woo-product-tables'); ?>
															</a>
														</span>
													</div>
												</div>
											<?php } ?>
										</section>
										<section class="row-settings-block" id="wtpb-tab-settings-text">
											<div class="settings-block-title">
												<i class="fa fa-fw fa-language"></i><?php esc_html_e('Language and Text', 'woo-product-tables'); ?>
											</div>
											<div class="setting-title">
												<?php esc_html_e('Overwrite Table Text', 'woo-product-tables'); ?>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Add selected to cart button text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[selected_to_cart]', array(
														'value' => ( isset($settings['selected_to_cart']) ? $settings['selected_to_cart'] : 'Add selected to cart' ),
														'attrs' => 'placeholder="Add selected to cart"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Add all to cart button text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[all_to_cart]', array(
														'value' => ( isset($settings['all_to_cart']) ? $settings['all_to_cart'] : 'Add all to cart' ),
														'attrs' => 'placeholder="Add all to cart"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Empty table', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[empty_table]', array(
														'value' => ( isset($settings['empty_table']) ? $settings['empty_table'] : '' ),
														'attrs' => 'placeholder="There\'re no products in the table"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Table info text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[table_info]', array(
														'value' => ( isset($settings['table_info']) ? $settings['table_info'] : '' ),
														'attrs' => 'placeholder="Showing _START_ to _END_ of _TOTAL_ entries"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Empty info text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[table_info_empty]', array(
														'value' => ( isset($settings['table_info_empty']) ? $settings['table_info_empty'] : '' ),
														'attrs' => 'placeholder="Showing 0 to 0 of 0 entries"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Filtered info text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[filtered_info_text]', array(
														'value' => ( isset($settings['filtered_info_text']) ? $settings['filtered_info_text'] : '' ),
														'attrs' => 'placeholder="(filtered from _MAX_ total entries)"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Length text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[length_text]', array(
														'value' => ( isset($settings['length_text']) ? $settings['length_text'] : '' ),
														'attrs' => 'placeholder="Show _MENU_ entries"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Search label', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[search_label]', array(
														'value' => ( isset($settings['search_label']) ? $settings['search_label'] : '' ),
														'attrs' => 'placeholder="Search:"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Processing text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[processing_text]', array(
														'value' => ( isset($settings['processing_text']) ? $settings['processing_text'] : '' ),
														'attrs' => 'placeholder="Processing..."'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Zero records', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[zero_records]', array(
														'value' => ( isset($settings['zero_records']) ? $settings['zero_records'] : '' ),
														'attrs' => 'placeholder="No matching records are found"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Previous page (Pagination)', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[lang_previous]', array(
														'value' => ( isset($settings['lang_previous']) ? $settings['lang_previous'] : '' ),
														'attrs' => 'placeholder="Previous"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Next page (Pagination)', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[lang_next]', array(
														'value' => ( isset($settings['lang_next']) ? $settings['lang_next'] : '' ),
														'attrs' => 'placeholder="Next"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Filter text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[filter_text]', array(
														'value' => ( isset($settings['filter_text']) ? $settings['filter_text'] : '' ),
														'attrs' => 'placeholder="Filter"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Reset text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[reset_text]', array(
														'value' => ( isset($settings['reset_text']) ? $settings['reset_text'] : '' ),
														'attrs' => 'placeholder="Reset"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Stock quantity items text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[stock_quantity_text]', array(
														'value' => ( isset($settings['stock_quantity_text']) ? $settings['stock_quantity_text'] : '' ),
														'attrs' => 'placeholder="items"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Select attributes text', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[select_attributes_text]', array(
														'value' => ( isset($settings['select_attributes_text']) ? $settings['select_attributes_text'] : '' ),
														'attrs' => 'placeholder="Select attributes before add the product to the cart"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Product added to cart button text (MPC)', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[product_added_to_cart]', array(
														'value' => ( isset($settings['product_added_to_cart']) ? $settings['product_added_to_cart'] : 'Product added to cart' ),
														'attrs' => 'placeholder="Product added to cart"'
														));
														?>
												</div>
											</div>
											<div class="setting-wrapper setting-wrapper-block">
												<div class="setting-label">
													<label>
														<?php esc_html_e('Product not added to cart button text (MPC)', 'woo-product-tables'); ?>
													</label>
												</div>
												<div class="setting-input">
													<?php 
														HtmlWtbp::text('settings[product_not_added_to_cart]', array(
														'value' => ( isset($settings['product_not_added_to_cart']) ? $settings['product_not_added_to_cart'] : 'Product not added to cart' ),
														'attrs' => 'placeholder="Product not added to cart"'
														));
														?>
												</div>
											</div>
										</section>
									</section>
								</div>
							</section>
							<section class="wtbp-preview-section">
								<div class="row preview-styling">
									<div class="wtbp-sub-tab woobewoo-input-group">
										<a href="#wtbp-style-desktop" class="button">
											<?php esc_html_e('Desktop', 'woo-product-tables'); ?>
										</a>
										<a href="#wtbp-style-tablet" class="button disabled">
											<?php esc_html_e('Tablet', 'woo-product-tables'); ?>
										</a>
										<a href="#wtbp-style-mobile" class="button disabled">
											<?php esc_html_e('Mobile', 'woo-product-tables'); ?>
										</a>
									</div>
								</div>
								<div id="preview-container">
									<style type="text/css" id="wtbp-preview-css"></style>
									<div id="loadingProgress" class="wtbpHidden wtbpAdminPreviewNotice">
										<p class="description">
											<i class="fa fa-fw fa-spin fa-circle-o-notch"></i>
											<?php esc_html_e('Loading your table, please wait...', 'woo-product-tables'); ?>
										</p>
									</div>
									<div id="wtbp-table-preview" class="wtbpTableWrapper" data-table-id="wtbpPreviewTable">
										<table id="wtbpPreviewTable" class="wtbpContentTable" data-table-id="<?php echo esc_attr($this->table['id']); ?>"></table>
										<div id="wtbpPreviewFilter"></div>
										<div class="wtbpCustomCssWrapper wtbpHidden"></div>
									</div>
									<div id="loadingEmpty" class="wtbpHidden wtbpAdminPreviewNotice">
										<p class="description">
											<i class="fa fa-fw fa-exclamation-circle"></i>
											<?php esc_html_e('Table is empty', 'woo-product-tables'); ?>
										</p>
									</div>
									<div id="loadingFinished" class="wtbpHidden wtbpAdminPreviewNotice">
										<p class="description">
											<i class="fa fa-fw fa-exclamation-circle"></i>
											<?php esc_html_e('Note that the table may look a little different depending on your theme style.', 'woo-product-tables'); ?>
										</p>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="row row-tab" id="row-tab-css">
						<div class="col-xs-12" >
							<div class="wtbpSettingsCss">
								<label><?php esc_html_e('Here you can add custom CSS for the current Table.', 'woo-product-tables'); ?></label>
								<div id="css-editor-container">
									<?php
										HtmlWtbp::textarea('settings[custom_css]',
										array('value' => ( isset($settings['custom_css']) ? base64_decode($settings['custom_css']) : '' )
										, 'attrs' => 'id="wtbpCssEditor"'));
										?>
								</div>
							</div>
						</div>
					</div>
					<div class="row row-tab" id="row-tab-js">
						<div class="col-xs-12" >
							<div class="wtbpSettingsCss">
								<label><?php esc_html_e('Here you can add custom JavaScript for the current Table.', 'woo-product-tables'); ?></label>
								<div id="css-editor-container">
									<?php
										HtmlWtbp::textarea('settings[custom_js]',
										array('value' => ( isset($settings['custom_js']) ? base64_decode($settings['custom_js']) : '' )
										, 'attrs' => 'id="wtbpJsEditor"'));
										?>
								</div>
							</div>
						</div>
					</div>
					<?php 
					HtmlWtbp::hidden( 'mod', array( 'value' => 'wootablepress' ) );
					HtmlWtbp::hidden( 'action', array( 'value' => 'save' ) );
					HtmlWtbp::hidden( 'id', array( 'value' => $this->table['id'] ) );
					?>
				</form>
				<div class="woobewoo-clear"></div>
			</div>
		</div>
	</section>
</div>
<?php

function getImageSizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
			);
		}
	}
	$sizes['full'] = array('name' => esc_html__('full size', 'woo-product-tables'));
	$sizes['set_size'] = array('name' => esc_html__('set size', 'woo-product-tables'));

	return $sizes;
}
