<?php
/*  
 * Ape Gallery			
 * Author:            	Wp Gallery Ape 
 * Author URI:        	https://wpape.net/
 * License:           	GPL-2.0+
 */

if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ){ exit;  }

class ApeGalleryActivator {
	public static function activate(){ 
		wpApeGalleryHelperClass::writeLog("run Activate");
		add_option( 'ApeGalleryInstall', 'now' );
	}
	public static function deactivate(){ 
		wpApeGalleryHelperClass::writeLog("run Deactivate");
		delete_option( 'wpApeGalleryInstallVersion' );
		delete_option( 'ApeGalleryInstall' );
	}
}