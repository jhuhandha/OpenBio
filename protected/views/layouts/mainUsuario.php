<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido a OPENBIO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/contacto.css" rel="stylesheet">

    <!-- Estilo para las notificaciones -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Pnotify/css/jquery.pnotify.min.css" media="all"/>

    <!-- Estilos para las validaciones con Parsley -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.css" media="all"/>
        
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/jquery-2.1.1.min.js"></script>
</head>
<body>
    <div id="contain">
        <div id="pre-header">
              <div class="hoja">
                   <nav id="menu">
                        <a href="<?php echo Yii::app()->createUrl('index/'); ?>">Inicio</a>
                   </nav>
             </div>
        </div>

        <header>
            <div class="hoja">
                <figure>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/openbi.png" alt="Logo OPENBI">
                </figure>
            </div>
        </header>

        <section>
            <div class="hoja">
                <h2>COMPARTE CON NOSOTROS</h2>
                <h3>Registrate e ingresa tu empresa y demás asistentes.</h3>
                <?php echo $content; ?>
            </div>
        </section>  
     

    </div>
    <!-- Scripts Necesarios para el Notificaciones -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Pnotify/js/jquery.pnotify.min.js" charset="UTF-8"></script>

    <!-- Librerias js para parsley -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/lng/es.js" charset="UTF-8"></script>
        
    <!-- Librerias App -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/App.js" charset="UTF-8"></script>

</body>
</html>

