<?php session_start(); ?>
<?php
include '../../Util/config.inc.php';
$db = new Conect_MySql();
if ($_GET['perf'] != 'historia') {
    $sql = "select * from usuario u inner join historia c on u.dniusu='" . $_GET['dniusu'] . "' and u.dniusu=c.dniusu";
} else {
    $sql = "select * from usuario u inner join historia b on u.dniusu='" . $_GET['dniusu'] . "' and u.dniusu=b.dniusu";
}


$query = $db->execute($sql);
$usuario1;
if ($_GET['perf'] == 'historia') {
    while ($datos = $db->fetch_row($query)) {
        //$id = $datos['id_benefi'];
        //$title_id = $row['title_id'];
        $usuario1 = $datos;
    }
} else {
    while ($datos = $db->fetch_row($query)) {
        //$id = $datos['id_cola'];
        //$title_id = $row['title_id'];
        $usuario1 = $datos;
    }
}
?>
<?php
if ($_GET['perf'] != 'Beneficiario') {
    $sql = "select * from usuario u inner join colaborador c on u.dniusu='" . $_GET['dniusu'] . "' and u.dniusu=c.dniusu";
} else {
    $sql = "select * from usuario u inner join beneficiario b on u.dniusu='" . $_GET['dniusu'] . "' and u.dniusu=b.dniusu";
}




//echo $sql;
$query = $db->execute($sql);
$usuario;
if ($_GET['perf'] == 'Beneficiario') {
    while ($datos = $db->fetch_row($query)) {
        //$id = $datos['id_benefi'];
        //$title_id = $row['title_id'];
        $usuario = $datos;
    }
} else {
    while ($datos = $db->fetch_row($query)) {
        //$id = $datos['id_cola'];
        //$title_id = $row['title_id'];
        $usuario = $datos;
    }
}
?>





