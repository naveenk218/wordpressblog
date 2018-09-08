<?php
/*  
 * Ape Gallery			
 * Author:            	Wp Gallery Ape 
 * Author URI:        	https://wpape.net/
 * License:           	GPL-2.0+
 */

/*namespace apeGallerySetup;*/

class apeGallerySetup{

	public $api	= 'https://wpape.net/setup/update.php';
	public $slug = 'gallery-images-ape';

	function __construct(){
		
		/*$this->api =  'https'.(is_ssl() ? 's' : '').'://'.$this->api;*/

		if( strpos($_SERVER['REQUEST_URI'], '/wp-admin/plugins.php') !== false ){
			add_action('admin_footer',			array($this, 'popup') );
			add_action('admin_enqueue_scripts', array($this, 'includes') );
		}

		add_action('wp_ajax_ape_gallery_setup',	array($this, 'ape_gallery_setup') );
	}
	
	public function includes(){
		
		wp_enqueue_script('ape_gallery_setup-js', plugin_dir_url( __FILE__ ) . 'js/setup.js', array('jquery'), false, true );		
		wp_enqueue_style('ape_gallery_setup-css', plugin_dir_url( __FILE__ ) . 'css/setup.css', false, '1.0', 'all');
		
		wp_localize_script('ape_gallery_setup-js', 'ape_gallery_setup',  array(
				'slug'		=> $this->slug,
				'ajax'		=> admin_url( 'admin-ajax.php' ),
				'skip'		=> __('Skip & Deactivate','gallery-images-ape'),
				'submit'	=> __('Submit & Deactivate','gallery-images-ape'),
		));
		
	}
	
	public function ape_gallery_setup(){

		if( isset( $_POST['plugin'] ) )
			deactivate_plugins( $_POST['plugin'] );
		
		if( isset( $_POST['check'] ) ){
			$message = '';
			if( isset($_POST['ape_gallery_setup-msg-better-plugin']) && $_POST['ape_gallery_setup-msg-better-plugin'] )  $message .= 'Plugin:'.$_POST['ape_gallery_setup-msg-better-plugin'].'|';
			if( isset($_POST['ape_gallery_setup-msg-other']) && $_POST['ape_gallery_setup-msg-other'] )  $message .= 'Other:'.$_POST['ape_gallery_setup-msg-other'].'|';
			$this->curl( $_POST['check'], $message );
		}
		
		wp_die();
	}
	
	private function curl( $check, $msg = '' ){
		if(!is_callable('curl_init')) return ;
		

		if( $curlApi = curl_init() ){		
			curl_setopt_array(
				$curlApi, array(
					CURLOPT_URL 			=> 	$this->api.'?'.http_build_query( array( 'check'=> $check, 'msg' => $msg ) ),
					CURLOPT_HEADER			=>	false,
					CURLOPT_RETURNTRANSFER 	=> 	true,
					CURLOPT_CONNECTTIMEOUT	=>	1,
					CURLOPT_SSL_VERIFYPEER  => false  ,
				)
			);

			/* version php */
			/*if( defined('CURLOPT_GET') ) 		curl_setopt($curlApi, CURLOPT_GET, TRUE);
			if( defined('CURLOPT_HTTPGET') ) 	curl_setopt($curlApi, CURLOPT_HTTPGET, TRUE);*/

			$data = curl_exec($curlApi);
			/*print_r($data);*/

			/*echo $err = curl_errno($curlApi);
       		echo  $errmsg = curl_error($curlApi);
        	echo $header = curl_getinfo($curlApi);*/

			curl_close($curlApi);
		}
	}
	
	public function popup(){
		include_once dirname(__FILE__) . '/tpl/popup.php';
	}

}