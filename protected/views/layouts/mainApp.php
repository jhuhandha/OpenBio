<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>OpenBio</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Stylesheets -->
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/bootstrap.min.css" rel="stylesheet">

		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/style.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/fontello.css">

		<!-- Estilo para las tablas DataTables -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/DataTables/css/datatables.css" media="all">

		<!-- Estilo para el calendario DateTimePicker -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/DatePicker/css/datepicker3.css" media="all">

		<!-- Estilo para las notificaciones -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Pnotify/css/jquery.pnotify.min.css" media="all"/>

		<!-- Estilos para las validaciones con Parsley -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.css" media="all"/>
		
		<!-- Estilos select2 -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Select2/select2-bootstrap.css" media="all"/>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Select2/select2.css" media="all"/>

		<!-- Custom Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style>
		  .thumb {
		    height: 120px;
		    width: 130px;
		  }
		</style>
		<!-- jQuery Version 2.1.1 -->
   		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/jquery-2.1.1.min.js"></script>

	</head>

  	<body cz-shortcut-listen="true">

<section class="dashboard content">
	<div class="container" style="width:95%">

			<div class="row">
				<div class="col-md-3">
					<div class="widget widget-profile">
						<div class="widget-header clearfix">
							<span class="pull-left"><i class="icon-user-male"></i> Perfil</span>
							<div class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog-2"></i> <b class="caret"></b></a>
								<ul class="dropdown-menu">
				                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/login/logout">Cerrar Sesión</a></li>
				                </ul>
							</div>
						</div>
						<div class="profile-head bg-color dark-blue rounded-top">
							<div class="box-padding">
								<img class="avatar img-circle" style="   height: 150px;  width: 200px;" src="<?php echo Yii::app()->request->baseUrl.'/assets/upload/usuarios/'.Yii::app()->user->getState('Url'); ?>">
								<h3 class="normal"><?php echo Yii::app()->user->getState("Nombre"); ?></h3>
							</div>
						</div>

						<div class="bg-color white rounded-bottom">
							<ul class="menu unstyled">
								<?php $modulos = Yii::app()->user->getState("Modulos"); ?>
								<?php foreach ($modulos as $value): ?>
									<li><a href="<?php echo Yii::app()->request->baseUrl."/".$value['url']; ?>"><i class="icon-chart-line"></i><?php echo $value["nombreModulo"];?></a></li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-9 widget widget-messaging">
					<div class="widget-header clearfix">
						<span class="pull-left"><i class="icon-chat-6"></i> Contenido</span>
					</div>
					<?php echo $content; ?>
				</div>
			</div>

			
	</div>
</section>


		<div id="footer" class="bg-color dark-blue">
			<div class="container">
				<div class="box-padding">
						Copyright &copy; <?php echo date('Y'); ?> by HANOIT.<br/>
						All Rights Reserved.<br/>
				</div>
			</div>
		</div>
		<!-- Javascript -->
		<!-- JS:bootstrap-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/bootstrap.min.js"></script>
		
		<!-- Scripts Necesarios para el DatePicker -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/DatePicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/DatePicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>

		<!-- Scripts Necesarios para el DataTables -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/DataTables/js/jquery.dataTables.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/DataTables/js/datatables.js" charset="UTF-8"></script>

		<!-- Scripts Necesarios para el Notificaciones -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Pnotify/js/jquery.pnotify.min.js" charset="UTF-8"></script>
		
		<!-- Librerias js para parsley -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/lng/es.js" charset="UTF-8"></script>
		
		<!-- Librerias select2 -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Select2/select2.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Select2/select2_locale_es.js" charset="UTF-8"></script>

		<!-- Librerias App -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/App.js" charset="UTF-8"></script>
  	</body>
</html>