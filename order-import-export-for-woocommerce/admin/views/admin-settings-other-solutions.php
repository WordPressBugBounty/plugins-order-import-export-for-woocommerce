<?php
/**
 * "Other Solutions" admin tab — sidebar categories + card grid layout.
 *
 * Ported from wt-woocommerce-related-products' "You May Also Need" template.
 * Class prefix renamed wt-crp-os-* → wt-oiw-os-* to keep both plugins collision-free.
 *
 * @package Order_Import_Export_For_WooCommerce
 */

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals -- Template file; variables are template-scoped, not plugin globals.
defined( 'WPINC' ) || die;

$wt_oiw_img_base = esc_url( WT_O_IEW_PLUGIN_URL . 'assets/images/other_solutions' );

$wt_oiw_categories = array(
	'ecommerce-promotions' => array(
		'label'      => __( 'E-commerce Promotions', 'order-import-export-for-woocommerce' ),
		'subtitle'   => __( 'Create and run successful promotional campaigns with the best marketing tools for WooCommerce', 'order-import-export-for-woocommerce' ),
		'icon'       => 'sidebar-ecommerce-promotions.svg',
		'hero'       => null,
		'plugins'    => array(
			array(
				'type'     => 'standard',
				'name'     => __( 'Smart Coupons for WooCommerce', 'order-import-export-for-woocommerce' ),
				'icon'     => 'smart-coupons-plugin.png',
				'rating'   => '4.9',
				'features' => array(
					__( 'Advanced BOGO Coupons', 'order-import-export-for-woocommerce' ),
					__( 'Offer store credits', 'order-import-export-for-woocommerce' ),
					__( 'Create attractive gift cards', 'order-import-export-for-woocommerce' ),
					__( 'Give away product coupons', 'order-import-export-for-woocommerce' ),
					__( 'Coupons based on past purchases', 'order-import-export-for-woocommerce' ),
					__( 'Restrict coupons by country', 'order-import-export-for-woocommerce' ),
					__( 'Create and offer sign-up discount coupons', 'order-import-export-for-woocommerce' ),
					__( 'Cart abandonment coupons', 'order-import-export-for-woocommerce' ),
					__( 'Customizable countdown sales banner', 'order-import-export-for-woocommerce' ),
					__( 'Bulk generate coupons', 'order-import-export-for-woocommerce' ),
					__( 'Import and export coupons', 'order-import-export-for-woocommerce' ),
					__( 'Coupon embeds', 'order-import-export-for-woocommerce' ),
					__( 'Allow coupon combinations', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/smart-coupons-for-woocommerce/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=smart_coupons',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'URL Coupons for WooCommerce', 'order-import-export-for-woocommerce' ),
				'icon'     => 'url-coupons-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Generate custom coupon URLs', 'order-import-export-for-woocommerce' ),
					__( 'Set up a redirect page', 'order-import-export-for-woocommerce' ),
					__( 'Automatically add products', 'order-import-export-for-woocommerce' ),
					__( 'Create QR code coupons', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/url-coupons-for-woocommerce/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=URL_Coupons',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'WooCommerce Product Recommendations', 'order-import-export-for-woocommerce' ),
				'icon'     => 'product-recommendation-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Automatically generate suggestions based on order history', 'order-import-export-for-woocommerce' ),
					__( 'Display recommended products on the product pages', 'order-import-export-for-woocommerce' ),
					__( 'Quick setup page to add & edit recommendations', 'order-import-export-for-woocommerce' ),
					__( 'Multiple product recommendation layouts', 'order-import-export-for-woocommerce' ),
					__( 'Set up discounts on the recommended product bundle', 'order-import-export-for-woocommerce' ),
					__( 'Manually create a bought-together list', 'order-import-export-for-woocommerce' ),
					__( 'Use upsells, cross-sells, & related products as frequently bought products', 'order-import-export-for-woocommerce' ),
					__( 'Customize the title, button, and label texts', 'order-import-export-for-woocommerce' ),
					__( 'Customize the display of the recommended products', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/woocommerce-product-recommendations/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Product_Recommendations',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'WooCommerce Coupon Generator', 'order-import-export-for-woocommerce' ),
				'icon'     => 'coupon-generator-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Bulk generate WooCommerce coupons', 'order-import-export-for-woocommerce' ),
					__( 'Bulk export WooCommerce coupons to CSV', 'order-import-export-for-woocommerce' ),
					__( 'Add usage restrictions to coupons', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/woocommerce-coupon-generator/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Coupon_Generator',
			),
			array(
				'type'        => 'standard-with-image',
				'name'        => __( 'WooCommerce Gift Cards', 'order-import-export-for-woocommerce' ),
				'icon'        => 'gift-card-plugin.png',
				'rating'      => 'stars',
				'features'    => array(
					__( 'Create unlimited gift cards', 'order-import-export-for-woocommerce' ),
					__( 'Email gift cards to customers', 'order-import-export-for-woocommerce' ),
					__( 'Provide refunds to store credit', 'order-import-export-for-woocommerce' ),
					__( '20+ predefined gift card templates', 'order-import-export-for-woocommerce' ),
					__( 'Category wise template listing', 'order-import-export-for-woocommerce' ),
					__( 'Add custom templates for gift cards', 'order-import-export-for-woocommerce' ),
					__( 'Generate gift cards based on order status', 'order-import-export-for-woocommerce' ),
					__( 'Manage user credit balance', 'order-import-export-for-woocommerce' ),
					__( 'Fixed and custom gift card amounts', 'order-import-export-for-woocommerce' ),
					__( 'Add usage restrictions for gift cards', 'order-import-export-for-woocommerce' ),
				),
				'url'         => 'https://www.webtoffee.com/product/woocommerce-gift-cards/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=WooCommerce_Gift_Cards',
				'image_src'   => 'woocommerce-giftcard-hero.svg',
				'card_class'  => 'wt-oiw-os-card--gift-cards',
				'plugin_file' => 'wt-woocommerce-gift-cards/wt-woocommerce-gift-cards.php',
			),
		),
		'standalone' => array(
			'name'        => __( 'ECommerce Marketing Automation App', 'order-import-export-for-woocommerce' ),
			'icon'        => 'ema-app-plugin.png',
			'desc'        => __( 'Create signup forms, popups, and automated email campaigns with pre-built workflow templates to capture leads, recover abandoned carts, and grow sales.', 'order-import-export-for-woocommerce' ),
			'screenshot'  => 'ema-screenshot.svg',
			'url'         => 'https://www.webtoffee.com/product/ecommerce-marketing-automation/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=EMA',
			'plugin_file' => 'ecommerce-marketing-automation/ecommerce-marketing-automation.php',
		),
		'bundle'     => array(
			'tag_emoji'    => '📣',
			'tag_color'    => 'yellow',
			'tag'          => __( 'Promotion Bundle', 'order-import-export-for-woocommerce' ),
			'title'        => __( 'WooCommerce Promotion Bundle', 'order-import-export-for-woocommerce' ),
			'url'          => 'https://www.webtoffee.com/woocommerce-promotions/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Promotion_Bundle',
			'desc'         => __( 'Make powerful promotional campaigns with our WooCommerce promotion bundle. Create coupon promotions, set up gift cards, and implement popular product recommendation strategies.', 'order-import-export-for-woocommerce' ),
			'pills'        => array(
				__( 'Smart Coupons', 'order-import-export-for-woocommerce' ),
				__( 'Product recommendation', 'order-import-export-for-woocommerce' ),
				__( 'Gift cards', 'order-import-export-for-woocommerce' ),
			),
			'price_orig'   => '$277',
			'price_sale'   => '$194',
			'savings'      => __( 'Save up to 30% off', 'order-import-export-for-woocommerce' ),
			'illustration' => 'woocommerce-promotion-bundle-hero.svg',
		),
	),
	'privacy-compliance'   => array(
		'label'      => __( 'Privacy Compliance', 'order-import-export-for-woocommerce' ),
		'subtitle'   => __( 'Ensure compliance with major cookie laws, including, GDPR, CCPA, LGPD, CNIL, and more', 'order-import-export-for-woocommerce' ),
		'icon'       => 'sidebar-privacy-compliance.svg',
		'hero'       => array(
			'name'        => __( 'GDPR Cookie Consent Plugin (CCPA Ready)', 'order-import-export-for-woocommerce' ),
			'icon'        => 'gdpr-plugin.png',
			'rating'      => 'stars',
			'image'       => 'cookie-consent.svg',
			'desc'        => __( 'This Google-certified CMP lets you create a customizable cookie banner, manage user consent, and ensure global privacy compliance with automatic script blocking.', 'order-import-export-for-woocommerce' ),
			'features'    => array(),
			'url'         => 'https://www.webtoffee.com/product/gdpr-cookie-consent/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=GDPR',
			'plugin_file' => 'webtoffee-cookie-consent/webtoffee-cookie-consent.php',
		),
		'plugins'    => array(
			array(
				'type'        => 'standard-with-image',
				'name'        => __( 'EU Order Withdrawal Button Plugin for WooCommerce', 'order-import-export-for-woocommerce' ),
				'icon'        => 'eu-withdrawal-plugin-icon.svg',
				'rating'      => 'stars',
				'features'    => array(
					__( 'Add "Request Withdrawal" button to WooCommerce', 'order-import-export-for-woocommerce' ),
					__( 'Supports guest withdrawal option', 'order-import-export-for-woocommerce' ),
					__( 'Two-step confirmation to prevent errors', 'order-import-export-for-woocommerce' ),
					__( 'Full or partial order withdrawal support', 'order-import-export-for-woocommerce' ),
					__( 'Dedicated admin dashboard for all requests', 'order-import-export-for-woocommerce' ),
					__( 'Send email confirmation to customers', 'order-import-export-for-woocommerce' ),
				),
				'url'         => 'https://www.webtoffee.com/product/eu-withdrawal-button/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=EU_Withdarawal_Button',
				'image_src'   => 'eu-withdrawal-hero.svg',
				'card_class'  => 'wt-oiw-os-card--full-width',
				'plugin_file' => 'wt-eu-withdrawal-button/wt-eu-withdrawal-button.php',
			),
		),
		'standalone' => null,
		'bundle'     => null,
	),
	'data-import-export'   => array(
		'label'      => __( 'Data Import & Export', 'order-import-export-for-woocommerce' ),
		'subtitle'   => __( 'The best-in-class import, export, and migration solutions for your WooCommerce data', 'order-import-export-for-woocommerce' ),
		'icon'       => 'sidebar-data-import-export.svg',
		'hero'       => null,

		// Order, Coupon, Subscription Export Import is intentionally omitted here — this is
		// the free version of that product; we don't cross-sell ourselves on our own page.
		'plugins'    => array(
			array(
				'type'        => 'standard',
				'name'        => __( 'Product Import Export Plugin', 'order-import-export-for-woocommerce' ),
				'icon'        => 'product-ie-plugin.png',
				'rating'      => '4.9',
				'features'    => array(
					__( 'Supports Excel, XML, CSV, and TSV file formats', 'order-import-export-for-woocommerce' ),
					__( 'Schedule automated import and export', 'order-import-export-for-woocommerce' ),
					__( 'Support for multiple product types', 'order-import-export-for-woocommerce' ),
					__( 'Export product images in a separate zip file', 'order-import-export-for-woocommerce' ),
					__( 'Import from URL, Google Sheets, FTP/SFTP', 'order-import-export-for-woocommerce' ),
					__( 'Export to FTP/SFTP', 'order-import-export-for-woocommerce' ),
					__( 'Advanced filters and customizations for import and export', 'order-import-export-for-woocommerce' ),
					__( 'Add and update data while importing', 'order-import-export-for-woocommerce' ),
					__( 'Maintains action history and debug logs', 'order-import-export-for-woocommerce' ),
					__( 'Compatible with major 3rd-party plugins', 'order-import-export-for-woocommerce' ),
				),
				'url'         => 'https://www.webtoffee.com/product/product-import-export-woocommerce/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Product_Import_Export',
				'plugin_file' => 'product-import-export-for-woo/product-import-export-for-woo.php',
			),
			array(
				'type'        => 'standard',
				'name'        => __( 'User Import Export Plugin', 'order-import-export-for-woocommerce' ),
				'icon'        => 'user-ie-plugin.png',
				'rating'      => '5.0',
				'features'    => array(
					__( 'Supports Excel, XML, CSV, and TSV file formats', 'order-import-export-for-woocommerce' ),
					__( 'Schedule automated import and export', 'order-import-export-for-woocommerce' ),
					__( 'Customize and send emails to new users on import', 'order-import-export-for-woocommerce' ),
					__( 'Retain user passwords on import/export', 'order-import-export-for-woocommerce' ),
					__( 'Export and import custom fields and third-party plugin fields', 'order-import-export-for-woocommerce' ),
					__( 'Filter by user role, email, date, etc', 'order-import-export-for-woocommerce' ),
					__( 'Import from URL, Google Sheets, FTP/SFTP', 'order-import-export-for-woocommerce' ),
					__( 'Export to FTP/SFTP', 'order-import-export-for-woocommerce' ),
					__( 'Advanced filters and customizations for import & export', 'order-import-export-for-woocommerce' ),
					__( 'Add & update data while importing', 'order-import-export-for-woocommerce' ),
					__( 'Maintains action history and debug logs', 'order-import-export-for-woocommerce' ),
					__( 'Compatible with major 3rd-party plugins', 'order-import-export-for-woocommerce' ),
				),
				'url'         => 'https://www.webtoffee.com/product/wordpress-users-woocommerce-customers-import-export/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=User_Import_Export',
				'plugin_file' => 'users-customers-import-export-for-wp-woocommerce/users-customers-import-export-for-wp-woocommerce.php',
			),
			array(
				'type'        => 'standard',
				'name'        => __( 'Product Feed & Sync Manager for WooCommerce', 'order-import-export-for-woocommerce' ),
				'icon'        => 'product-feed-sync.png',
				'rating'      => '4.9',
				'features'    => array(
					__( 'Generate optimized product feeds for 20+ sales channels', 'order-import-export-for-woocommerce' ),
					__( 'Map WooCommerce product details and categories', 'order-import-export-for-woocommerce' ),
					__( 'Create feeds for all Google shopping platforms', 'order-import-export-for-woocommerce' ),
					__( 'Sync WooCommerce products with Facebook Catalog', 'order-import-export-for-woocommerce' ),
					__( 'Tailor your product feed with filters', 'order-import-export-for-woocommerce' ),
					__( 'Track and manage feed updates', 'order-import-export-for-woocommerce' ),
					__( 'Keep your product feeds up-to-date', 'order-import-export-for-woocommerce' ),
				),
				'url'         => 'https://www.webtoffee.com/product/woocommerce-product-feed/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=WooCommerce_Product_Feed',
				'plugin_file' => 'webtoffee-product-feed/webtoffee-product-feed.php',
			),
			array(
				'type'       => 'standard-with-image',
				'name'       => __( 'Import Export Suite for WooCommerce', 'order-import-export-for-woocommerce' ),
				'icon'       => 'ie-suite-plugin.png',
				'rating'     => 'stars',
				'features'   => array(
					__( 'Import/export Products, Orders, Subscriptions, Coupons, Customers, WordPress Users, Categories & Tags, Reviews', 'order-import-export-for-woocommerce' ),
					__( 'Supports Excel, XML, CSV, and TSV file formats', 'order-import-export-for-woocommerce' ),
					__( 'Schedule automated import & export', 'order-import-export-for-woocommerce' ),
					__( 'Import from URL, Google Sheets, FTP/SFTP', 'order-import-export-for-woocommerce' ),
					__( 'Export to FTP/SFTP', 'order-import-export-for-woocommerce' ),
					__( 'Import & export custom fields and values', 'order-import-export-for-woocommerce' ),
					__( 'Advanced filters and customizations for import & export', 'order-import-export-for-woocommerce' ),
					__( 'Add and update data while importing', 'order-import-export-for-woocommerce' ),
					__( 'Maintains action history and debug logs', 'order-import-export-for-woocommerce' ),
					__( 'Compatible with major 3rd-party plugins', 'order-import-export-for-woocommerce' ),
				),
				'url'        => 'https://www.webtoffee.com/product/woocommerce-import-export-suite/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Import_Export_Suite',
				'image_src'  => 'data-io-illustration.svg',
				'card_class' => 'wt-oiw-os-card--ie-suite',
			),
		),
		'standalone' => null,
		'bundle'     => null,
	),
	'accounting-invoicing' => array(
		'label'      => __( 'Accounting & Invoicing', 'order-import-export-for-woocommerce' ),
		'subtitle'   => __( 'Automatically generate professional WooCommerce invoices and documents for all your orders', 'order-import-export-for-woocommerce' ),
		'icon'       => 'sidebar-accounting-invoicing.svg',
		'hero'       => array(
			'name'        => __( 'PDF Invoices, Packing Slips, & Credit Notes', 'order-import-export-for-woocommerce' ),
			'icon'        => 'pdf-invoices-plugin.png',
			'rating'      => 'stars',
			'pdf_cluster' => true,
			'desc'        => __( 'Automatically generate, customize, and manage professional WooCommerce PDF invoices, packing slips, and credit notes with advanced automation and tax compliance features.', 'order-import-export-for-woocommerce' ),
			'features'    => array(),
			'url'         => 'https://www.webtoffee.com/product/woocommerce-pdf-invoices-packing-slips/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=PDF_invoice',
		),
		'plugins'    => array(
			array(
				'type'     => 'standard',
				'name'     => __( 'Shipping Labels, Dispatch Labels, & Delivery Notes', 'order-import-export-for-woocommerce' ),
				'icon'     => 'shipping-labels-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Create delivery notes, shipping & dispatch labels', 'order-import-export-for-woocommerce' ),
					__( 'Enable customers to print the documents from order emails', 'order-import-export-for-woocommerce' ),
					__( 'Customize shipping label size', 'order-import-export-for-woocommerce' ),
					__( 'Add multiple shipping labels on one page', 'order-import-export-for-woocommerce' ),
					__( 'Show product variation data', 'order-import-export-for-woocommerce' ),
					__( 'Add extra product & order data fields', 'order-import-export-for-woocommerce' ),
					__( 'Pre-built layouts & customizable templates', 'order-import-export-for-woocommerce' ),
					__( 'Group products by \'Category\'', 'order-import-export-for-woocommerce' ),
					__( 'Sort products based on Name or SKU', 'order-import-export-for-woocommerce' ),
					__( 'Multilingual support', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/woocommerce-shipping-labels-delivery-notes/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Shipping_Label',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'WooCommerce Picklists plugin', 'order-import-export-for-woocommerce' ),
				'icon'     => 'picklists-plugin.png',
				'rating'   => '4.0',
				'features' => array(
					__( 'Bulk print picklists from the admin order page', 'order-import-export-for-woocommerce' ),
					__( 'Automatically email picklists based on order status', 'order-import-export-for-woocommerce' ),
					__( 'Create or customize picklist templates', 'order-import-export-for-woocommerce' ),
					__( 'Show product variation data', 'order-import-export-for-woocommerce' ),
					__( 'Group products in picklist by order/category', 'order-import-export-for-woocommerce' ),
					__( 'Add product meta fields & attributes', 'order-import-export-for-woocommerce' ),
					__( 'Exclude virtual products from picklists', 'order-import-export-for-woocommerce' ),
					__( 'Multilingual support', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/woocommerce-picklist/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Picklist',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'Customizer for WooCommerce PDF Invoices', 'order-import-export-for-woocommerce' ),
				'icon'     => 'pdf-customizer-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Drag-and-drop easy customization', 'order-import-export-for-woocommerce' ),
					__( 'Advanced visual and code editor', 'order-import-export-for-woocommerce' ),
					__( 'Easy invoice layout customization', 'order-import-export-for-woocommerce' ),
					__( 'Customize individual elements using block editors', 'order-import-export-for-woocommerce' ),
					__( 'View live preview of customization', 'order-import-export-for-woocommerce' ),
					__( 'Change color, text, background, border & more', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/customizer-for-woocommerce-pdf-invoice/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=PDF_Customizer',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'WooCommerce Address Labels plugin', 'order-import-export-for-woocommerce' ),
				'icon'     => 'address-labels-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Generate \'Shipping Address\', \'Billing Address\', \'From Address\', and \'Return Address\' labels', 'order-import-export-for-woocommerce' ),
					__( 'Customize label sizes', 'order-import-export-for-woocommerce' ),
					__( 'Bulk print address labels', 'order-import-export-for-woocommerce' ),
					__( 'Offers built-in label templates', 'order-import-export-for-woocommerce' ),
					__( 'Change address label layout', 'order-import-export-for-woocommerce' ),
					__( 'Multilingual support', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/woocommerce-address-label/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Address_Label',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'Proforma Invoice', 'order-import-export-for-woocommerce' ),
				'icon'     => 'proforma-invoice-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Create proforma invoices automatically', 'order-import-export-for-woocommerce' ),
					__( 'Pre-built proforma invoice layouts', 'order-import-export-for-woocommerce' ),
					__( 'Easy invoice layout customization', 'order-import-export-for-woocommerce' ),
					__( 'Attach proforma invoice PDF to order emails', 'order-import-export-for-woocommerce' ),
					__( 'Allow customers to print invoices', 'order-import-export-for-woocommerce' ),
					__( 'Set custom proforma invoice number', 'order-import-export-for-woocommerce' ),
					__( 'Add additional product & order data fields', 'order-import-export-for-woocommerce' ),
					__( 'Attach special notes with proforma invoices', 'order-import-export-for-woocommerce' ),
					__( 'Attach transport & sales terms', 'order-import-export-for-woocommerce' ),
					__( 'Multilingual support', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/woocommerce-proforma-invoice/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Proforma_Invoice',
			),
			array(
				'type'     => 'standard',
				'name'     => __( 'QR Code Add-on for WooCommerce PDF Invoices', 'order-import-export-for-woocommerce' ),
				'icon'     => 'qr-code-plugin.png',
				'rating'   => '5.0',
				'features' => array(
					__( 'Assign QR codes to all generated invoices', 'order-import-export-for-woocommerce' ),
					__( 'Create QR code that reads order or invoice number', 'order-import-export-for-woocommerce' ),
					__( 'Add custom data to invoices', 'order-import-export-for-woocommerce' ),
					__( 'Compatible with WooCommerce PDF Invoice, Packing Slip & Credit Note (Premium)', 'order-import-export-for-woocommerce' ),
					__( 'Compatible with WooCommerce PDF Invoices, Packing Slips, Delivery Notes, and Shipping Labels (Free)', 'order-import-export-for-woocommerce' ),
				),
				'url'      => 'https://www.webtoffee.com/product/qr-code-addon-for-woocommerce-pdf-invoices/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=QR_Code',
			),
			array(
				'type'        => 'standard',
				'name'        => __( 'WooCommerce Request a Quote', 'order-import-export-for-woocommerce' ),
				'icon'        => 'request-quote-plugin.png',
				'rating'      => '5.0',
				'features'    => array(
					__( 'Add quote button to the product & shop pages', 'order-import-export-for-woocommerce' ),
					__( 'Enable quotation request for selected products', 'order-import-export-for-woocommerce' ),
					__( 'Automatically send quotes to users', 'order-import-export-for-woocommerce' ),
					__( 'Disable guest users from asking for quote', 'order-import-export-for-woocommerce' ),
					__( 'Hide prices and \'add to cart\' button', 'order-import-export-for-woocommerce' ),
					__( 'Automatic email alerts for admin & users', 'order-import-export-for-woocommerce' ),
					__( 'Easy button and form customization', 'order-import-export-for-woocommerce' ),
					__( 'Set quote expiry period', 'order-import-export-for-woocommerce' ),
					__( 'Limit spams with reCAPTCHA', 'order-import-export-for-woocommerce' ),
				),
				'url'         => 'https://www.webtoffee.com/product/woocommerce-request-a-quote/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Request_Quote',
				'plugin_file' => 'wt-woo-request-quote/wt-woo-request-quote.php',
			),
			array(
				'type'       => 'standard-with-image',
				'name'       => __( 'Sequential Order Numbers', 'order-import-export-for-woocommerce' ),
				'icon'       => 'sequential-orders-plugin.png',
				'rating'     => 'stars',
				'features'   => array(
					__( 'Auto reset sequence per month/year etc', 'order-import-export-for-woocommerce' ),
					__( 'Add a custom suffix for order numbers', 'order-import-export-for-woocommerce' ),
					__( 'Date suffix in order numbers', 'order-import-export-for-woocommerce' ),
					__( 'Custom sequence for free orders', 'order-import-export-for-woocommerce' ),
					__( 'Increment sequence in custom series', 'order-import-export-for-woocommerce' ),
					__( 'More order number templates', 'order-import-export-for-woocommerce' ),
				),
				'url'        => 'https://www.webtoffee.com/product/woocommerce-sequential-order-numbers/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Sequential_Order_Numbers',
				'image_src'  => 'seq-orders-illustration.png',
				'card_class' => 'wt-oiw-os-card--seq-orders',
			),
		),
		'standalone' => null,
		'bundle'     => array(
			'tag_emoji'    => '📄',
			'tag_color'    => 'green',
			'tag'          => __( 'Invoice Bundle', 'order-import-export-for-woocommerce' ),
			'title'        => __( 'All in one Invoice bundle', 'order-import-export-for-woocommerce' ),
			'url'          => 'https://www.webtoffee.com/pdf-invoices-packing-slips-suite-woocommerce/?utm_source=other_solution_page&utm_medium=free_plugin_order_import_export&utm_campaign=Invoice_bundle',
			'desc'         => __( 'A complete suite of invoices and shipping documents bundle to create and print PDF invoices, packing slips, shipping and delivery documents in WooCommerce.', 'order-import-export-for-woocommerce' ),
			'pills'        => array(
				__( 'Invoice', 'order-import-export-for-woocommerce' ),
				__( 'Packing Slip', 'order-import-export-for-woocommerce' ),
				__( 'Address Labels', 'order-import-export-for-woocommerce' ),
				__( 'Dispatch Labels', 'order-import-export-for-woocommerce' ),
				__( 'Shipping Labels', 'order-import-export-for-woocommerce' ),
				__( 'Delivery Notes', 'order-import-export-for-woocommerce' ),
				__( 'Picklists', 'order-import-export-for-woocommerce' ),
				__( 'Proforma Invoice', 'order-import-export-for-woocommerce' ),
			),
			'price_orig'   => '$279',
			'price_sale'   => '$179',
			'savings'      => __( 'Save up to 30% off', 'order-import-export-for-woocommerce' ),
			'illustration' => 'invoice-bundle.png',
		),
	),
);

/*
 * This is the Product Feed plugin — Data Import & Export is the most relevant
 * category for our audience, so it leads the sidebar. Any category listed here
 * but missing from the array is silently skipped; any category present in the
 * array but not listed here is appended at the end.
 */
$wt_oiw_category_order = array(
	'data-import-export',
	'ecommerce-promotions',
	'privacy-compliance',
	'accounting-invoicing',
);
$wt_oiw_categories     = array_replace( array_fill_keys( $wt_oiw_category_order, null ), $wt_oiw_categories );
$wt_oiw_categories     = array_filter(
	$wt_oiw_categories,
	static function ( $wt_oiw_c ) {
		return null !== $wt_oiw_c;
	}
);

/*
 * Hide categories whose entire content is empty — i.e. no hero, no bundle, no
 * visible standalone (either missing or its plugin is active), and every plugin
 * card in the grid has its plugin_file set AND that plugin is active. Both the
 * sidebar link AND the panel body are skipped for such categories.
 */
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$wt_oiw_categories = array_filter(
	$wt_oiw_categories,
	static function ( $wt_oiw_c ) {
		if ( ! empty( $wt_oiw_c['hero'] ) ) {
			$wt_oiw_hf = isset( $wt_oiw_c['hero']['plugin_file'] ) ? $wt_oiw_c['hero']['plugin_file'] : '';
			if ( '' === $wt_oiw_hf || ! is_plugin_active( $wt_oiw_hf ) ) {
				return true;
			}
		}
		if ( ! empty( $wt_oiw_c['bundle'] ) ) {
			return true;
		}
		if ( ! empty( $wt_oiw_c['standalone'] ) ) {
			$wt_oiw_sf = isset( $wt_oiw_c['standalone']['plugin_file'] ) ? $wt_oiw_c['standalone']['plugin_file'] : '';
			if ( '' === $wt_oiw_sf || ! is_plugin_active( $wt_oiw_sf ) ) {
				return true;
			}
		}
		if ( ! empty( $wt_oiw_c['plugins'] ) ) {
			foreach ( $wt_oiw_c['plugins'] as $wt_oiw_p ) {
				if ( empty( $wt_oiw_p['plugin_file'] ) || ! is_plugin_active( $wt_oiw_p['plugin_file'] ) ) {
					return true;
				}
			}
		}
		return false;
	}
);
?>
<?php if ( empty( $wt_oiw_categories ) ) : ?>
	<div class="wt-iew-tab-content" data-id="<?php echo esc_attr( $target_id ); ?>">
		<div class="wt-oiw-os-page">
			<div class="wt-oiw-os-header">
				<h1 class="wt-oiw-os-page-title"><?php esc_html_e( 'You\'re all set!', 'order-import-export-for-woocommerce' ); ?></h1>
				<p class="wt-oiw-os-page-subtitle"><?php esc_html_e( 'All recommended plugins are already active on your store.', 'order-import-export-for-woocommerce' ); ?></p>
			</div>
		</div>
	</div>
	<?php return; ?>
<?php endif; ?>
<?php
$wt_oiw_first_category = array_key_first( $wt_oiw_categories );
$wt_oiw_first_cat      = $wt_oiw_categories[ $wt_oiw_first_category ];
?>
<div class="wt-iew-tab-content" data-id="<?php echo esc_attr( $target_id ); ?>">
	<div class="wt-oiw-os-page">

		<div class="wt-oiw-os-header">
			<h1 class="wt-oiw-os-page-title" id="wt-oiw-os-cat-title"><?php echo esc_html( $wt_oiw_first_cat['label'] ); ?></h1>
			<p class="wt-oiw-os-page-subtitle" id="wt-oiw-os-cat-subtitle"><?php echo esc_html( $wt_oiw_first_cat['subtitle'] ); ?></p>
		</div>

		<div class="wt-oiw-os-layout">

			<?php /* ---- Sidebar ---- */ ?>
			<div class="wt-oiw-os-sidebar">
				<ul class="wt-oiw-os-sidebar-nav">
					<?php foreach ( $wt_oiw_categories as $wt_oiw_cat_id => $wt_oiw_cat ) : ?>
						<li>
							<a href="#"
								class="wt-oiw-os-cat-link<?php echo ( $wt_oiw_cat_id === $wt_oiw_first_category ) ? ' active' : ''; ?>"
								data-category="<?php echo esc_attr( $wt_oiw_cat_id ); ?>">
								<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
								<img class="wt-oiw-os-cat-icon"
									src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_cat['icon'] ); ?>"
									alt="<?php echo esc_attr( $wt_oiw_cat['label'] ); ?>">
								<?php echo esc_html( $wt_oiw_cat['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="wt-oiw-os-trust-badges">
					<div class="wt-oiw-os-trust-badge">
						<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
						<img src="<?php echo esc_url( $wt_oiw_img_base . '/thirty-day-guarantee.png' ); ?>"
							alt="<?php esc_attr_e( '30 Day Money Back Guarantee', 'order-import-export-for-woocommerce' ); ?>">
						<span><?php esc_html_e( '30 Day No Risk Money Back Guarantee', 'order-import-export-for-woocommerce' ); ?></span>
					</div>
					<div class="wt-oiw-os-trust-badge">
						<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
						<img src="<?php echo esc_url( $wt_oiw_img_base . '/satisfaction-badge.png' ); ?>"
							alt="<?php esc_attr_e( '99% Satisfaction Rating', 'order-import-export-for-woocommerce' ); ?>">
						<span><?php esc_html_e( 'Fast Support with 99% Satisfaction Rating', 'order-import-export-for-woocommerce' ); ?></span>
					</div>
				</div>
			</div>

			<?php /* ---- Main content ---- */ ?>
			<div class="wt-oiw-os-main">

				<?php foreach ( $wt_oiw_categories as $wt_oiw_cat_id => $wt_oiw_cat ) : ?>
					<div id="wt-oiw-os-panel-<?php echo esc_attr( $wt_oiw_cat_id ); ?>"
						class="wt-oiw-os-category-panel<?php echo ( $wt_oiw_cat_id === $wt_oiw_first_category ) ? ' active' : ''; ?>"
						data-title="<?php echo esc_attr( $wt_oiw_cat['label'] ); ?>"
						data-subtitle="<?php echo esc_attr( $wt_oiw_cat['subtitle'] ); ?>">

						<?php /* -- Hero card -- */ ?>
						<?php
						if ( ! empty( $wt_oiw_cat['hero'] ) ) :
							$wt_oiw_hero              = $wt_oiw_cat['hero'];
							$wt_oiw_hero_plugin_file  = isset( $wt_oiw_hero['plugin_file'] ) ? $wt_oiw_hero['plugin_file'] : '';
							$wt_oiw_hero_is_active    = $wt_oiw_hero_plugin_file && is_plugin_active( $wt_oiw_hero_plugin_file );
							$wt_oiw_hero_is_installed = $wt_oiw_hero_plugin_file && file_exists( WP_PLUGIN_DIR . '/' . $wt_oiw_hero_plugin_file );

							if ( ! $wt_oiw_hero_is_active ) :
								?>
							<div class="wt-oiw-os-hero-card">
								<div class="wt-oiw-os-hero-left">
									<div class="wt-oiw-os-hero-title-row">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img class="wt-oiw-os-hero-icon"
											src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_hero['icon'] ); ?>"
											alt="<?php echo esc_attr( $wt_oiw_hero['name'] ); ?>">
										<div class="wt-oiw-os-hero-title-block">
											<h3 class="wt-oiw-os-hero-name"><?php echo esc_html( $wt_oiw_hero['name'] ); ?></h3>
											<div class="wt-oiw-os-hero-stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'order-import-export-for-woocommerce' ); ?>">
												<?php for ( $i = 0; $i < 5; $i++ ) : ?>
													<span class="wt-oiw-os-star">&#9733;</span>
												<?php endfor; ?>
											</div>
										</div>
									</div>
									<div class="wt-oiw-os-hero-divider"></div>
									<p class="wt-oiw-os-hero-desc"><?php echo esc_html( $wt_oiw_hero['desc'] ); ?></p>
									<?php if ( $wt_oiw_hero_is_installed && current_user_can( 'activate_plugins' ) ) : ?>
										<?php
										$wt_oiw_hero_activate_url = wp_nonce_url(
											self_admin_url( 'plugins.php?action=activate&plugin=' . rawurlencode( $wt_oiw_hero_plugin_file ) ),
											'activate-plugin_' . $wt_oiw_hero_plugin_file
										);
										?>
										<a href="<?php echo esc_url( $wt_oiw_hero_activate_url ); ?>"
											class="wt-oiw-os-btn-premium wt-oiw-os-btn-premium--block">
											<?php esc_html_e( 'Activate', 'order-import-export-for-woocommerce' ); ?>
										</a>
									<?php else : ?>
										<a href="<?php echo esc_url( $wt_oiw_hero['url'] ); ?>"
											target="_blank"
											rel="noopener noreferrer"
											class="wt-oiw-os-btn-premium wt-oiw-os-btn-premium--block">
											<span class="dashicons dashicons-star-filled"></span>
											<?php esc_html_e( 'Get premium', 'order-import-export-for-woocommerce' ); ?>
										</a>
									<?php endif; ?>
								</div>
								<?php if ( ! empty( $wt_oiw_hero['pdf_cluster'] ) ) : ?>
									<div class="wt-oiw-os-hero-right wt-oiw-os-hero-right--pdf-cluster">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img class="wt-oiw-os-pdf wt-oiw-os-pdf--left"
											src="<?php echo esc_url( $wt_oiw_img_base . '/pdf-invoice-left.svg' ); ?>"
											alt="">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img class="wt-oiw-os-pdf wt-oiw-os-pdf--center"
											src="<?php echo esc_url( $wt_oiw_img_base . '/pdf-invoice-center.svg' ); ?>"
											alt="">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img class="wt-oiw-os-pdf wt-oiw-os-pdf--right"
											src="<?php echo esc_url( $wt_oiw_img_base . '/pdf-invoice-right.svg' ); ?>"
											alt="">
									</div>
								<?php elseif ( ! empty( $wt_oiw_hero['image'] ) ) : ?>
									<div class="wt-oiw-os-hero-right">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_hero['image'] ); ?>"
											alt="<?php echo esc_attr( $wt_oiw_hero['name'] ); ?>">
									</div>
								<?php endif; ?>
							</div>
								<?php
							endif;
						endif;
						?>

						<?php /* -- Plugin card grid -- */ ?>
						<?php if ( ! empty( $wt_oiw_cat['plugins'] ) ) : ?>
							<?php
							// Filter out plugins that are already active — the card is only useful when the plugin is missing or inactive.
							// is_plugin_active() is guaranteed available here — required at the top of the file.
							$wt_oiw_visible_plugins = array_values(
								array_filter(
									$wt_oiw_cat['plugins'],
									static function ( $wt_oiw_p ) {
										if ( empty( $wt_oiw_p['plugin_file'] ) ) {
											return true;
										}
										return ! is_plugin_active( $wt_oiw_p['plugin_file'] );
									}
								)
							);
							$wt_oiw_chunks          = array_chunk( $wt_oiw_visible_plugins, 3 );
							foreach ( $wt_oiw_chunks as $wt_oiw_row ) :
								?>
								<div class="wt-oiw-os-card-grid">
									<?php foreach ( $wt_oiw_row as $wt_oiw_plugin ) : ?>

										<?php if ( 'image' === $wt_oiw_plugin['type'] ) : ?>

											<div class="wt-oiw-os-card-image">
												<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
												<img src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_plugin['src'] ); ?>"
													alt="">
											</div>

											<?php
										else :
											$wt_oiw_with_image = ( 'standard-with-image' === $wt_oiw_plugin['type'] && ! empty( $wt_oiw_plugin['image_src'] ) );
											$wt_oiw_card_class = 'wt-oiw-os-card';
											if ( $wt_oiw_with_image ) {
												$wt_oiw_card_class .= ' wt-oiw-os-card--with-image';
											}
											if ( ! empty( $wt_oiw_plugin['card_class'] ) ) {
												$wt_oiw_card_class .= ' ' . sanitize_html_class( $wt_oiw_plugin['card_class'] );
											}
											?>

											<div class="<?php echo esc_attr( $wt_oiw_card_class ); ?>">
												<div class="wt-oiw-os-card-body">
													<?php if ( $wt_oiw_with_image ) : ?>
														<div class="wt-oiw-os-card-header wt-oiw-os-card-header--stacked">
															<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
															<img class="wt-oiw-os-card-icon"
																src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_plugin['icon'] ); ?>"
																alt="<?php echo esc_attr( $wt_oiw_plugin['name'] ); ?>">
															<div class="wt-oiw-os-card-title-block">
																<span class="wt-oiw-os-card-name"><?php echo esc_html( $wt_oiw_plugin['name'] ); ?></span>
																<?php if ( 'stars' === $wt_oiw_plugin['rating'] ) : ?>
																	<span class="wt-oiw-os-card-rating wt-oiw-os-card-rating--stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'order-import-export-for-woocommerce' ); ?>">
																		<?php for ( $i = 0; $i < 5; $i++ ) : ?>
																			<span class="wt-oiw-os-star">&#9733;</span>
																		<?php endfor; ?>
																	</span>
																<?php else : ?>
																	<span class="wt-oiw-os-card-rating">
																		<?php echo esc_html( $wt_oiw_plugin['rating'] ); ?>
																		<span class="wt-oiw-os-star">&#9733;</span>
																	</span>
																<?php endif; ?>
															</div>
														</div>
													<?php else : ?>
														<div class="wt-oiw-os-card-header">
															<div class="wt-oiw-os-card-icon-name">
																<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
																<img class="wt-oiw-os-card-icon"
																	src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_plugin['icon'] ); ?>"
																	alt="<?php echo esc_attr( $wt_oiw_plugin['name'] ); ?>">
																<span class="wt-oiw-os-card-name"><?php echo esc_html( $wt_oiw_plugin['name'] ); ?></span>
															</div>
															<?php if ( 'stars' === $wt_oiw_plugin['rating'] ) : ?>
																<span class="wt-oiw-os-card-rating wt-oiw-os-card-rating--stars">
																	<span class="wt-oiw-os-star">&#9733;</span>
																	<span class="wt-oiw-os-star">&#9733;</span>
																	<span class="wt-oiw-os-star">&#9733;</span>
																	<span class="wt-oiw-os-star">&#9733;</span>
																	<span class="wt-oiw-os-star">&#9733;</span>
																</span>
															<?php else : ?>
																<span class="wt-oiw-os-card-rating">
																	<?php echo esc_html( $wt_oiw_plugin['rating'] ); ?>
																	<span class="wt-oiw-os-star">&#9733;</span>
																</span>
															<?php endif; ?>
														</div>
													<?php endif; ?>
													<ul class="wt-oiw-os-card-features<?php echo ( count( $wt_oiw_plugin['features'] ) > 3 ) ? ' wt-oiw-os-card-features--collapsible' : ''; ?>">
														<?php foreach ( $wt_oiw_plugin['features'] as $wt_oiw_feature ) : ?>
															<li>
																<span class="dashicons dashicons-yes-alt"></span>
																<?php echo esc_html( $wt_oiw_feature ); ?>
															</li>
														<?php endforeach; ?>
													</ul>
													<?php if ( count( $wt_oiw_plugin['features'] ) > 3 ) : ?>
														<div class="wt-oiw-os-show-more-less">
															<a href="#" class="wt-oiw-os-show-more"><?php esc_html_e( 'Show More', 'order-import-export-for-woocommerce' ); ?></a>
															<a href="#" class="wt-oiw-os-show-less"><?php esc_html_e( 'Show Less', 'order-import-export-for-woocommerce' ); ?></a>
														</div>
													<?php endif; ?>
													<?php
													$wt_oiw_plugin_file      = ! empty( $wt_oiw_plugin['plugin_file'] ) ? $wt_oiw_plugin['plugin_file'] : '';
													$wt_oiw_plugin_installed = $wt_oiw_plugin_file && file_exists( WP_PLUGIN_DIR . '/' . $wt_oiw_plugin_file );
													if ( $wt_oiw_plugin_installed && current_user_can( 'activate_plugins' ) ) :
														$wt_oiw_activate_url = wp_nonce_url(
															self_admin_url( 'plugins.php?action=activate&plugin=' . rawurlencode( $wt_oiw_plugin_file ) ),
															'activate-plugin_' . $wt_oiw_plugin_file
														);
														?>
														<a href="<?php echo esc_url( $wt_oiw_activate_url ); ?>"
															class="wt-oiw-os-btn-premium">
															<?php esc_html_e( 'Activate', 'order-import-export-for-woocommerce' ); ?>
														</a>
													<?php else : ?>
														<a href="<?php echo esc_url( $wt_oiw_plugin['url'] ); ?>"
															target="_blank"
															rel="noopener noreferrer"
															class="wt-oiw-os-btn-premium">
															<span class="dashicons dashicons-star-filled"></span>
															<?php esc_html_e( 'Get premium', 'order-import-export-for-woocommerce' ); ?>
														</a>
													<?php endif; ?>
												</div>
												<?php if ( $wt_oiw_with_image ) : ?>
													<div class="wt-oiw-os-card-image-side">
														<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
														<img src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_plugin['image_src'] ); ?>"
															alt="">
													</div>
												<?php endif; ?>
											</div>

										<?php endif; ?>

									<?php endforeach; ?>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php /* -- Bundle section (renders BEFORE the standalone, per Figma order) -- */ ?>
						<?php
						if ( ! empty( $wt_oiw_cat['bundle'] ) ) :
							$wt_oiw_bundle    = $wt_oiw_cat['bundle'];
							$wt_oiw_tag_color = ! empty( $wt_oiw_bundle['tag_color'] ) ? $wt_oiw_bundle['tag_color'] : 'green';
							?>
							<div class="wt-oiw-os-bundle">
								<div class="wt-oiw-os-bundle-content">
									<span class="wt-oiw-os-bundle-tag wt-oiw-os-bundle-tag--<?php echo esc_attr( $wt_oiw_tag_color ); ?>">
										<?php if ( ! empty( $wt_oiw_bundle['tag_emoji'] ) ) : ?>
											<span class="wt-oiw-os-bundle-tag-emoji"><?php echo esc_html( $wt_oiw_bundle['tag_emoji'] ); ?></span>
										<?php endif; ?>
										<?php echo esc_html( $wt_oiw_bundle['tag'] ); ?>
									</span>
									<div class="wt-oiw-os-bundle-title">
										<a href="<?php echo esc_url( $wt_oiw_bundle['url'] ); ?>"
											target="_blank"
											rel="noopener noreferrer">
											<?php echo esc_html( $wt_oiw_bundle['title'] ); ?>
										</a>
										<span class="dashicons dashicons-external"></span>
									</div>
									<p class="wt-oiw-os-bundle-desc"><?php echo esc_html( $wt_oiw_bundle['desc'] ); ?></p>
									<div class="wt-oiw-os-bundle-pills">
										<?php foreach ( $wt_oiw_bundle['pills'] as $wt_oiw_pill ) : ?>
											<span class="wt-oiw-os-bundle-pill">
												<span class="dashicons dashicons-yes-alt"></span>
												<?php echo esc_html( $wt_oiw_pill ); ?>
											</span>
										<?php endforeach; ?>
									</div>
									<p class="wt-oiw-os-bundle-pricing">
										<?php
										printf(
											wp_kses(
												/* translators: 1: strikethrough original price, 2: bold sale price, 3: green savings text */
												__( 'Total: <s>%1$s</s> <strong>%2$s</strong> <span class="wt-oiw-os-savings">(%3$s)</span>', 'order-import-export-for-woocommerce' ),
												array(
													's'    => array(),
													'strong' => array(),
													'span' => array( 'class' => array() ),
												)
											),
											esc_html( $wt_oiw_bundle['price_orig'] ),
											esc_html( $wt_oiw_bundle['price_sale'] ),
											esc_html( $wt_oiw_bundle['savings'] )
										);
										?>
									</p>
									<a href="<?php echo esc_url( $wt_oiw_bundle['url'] ); ?>"
										target="_blank"
										rel="noopener noreferrer"
										class="wt-oiw-os-btn-bundle">
										<?php esc_html_e( 'View Bundle', 'order-import-export-for-woocommerce' ); ?>
										<span class="dashicons dashicons-external"></span>
									</a>
								</div>
								<?php if ( ! empty( $wt_oiw_bundle['illustration'] ) ) : ?>
									<div class="wt-oiw-os-bundle-illustration">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_bundle['illustration'] ); ?>"
											alt="<?php echo esc_attr( $wt_oiw_bundle['title'] ); ?>">
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php /* -- Standalone card (e.g. EMA App) — renders AFTER the bundle, per Figma order -- */ ?>
						<?php
						if ( ! empty( $wt_oiw_cat['standalone'] ) ) :
							$wt_oiw_solo = $wt_oiw_cat['standalone'];

							/*
							 * Tri-state install/active check:
							 *   active         → hide banner
							 *   installed only → show "Activate" button (nonce-protected activate URL)
							 *   not installed  → show default "Try Now" button
							 *
							 * is_plugin_active() is guaranteed available here — required at the top of the file.
							 */
							$wt_oiw_solo_plugin_file  = isset( $wt_oiw_solo['plugin_file'] ) ? $wt_oiw_solo['plugin_file'] : '';
							$wt_oiw_solo_is_active    = $wt_oiw_solo_plugin_file && is_plugin_active( $wt_oiw_solo_plugin_file );
							$wt_oiw_solo_is_installed = $wt_oiw_solo_plugin_file && file_exists( WP_PLUGIN_DIR . '/' . $wt_oiw_solo_plugin_file );

							if ( ! $wt_oiw_solo_is_active ) :
								?>
							<div class="wt-oiw-os-standalone">
								<div class="wt-oiw-os-standalone-content">
									<div class="wt-oiw-os-standalone-header">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img class="wt-oiw-os-standalone-icon"
											src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_solo['icon'] ); ?>"
											alt="<?php echo esc_attr( $wt_oiw_solo['name'] ); ?>">
										<h3 class="wt-oiw-os-standalone-name"><?php echo esc_html( $wt_oiw_solo['name'] ); ?></h3>
									</div>
									<p class="wt-oiw-os-standalone-desc"><?php echo esc_html( $wt_oiw_solo['desc'] ); ?></p>
									<?php if ( $wt_oiw_solo_is_installed && current_user_can( 'activate_plugins' ) ) : ?>
										<?php
										$wt_oiw_solo_activate_url = wp_nonce_url(
											self_admin_url( 'plugins.php?action=activate&plugin=' . rawurlencode( $wt_oiw_solo_plugin_file ) ),
											'activate-plugin_' . $wt_oiw_solo_plugin_file
										);
										?>
										<a href="<?php echo esc_url( $wt_oiw_solo_activate_url ); ?>"
											class="wt-oiw-os-btn-premium wt-oiw-os-btn-premium--block">
											<?php esc_html_e( 'Activate', 'order-import-export-for-woocommerce' ); ?>
										</a>
									<?php else : ?>
										<a href="<?php echo esc_url( $wt_oiw_solo['url'] ); ?>"
											target="_blank"
											rel="noopener noreferrer"
											class="wt-oiw-os-btn-premium wt-oiw-os-btn-premium--block">
											<?php esc_html_e( 'Try Now', 'order-import-export-for-woocommerce' ); ?>
										</a>
									<?php endif; ?>
								</div>
								<?php if ( ! empty( $wt_oiw_solo['screenshot'] ) ) : ?>
									<div class="wt-oiw-os-standalone-screenshot">
										<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
										<img src="<?php echo esc_url( $wt_oiw_img_base . '/' . $wt_oiw_solo['screenshot'] ); ?>"
											alt="<?php echo esc_attr( $wt_oiw_solo['name'] ); ?>">
									</div>
								<?php endif; ?>
							</div>
								<?php
							endif;
						endif;
						?>

					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>
