<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->errorSummary($model); ?>

	<p class="note">Campos <span class="required">*</span> requeridos</p>
	<div class="container" style="width:80%">
		<div class="row">
			<div class="col-md-5">
				<?php echo $form->labelEx($model,'Foto'); ?>
				  <div class="col-sm-12 col-md-12">
				    <div class="thumbnail">
				      <output id="list"></output>
				      <div class="caption">
				       	
						<?php echo $form->fileField($model,'Foto',array('size'=>60,'maxlength'=>80,'id'=>'files', 'data-parsley-required'=>'true')); ?>
						<?php echo $form->error($model,'Foto'); ?>
				      </div>
				    </div>
				  </div>
			</div>
			<div class="col-md-7">
				
				<div class="form-group">
					<?php echo $form->labelEx($model,'Nombre'); ?>
					<?php echo $form->textField($model,'Nombre',array('class'=>'form-control','size'=>30,'maxlength'=>30, 'data-parsley-required'=>'true')); ?>
					<?php echo $form->error($model,'Nombre'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'Apellido'); ?>
					<?php echo $form->textField($model,'Apellido',array('class'=>'form-control','size'=>40,'maxlength'=>40, 'data-parsley-required'=>'true')); ?>
					<?php echo $form->error($model,'Apellido'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'NombreEmpresa'); ?>
					<?php echo $form->textField($model,'NombreEmpresa',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>
					<?php echo $form->error($model,'NombreEmpresa'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'Email'); ?>
					<?php echo $form->textField($model,'Email',array('class'=>'form-control','size'=>30,'maxlength'=>30, 'data-parsley-required'=>'true', 'data-parsley-type'=>'email')); ?>
					<?php echo $form->error($model,'Email'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'Celular'); ?>
					<?php echo $form->textField($model,'Celular',array('class'=>'form-control','size'=>15,'maxlength'=>15, 'data-parsley-required'=>'true', 'data-parsley-type'=>'integer')); ?>
					<?php echo $form->error($model,'Celular'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'Direccion'); ?>
					<?php echo $form->textField($model,'Direccion',array('class'=>'form-control','size'=>40,'maxlength'=>40, 'data-parsley-required'=>'true')); ?>
					<?php echo $form->error($model,'Direccion'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'Usuario'); ?>
					<?php echo $form->textField($model,'Usuario',array('class'=>'form-control','size'=>50,'maxlength'=>50, 'data-parsley-required'=>'true')); ?>
					<?php echo $form->error($model,'Usuario'); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($model,'Clave'); ?>
					<?php echo $form->passwordField($model,'Clave',array('class'=>'form-control','size'=>60,'maxlength'=>60, 'data-parsley-required'=>'true')); ?>
					<?php echo $form->error($model,'Clave'); ?>
				</div>
				<div class="checkbox">			
					<?php echo CHtml::checkBoxList('Interes',"", CHtml::listData(Interes::model()->findAll(), 'idInteres','NombreIntere'), array('class'=>'checkbox-inline'))?>
				</div>

				<div class="form-group buttons">
					 <?php  echo CHtml::htmlButton('Enviar',array(
			                'onclick'=>'javascript: usuario.CrearUsuario("usuario-form");', // on submit call JS send() function
			                'id'=> 'post-submit-btn', // button id
			                'class'=>'btn btn-success',
			            ));
			    	?>
				</div>
			</div>
		</div>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
<style>
  .thumb {
    height: 150px;
    width: 200px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>
<script>
	jQuery(function(){
		  document.getElementById('files').addEventListener('change', resource.handleFileSelect, false);
	});
</script>