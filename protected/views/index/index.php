<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('data-parsley-validate'=>true)
)); ?>
		<?php echo $form->textField($model,'username',array("class"=>"form-control", 'data-parsley-required'=>'true','placeholder'=>'Usuario')); ?>

		<?php echo $form->passwordField($model,'password',array("class"=>"form-control", 'data-parsley-required'=>'true','placeholder'=>'Clave')); ?>
		
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success', 'id'=>'btn-enviar')); ?>
		<div id="reguistrar"><a href="<?php echo Yii::app()->createUrl('usuario/index'); ?>">Registrarme</a></div>

<?php $this->endWidget(); ?>
