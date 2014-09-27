<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
define('KEY', 'MYKEYVALUE'); 
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	// valida si la peticion fue realizada mediante ajax
	public function isAjax()
	{
	    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	    {return true;}
	    else
	    {return false;}
	}


 
	public function encrypt($ENTEXT) 
	{ 
	    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, KEY,
	        $ENTEXT, MCRYPT_MODE_ECB, mcrypt_create_iv(
	        mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB),
	                          MCRYPT_RAND)))); 
	} 
	 
	public function decrypt($DETEXT) 
	{
	    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, KEY,
	       base64_decode($DETEXT), MCRYPT_MODE_ECB, 
	       mcrypt_create_iv(mcrypt_get_iv_size( 
	                       MCRYPT_RIJNDAEL_256,
	                      MCRYPT_MODE_ECB), MCRYPT_RAND))); 
	}

	// Validar que el rol que tiene el usuario tenga el modulo que se acaba de requrir en la peticion
	public function isUrl($url){

		$criteriaRol = new CDbCriteria;
		$criteriaRol->with = array('moduloIdModulo');
		$criteriaRol->condition = 'Rol_idRol = '.Yii::app()->user->getState("Rol");
		$modelModulo = ModuloRol::model()->findAll($criteriaRol);

		$Modulo = 0;
		foreach ($modelModulo as $key => $value) {
			if($url == $value->moduloIdModulo->Url){
				$Modulo++;
			}
		}
		

		return $Modulo>0?true:false;
	}
}