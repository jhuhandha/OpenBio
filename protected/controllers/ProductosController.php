<?php

class ProductosController extends Controller
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
				'actions'=>array('create','update','ListarProductos'),
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
		if(!Yii::app()->user->isGuest){

			$model=new Productos;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST["Productos"]) && isset($_FILES["Productos"]))
			{
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["Productos"]["name"]["Foto"]);
				$extension = end($temp);

				$m=Productos::model()->findAll("Vitrina_idVitrina = ".Yii::app()->user->getState("idVitrina"));
				$np = count($m);

				if($np < Yii::app()->user->getState("NumProductos")){

					$nombre =  strtolower(trim($_POST["Productos"]['NombreProducto'])).".".$extension;
					$imagen = false;
					$estImg = true;
					if($_FILES["Productos"]["name"]["Foto"] != ""){
						if ((($_FILES["Productos"]["type"]["Foto"] == "image/gif")
						|| ($_FILES["Productos"]["type"]["Foto"] == "image/jpeg")
						|| ($_FILES["Productos"]["type"]["Foto"] == "image/jpg")
						|| ($_FILES["Productos"]["type"]["Foto"] == "image/pjpeg")
						|| ($_FILES["Productos"]["type"]["Foto"] == "image/x-png")
						|| ($_FILES["Productos"]["type"]["Foto"] == "image/png"))
						&& in_array($extension, $allowedExts)) {
			  				if ($_FILES["Productos"]["error"]["Foto"] > 0) {
			    				echo "Return Code: " . $_FILES["Productos"]["error"]["Foto"] . "<br>";
			  				} else {
							    if (!file_exists(Yii::app()->request->baseUrl."/assets/upload/productos/" . $nombre)) {
								    move_uploaded_file($_FILES["Productos"]["tmp_name"]["Foto"],"assets/upload/productos/" . $nombre);
								    $imagen = true;
							    }
			  				}
						} else {
						  	echo "Invalid file";
						}
					}else{
						$imagen = true;
						$estImg= false;
					}
					if($imagen){

						$model->Foto=$estImg?$nombre:'#';
						$model->NombreProducto=$_POST["Productos"]['NombreProducto'];
						$model->DescripcionTecnologia=$_POST["Productos"]['DescripcionTecnologia'];
						$model->PalabrasClaves=$_POST["Productos"]['PalabrasClaves'];
						$model->EstadoDesarrollo=$_POST["Productos"]['EstadoDesarrollo'];
						$model->EstadoPL=$_POST["Productos"]['EstadoPL'];
						$model->InteresComercial=$_POST["Productos"]['InteresComercial'];
						$model->Categoria_idCategoria=$_POST["Productos"]['Categoria_idCategoria'];
						$model->Vitrina_idVitrina=Yii::app()->user->getState("idVitrina");

						if($model->save()){
								echo "1";
							}else{
								echo "2";
							}
					}else{
						echo "3";
					}
				}else{
					echo "4.".Yii::app()->user->getState("NumProductos");
				}
			}
		}else
		{
			$this->redirect(array('/login/login'));
		}
	}


	public function actionListarProductos(){
		if($this->isAjax()){
			
			$criteriaRol = new CDbCriteria;
			$criteriaRol->with = array('categoriaIdCategoria');
			$criteriaRol->condition = "Vitrina_idVitrina = ".Yii::app()->user->getState("idVitrina");
			$model = Productos::model()->findAll($criteriaRol);

			$a = array();
			foreach ($model as $key => $value) {
				$a[] = array(
					'idProductos'=>$this->encrypt($value->idProductos),
					'Foto'=>Yii::app()->request->baseUrl.'/assets/upload/productos/'.$value->Foto,
					'NombreProducto'=>$value->NombreProducto,
					'DescripcionTecnologia'=>$value->DescripcionTecnologia,
					'PalabrasClaves'=>$value->PalabrasClaves,
					'EstadoDesarrollo'=>$value->EstadoDesarrollo,
					'EstadoPL'=>$value->EstadoPL,
					'InteresComercial'=>$value->InteresComercial,
					'Categoria'=>$value->categoriaIdCategoria->NombreCategoria,
					'idCategoria'=>$value->categoriaIdCategoria->idCategoria
				);
			}
			$json = json_encode(array("result"=>$a));
			echo $json;
		}
	}


	public function actionUpdate()
	{

		if(!Yii::app()->user->isGuest){

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST["Productos"]))
			{
				$model=$this->loadModel($this->decrypt($_POST["txtCodigo"]));
				$modImg = false;


				if($_FILES["Productos"]["name"]["Foto"] != ""){

					$allowedExts = array("gif", "jpeg", "jpg", "png");
					$temp = explode(".", $_FILES["Productos"]["name"]["Foto"]);
					$extension = end($temp);

					$nombre =  strtolower(trim($_POST["Productos"]['NombreProducto'])).".".$extension;
					$imagen = false;
					$verificacionDelete = false;
					try{
						@unlink('assets/upload/productos/'.$model->Foto);
						$verificacionDelete = true;
					}catch(Exception $e){
						$verificacionDelete = false;
					}

					if ((($_FILES["Productos"]["type"]["Foto"] == "image/gif")
					|| ($_FILES["Productos"]["type"]["Foto"] == "image/jpeg")
					|| ($_FILES["Productos"]["type"]["Foto"] == "image/jpg")
					|| ($_FILES["Productos"]["type"]["Foto"] == "image/pjpeg")
					|| ($_FILES["Productos"]["type"]["Foto"] == "image/x-png")
					|| ($_FILES["Productos"]["type"]["Foto"] == "image/png"))
					&& in_array($extension, $allowedExts)) {
		  				if ($_FILES["Productos"]["error"]["Foto"] > 0) {
		    				echo "Return Code: " . $_FILES["Productos"]["error"]["Foto"] . "<br>";
		  				} else {
						    if (!file_exists(Yii::app()->request->baseUrl."/assets/upload/productos/" . $nombre)) {
							    move_uploaded_file($_FILES["Productos"]["tmp_name"]["Foto"],"assets/upload/productos/" . $nombre);
							    $imagen = true;
							    $modImg = true;
						    }
		  				}
					} else {
					  	echo "No fue posible guardar la foto";
					}
				}else{
					$imagen = true;
				}


				if($imagen){

					if($modImg){
						$model->Foto=$nombre;
					}
					$model->NombreProducto=$_POST["Productos"]['NombreProducto'];
					$model->DescripcionTecnologia=$_POST["Productos"]['DescripcionTecnologia'];
					$model->PalabrasClaves=$_POST["Productos"]['PalabrasClaves'];
					$model->EstadoDesarrollo=$_POST["Productos"]['EstadoDesarrollo'];
					$model->EstadoPL=$_POST["Productos"]['EstadoPL'];
					$model->InteresComercial=$_POST["Productos"]['InteresComercial'];
					$model->Categoria_idCategoria=$_POST["Productos"]['Categoria_idCategoria'];
					$model->Vitrina_idVitrina=Yii::app()->user->getState("idVitrina");

					if($model->save()){
							echo "1";
						}else{
							echo "2";
						}
				}else{
					echo "3";
				}

			}
		}else
		{
			$this->redirect(array('/login/login'));
		}
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
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->isGuest){

			if($this->isUrl("productos/index")){
				$model = new Productos;
				$this->render('_form', array('model'=>$model));
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
	 * @return Productos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Productos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Productos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='productos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
