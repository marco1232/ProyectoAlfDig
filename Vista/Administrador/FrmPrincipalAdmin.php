<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alfabetizacion Digital</title>
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
            function validate(evt,msg) {
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
              if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
                alert(msg);
              }
            }
        </script>
        <script>
            function classActive(){
                var adm=document.getElementById('liadministracion');
                var mat=document.getElementById('limateriales');
                var his=document.getElementById('lihistorial');
                var rep=document.getElementById('lireportes');
                var prin=document.getElementById('liaccionesprincipales');
                adm.className='';
                mat.className='';
                his.className='active';
                rep.className='';
                prin.className='';
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
                <br><center><h1>Cordial bienvenida: <?php if (isset($_SESSION['datos'])) {
    echo $_SESSION['datos']['nombres'];
} ?></h1></center>
                <input type="hidden" name="op">
                <div id="container" >
                    <div align="center">
                        <h1>Usuarios</h1>
                        <button type="button" style="" onclick="document.getElementById('adminben').click()">Administrar beneficiarios</button>
                        <button type="button" style="" onclick="document.getElementById('admincol').click()">Administrar colaboradores</button>
                        <br><br><br>
                        <h1>Reportes</h1>
                        <button type="button" style="" onclick="document.getElementById('repben').click()">Ver todo sobre los beneficiarios</button>
                        <button type="button" style="" onclick="document.getElementById('repcol').click()">Ver todo sobre los colaboradores</button>
                        <br><br><br>
                        <h1>Materiales</h1>
                        <button type="button" style="" onclick="document.getElementById('adminMat').click()">Ver Materiales</button>
                        <br>
                         <br><br><br>
                        <h1>Historial de usuario</h1>
                        <button type="button" style="" onclick="document.getElementById('histBene').click()">Historial de usuario Beneficiador</button>
                        <button type="button" style="" onclick="document.getElementById('histColo').click()">Historial de usuario Colaboradores</button>
                        <br>
                        

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
