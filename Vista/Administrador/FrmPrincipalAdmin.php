<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alfabetizacion Digital</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
        <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/main1.css" rel="stylesheet" type="text/css"/>
        <link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/javascript.js" type="text/javascript"></script>
        <link href="../../css/perfil.css" rel="stylesheet" type="text/css"/>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <script>
            function descargarExcel(idtabla) {
                //Creamos un Elemento Temporal en forma de enlace
                var tmpElemento = document.createElement('a');
                // obtenemos la información desde el div que lo contiene en el html
                // Obtenemos la información de la tabla
                var data_type = 'data:application/vnd.ms-excel';
                var tabla_div = document.getElementById(idtabla);
                var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
                tmpElemento.href = data_type + ', ' + tabla_html;
                //Asignamos el nombre a nuestro EXCEL
                tmpElemento.download = 'Nombre_De_Mi_Excel.xls';
                // Simulamos el click al elemento creado para descargarlo
                tmpElemento.click();
            }
        </script>
        <script>
            function validate(evt, msg) {
                var theEvent = evt || window.event;

                // Handle paste
                if (theEvent.type === 'paste') {
                    key = event.clipboardData.getData('text/plain');
                } else {
                    // Handle key press
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode(key);
                }
                var regex = /[0-9]|\./;
                if (!regex.test(key)) {
                    theEvent.returnValue = false;
                    if (theEvent.preventDefault)
                        theEvent.preventDefault();
                    alert(msg);
                }
            }
        </script>
        <script>
            function classActive() {
                var adm = document.getElementById('liadministracion');
                var mat = document.getElementById('limateriales');
                var his = document.getElementById('lihistorial');
                var rep = document.getElementById('lireportes');
                var prin = document.getElementById('liaccionesprincipales');
                adm.className = '';
                mat.className = '';
                his.className = 'active';
                rep.className = '';
                prin.className = '';
            }
        </script>
    </head>
    <body id="top">
        <div class="wrapper col1">
            <div id="header">
                <img src="../../images/encabezado-aulavirtual.png" alt="" id="logo"/>
                <br class="clear" />
            </div>
        </div>
        <div class="wrapper col2">
            <div id="topbar">
                <div id="topnav" style="width:100%">
                    <ul>
                        <li class="active" style="max-width:250px" id="liaccionesprincipales"><a href="FrmPrincipalAdmin.php">Acciones principales</a></li>
                        <!--<li><a href="pages/style-demo.html">Style Demo</a></li>
                        <li><a href="pages/full-width.html">Full Width</a></li>-->
                        <li id="liadministracion" class><a href="#" onclick="return null" id="">Administracion</a>
                            <ul style="width:150px">
                                <li><a  style="width:180px" id="adminben" href="../Mantenimiento/AdministrarBeneficiarios.php">Beneficiarios</a></li>
                                <li><a  style="width:180px" id="admincol" href="../Mantenimiento/AdministrarColaboradores.php">Colaboradores</a></li>
                            </ul>

                        </li>
                        <li id="limateriales" class><a href="#" onclick="return null">Materiales</a>
                            <ul style="width:150px">
                                <li><a  style="width:180px" id="adminMat" href="javascript:ajax('AjaxControlador','2');javascript:classActive()" onclick="">Mostrar materiales</a></li>

                            </ul>
                        </li>
                        <li id="lihistorial" class><a href="#" onclick="return null">historial de usuario</a>
                            <ul style="width:150px">
                                <li><a  style="width:180px" id="histBene" href="javascript:ajax('AjaxControlador','4');javascript:classActive()" onclick="">historial beneficiador</a></li>
                                <li><a  style="width:180px" id="histColo" href="javascript:ajax('AjaxControlador','5');javascript:classActive()" onclick="">historial colaborador</a></li>
                            </ul>
                        </li>
                        <li id="lireportes" class><a href="#" onclick="return null">Reportes</a>
                            <ul style="width:150px">
                                <li><a  style="width:180px" id="repben" href="../Reportes/ReporteFullBeneficiarios.php">Beneficiarios</a></li>
                                <li><a  style="width:180px" id="repcol" href="../Reportes/ReporteFullColaboradores.php">Colaboradores</a></li>
                            </ul>
                        </li>
                        <!--<li class="last"><a href="#">A Long Link Text</a></li>-->
                        <li class="last"><a href="../../Util/cerrarsesion.php">Cerrar sesion</a></li>
                    </ul>
                </div>
                <br class="clear" />
            </div>
        </div>
        <form name="form">

            <div class="wrapper col5">
                <br><center><h1>Cordial bienvenida: <?php
                        if (isset($_SESSION['datos'])) {
                            echo $_SESSION['datos']['nombres'];
                        }
                        ?></h1></center>
                <input type="hidden" name="op">
                <div id="container" >
                    <div align="center">


                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="#">
                                <img class="img-fluid" src="../../images/icons/supervisor.png"  onclick="document.getElementById('adminben').click()"alt="">
                                <h1>Administrar beneficiarios</h1>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="#">
                                <img class="img-fluid" src="../../images/icons/supervisor.png"  onclick="document.getElementById('admincol').click()" alt="">
                                <h1>Administrar colaboradores</h1>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="#">
                                <img class="img-fluid" src="../../images/icons/reporte.png" onclick = " document.getElementById ('repben'). click () "alt="">
                                <h1>Ver todo sobre los beneficiarios</h1>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-4">
                            <a href="#">
                                <img class="img-fluid" src="../../images/icons/reporte.png" onclick = " document.getElementById ('repcol'). click () " alt="">
                                <h1>Ver todo sobre los colaboradores</h1></a>
                        </div>
                        <br><br><br>
                        
                        <div class="col-md-12 col-sm-12 mb-12">
                            <a href="#">
                            <img class="img-fluid" src="../../images/icons/materiales.png" onclick = " document.getElementById ('adminMat'). click () " alt="">
                            <h1>Materiales</h1></a>
                            
                        </div>
                        
                            <div class="col-md-6 col-sm-6 mb-6">
                            <a href="#">
                                <img class="img-fluid" src="../../images/icons/historia.png" onclick="document.getElementById('histBene').click()" alt="">
                            <h1>Historial de usuario Beneficiador</h1></a>
                            
                        </div>
                        <div class="col-md-6 col-sm-6 mb-6">
                            <a href="#">
                                <img class="img-fluid" src="../../images/icons/historia.png" onclick="document.getElementById('histColo').click()" alt="">
                            <h1>Historial de usuario Colaboradores</h1></a>
                            
                        </div>
                            
                        
                        
                        

                        
                    </div>
                </div>
                <div class="container">

                    <!-- Portfolio Item Heading -->
                    <h1 class="my-4">Alfabetizacion Digital
                        <small>Aula Virtual</small>
                    </h1>

                    <!-- Portfolio Item Row -->
                    <div class="row">

                        <div class="col-md-8">
                            <img class="img-fluid" src="../../images/requerimientos.jpg" alt="">
                        </div>
                        
                        <div class="col-md-4">
                            <h3 class="my-3">Project Description</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                            <h3 class="my-3">Project Details</h3>
                            <ul>
                                <li>Lorem Ipsum</li>
                                <li>Dolor Sit Amet</li>
                                <li>Consectetur</li>
                                <li>Adipiscing Elit</li>
                            </ul>
                        </div>

                    </div>
                    <h3 class="my-4">Alfabetizacion Digital</h3>

                    

                </div>



            </div>

        </div>
    </form>
    <div class="wrapper col7" >
        <div id="copyright">
            <p class="fl_left">Copyright &copy; 2018 - Derechos reservados - <a href="HTTP://alfabetizaciondigital.info" target="_BLANK">alfabetizaciondigital.info</a></p>
            <!--<p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>-->
            <br class="clear" />
        </div>
    </div>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
