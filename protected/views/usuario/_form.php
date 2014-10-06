<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

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

    <article id="imagen">
        <h2>Foto</h2>
		<output id="list"></output>
	    <div class="caption">
	       	<?php echo $form->fileField($model,'Foto',array('size'=>60,'maxlength'=>80,'id'=>'files', 'data-parsley-required'=>'true')); ?>

	    </div>
    </article>

    <article id="form">


		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('class'=>'form-control','size'=>30,'maxlength'=>30, 'data-parsley-required'=>'true')); ?>

		<?php echo $form->labelEx($model,'Apellido'); ?>
		<?php echo $form->textField($model,'Apellido',array('class'=>'form-control','size'=>40,'maxlength'=>40, 'data-parsley-required'=>'true')); ?>

		<?php echo $form->labelEx($model,'NombreEmpresa'); ?>
		<?php echo $form->textField($model,'NombreEmpresa',array('class'=>'form-control','size'=>45,'maxlength'=>45)); ?>

		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('class'=>'form-control','size'=>30,'maxlength'=>30, 'data-parsley-required'=>'true', 'data-parsley-type'=>'email')); ?>

		<?php echo $form->labelEx($model,'Celular'); ?>
		<?php echo $form->textField($model,'Celular',array('class'=>'form-control','size'=>15,'maxlength'=>15, 'data-parsley-required'=>'true', 'data-parsley-type'=>'integer')); ?>

		<?php echo $form->labelEx($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('class'=>'form-control','size'=>40,'maxlength'=>40, 'data-parsley-required'=>'true')); ?>

		<?php echo $form->labelEx($model,'CategoriaUsuario_idCategoriaUsuario'); ?>
		<?php echo $form->dropDownList($model,"CategoriaUsuario_idCategoriaUsuario",CHtml::listData(Categoria::model()->findAll(), 'idCategoria', 'NombreCategoria'), array('empty' => 'Seleccionar','id'=>'ddlCategoria', 'class'=>'form-control', 'data-parsley-required'=>'true'));?>

		<?php echo $form->labelEx($model,'Usuario'); ?>
		<?php echo $form->textField($model,'Usuario',array('class'=>'form-control','size'=>50,'maxlength'=>50, 'data-parsley-required'=>'true')); ?>

		<?php echo $form->labelEx($model,'Clave'); ?>
		<?php echo $form->passwordField($model,'Clave',array('class'=>'form-control','size'=>60,'maxlength'=>60, 'data-parsley-required'=>'true')); ?>
		<?php echo $form->error($model,'Clave'); ?>
		
		<?php echo CHtml::checkBoxList('Interes',"", CHtml::listData(Interes::model()->findAll(), 'idInteres','NombreIntere'), array('class'=>'checkbox-inline'))?>



		 <?php  echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'javascript: usuario.CrearUsuario("usuario-form");', // on submit call JS send() function
                'id'=> 'post-submit-btn', // button id
                'class'=>'btn btn-success',
            ));
    	?>
	</article>

<?php $this->endWidget(); ?>

<style>
  .thumb {
    border: 1px solid #000;
    height: 243px;
    width: 314px;
  }
</style>
<script>
	jQuery(function(){
		  document.getElementById('files').addEventListener('change', resource.handleFileSelect, false);
	});
</script>