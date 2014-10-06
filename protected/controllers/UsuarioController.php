<?php

class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainUsuario';

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
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			)
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST["Usuario"]) && isset($_FILES["Usuario"]))
		{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["Usuario"]["name"]["Foto"]);
			$extension = end($temp);

			$m=Usuario::model()->find("1 = 1 ORDER BY idUsuario DESC");
			$nombre = $m->idUsuario + 1;
			$nombre =  (string)$nombre.".".$extension;
			$imagen = false;
			
			if ((($_FILES["Usuario"]["type"]["Foto"] == "image/gif")
			|| ($_FILES["Usuario"]["type"]["Foto"] == "image/jpeg")
			|| ($_FILES["Usuario"]["type"]["Foto"] == "image/jpg")
			|| ($_FILES["Usuario"]["type"]["Foto"] == "image/pjpeg")
			|| ($_FILES["Usuario"]["type"]["Foto"] == "image/x-png")
			|| ($_FILES["Usuario"]["type"]["Foto"] == "image/png"))
			&& in_array($extension, $allowedExts)) {
  				if ($_FILES["Usuario"]["error"]["Foto"] > 0) {
    				echo "Return Code: " . $_FILES["Usuario"]["error"]["Foto"] . "<br>";
  				} else {
				    if (!file_exists(Yii::app()->request->baseUrl."/assets/upload/usuarios/" . $_FILES["Usuario"]["name"]["Foto"])) {
					    move_uploaded_file($_FILES["Usuario"]["tmp_name"]["Foto"],"assets/upload/usuarios/" . $nombre);
					    $imagen = true;
				    }
  				}
			} else {
			  	echo "Invalid file";
			}
			
			if($imagen){
				$model->Foto=$nombre;
				$model->Nombre=$_POST["Usuario"]['Nombre'];
				$model->Apellido=$_POST["Usuario"]['Apellido'];
				$model->NombreEmpresa=$_POST["Usuario"]['NombreEmpresa'];
				$model->Email=$_POST["Usuario"]['Email'];
				$model->Celular=$_POST["Usuario"]['Celular'];
				$model->Direccion=$_POST["Usuario"]['Direccion'];
				$model->Usuario=$_POST["Usuario"]['Usuario'];
				$model->Clave=$_POST["Usuario"]['Clave'];
				$model->Nombre=$_POST["Usuario"]['Nombre'];
				$model->Rol_idRol="1";
				$model->CategoriaUsuario_idCategoriaUsuario=$_POST["Usuario"]['CategoriaUsuario_idCategoriaUsuario'];

				try{
					if($model->save()){
						$count = 0;
						foreach ($_POST["Interes"] as $value) {
							$interes = new UsuarioInteres;
							$interes->Interes_idInteres = $value;
							$interes->Usuario_idUsuario = $model->idUsuario;
							if($interes->save()){
								$count ++;
							}
						}
						if(count($_POST["Interes"]) == $count){
							$v = new Vitrina;
							$v->Usuario_idUsuario = $model->idUsuario;
							$v->Estado = 0;
							if($v->save()){
								echo "1";
							}else{
								echo "2";
							}
						}else{
							echo "2";
						}
					}else{
						echo "3";
					}
				}catch(Exception $e){
					echo $e->getMessage();
				}

			}
		}
	}


	public function actionAdminVitrina()
	{
		$this->layout='//layouts/mainApp';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->isGuest){
			if($this->isUrl("usuario/adminvitrina")){
				$this->render('adminVitrina');
			}else
			{
				$this->redirect(array('/app/error'));
			}
		}else
		{
			$this->redirect(array('/login/login'));
		}
	}

	public function actionListarUsuario(){
		if($this->isAjax()){
			$model=Usuario::model()->findAll("Rol_idRol <= 2");
			$a = array();
			foreach ($model as $key => $value) {
				$a[] = array(
					'idUsuario'=>$this->encrypt($value->idUsuario),
					'Nombre'=>$value->Nombre,
					'Apellido'=>$value->Apellido,
					'Email'=>$value->Email,
					'idRol'=>$value->Rol_idRol
				);
			}
			$json = json_encode(array("result"=>$a));
			echo $json;
		}

	}

	public function actionCambiarRol(){
		try{
			$bandera = false;
			$vitrina = Vitrina::model()->find("Usuario_idUsuario = ".$this->decrypt($_POST["id"]));

			if($_POST["rol"] == "2"){
				if($vitrina == null){
					$v = new Vitrina;
					$v->Usuario_idUsuario = $this->decrypt($_POST["id"]);
					if($v->save()){
						$bandera = true;
					}
				}else {
					$vm=Vitrina::model()->find("Usuario_idUsuario = ".$this->decrypt($_POST["id"]));
					$vm->Estado = 1;
					if($vm->save()){
						$bandera = true;
					}
				}
			}else if($_POST["rol"] == "1"){
				$vm=Vitrina::model()->find("Usuario_idUsuario = ".$this->decrypt($_POST["id"]));
				$vm->Estado = 0;
				if($vm->save()){
					$bandera = true;
				}
			}

			if($bandera){
				$model=$this->loadModel($this->decrypt($_POST["id"]));
				$model->Rol_idRol = $_POST["rol"];
				if($model->save()){
					echo "1";
				}else{
					echo "2";
				}
			}else{
				echo "2";
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
		

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

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idUsuario));
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
	public function actionIndex()
	{
		$dataProvider=new Usuario;
		$this->render('_form',array(
			'model'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
