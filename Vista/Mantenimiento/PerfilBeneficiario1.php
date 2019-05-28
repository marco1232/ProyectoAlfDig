<?php session_start(); ?>
<?php
include '../../Util/config.inc.php';
$db = new Conect_MySql();
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
        <link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../../css/perfil.css" rel="stylesheet" type="text/css"/>

        <!------ Include the above in your HEAD tag ---------->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <meta charset="UTF-8">
        <title>Modificar usuario</title>
        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
        <link href="../../css/main1.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body{
                background-image:url(../../images/requerimiento.jpg);
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
    <?php
    if (!isset($usuario['cip'])) {
        echo '<body onload="disableperfbox()">';
    } else {
        ?>    
        <?php
        if (($usuario['cip']) == null) {
            echo '<body onload="disableperfbox();disableCIPradiobutton();disableCiclo()">';
        } else {
            echo '<body onload="disableperfbox();enableCIPradiobutton(' . $usuario['cip'] . ');disableCiclo()">';
        }
    }
    ?>


 
    <center>
        <div class="container">
            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="../../imgperfil/portada.jpg" alt="Profile image example"/>
                <img align="left" class="fb-image-profile thumbnail" src="../../imgperfil/perfil.png" alt="Profile image example"/>
                <div class="fb-profile-text">
                    <input type="hidden" name="op">
                    <input type="hidden" name="ModificarUsuarioData">

                </div>
                
                    <h1>   <?php echo $usuario['apellidos']; ?></h1>
        
        
            <h1>    <?php echo $usuario['nombres']; ?></h1>
        

            </div>


        </div> 
    </center> 
    <br><br>
    
    <div class="container" >
        <div class="">
            <h1 >Perfil:  <?php echo $usuario['perf']; ?></h1>
        </div>
        <div class="">
            <h1 class="">DNI:  <?php echo $usuario['dniusu']; ?></h1>
        </div>
        <div class="">
            <h1>Usuario de acceso:  <?php echo $usuario['usua']; ?></h1>
        </div>
        
        <div class="">
            <h1 >Apellidos:   <?php echo $usuario['apellidos']; ?></h1>
        </div>
        <div class="">
            <h1 >Nombres:    <?php echo $usuario['nombres']; ?></h1>
        </div>
        <div class="">
            <h1 >Provincia de nacimiento:   <?php echo $usuario['provnaci']; ?></h1>
        </div>
        <div class="">
            <h1 >Distrito de nacimiento:  <?php echo $usuario['distnaci']; ?></h1>
        </div>
        <div class="">
            <h1 >Fecha de nacimiento:   <?php echo $usuario['fecnaci']; ?></h1>
        </div>
        <div class="">
            <h1 >Domicilio actual:   <?php echo $usuario['domiact']; ?></h1>
        </div>
        <div class="">
            <h1 >Distrito actuall:   <?php echo $usuario['distact']; ?></h1>
        </div>
    </div>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>