<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos <span class="required">*</span> requeridos.</p>
		
		<div class="row">
			<div class="col-md-4">
				<div>
			      <output id="list"></output>
			      <div class="caption">
			        <?php echo $form->labelEx($model,'Foto'); ?>
					<?php echo $form->fileField($model,'Foto',array('size'=>60,'maxlength'=>80,'id'=>'files')); ?>
					<?php echo $form->error($model,'Foto'); ?>
			      </div>
			    </div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo $form->labelEx($model,'NombreProducto'); ?>
							<?php echo $form->textField($model,'NombreProducto',array('id'=>'txtNombre','size'=>60,'maxlength'=>60,'class'=>'form-control','data-parsley-required'=>'true')); ?>
							<?php echo $form->error($model,'NombreProducto'); ?>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<?php echo $form->labelEx($model,'Categoria_idCategoria'); ?>
							<?php echo $form->dropDownList($model,"Categoria_idCategoria",CHtml::listData(Categoria::model()->findAll(), 'idCategoria', 'NombreCategoria'), array('empty' => 'Seleccionar','id'=>'ddlCategoria', 'class'=>'form-control', 'data-parsley-required'=>'true'));?>
							<?php echo $form->error($model,'Categoria_idCategoria'); ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" name="txtCodigo" id="txtCodigo">
							<?php echo $form->labelEx($model,'DescripcionTecnologia'); ?>
							<?php echo $form->textArea($model,'DescripcionTecnologia',array('id'=>'txtDescripcionTecnologia', 'data-parsley-required'=>'true' , 'rows'=>8, 'cols'=>100,'class'=>'form-control', 'style'=>'resize:none')); ?>
							<?php echo $form->error($model,'DescripcionTecnologia'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'PalabrasClaves'); ?>
					<?php echo $form->textArea($model,'PalabrasClaves',array('id'=>'txtPalabrasClaves', 'data-parsley-required'=>'true' , 'rows'=>8, 'cols'=>100,'class'=>'form-control', 'style'=>'resize:none')); ?>
					<?php echo $form->error($model,'PalabrasClaves'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'EstadoDesarrollo'); ?>
					<?php echo $form->textArea($model,'EstadoDesarrollo',array('id'=>'txtEstadoDesarrollo', 'data-parsley-required'=>'true' , 'rows'=>8, 'cols'=>100,'class'=>'form-control', 'style'=>'resize:none')); ?>
					<?php echo $form->error($model,'EstadoDesarrollo'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'EstadoPL'); ?>
					<?php echo $form->textArea($model,'EstadoPL',array('id'=>'txtEstadoPL', 'data-parsley-required'=>'true' , 'rows'=>8, 'cols'=>100,'class'=>'form-control', 'style'=>'resize:none')); ?>
					<?php echo $form->error($model,'EstadoPL'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($model,'InteresComercial'); ?>
					<?php echo $form->textArea($model,'InteresComercial',array('id'=>'txtInteresComercial', 'data-parsley-required'=>'true' , 'rows'=>8, 'cols'=>100,'class'=>'form-control', 'style'=>'resize:none')); ?>
					<?php echo $form->error($model,'InteresComercial'); ?>
				</div>
			</div>
		</div>		
			<div class="form-group buttons">
				 <?php  echo CHtml::htmlButton('Enviar',array(
		                'onclick'=>'javascript: productos.CrearProducto("productos-form");', // on submit call JS send() function
		                'id'=> 'btnGuardar', // button id
		                'class'=>'btn btn-success',
		            ));
		    	?>
		    	<?php  echo CHtml::htmlButton('Modificar',array(
		                 // on submit call JS send() funct
		                'class'=>'btn btn-warning',
		                'id'=>'btnModificar',
		                'disabled'=>true
		            ));
		    	?>
		    	<?php  echo CHtml::htmlButton('Listar',array(
		                'onclick'=>'javascript: $("#modalProductos").modal();', // on submit call JS send() funct
		                'class'=>'btn btn-default'
		            ));
		    	?>
			</div>


<?php $this->endWidget(); ?>


</div><!-- form -->


<div  id="modalProductos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 90%;">
    <div class="modal-content">
      <div id="dynamicProductos" style="padding:5px">
      </div>
    </div>
  </div>
</div>


<style>
  .thumb {
 border: 1px solid #000;
    height: 220px;
    margin: 10px 5px 0 0;
    width: 340px;
  }
</style>
<script>
	jQuery(function(){
			productos.ListaProductos();
		  document.getElementById('files').addEventListener('change', resource.handleFileSelect, false);
	});
</script>