<?php

class EventoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainApp';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','AdminAgenda'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Evento;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evento']))
		{
			$model->attributes=$_POST['Evento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEvento));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evento']))
		{
			$model->attributes=$_POST['Evento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEvento));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionAdminAgenda()
	{
		$evento= Evento::model()->find();

		$horaInicial=$evento->HoraInicio;
		$horaFinal=$evento->HoraFinal;
		$minutoAnadir=$evento->Intervalo;
		$nuevaHora = $evento->HoraInicio;
		$segundos_minutoAnadir=$minutoAnadir*60;
		$nuevaHoraV =$evento->HoraInicio;

		$tabla = "";

		$estado = CHtml::dropDownList("","EstadoEvento",CHtml::listData(EstadoEvento::model()->findAll(), 'idEstadoEvento', 'NombreEstado'), array('empty' => 'Seleccionar', 'class'=>'form-control', 'data-parsley-required'=>'true'));

		while($horaFinal != $nuevaHoraV){
			$segundos_horaInicial=strtotime($nuevaHoraV);

			$nuevaHoraV = date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);

			$tabla .= "<tr>";
			$tabla .= "<td>".date("H:i",$segundos_horaInicial)."</td>";
			$tabla .= "<td>".$nuevaHoraV."</td>";
			$tabla .= "<td>".'<input class="form-control" type="text" name="txtActividad[]" plaseholder="Actividad" data-parsley-required="true"/>'."</td>";
			$tabla .= "<td>".'<input class="form-control" type="text" name="txtDetalle[]" plaseholder="Detalla" data-parsley-required="true"/>'."</td>";
			$tabla .= "<td>".$estado."</td>";
			$tabla .= "</tr>";
			
		}

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->isGuest){

			if($this->isUrl("evento/adminagenda")){
				$this->render('adminagenda', array('datos'=>$tabla));
			}else
			{
				$this->redirect(array('/app/error'));
			}
		}else
		{
			$this->redirect(array('/login/login'));
		}

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evento the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evento $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
