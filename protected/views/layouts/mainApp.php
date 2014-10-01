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

		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/sb-admin-2.css">
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/font-awesome-4.1.0/css/font-awesome.min.css">

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

  	<body>

  	    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">OpenBio</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                            <!-- /input-group -->
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo Yii::app()->user->getState("Nombre"); ?>
                        <img class="avatar img-circle" style="   height: 20px;  width: 25px;" src="<?php echo Yii::app()->request->baseUrl.'/assets/upload/usuarios/'.Yii::app()->user->getState('Url'); ?>">
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/login/logout">Cerrar Sesión</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<?php $modulos = Yii::app()->user->getState("Modulos"); ?>
						<?php foreach ($modulos as $value): ?>
							<li><a href="<?php echo Yii::app()->request->baseUrl."/".$value['url']; ?>"><i class="icon-chart-line"></i><?php echo $value["nombreModulo"];?></a></li>
						<?php endforeach ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

		<div id="page-wrapper">
			<br>
			<?php echo $content; ?>
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