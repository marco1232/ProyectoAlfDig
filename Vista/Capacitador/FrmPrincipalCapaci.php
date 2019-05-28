<?php
session_start();
include '../../Util/config.php';
$sql = "select * from usuario u inner join colaborador c on u.dniusu='" . $_SESSION['datos']['dniusu'] . "' and u.dniusu=c.dniusu";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $fila = $row;
}
$_SESSION['datos'] = $fila;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alfabetizacion Digital</title>
        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
        <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css"/>
        <style>
            .blackLetters{
                color: black;
            }
            .rounded{
                border-radius: 15px;
                background: lightskyblue;
                padding: 20px; 
                width: 200px;
                height: 150px; 
            }
            table{
                border:none;
            }
            td{
                border:none;
            }
        </style>
        <script>
            function debeseleccionararchivo(){
                if( document.getElementById("archivo").files.length == 0 ){
                alert("Debe seleccionar un archivo");    return false;

}
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
                        <li class="active" style="max-width:250px"><a href="FrmPrincipalCapaci.php">Acciones principales</a></li>
                        <!--<li><a href="pages/style-demo.html">Style Demo</a></li>
                        <li><a href="pages/full-width.html">Full Width</a></li>
                        <li><a href="#">DropDown</a>
                            <ul>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 2</a></li>
                                <li><a href="#">Link 3</a></li>
                            </ul>
                        </li>
                        <li class="last"><a href="#">A Long Link Text</a></li>-->
                        <li class="last"><a href="../../Util/cerrarsesion.php">Cerrar sesion</a></li>
                    </ul>
                </div>
                <br class="clear" />
            </div>
        </div>

        <div class="wrapper col5">
            
            <div id="container" style="text-align:center">
                
                <div id="content" style="width: 100%">
                    
                    <h1>Cordial bienvenida <?php echo $_SESSION['datos']['nombres'] ?></h1><h2>Subir Tutoriales</h2>
                    <div style="width: 790px;height:330px;margin: auto;padding: 30px;" class="rounded">
                        <form method="post" action="../../Controlador/CapacitadorControlador.php" enctype="multipart/form-data" onsubmit="return debeseleccionararchivo();">
                            <input type="hidden" name="opt">
                            <div style="max-width:790px;margin: auto;margin-left: 10;margin-right: 10px;float:left">
                                <table >
                                    <tr>
                                        <td><label class="blackLetters" style="text-align: center">Titulo</label></td>
                                        <td><input type="text" name="titulo" id="titulo" class="blackLetters" style="width:100%;height:30;"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="blackLetters">Descripcion</label></td>
                                        <td><textarea name="descripcion" id="descripcion" class="blackLetters" cols="91" rows="12"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="file" name="archivo" id="archivo" class="blackLetters" style="width:100%;"></td>
                                    </tr><tr>
                                        <td><button type="submit" name="subir" class="blackLetters" onclick=""
                                                    style="background-color: #059BD8;border-radius: 4px;color: white;
                                                    padding: 8px 27px;text-align: center;text-decoration: none;display: inline-block;
                                                    font-size: 16px;">Subir</button></td>
                                        <tr>
                                       
                                        <td colspan="2"><label class="blackLetters">Solo formato PDF</label></td>
                                    </tr>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>

                <br class="clear" />
            </div>
        </div>
        <div class="wrapper col7">
            <div id="copyright">
                <p class="fl_left">Copyright &copy; 2018 - Derechos reservados - <a href="HTTP://alfabetizaciondigital.info" target="_BLANK">alfabetizaciondigital.info</a></p>
                <!--<p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>-->
                <br class="clear" />
            </div>
        </div>

    </body>
</html>
