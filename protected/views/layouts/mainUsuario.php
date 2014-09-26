
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apropia</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/agency.css" rel="stylesheet">

    <!-- Estilo para las notificaciones -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Pnotify/css/jquery.pnotify.min.css" media="all"/>

    <!-- Estilos para las validaciones con Parsley -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.css" media="all"/>
        

    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- jQuery Version 2.1.1 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/jquery-2.1.1.min.js"></script>


</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Apropia!</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



    <!-- Services Section -->
    <section id="hacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Comparte con Nosotros</h2>
                   
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-18">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-group fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Registrate</h4>
                    <p class="text-muted">Registrate e ingresa tu empresa y demás asistentes.</p>
                    
                    <?php echo $content; ?>

                </div>
               
               
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Derechos reservados &copy; Apropia 2014</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        Copyright &copy; <?php echo date('Y'); ?> by HANOIT.<br/>
						All Rights Reserved.<br/>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/classie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/cbpAnimatedHeader.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/agency.js"></script>

    <!-- Scripts Necesarios para el Notificaciones -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Pnotify/js/jquery.pnotify.min.js" charset="UTF-8"></script>

    <!-- Librerias js para parsley -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/lng/es.js" charset="UTF-8"></script>
        

    <!-- Librerias App -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/App.js" charset="UTF-8"></script>

</body>

</html>

