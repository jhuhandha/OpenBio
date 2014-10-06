<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido a OPENBIO</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/css/principal.css" rel="stylesheet">

    <!-- Estilos para las validaciones con Parsley -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.css" media="all"/>
</head>
<body>
    <div id="contain1">
        <div id="pre-header">
              <div class="hoja">
                   <nav id="menu">
                        <a href="#">Información</a>
                        <a href="#">Charlas</a>
                        <a href="#">Conferencias</a>
                        <a href="#">Agendas</a>
                    </nav>

                   <?php echo $content; ?>
                   
             </div>
        </div>

        <header>
            <div class="hoja">
                <figure>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/bio.png" alt="Logo BIO 2014">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/openbi.png" alt="Logo OPENBI">
                </figure>
            </div>
        </header>

        <nav id="menu2">
            <div class="hoja">
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/navInformacion.png"><span id="uno">Información</span></a>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/navCharlas.png"><span id="dos">Charlas</span></a>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/navComferencias.png"><span id="tres">Conferencias</span></a>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/navAgenda.png"><span id="cuatro">Agenda</span></a>
            </div>
        </nav>
    </div>

        <h2 id="part">PARTNERS</h2>

        <section id="contain2">
            <div class="hoja">
                <article id="S">
                </article>
            </div>
        </section>

        <section id="contain3">
            <div class="hoja">
                <article id="G">
                </article>
            </div>
        </section>

        <aside>
            <div class="hoja">
                <article id="orgaPor">
                    <h2>organizado por:</h2>

                    <figure><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/bio.png"></figure>
                    <div class="linea1"></div>
                    <figcaption id="uno">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</figcaption>

                    <figure><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/Logo-eafit-03.png"></figure>
                    <div class="linea2"></div>
                    <figcaption id="dos">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</figcaption>

                    <figure><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/rutan-logo.png"></figure>
                    <div class="linea3"></div>
                    <figcaption id="tres">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.</figcaption>

                    <figure><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/img29517.jpg"></figure>
                    <figcaption id="cuatro">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.</figcaption>

                </article>

                <article id="asicioPor">
                    <h2>en asocio con:</h2>
                    
                        <figure><a href="http://www.superbac.com.br/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/superbac.png"></a></figure>

                        <figure><a href="http://www.ecofloracares.com/es/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/logo-1.jpg"></a></figure>

                        <figure><a href="http://www.ecofloragro.com/es/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/LogoEcoflora2.png"></a></figure>

                        <figure><a href="http://www.ces.edu.co/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/CES azul vertical_2009.jpg"></a></figure>
                        
                        <figure><a href="http://www.udem.edu.co/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/universidad-de-medellin-logo.jpg"></a></figure>

                        <figure><a href="http://unal.edu.co/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/Escudo_UN.png"></a></figure>

                        <figure><a href="http://www2.udea.edu.co/webmaster/indexudea.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/img/udea.png"></a></figure>
                    </figure>
                </article>
            </div>
        </aside>

        <footer>
            <div id="logo"></div>
            <div class="hoja">
            </div>
        </footer>

    </div>
    <!-- jQuery Version 2.1.1 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/app/js/jquery-2.1.1.min.js"></script>
    <!-- Librerias js para parsley -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/parsley.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Parsley/lng/es.js" charset="UTF-8"></script> 
</body>
</html>