<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
        <link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
        <link href="../../css/perfil.css" rel="stylesheet" type="text/css"/>

        <!------ Include the above in your HEAD tag ---------->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title>Modificar usuario</title>
        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
        <link href="../../css/main1.css" rel="stylesheet" type="text/css"/>


        <style type="text/css">
            body{
                background-image:url();
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .login100-form-title {
                font-family: Poppins-Regular;
                font-size: 20px;
                color: #555555;
                line-height: 1.2;
                text-transform: uppercase;
                letter-spacing: 2px;
                text-align: center;

                width: 100%;
                display: block;
            }
            .form-style-1 {
                margin:36px auto;
                max-width: 595px;
                padding: 23px 0px 63px 20px;
                font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
                border-style:dashed;
                background-color: white;
            }
            .form-style-1 li {
                padding: 0;
                display: block;
                list-style: none;
                margin: 10px 0 0 0;
            }
            .form-style-1 label{
                margin:0 0 3px 0;
                padding:0px;
                display:block;
                font-weight: bold;
            }
            .form-style-1 input[type=text], 
            .form-style-1 input[type=date],
            .form-style-1 input[type=datetime],
            .form-style-1 input[type=number],
            .form-style-1 input[type=search],
            .form-style-1 input[type=time],
            .form-style-1 input[type=url],
            .form-style-1 input[type=email],
            textarea, 
            select{
                box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                border:1px solid #BEBEBE;
                padding: 7px;
                margin:0px;
                -webkit-transition: all 0.30s ease-in-out;
                -moz-transition: all 0.30s ease-in-out;
                -ms-transition: all 0.30s ease-in-out;
                -o-transition: all 0.30s ease-in-out;
                outline: none;	
            }
            .form-style-1 input[type=text]:focus, 
            .form-style-1 input[type=date]:focus,
            .form-style-1 input[type=datetime]:focus,
            .form-style-1 input[type=number]:focus,
            .form-style-1 input[type=search]:focus,
            .form-style-1 input[type=time]:focus,
            .form-style-1 input[type=url]:focus,
            .form-style-1 input[type=email]:focus,
            .form-style-1 textarea:focus, 
            .form-style-1 select:focus{
                -moz-box-shadow: 0 0 8px #88D5E9;
                -webkit-box-shadow: 0 0 8px #88D5E9;
                box-shadow: 0 0 8px #88D5E9;
                border: 1px solid #88D5E9;
            }
            .form-style-1 .field-divided{
                width: 49%;
            }

            .form-style-1 .field-long{
                width: 100%;
            }
            .form-style-1 .field-select{
                width: 100%;
            }
            .form-style-1 .field-textarea{
                height: 100px;
            }
            .form-style-1 input[type=submit], .form-style-1 input[type=button]{
                background: #4B99AD;
                padding: 8px 15px 8px 15px;
                border: none;
                color: #fff;
            }
            .form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
                background: #4691A4;
                box-shadow:none;
                -moz-box-shadow:none;
                -webkit-box-shadow:none;
            }
            .form-style-1 .required{
                color:red;
            }
            .item-box-blog {
                border: 1px solid #dadada;
                text-align: center;
                z-index: 4;
                padding: 20px;
            }




            .rtable,
            .rtable--flip tbody {
                -webkit-overflow-scrolling: touch;
                background: radial-gradient(left, ellipse, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 75%) 0 center, radial-gradient(right, ellipse, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0) 75%) 100% center;
                background-size: 10px 100%, 10px 100%;
                background-attachment: scroll, scroll;
                background-repeat: no-repeat;
            }

            .rtable td:first-child,
            .rtable--flip tbody tr:first-child {
                background-image: -webkit-gradient(linear, left top, right top, color-stop(50%, white), to(rgba(255, 255, 255, 0)));
                background-image: linear-gradient(to right, white 50%, rgba(255, 255, 255, 0) 100%);
                background-repeat: no-repeat;
                background-size: 20px 100%;
            }

            .rtable td:last-child,
            .rtable--flip tbody tr:last-child {
                background-image: -webkit-gradient(linear, right top, left top, color-stop(50%, white), to(rgba(255, 255, 255, 0)));
                background-image: linear-gradient(to left, white 50%, rgba(255, 255, 255, 0) 100%);
                background-repeat: no-repeat;
                background-position: 100% 0;
                background-size: 20px 100%;
            }

            .rtable th {
                font-size: 11px;
                text-align: left;
                text-transform: uppercase;
                background: #f2f0e6;
            }

            .rtable th,
            .rtable td {
                padding: 6px 12px;
                border: 1px solid #d9d7ce;
            }

            .rtable--flip {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                overflow: hidden;
                background: none;
            }

            .rtable--flip thead {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-negative: 0;
                flex-shrink: 0;
                min-width: -webkit-min-content;
                min-width: -moz-min-content;
                min-width: min-content;
            }

            .rtable--flip tbody {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                position: relative;
                overflow-x: auto;
                overflow-y: hidden;
            }

            .rtable--flip tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: -webkit-min-content;
                min-width: -moz-min-content;
                min-width: min-content;
                -ms-flex-negative: 0;
                flex-shrink: 0;
            }

            .rtable--flip td,
            .rtable--flip th {
                display: block;
            }

            .rtable--flip td {
                background-image: none !important;
                border-left: 0;
            }

            .rtable--flip th:not(:last-child),
            .rtable--flip td:not(:last-child) {
                border-bottom: 0;
            }



        </style>
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
            function mostrarPass() {
                var txtPass = document.getElementById('pass');
                var btn = document.getElementById('btnMostrarPass');
                if (txtPass.type == 'password') {
                    txtPass.type = 'text';
                    btn.innerHTML = 'Ocultar';
                } else {
                    txtPass.type = 'password';
                    btn.innerHTML = 'Mostrar';
                }
            }
            function enviar(op) {

                document.form.action = "../../Controlador/AdministradorControlador.php";
                //                document.form.method = "GET";
                document.form.method = "POST";
                document.form.op.value = op;
                //                document.form.ModificarUsuarioData.value = encoded;
                document.form.submit();
            }
        </script>
        <script>
            function disableperfbox() {
                document.getElementById('perf').disabled = true;
            }
        </script>
        <script>
            function disableCIPradiobutton() {
                var txt = document.getElementById('cip');


                document.getElementById('cipNo').checked;
                txt.value = '';
                txt.disabled = true;
                txt.required = false;
                txt.style = "background-color: lightgrey";

            }


        </script>
        <script>
            function enableCIPradiobutton(val) {
                var txt = document.getElementById('cip');
                if (val == null) {
                    document.getElementById('cipSi').checked;

                    txt.disabled = false;
                    txt.required = true;
                    txt.style = "background-color: white";

                } else {
                    document.getElementById('cipSi').checked;

                    txt.disabled = false;
                    txt.required = true;
                    txt.style = "background-color: white";
                    txt.value = val;
                }
            }
        </script>
        <script>
            function disableCiclo() {
                var txtciclo = document.getElementById('ciclo');
                var e = document.getElementById("gradoacad");
                var opt = e.options[e.selectedIndex].value;
                var especia = document.getElementById('especia');
                var nomuniver = document.getElementById('nomuniver');
                if (opt == '') {
                    especia.value = '';
                    especia.disabled = true;
                    especia.style = "background-color: lightgrey";
                    nomuniver.value = '';
                    nomuniver.disabled = true;
                    nomuniver.style = "background-color: lightgrey";
                    if (opt == 'INGENIERO' || opt == 'GRADUADO' || opt == 'EGRESADO' || opt == '') {
                        txtciclo.disabled = true;
                        txtciclo.value = '';
                        txtciclo.style = "background-color: lightgrey";
                    } else if (opt == 'ESTUDIANTE') {
                        txtciclo.disabled = false;
                        txtciclo.value = '<?php echo $usuario['ciclo']; ?>';
                        txtciclo.style = "background-color: white";
                    }
                } else {
                    especia.value = '<?php echo $usuario['especia']; ?>';
                    especia.style = "background-color: white";
                    nomuniver.value = '<?php echo $usuario['nomuniver']; ?>';
                    nomuniver.style = "background-color: white";
                    if (opt == 'INGENIERO' || opt == 'GRADUADO' || opt == 'EGRESADO' || opt == '') {
                        txtciclo.disabled = true;
                        txtciclo.value = '';
                        txtciclo.style = "background-color: lightgrey";
                    } else if (opt == 'ESTUDIANTE') {
                        txtciclo.disabled = false;
                        txtciclo.value = '<?php echo $usuario['ciclo']; ?>';
                        txtciclo.style = "background-color: white";
                    }
                }
            }
        </script>
        <script>
            function disableDescripdocen() {
                var descripdocen = document.getElementById('descripdocen');
                var sinexperiencialaboral = document.getElementById('sinexperiencialaboral');
                if (sinexperiencialaboral.checked) {
                    descripdocen.disabled = true;
                    descripdocen.value = '';
                    descripdocen.style = "background-color: lightgrey";
                } else {
                    descripdocen.disabled = false;

                    descripdocen.style = "background-color: white";
                }
            }
        </script>
    </head>


    <div class="container" style="width:900px;">
        <div class="fb-profile" >
            <img align="left" class="fb-image-lg" src="../../imgperfil/portada.jpg" alt="Profile image example"/>
            <img align="left" class="fb-image-profile thumbnail" src="../../imagenes/<?php echo $usuario['img_perf']; ?>" alt="Profile image example"/>
            <h1>   <?php echo $usuario['apellidos']; ?></h1>                      
            <h1>   <?php echo $usuario['nombres']; ?></h1>

            <input class="input-group" type="file" name="user_image" accept="image/*" /></td>

        </div>


        <div class="row  item-box-blog ">

            <div class="col   item-box-blog ">
                <h5>Informacion Basica</h5>
                <br>

                <center>
                    <table class="rtable">
                        <thead>
                            <tr>
                                <th>Perfil</th>
                                <th><?php echo $usuario['perf']; ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>DNI</td>
                                <td><?php echo $usuario['dniusu']; ?></td>

                            </tr>
                            <tr>
                                <td>Usuario de acceso</td>
                                <td><?php echo $usuario['usua']; ?></td>

                            </tr>
                            <tr>
                                <td>Apellidos</td>
                                <td><?php echo $usuario['apellidos']; ?></td>

                            </tr>
                            <tr>
                                <td>Provincia de nacimiento</td>
                                <td><?php echo $usuario['provnaci']; ?></td>

                            </tr>
                            <tr>
                                <td>Distrito de nacimiento</td>
                                <td><?php echo $usuario['distnaci']; ?></td>

                            </tr>
                            <tr>
                                <td>Fecha de nacimiento</td>
                                <td> <?php echo $usuario['fecnaci']; ?></td>

                            </tr>
                            <tr>
                                <td>Domicilio actual</td>
                                <td> <?php echo $usuario['domiact']; ?></td>

                            </tr>
                            <tr>
                                <td>Distrito actual</td>
                                <td><?php echo $usuario['distact']; ?></td>

                            </tr>
                        </tbody>
                    </table>
                </center>
            </div>
            <div class="col   item-box-blog ">
                <h5>Historial de Usuario</h5>
                <br><br>
                <center>
                    <table class="rtable">
                        <thead>
                            <tr>
                                <th>participaciones</th>
                                <th>fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $usuario1['fechpar']; ?></td>

                            </tr>
                        </tbody>
                    </table>
                </center>


            </div>

        </div>
