<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
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