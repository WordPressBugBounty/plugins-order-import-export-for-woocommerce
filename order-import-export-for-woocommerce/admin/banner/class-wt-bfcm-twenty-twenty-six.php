<?php
/**
 * BFCM 2026 Banner.
 *
 * @package Wt_Smart_Coupon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Wt_Iew_Bfcm_Twenty_Twenty_Six' ) ) {

	/**
	 * Class Wt_Iew_Bfcm_Twenty_Twenty_Six
	 *
	 * This class is responsible for displaying and handling the Black Friday and Cyber Monday CTA banners for 2026.
	 */
	class Wt_Iew_Bfcm_Twenty_Twenty_Six {

		/**
		 * Banner id.
		 *
		 * @var string
		 */
		private $banner_id = 'wt-iew-bfcm-twenty-twenty-six';

		/**
		 * Banner state option name.
		 *
		 * @var string
		 */
		private static $banner_state_option_name = 'wt_iew_bfcm_twenty_twenty_six_banner_state'; // Banner state, 1: Show, 2: Closed by user, 3: Clicked the grab button, 4: Campaign expired.

		/**
		 * Banner state.
		 *
		 * @var int
		 */
		private $banner_state = 1;

		/**
		 * Show banner.
		 *
		 * @var bool|null
		 */
		private static $show_banner = null;

		/**
		 * Ajax action name.
		 *
		 * @var string
		 */
		private static $ajax_action_name = 'wt_iew_bfcm_twenty_twenty_six_banner_state';

		/**
		 * Promotion link.
		 *
		 * @var string
		 */
		private static $promotion_link = 'https://www.webtoffee.com/plugins/?utm_source=BFCM_administration&utm_medium=import_export&utm_campaign=BFCM-Administration';

		/**
		 * Banner version.
		 *
		 * @var string
		 */
		private static $banner_version = '';

        /**
         * Constructor.
         */
        public function __construct() {
            self::$banner_version = WT_O_IEW_VERSION; // Plugin version.

			$this->banner_state = get_option( self::$banner_state_option_name ); // Current state of the banner.
			$this->banner_state = absint( false === $this->banner_state ? 1 : $this->banner_state );

			// Enqueue styles.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles_and_scripts' ) );

			// Add banner.
            add_action('admin_notices', array($this, 'show_banner'), 999);

			// Inline hook — scheduled view fires this after its intro paragraph so the banner renders in-flow (not above the heading).
			add_action( 'wt_iew_bfcm_inline_render', array( $this, 'show_banner' ), 999 );

			// Ajax hook to save banner state.
			add_action( 'wp_ajax_' . self::$ajax_action_name, array( $this, 'update_banner_state' ) );

			add_action( 'admin_head-edit.php', array($this, 'show_smart_coupon_BFCM_sbanner') );

			// Ajax hook to hide Smart Coupons promotion banner.
			add_action( 'wp_ajax_wbte_sc_hide_promotion_banner', array( $this, 'hide_smart_coupon_promotion_banner' ) );

		}

		/**
		 * To add the banner styles
		 */
		public function enqueue_styles_and_scripts() {
			wp_enqueue_style( $this->banner_id . '-css', plugin_dir_url( __FILE__ ) . 'assets/css/wt-iew-bfcm-twenty-twenty-six.css', array(), self::$banner_version, 'all' );
			$params = array(
				'ajax_url' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
				'nonce'    => wp_create_nonce( 'wt_iew_bfcm_twenty_twenty_six_banner_nonce' ),
				'action'   => self::$ajax_action_name,
				'cta_link' => self::$promotion_link,
			);
			wp_enqueue_script( $this->banner_id . '-js', plugin_dir_url( __FILE__ ) . 'assets/js/wt-iew-bfcm-twenty-twenty-six.js', array( 'jquery' ), self::$banner_version, false );
			wp_localize_script( $this->banner_id . '-js', 'wt_iew_bfcm_twenty_twenty_six_banner_js_params', $params );
		}

		public function show_smart_coupon_BFCM_sbanner()
        {
            global $current_screen;
			include_once ABSPATH . 'wp-admin/includes/plugin.php';

			$installed_plugins = get_plugins();
			// Only show banner if SC Pro is not installed and current page is coupons page.
			if ( ! is_object( $current_screen ) || 'shop_coupon' !== $current_screen->post_type || array_key_exists( 'wt-smart-coupon-pro/wt-smart-coupon-pro.php', $installed_plugins ) ) {
				return;
			}
            
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($){					
					<?php
					$hidden_banners = get_option( 'wbte_sc_hidden_promotion_banners', array() );
					if ( ! defined( 'WBTE_BFCM_SC_COUPONS_PAGE' ) && ! in_array( 'sc_cpns_page', $hidden_banners, true ) ) {
						define( 'WBTE_BFCM_SC_COUPONS_PAGE', true );

						$campaign_url = 'https://www.webtoffee.com/product/smart-coupons-for-woocommerce/?utm_source=free_plugin_add_coupon_menu&utm_medium=order_import_basic&utm_campaign=smart_coupons';

						$bulk_plugin_text = sprintf(
							'<div data-wbte-sc-promotion-banner-id="sc_cpns_page" class="wbte_sc_promotion_banner_div"><span><img src="%s" style="width: 16px;" /></span>&nbsp;<span class="wbte_sc_promotion_banner_title">%s</span><div class="wbte_sc_promotion_banner_content"><p style="margin: 0; font-size: 14px;"> %s </p><div class="wbte_sc_promotion_banner_actions"> <a class="button button-secondary wbte_sc_promotion_banner_link_btn" href="%s" target="_blank"> %s <span class="dashicons dashicons-arrow-right-alt" style="font-size: 14px; line-height: 1.5;"></span> </a>&ensp;<button type="button" style="display:none;" class="button button-secondary wbte_sc_promotion_banner_close wbte_sc_promotion_banner_later"> %s </button></div></div><span class="dashicons dashicons-no-alt wbte_sc_promotion_banner_close wbte_sc_promotion_banner_close_btn"></span></div>',
                            esc_url( plugin_dir_url(__FILE__) . 'assets/images/idea_bulb_orange.svg' ),
							esc_html__( 'Did you know?', 'order-import-export-for-woocommerce' ),
							// translators: %1$s = <strong>BOGO offers</strong>, %2$s = <strong>condition-based coupons</strong>. Highlighted phrases must remain wrapped so they render bold in the banner.
							sprintf(
								__( 'WebToffee Smart Coupons lets you create advanced %1$s and %2$s to boost sales and revenue.', 'order-import-export-for-woocommerce' ),
								'<strong>' . esc_html__( 'BOGO offers', 'order-import-export-for-woocommerce' ) . '</strong>',
								'<strong>' . esc_html__( 'condition-based coupons', 'order-import-export-for-woocommerce' ) . '</strong>'
							),
							esc_url( $campaign_url ),
							esc_html__( 'Get Plugin Now', 'order-import-export-for-woocommerce' ),
							esc_html__( 'Maybe later', 'order-import-export-for-woocommerce' )
						);
						?>
						jQuery( '.page-title-action' ).after( '<?php echo wp_kses_post( $bulk_plugin_text ); ?>' );

						// Banner close button callback
						$( document ).on('click', '.wbte_sc_promotion_banner_close', function( e ){
							e.preventDefault();
							const banner_div = $(this).closest('.wbte_sc_promotion_banner_div');
							const banner_id = banner_div.attr('data-wbte-sc-promotion-banner-id');

							banner_div.css({'opacity': '0.6', 'pointer-events': 'none'});

							if( banner_id ) {
								$.ajax({
									url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
									type: 'POST',
									data: {
										action: 'wbte_sc_hide_promotion_banner',
										banner_id: banner_id,
										_wpnonce: '<?php echo esc_js( wp_create_nonce( 'wt_iew_bfcm_twenty_twenty_six_banner_nonce' ) ); ?>'
									},
									success: function(response) {
										banner_div.fadeOut(300, function() {
											banner_div.remove();
										});
									},
									error: function() {
										banner_div.fadeOut(300, function() {
											banner_div.remove();
										});
									}
								});
							} else {
								banner_div.fadeOut(300, function() {
									banner_div.remove();
								});
							}
						});
						<?php
					}
					?>
				});
			</script>
		<?php
        }


		/**
		 * Show the banner.
		 *
		 * Suppresses the admin_notices rendering on the scheduled-job screen; that screen fires
		 * `wt_iew_bfcm_inline_render` after its intro paragraph so the banner lands in-flow instead
		 * of above the H2 heading.
		 */
		public function show_banner() {
			if ( $this->is_show_banner() ) {
				$screen    = get_current_screen();
				$screen_id = $screen ? $screen->id : '';

				if ( 'admin_notices' === current_action()
					&& 'webtoffee-import-export-basic_page_wt_iew_scheduled_job' === $screen_id ) {
					return;
				}
				?>
					<div class="wt-iew-bfcm-banner-2026 notice is-dismissible inline">
						<div class="wt-bfcm-banner-body">
							<div class="wt-bfcm-banner-body-img-section">
								<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'assets/images/black-friday-2026.svg' ); ?>" alt="<?php esc_attr_e( 'Black Friday Cyber Monday 2026', 'order-import-export-for-woocommerce' ); ?>">
							</div>
							<div class="wt-bfcm-banner-body-info">
								<div class="wt-bfcm-never-miss-this-deal">
									<p><?php echo esc_html__( 'Never Miss This Deal', 'order-import-export-for-woocommerce' ); ?></p>
								</div>
								<div class="info">
									<p>
									<?php
										printf(
											// translators: 1: Discount text with span wrapper, e.g. <span>30% OFF</span>.
											esc_html__( 'Your Last Chance to Avail %1$s on WebToffee Plugins. Grab the deal before it\'s gone!', 'order-import-export-for-woocommerce' ),
											'<span>30% ' . esc_html__( 'OFF', 'order-import-export-for-woocommerce' ) . '</span>'
										);
									?>
									</p>
								</div>
								<div class="info-button">
									<a href="<?php echo esc_url( self::$promotion_link ); ?>" class="bfcm_cta_button" target="_blank"><?php echo esc_html__( 'View plugins', 'order-import-export-for-woocommerce' ); ?> <span class="dashicons dashicons-arrow-right-alt"></span></a>
								</div>
							</div>
						</div>
					</div>
				<?php
			} 
		}

		/**
		 * Check if the banner should be shown.
		 *
		 * @return bool
		 */
		public function is_show_banner() {

			// Already checked for this request.
			if ( ! is_null( self::$show_banner ) ) {
				return self::$show_banner;
			}

			// Banner permanently hidden (closed by user, grabbed, or campaign expired).
			if ( 1 !== $this->banner_state ) {
				return self::$show_banner = false;
			}

			// Season window gate.
			if ( ! class_exists( 'Wt_Import_Export_For_Woo_Order_Basic' ) || ! method_exists( 'Wt_Import_Export_For_Woo_Order_Basic', 'is_bfcm_season' ) || ! Wt_Import_Export_For_Woo_Order_Basic::is_bfcm_season() ) {

				// Mark as expired once the campaign window has ended so later requests skip the date check.
				// Only writes 4 after the end date — never before the start — to avoid pre-silencing the banner.
				if ( method_exists( 'Wt_Import_Export_For_Woo_Order_Basic', 'is_bfcm_season_ended' ) && Wt_Import_Export_For_Woo_Order_Basic::is_bfcm_season_ended() && 4 !== $this->banner_state ) {
					update_option( self::$banner_state_option_name, 4 );
					$this->banner_state = 4;
				}
				return self::$show_banner = false;
			}

			// Check screens.
			$screen    = get_current_screen();
			$screen_id = $screen ? $screen->id : '';

			/**
			 *  Pages to show this black friday and cyber monday banner for 2026.
			 *
			 *  @since 1.1.0
			 *  @param  string[]    Default screen ids
			 */
			$screens_to_show = (array) apply_filters( 'wt_bfcm_banner_screens', array() );

			self::$show_banner = in_array( $screen_id, $screens_to_show, true );
			return self::$show_banner;
		}

        /**
         *  Update banner state ajax hook
         */
        public function update_banner_state() {
            check_ajax_referer( 'wt_iew_bfcm_twenty_twenty_six_banner_nonce' );

			if ( isset( $_POST['wt_iew_bfcm_twenty_twenty_six_banner_action_type'] ) ) {

				$action_type = absint( sanitize_text_field( wp_unslash( $_POST['wt_iew_bfcm_twenty_twenty_six_banner_action_type'] ) ) );
				if ( in_array( $action_type, array( 2, 3 ), true ) ) {
					update_option( self::$banner_state_option_name, $action_type );
				}
			}
			wp_send_json_success();
		}

        /**
         *  Hide Smart Coupons promotion banner
         *
         *  @since 2.5.8
         */
        public function hide_smart_coupon_promotion_banner() {
            check_ajax_referer( 'wt_iew_bfcm_twenty_twenty_six_banner_nonce', '_wpnonce' );

                $hided_banners   = get_option( 'wbte_sc_hidden_promotion_banners', array() );
                $hided_banners[] = isset( $_POST['banner_id'] ) ? sanitize_text_field( wp_unslash( $_POST['banner_id'] ) ) : '';
                update_option( 'wbte_sc_hidden_promotion_banners', $hided_banners );
                wp_send_json_success();
            }
        }

	new Wt_Iew_Bfcm_Twenty_Twenty_Six();
}