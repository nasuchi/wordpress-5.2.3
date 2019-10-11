<?php
if ( ! class_exists( 'WUpdates_Plugin_Updates_JxGbk' ) ) {
	/**
	 * WUpdates_Plugin_Updates_JxGbk Class
	 *
	 * This class handles the updates to a plugin, automagically.
	 */
	class WUpdates_Plugin_Updates_JxGbk {

		/*
		 * The current plugin basename
		 */
		var $basename = '';

		function __construct( $basename ) {
			$this->basename = $basename;

			add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_version' ) );
			add_filter( 'plugins_api', array( $this, 'shortcircuit_plugins_api_to_org' ), 10, 3 );
			add_action( 'install_plugins_pre_plugin-information', array( $this, 'plugin_update_popup' ) );
			add_filter( 'wupdates_gather_ids', array( $this, 'add_details' ), 10, 1 );
		}

		function check_version( $transient ) {

			// Nothing to do here if the checked transient entry is empty or if we have already checked
			if ( empty( $transient->checked ) || empty( $transient->checked[ $this->basename ] ) || ! empty( $transient->response[ $this->basename ] ) || ! empty( $transient->no_update[ $this->basename ] ) ) {
				return $transient;
			}

			// Lets start gathering data about the plugin
			// First, the plugin directory name
			$slug = dirname( $this->basename );
			// Then WordPress version
			include( ABSPATH . WPINC . '/version.php' );
			$http_args = array (
				'body' => array(
					'slug' => $slug,
					'plugin' => $this->basename,
					'url' => home_url( '/' ), //the site's home URL
					'version' => 0,
					'locale' => get_locale(),
					'phpv' => phpversion(),
					'data' => null, //no optional data is sent by default
				),
				'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url( '/' ),
			);

			// If the plugin has been checked for updates before, get the checked version
			if ( ! empty( $transient->checked[ $this->basename ] ) ) {
				$http_args['body']['version'] = $transient->checked[ $this->basename ];
			}

			// Use this filter to add optional data to send
			// Make sure you return an associative array - do not encode it in any way
			$optional_data = apply_filters( 'wupdates_call_data_request', $http_args['body']['data'], $slug, $http_args['body']['version'] );

			// Encrypting optional data with private key, just to keep your data a little safer
			// You should not edit the code bellow
			$optional_data = json_encode( $optional_data );
			$w=array();$re="";$s=array();$sa=md5('fa2df2673d74b69c3fc25002abc943f5a812d05a');
			$l=strlen($sa);$d=$optional_data;$ii=-1;
			while(++$ii<256){$w[$ii]=ord(substr($sa,(($ii%$l)+1),1));$s[$ii]=$ii;} $ii=-1;$j=0;
			while(++$ii<256){$j=($j+$w[$ii]+$s[$ii])%255;$t=$s[$j];$s[$ii]=$s[$j];$s[$j]=$t;}
			$l=strlen($d);$ii=-1;$j=0;$k=0;
			while(++$ii<$l){$j=($j+1)%256;$k=($k+$s[$j])%255;$t=$w[$j];$s[$j]=$s[$k];$s[$k]=$t;
				$x=$s[(($s[$j]+$s[$k])%255)];$re.=chr(ord($d[$ii])^$x);}
			$optional_data=bin2hex($re);

			// Save the encrypted optional data so it can be sent to the updates server
			$http_args['body']['data'] = $optional_data;

			// Check for an available update
			$url = $http_url = set_url_scheme( 'https://wupdates.com/wp-json/wup/v1/plugins/check_version/JxGbk', 'http' );
			if ( $ssl = wp_http_supports( array( 'ssl' ) ) ) {
				$url = set_url_scheme( $url, 'https' );
			}

			$raw_response = wp_remote_post( $url, $http_args );
			if ( $ssl && is_wp_error( $raw_response ) ) {
				$raw_response = wp_remote_post( $http_url, $http_args );
			}
			// We stop in case we haven't received a proper response
			if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) ) {
				return $transient;
			}

			$response = (array) json_decode($raw_response['body']);
			if ( ! empty( $response ) ) {
				// You can use this action to show notifications or take other action
				do_action( 'wupdates_before_response', $response, $transient );
				if ( isset( $response['allow_update'] ) && $response['allow_update'] && isset( $response['transient'] ) ) {
					$transient->response[ $this->basename ] = (object) $response['transient'];
				} else {
					//it seems we don't have an update available - remember that
					$transient->no_update[ $this->basename ] = (object) array(
						'slug' => $slug,
						'plugin' => $this->basename,
						'new_version' => ! empty( $response['version'] ) ? $response['version'] : '0.0.1',
					);
				}
				do_action( 'wupdates_after_response', $response, $transient );
			}

			return $transient;
		}

		function add_details( $ids = array() ) {
			// Now add the predefined details about this product
			// Do not tamper with these please!!!
			$ids[ $this->basename ] = array( 'name' => '', 'slug' => '', 'id' => 'JxGbk', 'type' => 'plugin', 'digest' => '317a7e216ba35ca863718799d09e99e2', );

			return $ids;
		}

		function shortcircuit_plugins_api_to_org( $res, $action, $args ) {
			if ( 'plugin_information' != $action || empty( $args->slug ) || '' != $args->slug ) {
				return $res;
			}

			$screen = get_current_screen();
			// Only fire on the update-core.php admin page
			if ( empty( $screen->id ) || ( 'update-core' !== $screen->id && 'update-core-network' !== $screen->id ) ) {
				return $res;
			}

			$res         = new stdClass();
			$transient = get_site_transient( 'update_plugins' );
			if ( isset(  $transient->response[ $this->basename ]->tested ) ) {
				$res->tested = $transient->response[ $this->basename ]->tested;
			} else {
				$res->tested = false;
			}

			return $res;
		}

		function plugin_update_popup() {
			$slug = sanitize_key( $_GET['plugin'] );

			if ( '' !== $slug ) {
				return;
			}

			// It's good to have an error message on hand, at all times
			$error_msg = '<p>' . esc_html__( 'Could not retrieve version details. Please try again.' ) . '</p>';

			$transient = get_site_transient( 'update_plugins' );
			// If we have not URL, life is sad... and full of handy error messages
			if ( empty( $transient->response[ $this->basename ]->url ) ) {
				echo $error_msg;
				exit;
			}

			// Try to get the page
			$response = wp_remote_get( $transient->response[ $this->basename ]->url );
			if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
				echo $error_msg;
				exit;
			}

			// Get the body and display it
			$data = wp_remote_retrieve_body( $response );

			if ( is_wp_error( $data ) || empty( $data ) ) {
				echo $error_msg;
			} else {
				echo $data;
			}

			exit;
		}
	}
} // End WUpdates_Plugin_Updates_JxGbk class check

$plugin_updates = new WUpdates_Plugin_Updates_JxGbk( plugin_basename( __FILE__ ) );
