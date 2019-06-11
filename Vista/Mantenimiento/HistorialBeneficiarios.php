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
                tmpElemento.download = 'Nombre_De_Mi_Excel.xls';
                // Simulamos el click al elemento creado para descargarlo
                tmpElemento.click();
            }
        </script>
        <script>
            function classActive() {
                var adm = document.getElementById('liadministracion');
                var mat = document.getElementById('limateriales');
                var rep = document.getElementById('lireportes');
                var prin = document.getElementById('liaccionesprincipales');
                adm.className = '';
                mat.className = 'active';
                rep.className = '';
                prin.className = '';
            }
        </script>
    </head>
    <body id="top">

        <form name="form">

            <div class="wrapper col5">

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
                            $sql = "select u.dniusu,u.usua,u.pass,u.perf,u.apellidos,u.nombres,u.estado,b.id_benefi from usuario u inner join beneficiario b on u.dniusu=b.dniusu order by b.id_benefi";
                            $query = $db->execute($sql);
                            $usuarios = array();
                            while ($datos = $db->fetch_row($query)) {
                                $id = $datos['id_benefi'];
                                //$title_id = $row['title_id'];
                                $usuarios[$id] = $datos;
                            }
                            $_SESSION['imc_beneficiarios'] = $usuarios;
                            ?>

                            <table border="1" class="tituloTabla" style="text-align: center" id="customers">
                                <tr>
                                    <th colspan="9" class="tituloTabla">Beneficiarios</th>
                                </tr>

                                <tr>
                                    <td>ID beneficiario</td>
                                    <td>DNI</td>
                                    <td>Nickname</td>
                                    <td>Contraseña</td>
                                    <td>Apellidos</td>
                                    <td>Nombres</td>
                                    <td>Estado</td>
                                    <td>Modificar</td>
                                    <td>Perfil</td>


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
                                    <td><?php echo $filas['estado']; ?></td>
                                    <td><button type="button" onclick="window.location.href = '../Mantenimiento/ModificarUsuario.php?dniusu=<?php echo $filas['dniusu']; ?>&perf=<?php echo $filas['perf']; ?>'">Modificar</button></td>
                                    <td><button type="button" onclick="window.location.href = '../Mantenimiento/PerfilBeneficiario1.php?dniusu=<?php echo $filas['dniusu']; ?>&perf=<?php echo $filas['perf']; ?>'">Perfil</button></td>
                                    <!--<td><button type="button" onclick="window.location.href = 'javascript:ajax('AjaxControlador','6');javascript:classActive()'">ver</button></td>-->


                                <?php } ?>
                            </table>
                        </div>
                    </center>

                </div>
            </div>
        </form>

    </body>
</html>



