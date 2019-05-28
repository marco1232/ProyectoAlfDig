<?php 
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alfabetizacion Digital</title>
        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
<!--        <link href="../../css/PrincipalPartic.css" rel="stylesheet" type="text/css"/>-->
<link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css"/>
<link href="../../css/main1.css" rel="stylesheet" type="text/css">
<link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<style>
    .blackLetters{
        color: black
    }
</style>
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
                        <li class="active" style="max-width:250px"><a href="FrmPrincipalPartic.php">Acciones principales </a></li>
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
            <div id="container" >
                
                <?php
        include '../../Util/config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from materiales";
            $query = $db->execute($sql);
            $manuales=array();$i;
            while($datos=$db->fetch_row($query)){
                $id = $datos['idmat'];
                //$title_id = $row['title_id'];
                    $manuales[$id] = $datos;
                ?>
                
          <?php  } ?>
                
               
                <h1>Cordial bienvenida: <?php if(isset($_SESSION['datos'])){echo $_SESSION['datos']['nombres'];}?></h1><h2 style="text-align: center;font:condensed 120% sans-serif;font-size: 40"><b> Manuales </b></h2>
                  
                <div class="portlet-body">
                    <div class="journal-content-article" id="article_10132_10157_84410301_4.8">
                        <div>
                            <!-- curso 1 -->
                            <div class="coursetop list3 moved" style="width:30%;float:left;max-height: 624px;height:624px" onclick="">
                               
                                <div>
                                    <center>
                                        <a href="../../archivos/<?php echo $manuales[1]['nommat']?>" target="_blank"><img src="../../images/word1.jpg" alt="" /></a>
                                    </center>
                                </div>
                                
                                <div>
                                    <div class="curs-title">
                                        <center>
                                            <div class="name"  style="min-height: 51px"><b><i><?php echo $manuales[1]['titulo'] ?></i></b></div>
                                        
                                        <div class="name" style="min-height: 163px"><?php echo $manuales[1]['descripcion'] ?></div>
                                        <div>
                                            
                                        
                                        <a style="    margin: 15px;" href="../../archivos/<?php echo $manuales[1]['nommat']?>" target="_blank" download>DESCARGAR</a>
                                        </div>
                                        </center>
                                    </div>
                                </div>
                                
                            </div>	
                            <!--curso 2 -->
                            <div class="coursetop list3 moved" style="width:30%;float:left;max-height: 624px;height:624px" onclick="">
                                <div>
                                    <center>
                                        <a  href="../../archivos/<?php echo $manuales[2]['nommat']?>" target="_blank"><img src="../../images/powerpoint1.jpg" alt="" /></a>
                                    </center>
                                </div>
                                
                                <div>
                                    <div class="curs-title">
                                         <center>
                                        <div class="name"  style="min-height: 51px"><b><i><?php echo $manuales[2]['titulo'] ?></i></b></div>  
                                        
                                        <div class="name" style="min-height: 163px"><?php echo $manuales[2]['descripcion'] ?></div>
                                        <div>
                                            
                                        
                                        <a style="    margin: 15px;" href="../../archivos/<?php echo $manuales[2]['nommat']?>" target="_blank" download>DESCARGAR</a>
                                        </div>
                                         </center>
                                    </div>
                                </div>
                                
                            </div>	
                            <!-- curso 3 -->
                            <div class="coursetop list3 moved" style="width:30%;float:left;max-height: 624px;height:624px" onclick="">
                                <div class="">
                                    <center>
                                        <a  href="../../archivos/<?php echo $manuales[3]['nommat']?>" target="_blank"><img src="../../images/excel.jpg" alt=""/></a>
                                    </center>
                                </div>
                                
                                <div>
                                    <div class="curs-title">
                                        <center>
                                        <div class="name" style="min-height: 51px"><b><i><?php echo $manuales[3]['titulo'] ?></i></b></div>
                              
                                        <div class="name" style="min-height: 163px"><?php echo $manuales[3]['descripcion'] ?></div>
                                        <div>
                                        
                                        
                                        <a style="    margin: 15px;" href="../../archivos/<?php echo $manuales[3]['nommat']?>" target="_blank" download>DESCARGAR</a>
                                        </div>
                                        </center>
                                    </div>
                                </div>
                                
                            </div>	
                        </div>

                        <script>
                            mostrarRRSS('list3', 'coursego', 'name');
                        </script>
                    </div>
                    <div class="entry-links">
                    </div>
                </div>
                <br class="clear" />
               
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
