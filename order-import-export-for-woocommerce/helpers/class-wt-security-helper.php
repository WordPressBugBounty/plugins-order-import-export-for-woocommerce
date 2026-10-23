<?php

/**
 * Webtoffee Security Library
 *
 * Includes Data sanitization, Access checking
 * @author     WebToffee <info@webtoffee.com>
 */

if(!class_exists('Wt_Iew_Sh'))
{

	class Wt_Iew_Sh 
	{

		/**	
		* 	Data sanitization function.
		*	
		*	@param mixed $val value to sanitize
		*	@param string $key array key in the validation rule
		*	@param array $validation_rule array of validation rules. Eg: array('field_key' => array('type' => 'textarea'))
		*	@return mixed sanitized value
		*/
		public static function sanitize_data($val, $key, $validation_rule = array())
		{		
			if(isset($validation_rule[$key]) && is_array($validation_rule[$key])) /* rule declared/exists */
			{
				if(isset($validation_rule[$key]['type']))
				{
					$val = self::sanitize_item($val, $validation_rule[$key]['type']);
				}
			}else //if no rule is specified then it will be treated as text
			{
				$val = self::sanitize_item($val, 'text');
			}
			return $val;
		}


		/**
		* 	Sanitize individual data item
		*
		*	@param mixed $val value to sanitize
		*	@param string $type value type
		*	@return mixed sanitized value
		*/
		public static function sanitize_item($val, $type='')
		{
			switch ($type) 
			{
			    case 'text':
			        $val = sanitize_text_field($val);
			        break;
			    case 'text_arr':
			        $val = self::sanitize_arr($val);
			        break;
			    case 'url':
			        $val = esc_url_raw($val);
			        break;
			    case 'url_arr':
			        $val = self::sanitize_arr($val, 'url');
			        break;
				case 'sanitize_title_with_dashes':
					$val = sanitize_title_with_dashes($val);
			        break;				
				case 'sanitize_title_with_dashes_arr':
					$val = self::sanitize_arr($val, 'sanitize_title_with_dashes');
			        break;					
			    case 'textarea':
			        $val=sanitize_textarea_field($val);
			        break;    
			    case 'int':
			        $val = intval($val);
			        break;
			    case 'int_arr':
			        $val = self::sanitize_arr($val, 'int');
			        break;
			    case 'absint':
			        $val = absint($val);
			        break;
			    case 'absint_arr':
			        $val = self::sanitize_arr($val, 'absint');
			        break;
			    case 'float':
			        $val = floatval($val);
					break;
				case 'post_content':
			        $val = wp_kses_post($val);
					break;
				case 'hex':
			        $val = sanitize_hex_color($val);
			        break;
			    case 'skip': /* skip the validation */
			        $val = $val;
			        break;
			    case 'file_name':
			        $val = sanitize_file_name($val);
			        break;
			    default:
			        $val = sanitize_text_field($val);
			} 

			return $val;
		}

		/**
		* 	Recursive array sanitization function
		*
		*	@param mixed $arr value to sanitize
		*	@param string $type value type
		*	@return mixed sanitized value
		*/
		public static function sanitize_arr($arr, $type = 'text')
		{
			if(is_array($arr))
			{
				$out = array();
				foreach($arr as $k=>$arrv)
				{
					if(is_array($arrv))
					{
						$out[$k] = self::sanitize_arr($arrv, $type);
					}else
					{
						$final_type = ( false !== strpos( $k, 'delimiter') ? 'post_content' : $type ); 
						$out[$k] = self::sanitize_item( $arrv, $final_type );
					}
				}
				return $out;
			}else
			{
				return self::sanitize_item($arr, $type);
			}
		}

		/**
		* 	User accessibility. Function checks user logged in status, nonce and role access.
		*
		*	@param string $plugin_id unique plugin id. Note: This id is used as an identifier in filter name so please use characters allowed in filters 
		*	@param string $nonce_id Nonce id. If not specified then uses plugin id
		*	@return boolean if user allowed or not
		*/
		public static function check_write_access($plugin_id, $nonce_id = '')
		{
			$er = true;
			
	    	if(!is_user_logged_in()) //checks user is logged in
	    	{
	    		$er = false;
	    	}

	    	if($er === true) //no error then proceed
	    	{
	    		if(!(self::verify_nonce($plugin_id, $nonce_id))) //verifying nonce
		        {
		            $er = false;
		        }else
		        {
		        	if(!self::check_role_access($plugin_id)) //Check user role
		            {
		            	$er = false;
		            }
		        }
	    	}
	    	return $er;
		}

		/**
		* 	Verifying nonce
		*
		*	@param string $plugin_id unique plugin id. Note: This id is used as an identifier in filter name so please use characters allowed in filters 
		*	@param string $nonce_id Nonce id. If not specified then uses plugin id
		*	@return boolean if user allowed or not
		*/
		public static function verify_nonce($plugin_id, $nonce_id = '')
		{
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Nonce is verifying in the function.
			$nonce = (isset($_REQUEST['_wpnonce']) ? sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])) : '');
    		$nonce = (is_array($nonce) ? $nonce[0] : $nonce); //in some cases multiple nonces are declared
    		$nonce_id = ($nonce_id == "" ? $plugin_id : $nonce_id); //if nonce id not provided then uses plugin id as nonce id
    		
    		return wp_verify_nonce($nonce, $nonce_id);
		}


		/**
		* 	Checks if user role has access
		*
		*	@param string $plugin_id unique plugin id. Note: This id is used as an identifier in filter name so please use characters allowed in filters 
		*	@return boolean if user allowed or not
		*/
		public static function check_role_access($plugin_id)
		{
                $roles = array('manage_options', 'shop_manager');
	    	$roles = apply_filters('wt_'.$plugin_id.'_alter_role_access_basic', $roles); //dynamic filter based on plugin id to alter roles
	    	$roles = (!is_array($roles) ? array() : $roles);
	    	$is_allowed = false;

	    	foreach($roles as $role) //loop through roles
	    	{
	    		if(current_user_can($role))
	    		{
	    			$is_allowed = true;
	    			break;
	    		}
	    	}
	    	return $is_allowed;
		}

		/**
		 * Whether URL imports are restricted to WordPress safe HTTP requests.
		 *
		 * Returns true by default so that CSV URL imports use wp_safe_remote_get(),
		 * which validates the destination against private, loopback, and link-local
		 * address ranges on every redirect hop.
		 *
		 * Sites whose external CSV hosts are unreachable under wp_safe_remote_get()
		 * (e.g. intranet CDNs, dev environments) can opt out:
		 *   add_filter( 'wt_iew_url_import_safe_http_only', '__return_false' );
		 *
		 * @return bool True when safe HTTP mode is active (default). False to restore legacy behaviour.
		 */
		public static function url_import_safe_http_only() {
			/**
			 * Force URL imports to use only WordPress safe remote requests.
			 *
			 * When true: wp_safe_remote_get() is used with reject_unsafe_urls and
			 * sslverify enabled. Private/loopback/link-local destinations and HTTP
			 * redirect targets are rejected, matching WooCommerce's own HTTP posture.
			 *
			 * When false: legacy wp_remote_get() behaviour is restored.
			 *
			 * @param bool $safe_only Default true.
			 */
			return (bool) apply_filters( 'wt_iew_url_import_safe_http_only', true );
		}

		/**
		 * Perform a remote GET request using safe or legacy HTTP depending on the site configuration.
		 *
		 * When safe mode is active (default), delegates to wp_safe_remote_get() with
		 * reject_unsafe_urls and sslverify enforced, closing redirect-based SSRF vectors.
		 * When the opt-out filter is set to false, falls back to wp_remote_get() with the
		 * caller's original arguments unchanged.
		 *
		 * @param string $url  The URL to request.
		 * @param array  $args wp_remote_get() argument array.
		 * @return array|WP_Error Response array or WP_Error on failure.
		 */
		public static function safe_remote_get( $url, $args = array() ) {
			if ( self::url_import_safe_http_only() ) {
				$args['sslverify']          = true;
				$args['reject_unsafe_urls'] = true;
				return wp_safe_remote_get( $url, $args );
			}
			return wp_remote_get( $url, $args );
		}

	}
}