<!--        <div class="container">
            <div class="page-header">
                <h1 class="h3">Agregar nueva imágen. <a class="btn btn-default" href="PerfilBeneficiario1.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Mostrar todo </a></h1>
            </div>
            <?php
            if (isset($successMSG)) {
                ?>
                <div class="alert alert-success"> <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong> </div>
                <?php
            }
            ?>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <table class="table table-bordered table-responsive">

                    <tr>
                        <td><label class="control-label">Imágen.</label></td>
                        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default"> <span class="glyphicon glyphicon-save"></span> &nbsp; Guardar Imagen </button></td>
                    </tr>
                </table>
                <center>
                    <button type="button" onclick="document.getElementById('perf').disabled = false;enviar('3')">Grabar</button>
                </center>
            </form>
            <div class="alert alert-info"> <strong>Tutorial Vinculo!</strong> <a href="https://baulcode.com">Ir al Tutorial</a>! </div>
        </div>-->


        <div class="row  item-box-blog">
            <input type="button" onclick="window.location.href = '../Administrador/FrmPrincipalAdmin.php'" value="Volver" />
            <p class="fl_left">   Copyright &copy; 2018 - Derechos reservados - <a href="HTTP://alfabetizaciondigital.info" target="_BLANK">alfabetizaciondigital.info</a></p>

            <br class="clear" />
        </div>
    </div>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>

