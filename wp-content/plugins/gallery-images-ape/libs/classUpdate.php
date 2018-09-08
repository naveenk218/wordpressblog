<?php
/*  
 * Ape Gallery			
 * Author:            	Wp Gallery Ape 
 * Author URI:        	https://wpape.net/
 * License:           	GPL-2.0+
 */

if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ){ exit;  }

class ApeGalleryUpdate {

	public $runUpdate = true;

	public $installVersion = false;
	public $installOptionsVersion = false;

	public $newVersion = false;
	public $newOptionsVersion = false;

	public function __construct(){
		$this->installVersion = get_option( 'wpApeGalleryInstallVersion', 0 );
		
		$this->runUpdate =  $this->installVersion != WPAPE_GALLERY_VERSION ;
		
		wpApeGalleryHelperClass::writeLog("check Update result ".$this->runUpdate);

		if( $this->runUpdate ){

			wpApeGalleryHelperClass::writeLog("run Update");

			update_option( "wpApeGalleryInstallVersion", WPAPE_GALLERY_VERSION );
			
			update_option( 'ApeGalleryInstall', 'now' );

			$this->checkOptionsVersion();
		}
	}

	private function checkOptionsVersion(){

		$this->installOptionsVersion = get_option( 'wpApeGalleryInstallOptionsVersion', 0 );

		if( $this->installOptionsVersion != WPAPE_GALLERY_OPTIONS_VERSION ){
			
			update_option( "wpApeGalleryInstallOptionsVersion", WPAPE_GALLERY_OPTIONS_VERSION );

			$this->runOptionsUpdate();
		}
	}

	private function runOptionsUpdate(){
		/*  option check  */
	}
}
