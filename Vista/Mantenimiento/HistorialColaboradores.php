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
        
        <form name="form">

            
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
                            $db1 = new Conect_MySql();
                            $sql1 = "select u.dniusu,u.usua,u.pass,u.perf,u.apellidos,u.nombres,u.estado,c.id_cola from usuario u inner join colaborador c on u.dniusu=c.dniusu order by c.id_cola";
                            $query1 = $db1->execute($sql1);
                            $usuarios1 = array();
                            while ($datos1 = $db1->fetch_row($query1)) {
                                $id1 = $datos1['id_cola'];
                                //$title_id = $row['title_id'];
                                $usuarios1[$id1] = $datos1;
                            }
                            $_SESSION['imc_colaboradores'] = $usuarios1;
                            ?>
                            <table border="1" class="tituloTabla" style="text-align: center" id="customers1" >
                                <tr>
                                    <th colspan="10" class="tituloTabla">Colaboradores</th>
                                </tr>

                                <tr>
                                    <td>ID colaborador</td>
                                    <td>DNI</td>
                                    <td>Nickname</td>
                                    <td>Contraseña</td>
                                    <td>Perfil</td>
                                    <td>Apellidos</td>
                                    <td>Nombres</td>
                                    <td>Estado</td>
                                    <td>Modificar</td>
                                    <td>Perfil</td>

                                </tr>
                                <?php
                                foreach ($usuarios1 as $filas1) {
                                    if ($filas1['perf'] != 'Administrador') {
                                        ?>
                                        <?php
                                        if ($filas1['estado'] == 'INACTIVO') {
                                            echo '<tr class="fondogrilla" style="background-color: #ff000061;">';
                                        } else if ($filas1['estado'] == 'PENDIENTE') {
                                            echo '<tr class="fondogrilla" style="background-color: #ffff0059;">';
                                        } else if ($filas1['estado'] == 'ACTIVO') {
                                            echo '<tr class="fondogrilla" >';
                                        }
                                        ?>
                                        <td><?php echo $filas1['id_cola']; ?></td>
                                        <td><?php echo $filas1['dniusu']; ?></td>
                                        <td><?php echo $filas1['usua']; ?></td>
                                        <td><?php echo $filas1['pass']; ?></td> 
                                        <td><?php echo $filas1['perf']; ?></td> 
                                        <td><?php echo $filas1['apellidos']; ?></td>
                                        <td><?php echo $filas1['nombres']; ?></td>
                                        <td><?php echo $filas1['estado']; ?></td>
                                        <td><button type="button"  onclick="window.location.href = '../Mantenimiento/ModificarUsuario.php?dniusu=<?php echo $filas1['dniusu']; ?>&perf=<?php echo $filas1['perf']; ?>'">Modificar</button></td>
                                        <td><button type="button"><a  style="width:180px" id="histBene" href="javascript:ajax('AjaxControlador','7');javascript:classActive()" onclick="">Ver</button></td>

                                        </tr>
    <?php
    }
}
?>
                            </table>
                            
                        </div>
                    </center>

                </div>
            </div>
        </form>
        
        <script src="../../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
