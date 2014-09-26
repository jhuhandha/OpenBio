<?php

class AppController extends Controller
{
	public $layout='//layouts/mainApp';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->isGuest){
			if($this->isUrl("app/index")){
				$this->render('index');
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
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->renderPartial('error');
	}
}