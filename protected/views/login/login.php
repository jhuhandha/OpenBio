<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('data-parsley-validate'=>true)
)); ?>

	<p class="note">Campos <span class="required">*</span> requeridos.</p>
	<div >
		<div class="form-group">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array("class"=>"form-control", 'data-parsley-required'=>'true')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array("class"=>"form-control", 'data-parsley-required'=>'true')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<div class="form-group">

				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			
		</div>


		<div class="form-group">
			<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

	

<?php $this->endWidget(); ?>
</div><!-- form -->
