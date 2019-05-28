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
                tmpElemento.download = 'tabla.xls';
                // Simulamos el click al elemento creado para descargarlo
                tmpElemento.click();
            }
        </script>
        <script>
            function classActive(){
                var adm=document.getElementById('liadministracion');
                var mat=document.getElementById('limateriales');
                var rep=document.getElementById('lireportes');
                var prin=document.getElementById('liaccionesprincipales');
                adm.className='';
                mat.className='active';
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
                        <li id="liaccionesprincipales" class style="max-width:250px"><a href="../Administrador/FrmPrincipalAdmin.php">Acciones principales</a></li>
                        <!--<li><a href="pages/style-demo.html">Style Demo</a></li>
                        <li><a href="pages/full-width.html">Full Width</a></li>-->
                        <li  id="liadministracion" class><a href="#" onclick="return null">Administracion</a>
                            <ul style="width:150px">
                                <li><a  style="width:180px" id="adminben" href="../Mantenimiento/AdministrarBeneficiarios.php">Beneficiarios</a></li>
                                <li><a  style="width:180px" id="admincol" href="../Mantenimiento/AdministrarColaboradores.php">Colaboradores</a></li>
                            </ul>
                           
                        </li>
                        <li id="limateriales" class><a href="#" onclick="return null">Materiales</a>
                            <ul style="width:150px">
                                <li><a  style="width:180px" id="adminMat" href="javascript:ajax('AjaxControlador','2');javascript:classActive()">Mostrar materiales</a></li>
                            </ul>
                        </li>
                        <li id="lireportes" class="active"><a href="#" onclick="return null">Reportes</a>
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

                    <style>
                        #customers, #customers1 {
                            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }

                        #customers td, #customers th,#customers1 td, #customers1 th {
                            border: 1px solid #ddd;
                            padding: 8px;
                        }

                        #customers tr:nth-child(even){background-color: #f2f2f2;}
                        #customers1 tr:nth-child(even){background-color: #f2f2f2;}
                        #customers tr:hover {background-color: #ddd;}
                        #customers1 tr:hover {background-color: #ddd;}
                        #customers th, #customers1 th {
                            padding-top: 12px;
                            padding-bottom: 12px;
                            text-align: center;
                            background-color: royalblue;
                            color: white;
                        }
                    </style>
                    <CENTER>
                        <div style="width:1000px">
                            <?php
                            include '../../Util/config.inc.php';
                            $db = new Conect_MySql();
                            $sql = "select * from usuario u inner join beneficiario b on u.dniusu=b.dniusu order by id_benefi";
                            $query = $db->execute($sql);
                            $usuarios = array();
                            while ($datos = $db->fetch_row($query)) {
                                $id = $datos['id_benefi'];
                                //$title_id = $row['title_id'];
                                $usuarios[$id] = $datos;
                            }
                            $_SESSION['imc_beneficiarios'] = $usuarios;
                            ?>
                            <div>Buscar por nombres: <input type="text" name="textinput" id="textinput" onkeyup="javascript: ajax1('BuscadorFiltroBeneficiario','1',document.getElementById('textinput').value)"></div>
                            <div id="container1" style="overflow:  auto;padding-bottom: 0px;max-height: 500px;padding-top:  0px;"><br>
                            <table border="1" class="tituloTabla" style="text-align: center;" id="customers">
                                <tr>
                                    <th colspan="30" class="tituloTabla">Beneficiarios</th>
                                </tr>

                                <tr>
                                    
                                    <td>ID beneficiario</td>
                                    <td>DNI</td>
                                    <td>Usuario de acceso</td>
                                    <td>Contraseña</td>
                                    <td>Apellidos</td>
                                    <td>Nombres</td>
                                    <td>Provincia de nacimiento</td>
                                    <td>Distrito de nacimiento</td>
                                    <td>Fecha de nacimiento</td>
                                    <td>Domicilio actual</td>
                                    <td>Distrito actual</td>
                                    <td>Email</td>
                                    <td>Celular</td>
                                    <td>Telefono</td>
                                    <td>Nombre de empresa</td>
                                    <td>Cargo de empresa</td>
                                    <td>Direccion de empresa</td>
                                    <td>Distrito de empresa</td>
                                    <td>Telefono de empresa</td>
                                    <td>Email de empresa</td>
                                    <td>Participacion previa</td>
                                    <td>Objetos en casa</td>
                                    <td>Como se entero de la campaña</td>
                                    <td>Disponibilidad</td>
                                    <td>Estado</td>
                                    <td>Grado de instruccion</td>
                                    <td>Nombre de instituto</td>
                                    <td>Especialidad</td>
                                    <td>Usa ordenador</td>
                                    <td>Conocimientos que desea aprender</td>

                                </tr>
                                <?php foreach ($usuarios as $filas) { ?>
                                    <?php
                                    if ($filas['estado'] == 'INACTIVO') {
                                        echo '<tr class="fondogrilla" style="background-color: #ff000061;">';
                                    } else if ($filas['estado'] == 'PENDIENTE') {
                                        echo '<tr class="fondogrilla" style="background-color: #ffff0059;">';
                                    } else if ($filas['estado'] == 'ACTIVO') {
                                        echo '<tr class="fondogrilla" >';
                                    }
                                    ?>
                                    <td><?php echo $filas['id_benefi']; ?></td>
                                    <td><?php echo $filas['dniusu']; ?></td>
                                    <td><?php echo $filas['usua']; ?></td>
                                    <td><?php echo $filas['pass']; ?></td> 
                                    <td><?php echo $filas['apellidos']; ?></td>
                                    <td><?php echo $filas['nombres']; ?></td>
                                    <td><?php echo $filas['provnaci']; ?></td>
                                    <td><?php echo $filas['distnaci']; ?></td>
                                    <td><?php echo $filas['fecnaci']; ?></td>
                                    <td><?php echo $filas['domiact']; ?></td>
                                    <td><?php echo $filas['distact']; ?></td>
                                    <td><?php echo $filas['email']; ?></td>
                                    <td><?php echo $filas['celu']; ?></td>
                                    <td><?php echo $filas['tele']; ?></td>
                                    <td><?php echo $filas['nomempres']; ?></td>
                                    <td><?php echo $filas['cargempres']; ?></td>
                                    <td><?php echo $filas['dirempres']; ?></td>
                                    <td><?php echo $filas['distempres']; ?></td>
                                    <td><?php echo $filas['telempres']; ?></td>
                                    <td><?php echo $filas['emailempres']; ?></td>
                                    <td><?php echo $filas['participaprevia']; ?></td>
                                    <td><?php echo $filas['objetencasa']; ?></td>
                                    <td><?php echo $filas['enterarcampa']; ?></td>
                                    <td><?php echo $filas['disponibilidad']; ?></td>
                                    <td><?php echo $filas['estado']; ?></td>
                                    <td><?php echo $filas['gradoinstrucion']; ?></td>
                                    <td><?php echo $filas['nominstitu']; ?></td>
                                    <td><?php echo $filas['especia']; ?></td>
                                    <td><?php echo $filas['usaordenador']; ?></td>
                                    <td><?php echo $filas['conociaprender']; ?></td>
                                    

                                    </tr>
<?php } ?>
                            </table>
                            </div>
                        </div>
                    </center>
                    <br>
                    <button type="button" onclick="descargarExcel('customers')">Descargar Excel</button>
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

