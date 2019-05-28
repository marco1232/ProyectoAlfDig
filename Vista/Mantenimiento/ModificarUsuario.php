<?php session_start();?>
<?php
    include '../../Util/config.inc.php';
    $db = new Conect_MySql();
    if($_GET['perf']!='Beneficiario'){
    $sql = "select * from usuario u inner join colaborador c on u.dniusu='".$_GET['dniusu']."' and u.dniusu=c.dniusu";
    }else{
        $sql="select * from usuario u inner join beneficiario b on u.dniusu='".$_GET['dniusu']."' and u.dniusu=b.dniusu";
    }
    //echo $sql;
    $query = $db->execute($sql);
    $usuario;
    if($_GET['perf']=='Beneficiario'){
    while ($datos = $db->fetch_row($query)) {
        //$id = $datos['id_benefi'];
        //$title_id = $row['title_id'];
        $usuario = $datos;
    }}else{
        while ($datos = $db->fetch_row($query)) {
        //$id = $datos['id_cola'];
        //$title_id = $row['title_id'];
        $usuario = $datos;
    }}
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar usuario</title>
        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
        <link href="../../css/main1.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        body{
            background-image:url(../../images/requerimientos.jpg);
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
            function mostrarPass(){
                var txtPass=document.getElementById('pass');
                var btn=document.getElementById('btnMostrarPass');
                if(txtPass.type=='password'){
                    txtPass.type='text';
                    btn.innerHTML='Ocultar';
                }else{
                    txtPass.type='password';
                    btn.innerHTML='Mostrar';
                }
            }
            function enviar(op){

                document.form.action = "../../Controlador/AdministradorControlador.php";
//                document.form.method = "GET";
                document.form.method = "POST";
                document.form.op.value = op;
//                document.form.ModificarUsuarioData.value = encoded;
                document.form.submit();
            }
        </script>
        <script>
            function disableperfbox(){
                document.getElementById('perf').disabled=true;   
            } 
        </script>
        <script>
            function disableCIPradiobutton(){
                var txt=document.getElementById('cip');
                
            
                document.getElementById('cipNo').checked;
                    txt.value='';
                    txt.disabled=true;
                    txt.required=false;
                    txt.style="background-color: lightgrey";                
                
            }
            
            
        </script>
        <script>
            function enableCIPradiobutton(val){
                var txt=document.getElementById('cip');
                if(val==null){
                    document.getElementById('cipSi').checked;
                
                    txt.disabled=false;
                    txt.required=true;
                    txt.style="background-color: white";
                    
                }else{
                    document.getElementById('cipSi').checked;
                
                    txt.disabled=false;
                    txt.required=true;
                    txt.style="background-color: white";
                    txt.value=val;
                }
            }
        </script>
        <script>
            function disableCiclo(){
                var txtciclo=document.getElementById('ciclo');
                var e = document.getElementById("gradoacad");
                var opt = e.options[e.selectedIndex].value;
                var especia =document.getElementById('especia');
                var nomuniver =document.getElementById('nomuniver');
                if(opt==''){
                    especia.value='';
                    especia.disabled=true;
                    especia.style="background-color: lightgrey";
                    nomuniver.value='';
                    nomuniver.disabled=true;
                    nomuniver.style="background-color: lightgrey";
                if(opt=='INGENIERO' || opt=='GRADUADO' || opt=='EGRESADO' || opt==''){
                    txtciclo.disabled=true;
                    txtciclo.value='';
                    txtciclo.style="background-color: lightgrey";
                }else if(opt=='ESTUDIANTE'){
                    txtciclo.disabled=false;
                    txtciclo.value='<?php echo $usuario['ciclo']; ?>';
                    txtciclo.style="background-color: white";
                }
                }else{
                    especia.value='<?php echo $usuario['especia']; ?>';
                    especia.style="background-color: white";
                    nomuniver.value='<?php echo $usuario['nomuniver']; ?>';
                    nomuniver.style="background-color: white";
                    if(opt=='INGENIERO' || opt=='GRADUADO' || opt=='EGRESADO' || opt==''){
                    txtciclo.disabled=true;
                    txtciclo.value='';
                    txtciclo.style="background-color: lightgrey";
                }else if(opt=='ESTUDIANTE'){
                    txtciclo.disabled=false;
                    txtciclo.value='<?php echo $usuario['ciclo']; ?>';
                    txtciclo.style="background-color: white";
                }
                }
            }
        </script>
        <script>
            function disableDescripdocen(){
                var descripdocen=document.getElementById('descripdocen');
                var sinexperiencialaboral=document.getElementById('sinexperiencialaboral');
                if(sinexperiencialaboral.checked){
                    descripdocen.disabled=true;
                    descripdocen.value='';
                    descripdocen.style="background-color: lightgrey";
                }else{
                    descripdocen.disabled=false;
                    
                    descripdocen.style="background-color: white";
                }
            }
        </script>
    </head>
     <?php if(!isset($usuario['cip'])){echo '<body onload="disableperfbox()">';}else{?>    
     <?php if(($usuario['cip'])==null){echo '<body onload="disableperfbox();disableCIPradiobutton();disableCiclo()">';}else{echo '<body onload="disableperfbox();enableCIPradiobutton('.$usuario['cip'].');disableCiclo()">';}}?>
        
    
        <form name="form" >
            <ul class="form-style-1">
                <span class="login100-form-title p-b-34">
                    MODIFICAR USUARIO
                </span>
                <br>
                <input type="hidden" name="op">
                <input type="hidden" name="ModificarUsuarioData">
                <?php if ($usuario['perf'] == 'Beneficiario') { ?>
                    <li>   
                        <label>DNI</label>
                        <input type="text" id="dniusu" class="field-divided" name="dniusu" maxlength="8" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo DNI')" value="<?php echo $usuario['dniusu']; ?>"><br>
                    </li>
                    <li>
                        <label>Usuario de acceso</label>
                        <input type="text" id="usua" name="usua" class="field-divided" value="<?php echo $usuario['usua']; ?>"><br>
                    </li>
                    <li>
                        <label>Contraseña</label>
                        <input type="password" id="pass" name="pass" class="field-divided" style="margin-bottom: 3px;margin-top: 3px;padding-bottom: 8px;padding-top: 8px;padding-left: 5px;padding-right: 5px" value="<?php echo $usuario['pass']; ?>">  <button type="button" id="btnMostrarPass" onclick="mostrarPass()" style="width: 95px">Mostrar</button><br> 
                    </li>
                    <li>
                        <label>Perfil</label>
                        <input type="text" id="perf" name="perf" class="field-divided" style="background-color: lightgray" value="<?php echo $usuario['perf']; ?>"><br>
                    </li>
                    <li>
                        <label>Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="field-divided" value="<?php echo $usuario['apellidos']; ?>"><br>
                    </li>
                    <li>
                        <label>Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="field-divided" value="<?php echo $usuario['nombres']; ?>"><br>
                    </li>
                    <li>
                        <label>Provincia de nacimiento</label>
                        <input type="text" id="provnaci" name="provnaci" class="field-divided" value="<?php echo $usuario['provnaci']; ?>"><br>
                    </li>
                    <li>
                        <label>Distrito de nacimiento</label>
                        <input type="text" id="distnaci" name="distnaci" class="field-divided" value="<?php echo $usuario['distnaci']; ?>"><br>
                    </li>
                    <li>
                        <label>Fecha de nacimiento</label>
                        <input type="date" id="fecnaci" name="fecnaci" class="field-divided" value="<?php echo $usuario['fecnaci']; ?>"><br>
                    </li>
                    <li>
                        <label>Domicilio actual</label>
                        <input type="text" id="domiact" name="domiact" class="field-divided" value="<?php echo $usuario['domiact']; ?>"><br>
                    </li>
                    <li>
                        <label>Distrito actual</label>
                        <input type="text" id="distact" name="distact" class="field-divided" value="<?php echo $usuario['distact']; ?>"><br>
                    </li>
                    <li>
                        <label>Email</label>
                        <input type="text" id="email" name="email" class="field-divided" value="<?php echo $usuario['email']; ?>"><br>
<!--                        <select>
                            <option>@outlook.com</option>
                            <option>@gmail.com</option>
                            <option>@hotmail.com</option>
                            <option>@outlook.com</option>
                            <option>@outlook.com</option>
                        </select>-->
                    </li>
                    <li>
                        <label>Celular</label>
                        <input type="text" id="celu" name="celu" class="field-divided" maxlength="9" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Celular')" value="<?php echo $usuario['celu']; ?>"><br>
                    </li>
                    <li>
                        <label>Telefono</label>
                        <input type="text" id="tele" name="tele" class="field-divided" maxlength="7" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Telefono')" value="<?php echo $usuario['tele']; ?>"><br>
                    </li>
                    <li> 
                        <label>Nombre de su empresa <font color='red'>*</font></label>
                        <input type="text" id="nomempres" name="nomempres" class="field-divided" value="<?php echo $usuario['nomempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Cargo en la empresa <font color='red'>*</font></label>
                        <input type="text" id="cargempres" name="cargempres" class="field-divided" value="<?php echo $usuario['cargempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Direccion de la empresa <font color='red'>*</font></label>
                        <input type="text" id="dirempres" name="dirempres" class="field-divided" value="<?php echo $usuario['dirempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Distrito de la empresa <font color='red'>*</font></label>
                        <input type="text" id="distempres" name="distempres" class="field-divided" value="<?php echo $usuario['distempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Telefono de la empresa <font color='red'>*</font></label>
                        <input type="text" id="telempres" name="telempres" class="field-divided" maxlength="7" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Telefono')" value="<?php echo $usuario['telempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Email de la empresa <font color='red'>*</font></label>
                        <input type="text" id="emailempres" name="emailempres" class="field-divided" value="<?php echo $usuario['emailempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>¿Ha participado previamente?</label>
                        
                        <?php if($usuario['participaprevia']=='Si'){echo 'Si <input type="radio" id="participapreviaSi" name="participaprevia" class="field-divided" value="Si" style="max-width: 50px;" checked><br> No <input type="radio" id="participapreviaNo" name="participaprevia" class="field-divided" value="No" style="max-width: 50px;" >';}else{ echo 'Si <input type="radio" id="participapreviaSi" name="participaprevia" class="field-divided" value="Si" style="max-width: 50px;" ><br> No <input type="radio" id="participapreviaNo" name="participaprevia" class="field-divided" value="No" style="max-width: 35px;" checked>';}?>
                    </li>
                    <li>
                        <label id="objetencasa">Marque si tiene en casa:</label>
                        <?php if(substr($usuario['objetencasa'], 0,1)=='1'){echo '<input type="checkbox" name="chkCompu" id="chkCompu" value="1" checked/> Computadora';}else{echo '<input type="checkbox" name="chkCompu" id="chkCompu" value="1" /> Computadora';}?>
                        <?php if(substr($usuario['objetencasa'], 1,1)=='1'){echo '<input type="checkbox" name="chkLap" id="chkLap" value="1" checked/> Laptop';}else{echo '<input type="checkbox" name="chkLap" id="chkLap" value="1" /> Laptop';}?>
                        <?php if(substr($usuario['objetencasa'], 2,1)=='1'){echo '<input type="checkbox" name="chkInter" id="chkInter" value="1" checked/> Internet';}else{echo '<input type="checkbox" name="chkInter" id="chkInter" value="1" /> Internet';}?>
                        <?php if(substr($usuario['objetencasa'], 3,1)=='1'){echo '<input type="checkbox" name="chkCel" id="chkCel" value="1" checked/> Celular';}else{echo '<input type="checkbox" name="chkCel" id="chkCel" value="1" /> Celular';}?>
                    </li>
                    <li>
                    <label id="enterocampana">Como se enteró de la Campaña(marque una o más alternativas): </label>
                    <?php if(substr($usuario['enterarcampa'], 0,1)=='1'){echo '<input type="checkbox" name="chkFacebook" id="chkFacebook" value="1" checked /> Facebook';}else{echo '<input type="checkbox" name="chkFacebook" id="chkFacebook" value="1" /> Facebook';}?>
                    <?php if(substr($usuario['enterarcampa'], 1,1)=='1'){echo '<input type="checkbox" name="chkEmail" id="chkEmail" value="1" checked/> E-mail';}else{echo '<input type="checkbox" name="chkEmail" id="chkEmail" value="1" /> E-mail';} ?>
                    <?php if(substr($usuario['enterarcampa'], 2,1)=='1'){echo '<input type="checkbox" name="chkRadio" id="chkRadio" value="1" checked/> Radio';}else{echo '<input type="checkbox" name="chkRadio" id="chkRadio" value="1" /> Radio';} ?>
                    <?php if(substr($usuario['enterarcampa'], 3,1)=='1'){echo '<input type="checkbox" name="chkDiario" id="chkDiario" value="1" checked/> Diario';}else{echo '<input type="checkbox" name="chkDiario" id="chkDiario" value="1" /> Diario';} ?>
                    <?php if(substr($usuario['enterarcampa'], 4,1)=='1'){echo '<input type="checkbox" name="chkAfiche" id="chkAfiche" value="1" checked/> Afiche';}else{echo '<input type="checkbox" name="chkAfiche" id="chkAfiche" value="1" /> Afiche';} ?>
                    <?php if(substr($usuario['enterarcampa'], 5,1)=='1'){echo '<input type="checkbox" name="chkVolante" id="chkVolante" value="1" checked/> Volante';}else{echo '<input type="checkbox" name="chkVolante" id="chkVolante" value="1" /> Volante';} ?>
                    <?php if(substr($usuario['enterarcampa'], 6,1)=='1'){echo '<input type="checkbox" name="chkVideo" id="chkVideo" value="1" checked/> Video';}else{echo '<input type="checkbox" name="chkVideo" id="chkVideo" value="1" /> Video';} ?>
                    <?php if(substr($usuario['enterarcampa'], 7,1)=='1'){echo '<input type="checkbox" name="chkConferencia" id="chkConferencia" value="1" checked/> Conferencia/Charla';}else{echo '<input type="checkbox" name="chkConferencia" id="chkConferencia" value="1" /> Conferencia/Charla';} ?>
                    <?php if(substr($usuario['enterarcampa'], 8,1)=='1'){echo '<input type="checkbox" name="chkCIP" id="chkCIP" value="1" checked/> CIP';}else{echo '<input type="checkbox" name="chkCIP" id="chkCIP" value="1" /> CIP';} ?>
                    <?php if(substr($usuario['enterarcampa'], 9,1)=='1'){echo '<input type="checkbox" name="chkUniversidad" id="chkUniversidad" value="1" checked/> Universidad';}else{echo '<input type="checkbox" name="chkUniversidad" id="chkUniversidad" value="1" /> Universidad';} ?>
                    <?php if(substr($usuario['enterarcampa'], 10,1)=='1'){echo '<input type="checkbox" name="chkMunicipalidad" id="chkMunicipalidad" value="1" checked/> Municipalidad';}else{echo '<input type="checkbox" name="chkMunicipalidad" id="chkMunicipalidad" value="1" /> Municipalidad';} ?>
                    <?php if(substr($usuario['enterarcampa'], 11,1)=='1'){echo '<input type="checkbox" name="chkAmigo" id="chkAmigo" value="1" checked/> Amigo';}else{echo '<input type="checkbox" name="chkAmigo" id="chkAmigo" value="1" /> Amigo';} ?>
                    </li>
                    <li>
                    <label>Disponibilidad de Horario</label>
<!--                    <textarea name="txtDisponibilidad" id="txtDisponibilidad" rows="5" cols="61" 
                              placeholder="Escribir Horario Disponible. Ejemplo: Lunes - Miercoles - Viernes: 2:30p.m o Lunes: 2:30p.m - 3:30p.m; Jueves: 1:30p.m - 5:30p.m"  required=""/></textarea>-->
                    <table border="1" class="tituloTabla" style="text-align: center" id="customers">
                    <tr>
                        <th></th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                        <th>Domingo</th>
                    </tr>
                    <tr>
                        <td>8:00am-9:00am</td>
                        <td><?php if(substr($usuario['disponibilidad'], 0,1)=='1'){echo '<input type="checkbox" name="Lunes1" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes1" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 14,1)=='1'){echo '<input type="checkbox" name="Martes1" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 28,1)=='1'){echo '<input type="checkbox" name="Miercoles1" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 42,1)=='1'){echo '<input type="checkbox" name="Jueves1" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 56,1)=='1'){echo '<input type="checkbox" name="Viernes1" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 70,1)=='1'){echo '<input type="checkbox" name="Sabado1" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 84,1)=='1'){echo '<input type="checkbox" name="Domingo1" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo1" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>9:00am-10:00am</td>
                        <td><?php if(substr($usuario['disponibilidad'], 1,1)=='1'){echo '<input type="checkbox" name="Lunes2" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes2" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 15,1)=='1'){echo '<input type="checkbox" name="Martes2" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 29,1)=='1'){echo '<input type="checkbox" name="Miercoles2" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 43,1)=='1'){echo '<input type="checkbox" name="Jueves2" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 57,1)=='1'){echo '<input type="checkbox" name="Viernes2" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 71,1)=='1'){echo '<input type="checkbox" name="Sabado2" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 85,1)=='1'){echo '<input type="checkbox" name="Domingo2" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo2" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>10:00am-11:00am</td>
                        <td><?php if(substr($usuario['disponibilidad'], 2,1)=='1'){echo '<input type="checkbox" name="Lunes3" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes3" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 16,1)=='1'){echo '<input type="checkbox" name="Martes3" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 30,1)=='1'){echo '<input type="checkbox" name="Miercoles3" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 44,1)=='1'){echo '<input type="checkbox" name="Jueves3" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 58,1)=='1'){echo '<input type="checkbox" name="Viernes3" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 72,1)=='1'){echo '<input type="checkbox" name="Sabado3" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 86,1)=='1'){echo '<input type="checkbox" name="Domingo3" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo3" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>11:00am-12:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 3,1)=='1'){echo '<input type="checkbox" name="Lunes4" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes4" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 17,1)=='1'){echo '<input type="checkbox" name="Martes4" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 31,1)=='1'){echo '<input type="checkbox" name="Miercoles4" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 45,1)=='1'){echo '<input type="checkbox" name="Jueves4" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 59,1)=='1'){echo '<input type="checkbox" name="Viernes4" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 73,1)=='1'){echo '<input type="checkbox" name="Sabado4" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 87,1)=='1'){echo '<input type="checkbox" name="Domingo4" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo4" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>12:00pm-1:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 4,1)=='1'){echo '<input type="checkbox" name="Lunes5" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes5" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 18,1)=='1'){echo '<input type="checkbox" name="Martes5" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 32,1)=='1'){echo '<input type="checkbox" name="Miercoles5" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 46,1)=='1'){echo '<input type="checkbox" name="Jueves5" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 60,1)=='1'){echo '<input type="checkbox" name="Viernes5" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 74,1)=='1'){echo '<input type="checkbox" name="Sabado5" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 88,1)=='1'){echo '<input type="checkbox" name="Domingo5" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo5" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>1:00pm-2:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 5,1)=='1'){echo '<input type="checkbox" name="Lunes6" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes6" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 19,1)=='1'){echo '<input type="checkbox" name="Martes6" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 33,1)=='1'){echo '<input type="checkbox" name="Miercoles6" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 47,1)=='1'){echo '<input type="checkbox" name="Jueves6" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 61,1)=='1'){echo '<input type="checkbox" name="Viernes6" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 75,1)=='1'){echo '<input type="checkbox" name="Sabado6" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 89,1)=='1'){echo '<input type="checkbox" name="Domingo6" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo6" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>2:00pm-3:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 6,1)=='1'){echo '<input type="checkbox" name="Lunes7" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes7" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 20,1)=='1'){echo '<input type="checkbox" name="Martes7" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 34,1)=='1'){echo '<input type="checkbox" name="Miercoles7" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 48,1)=='1'){echo '<input type="checkbox" name="Jueves7" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 62,1)=='1'){echo '<input type="checkbox" name="Viernes7" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 76,1)=='1'){echo '<input type="checkbox" name="Sabado7" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 90,1)=='1'){echo '<input type="checkbox" name="Domingo7" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo7" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>3:00pm-4:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 7,1)=='1'){echo '<input type="checkbox" name="Lunes8" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes8" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 21,1)=='1'){echo '<input type="checkbox" name="Martes8" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 35,1)=='1'){echo '<input type="checkbox" name="Miercoles8" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 49,1)=='1'){echo '<input type="checkbox" name="Jueves8" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 63,1)=='1'){echo '<input type="checkbox" name="Viernes8" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 77,1)=='1'){echo '<input type="checkbox" name="Sabado8" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 91,1)=='1'){echo '<input type="checkbox" name="Domingo8" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo8" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>4:00pm-5:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 8,1)=='1'){echo '<input type="checkbox" name="Lunes9" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes9" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 22,1)=='1'){echo '<input type="checkbox" name="Martes9" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 36,1)=='1'){echo '<input type="checkbox" name="Miercoles9" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 50,1)=='1'){echo '<input type="checkbox" name="Jueves9" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 64,1)=='1'){echo '<input type="checkbox" name="Viernes9" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 78,1)=='1'){echo '<input type="checkbox" name="Sabado9" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 92,1)=='1'){echo '<input type="checkbox" name="Domingo9" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo9" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>5:00pm-6:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 9,1)=='1'){echo '<input type="checkbox" name="Lunes10" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes10" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 23,1)=='1'){echo '<input type="checkbox" name="Martes10" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 37,1)=='1'){echo '<input type="checkbox" name="Miercoles10" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 51,1)=='1'){echo '<input type="checkbox" name="Jueves10" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 65,1)=='1'){echo '<input type="checkbox" name="Viernes10" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 79,1)=='1'){echo '<input type="checkbox" name="Sabado10" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 93,1)=='1'){echo '<input type="checkbox" name="Domingo10" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo10" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>6:00pm-7:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 10,1)=='1'){echo '<input type="checkbox" name="Lunes11" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes11" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 24,1)=='1'){echo '<input type="checkbox" name="Martes11" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 38,1)=='1'){echo '<input type="checkbox" name="Miercoles11" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 52,1)=='1'){echo '<input type="checkbox" name="Jueves11" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 66,1)=='1'){echo '<input type="checkbox" name="Viernes11" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 80,1)=='1'){echo '<input type="checkbox" name="Sabado11" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 94,1)=='1'){echo '<input type="checkbox" name="Domingo11" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo11" value="1"/>';}?></td>                    
                    </tr>
                    <tr>
                        <td>7:00pm-8:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 11,1)=='1'){echo '<input type="checkbox" name="Lunes12" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes12" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 25,1)=='1'){echo '<input type="checkbox" name="Martes12" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 39,1)=='1'){echo '<input type="checkbox" name="Miercoles12" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 53,1)=='1'){echo '<input type="checkbox" name="Jueves12" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 67,1)=='1'){echo '<input type="checkbox" name="Viernes12" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 81,1)=='1'){echo '<input type="checkbox" name="Sabado12" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 95,1)=='1'){echo '<input type="checkbox" name="Domingo12" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo12" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>8:00pm-9:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 12,1)=='1'){echo '<input type="checkbox" name="Lunes13" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes13" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 26,1)=='1'){echo '<input type="checkbox" name="Martes13" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 40,1)=='1'){echo '<input type="checkbox" name="Miercoles13" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 54,1)=='1'){echo '<input type="checkbox" name="Jueves13" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 68,1)=='1'){echo '<input type="checkbox" name="Viernes13" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 82,1)=='1'){echo '<input type="checkbox" name="Sabado13" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 96,1)=='1'){echo '<input type="checkbox" name="Domingo13" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo13" value="1"/>';}?></td>                    </tr>
                    <tr>
                        <td>9:00pm-10:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 13,1)=='1'){echo '<input type="checkbox" name="Lunes14" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes14" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 27,1)=='1'){echo '<input type="checkbox" name="Martes14" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 41,1)=='1'){echo '<input type="checkbox" name="Miercoles14" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 55,1)=='1'){echo '<input type="checkbox" name="Jueves14" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 69,1)=='1'){echo '<input type="checkbox" name="Viernes14" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 83,1)=='1'){echo '<input type="checkbox" name="Sabado14" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 97,1)=='1'){echo '<input type="checkbox" name="Domingo14" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo14" value="1"/>';}?></td>
                    </tr>
                    </table>
                    </li>
                    <li> 
                        <label>Estado</label>
                        <?php if($usuario['estado']=='INACTIVO'){?>
                        <select id="estado" name="estado" class="field-divided">
                            <option value="INACTIVO" selected="">INACTIVO</option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="PENDIENTE">PENDIENTE</option>
                        </select>
                        <?PHP }else if($usuario['estado']=='ACTIVO'){?>
                        <select id="estado" name="estado" class="field-divided">
                            <option value="INACTIVO">INACTIVO</option>
                            <option value="ACTIVO" selected="">ACTIVO</option>
                            <option value="PENDIENTE">PENDIENTE</option>
                        </select>
                        <?PHP }else if($usuario['estado']=='PENDIENTE'){?>
                        <select id="estado" name="estado" class="field-divided">
                            <option value="INACTIVO">INACTIVO</option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="PENDIENTE" selected="">PENDIENTE</option>
                        </select>
                        <?php }?>
                    </li>
                    <li> 
                        <label>Grado de instruccion</label>
                        <?php if($usuario['gradoinstrucion']=='UNIVERSIDAD'){?>
                        <select id="gradoinstrucion" name="gradoinstrucion" class="field-divided" >
                            <option value='UNIVERSIDAD' selected="">Universidad</option>
                            <option value='INSTITUTO'>Instituto</option>
                            <option value='SECUNDARIO'>Secundario</option>
                        </select>
                        <?PHP }else if($usuario['gradoinstrucion']=='INSTITUTO'){?>
                        <select id="gradoinstrucion" name="gradoinstrucion" class="field-divided" >
                            <option value='UNIVERSIDAD'>Universidad</option>
                            <option value='INSTITUTO' selected="">Instituto</option>
                            <option value='SECUNDARIO'>Secundaria</option>
                        </select>
                        <?PHP }else if($usuario['gradoinstrucion']=='SECUNDARIO'){?>
                        <select id="gradoinstrucion" name="gradoinstrucion" class="field-divided" >
                            <option value='UNIVERSIDAD'>Universidad</option>
                            <option value='INSTITUTO'>Instituto</option>
                            <option value='SECUNDARIO' selected="">Secundaria</option>
                        </select>
                        <?php }?>
                    </li>
                    <li> 
                        <label>Nombre del instituto</label>
                        <input type="text" id="nominstitu" name="nominstitu" class="field-divided" value="<?php echo $usuario['nominstitu']; ?>"><br>
                    </li>
                    <li> 
                        <label>Especialidad</label>
                        <input type="text" id="especia" name="especia" class="field-divided" value="<?php echo $usuario['especia']; ?>"><br>
                    </li>
                    <li> 
                        <label>¿Usa un ordenador?</label>
                        
                        
                   
                        <?php if($usuario['usaordenador']=='Si'){echo 'Sí  <input type="radio" name="usaordenador"  value="Si" style="width:25px" checked=""/><br> No <input type="radio" name="usaordenador"  value="No" />';}else{echo 'Sí  <input type="radio" name="usaordenador"  value="Si" style="width:25px"/><br> No <input type="radio" name="usaordenador"  value="No" checked=""/>';}?>
                        
                    
                    </li>
                    <li> 
                        <label>Conocimientos a aprender</label>
                        <?php if(substr($usuario['conociaprender'], 0,1)=='1'){echo 'Window <input type="checkbox" name="window"  value="Window" checked/>';}else{echo 'Window <input type="checkbox" name="window"  value="Window"/>';}?>
                        <?php if(substr($usuario['conociaprender'], 1,1)=='1'){echo 'Internet <input type="checkbox" name="internet"  value="Interner" checked/>';}else{echo 'Internet <input type="checkbox" name="internet"  value="Interner"/>';}?>
                        <?php if(substr($usuario['conociaprender'], 2,1)=='1'){echo 'Correo Electrónico <input type="checkbox" name="Correo"  value="CorreoElectrónico" checked/>';}else{echo 'Correo Electrónico <input type="checkbox" name="Correo"  value="CorreoElectrónico"/>';}?>
                        <?php if(substr($usuario['conociaprender'], 3,1)=='1'){echo 'Word <input type="checkbox" name="word"  value="Word" checked/>';}else{echo 'Word <input type="checkbox" name="word"  value="Word"/>';}?>
                        <?php if(substr($usuario['conociaprender'], 4,1)=='1'){echo 'Excel <input type="checkbox" name="excel"  value="Excel" checked/>';}else{echo 'Excel <input type="checkbox" name="excel"  value="Excel"/>';}?>
                        <?php if(substr($usuario['conociaprender'], 5,1)=='1'){echo 'Power Point <input type="checkbox" name="power"  value="PowerPoint" checked/>';}else{echo 'Power Point <input type="checkbox" name="power"  value="PowerPoint"/>';}?> 
                    </li>
                    <li>
                    <li>
                        <label><font color='red'>*</font> Campo no indispensable u obligatorio</label>
                    </li>
                    <center>
                        <a id="linkadmin" href="../Administrador/FrmPrincipalAdmin.php"></a>
                        <input type="button" onclick="document.getElementById('linkadmin').click()" value="Volver" />
                        <button type="button" onclick="document.getElementById('perf').disabled=false;enviar('1')" >Grabar</button>
                        <button type="reset" >Reestablecer</button>
                    </center>
                    </li>
                    
                <?php } else { ?>
                         <li>   
                        <label>DNI</label>
                        <input type="text" id="dniusu" class="field-divided" name="dniusu" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo DNI')" maxlength="8" value="<?php echo $usuario['dniusu']; ?>"><br>
                    </li>
                    <li>
                        <label>Usuario de acceso</label>
                        <input type="text" id="usua" name="usua" class="field-divided" value="<?php echo $usuario['usua']; ?>"><br>
                    </li>
                    <li>
                        <label>Contraseña</label>
                        <input type="password" id="pass" name="pass" class="field-divided" style="margin-bottom: 3px;margin-top: 3px;padding-bottom: 8px;padding-top: 8px;padding-left: 5px;padding-right: 5px" value="<?php echo $usuario['pass']; ?>">  <button type="button" id="btnMostrarPass" onclick="mostrarPass()" style="width: 95px">Mostrar</button><br> 
                    </li>
                    <li>
                        <label>Perfil</label>
                        <input type="text" id="perf" name="perf" class="field-divided" style="background-color: lightgray" value="<?php echo $usuario['perf']; ?>"><br>
                    </li>
                    <li>
                        <label>Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="field-divided" value="<?php echo $usuario['apellidos']; ?>"><br>
                    </li>
                    <li>
                        <label>Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="field-divided" value="<?php echo $usuario['nombres']; ?>"><br>
                    </li>
                    <li>
                        <label>Provincia de nacimiento</label>
                        <input type="text" id="provnaci" name="provnaci" class="field-divided" value="<?php echo $usuario['provnaci']; ?>"><br>
                    </li>
                    <li>
                        <label>Distrito de nacimiento</label>
                        <input type="text" id="distnaci" name="distnaci" class="field-divided" value="<?php echo $usuario['distnaci']; ?>"><br>
                    </li>
                    <li>
                        <label>Fecha de nacimiento</label>
                        <input type="date" id="fecnaci" name="fecnaci" class="field-divided" value="<?php echo $usuario['fecnaci']; ?>"><br>
                    </li>
                    <li>
                        <label>Domicilio actual</label>
                        <input type="text" id="domiact" name="domiact" class="field-divided" value="<?php echo $usuario['domiact']; ?>"><br>
                    </li>
                    <li>
                        <label>Distrito actual</label>
                        <input type="text" id="distact" name="distact" class="field-divided" value="<?php echo $usuario['distact']; ?>"><br>
                    </li>
                    <li>
                        <label>Email</label>
                        <input type="text" id="email" name="email" class="field-divided" value="<?php echo $usuario['email']; ?>"><br>
<!--                        <select>
                            <option>@outlook.com</option>
                            <option>@gmail.com</option>
                            <option>@hotmail.com</option>
                            <option>@outlook.com</option>
                            <option>@outlook.com</option>
                        </select>-->
                    </li>
                    <li>
                        <label>Celular</label>
                        <input type="text" id="celu" name="celu" class="field-divided" maxlength="9" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Celular')" value="<?php echo $usuario['celu']; ?>"><br>
                    </li>
                    <li>
                        <label>Telefono</label>
                        <input type="text" id="tele" name="tele" class="field-divided" maxlength="7" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Telefono')" value="<?php echo $usuario['tele']; ?>"><br>
                    </li>
                    <li> 
                        <label>Nombre de su empresa <font color='red'>*</font></label>
                        <input type="text" id="nomempres" name="nomempres" class="field-divided" value="<?php echo $usuario['nomempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Cargo en la empresa <font color='red'>*</font></label>
                        <input type="text" id="cargempres" name="cargempres" class="field-divided" value="<?php echo $usuario['cargempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Direccion de la empresa <font color='red'>*</font></label>
                        <input type="text" id="dirempres" name="dirempres" class="field-divided" value="<?php echo $usuario['dirempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Distrito de la empresa <font color='red'>*</font></label>
                        <input type="text" id="distempres" name="distempres" class="field-divided" value="<?php echo $usuario['distempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Telefono de la empresa <font color='red'>*</font></label>
                        <input type="text" id="telempres" name="telempres" class="field-divided" maxlength="7" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Telefono')" value="<?php echo $usuario['telempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>Email de la empresa <font color='red'>*</font></label>
                        <input type="text" id="emailempres" name="emailempres" class="field-divided" value="<?php echo $usuario['emailempres']; ?>"><br>
                    </li>
                    <li> 
                        <label>¿Ha participado previamente?</label>
                        
                        <?php if($usuario['participaprevia']=='Si'){echo 'Si '.'<input type="radio" id="participapreviaSi" name="participaprevia" class="field-divided" value="Si" style="max-width: 50px;" checked><br> No<input type="radio" id="participapreviaNo" name="participaprevia" class="field-divided" value="No" style="max-width: 50px;" >';}else{ echo 'Si <input type="radio" id="participapreviaSi" name="participaprevia" class="field-divided" value="Si" style="max-width: 50px;" ><br> No <input type="radio" id="participapreviaNo" name="participaprevia" class="field-divided" value="No" style="max-width: 35px;" checked>';}?>
                    </li>
                    <li>
                        <label id="objetencasa">Marque si tiene en casa:</label>
                        <?php if(substr($usuario['objetencasa'], 0,1)=='1'){echo '<input type="checkbox" name="chkCompu" id="chkCompu" value="1" checked/> Computadora';}else{echo '<input type="checkbox" name="chkCompu" id="chkCompu" value="1" /> Computadora';}?>
                        <?php if(substr($usuario['objetencasa'], 1,1)=='1'){echo '<input type="checkbox" name="chkLap" id="chkLap" value="1" checked/> Laptop';}else{echo '<input type="checkbox" name="chkLap" id="chkLap" value="1" /> Laptop';}?>
                        <?php if(substr($usuario['objetencasa'], 2,1)=='1'){echo '<input type="checkbox" name="chkInter" id="chkInter" value="1" checked/> Internet';}else{echo '<input type="checkbox" name="chkInter" id="chkInter" value="1" /> Internet';}?>
                        <?php if(substr($usuario['objetencasa'], 3,1)=='1'){echo '<input type="checkbox" name="chkCel" id="chkCel" value="1" checked/> Celular';}else{echo '<input type="checkbox" name="chkCel" id="chkCel" value="1" /> Celular';}?>
                    </li>
                    <li>
                    <label id="enterocampana">Como se enteró de la Campaña(marque una o más alternativas): </label>
                    <?php if(substr($usuario['enterarcampa'], 0,1)=='1'){echo '<input type="checkbox" name="chkFacebook" id="chkFacebook" value="1" checked /> Facebook';}else{echo '<input type="checkbox" name="chkFacebook" id="chkFacebook" value="1" /> Facebook';}?>
                    <?php if(substr($usuario['enterarcampa'], 1,1)=='1'){echo '<input type="checkbox" name="chkEmail" id="chkEmail" value="1" checked/> E-mail';}else{echo '<input type="checkbox" name="chkEmail" id="chkEmail" value="1" /> E-mail';} ?>
                    <?php if(substr($usuario['enterarcampa'], 2,1)=='1'){echo '<input type="checkbox" name="chkRadio" id="chkRadio" value="1" checked/> Radio';}else{echo '<input type="checkbox" name="chkRadio" id="chkRadio" value="1" /> Radio';} ?>
                    <?php if(substr($usuario['enterarcampa'], 3,1)=='1'){echo '<input type="checkbox" name="chkDiario" id="chkDiario" value="1" checked/> Diario';}else{echo '<input type="checkbox" name="chkDiario" id="chkDiario" value="1" /> Diario';} ?>
                    <?php if(substr($usuario['enterarcampa'], 4,1)=='1'){echo '<input type="checkbox" name="chkAfiche" id="chkAfiche" value="1" checked/> Afiche';}else{echo '<input type="checkbox" name="chkAfiche" id="chkAfiche" value="1" /> Afiche';} ?>
                    <?php if(substr($usuario['enterarcampa'], 5,1)=='1'){echo '<input type="checkbox" name="chkVolante" id="chkVolante" value="1" checked/> Volante';}else{echo '<input type="checkbox" name="chkVolante" id="chkVolante" value="1" /> Volante';} ?>
                    <?php if(substr($usuario['enterarcampa'], 6,1)=='1'){echo '<input type="checkbox" name="chkVideo" id="chkVideo" value="1" checked/> Video';}else{echo '<input type="checkbox" name="chkVideo" id="chkVideo" value="1" /> Video';} ?>
                    <?php if(substr($usuario['enterarcampa'], 7,1)=='1'){echo '<input type="checkbox" name="chkConferencia" id="chkConferencia" value="1" checked/> Conferencia/Charla';}else{echo '<input type="checkbox" name="chkConferencia" id="chkConferencia" value="1" /> Conferencia/Charla';} ?>
                    <?php if(substr($usuario['enterarcampa'], 8,1)=='1'){echo '<input type="checkbox" name="chkCIP" id="chkCIP" value="1" checked/> CIP';}else{echo '<input type="checkbox" name="chkCIP" id="chkCIP" value="1" /> CIP';} ?>
                    <?php if(substr($usuario['enterarcampa'], 9,1)=='1'){echo '<input type="checkbox" name="chkUniversidad" id="chkUniversidad" value="1" checked/> Universidad';}else{echo '<input type="checkbox" name="chkUniversidad" id="chkUniversidad" value="1" /> Universidad';} ?>
                    <?php if(substr($usuario['enterarcampa'], 10,1)=='1'){echo '<input type="checkbox" name="chkMunicipalidad" id="chkMunicipalidad" value="1" checked/> Municipalidad';}else{echo '<input type="checkbox" name="chkMunicipalidad" id="chkMunicipalidad" value="1" /> Municipalidad';} ?>
                    <?php if(substr($usuario['enterarcampa'], 11,1)=='1'){echo '<input type="checkbox" name="chkAmigo" id="chkAmigo" value="1" checked/> Amigo';}else{echo '<input type="checkbox" name="chkAmigo" id="chkAmigo" value="1" /> Amigo';} ?>
                    </li>
                    <li>
                    <label>Disponibilidad de Horario</label>
<!--                    <textarea name="txtDisponibilidad" id="txtDisponibilidad" rows="5" cols="61" 
                              placeholder="Escribir Horario Disponible. Ejemplo: Lunes - Miercoles - Viernes: 2:30p.m o Lunes: 2:30p.m - 3:30p.m; Jueves: 1:30p.m - 5:30p.m"  required=""/></textarea>-->
                    <table border="1" class="tituloTabla" style="text-align: center" id="customers">
                    <tr>
                        <th></th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                        <th>Domingo</th>
                    </tr>
                    <tr>
                        <td>8:00am-9:00am</td>
                        <td><?php if(substr($usuario['disponibilidad'], 0,1)=='1'){echo '<input type="checkbox" name="Lunes1" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes1" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 14,1)=='1'){echo '<input type="checkbox" name="Martes1" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 28,1)=='1'){echo '<input type="checkbox" name="Miercoles1" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 42,1)=='1'){echo '<input type="checkbox" name="Jueves1" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 56,1)=='1'){echo '<input type="checkbox" name="Viernes1" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 70,1)=='1'){echo '<input type="checkbox" name="Sabado1" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado1" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 84,1)=='1'){echo '<input type="checkbox" name="Domingo1" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo1" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>9:00am-10:00am</td>
                        <td><?php if(substr($usuario['disponibilidad'], 1,1)=='1'){echo '<input type="checkbox" name="Lunes2" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes2" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 15,1)=='1'){echo '<input type="checkbox" name="Martes2" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 29,1)=='1'){echo '<input type="checkbox" name="Miercoles2" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 43,1)=='1'){echo '<input type="checkbox" name="Jueves2" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 57,1)=='1'){echo '<input type="checkbox" name="Viernes2" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 71,1)=='1'){echo '<input type="checkbox" name="Sabado2" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado2" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 85,1)=='1'){echo '<input type="checkbox" name="Domingo2" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo2" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>10:00am-11:00am</td>
                        <td><?php if(substr($usuario['disponibilidad'], 2,1)=='1'){echo '<input type="checkbox" name="Lunes3" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes3" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 16,1)=='1'){echo '<input type="checkbox" name="Martes3" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 30,1)=='1'){echo '<input type="checkbox" name="Miercoles3" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 44,1)=='1'){echo '<input type="checkbox" name="Jueves3" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 58,1)=='1'){echo '<input type="checkbox" name="Viernes3" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 72,1)=='1'){echo '<input type="checkbox" name="Sabado3" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado3" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 86,1)=='1'){echo '<input type="checkbox" name="Domingo3" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo3" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>11:00am-12:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 3,1)=='1'){echo '<input type="checkbox" name="Lunes4" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes4" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 17,1)=='1'){echo '<input type="checkbox" name="Martes4" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 31,1)=='1'){echo '<input type="checkbox" name="Miercoles4" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 45,1)=='1'){echo '<input type="checkbox" name="Jueves4" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 59,1)=='1'){echo '<input type="checkbox" name="Viernes4" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 73,1)=='1'){echo '<input type="checkbox" name="Sabado4" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado4" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 87,1)=='1'){echo '<input type="checkbox" name="Domingo4" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo4" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>12:00pm-1:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 4,1)=='1'){echo '<input type="checkbox" name="Lunes5" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes5" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 18,1)=='1'){echo '<input type="checkbox" name="Martes5" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 32,1)=='1'){echo '<input type="checkbox" name="Miercoles5" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 46,1)=='1'){echo '<input type="checkbox" name="Jueves5" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 60,1)=='1'){echo '<input type="checkbox" name="Viernes5" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 74,1)=='1'){echo '<input type="checkbox" name="Sabado5" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado5" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 88,1)=='1'){echo '<input type="checkbox" name="Domingo5" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo5" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>1:00pm-2:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 5,1)=='1'){echo '<input type="checkbox" name="Lunes6" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes6" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 19,1)=='1'){echo '<input type="checkbox" name="Martes6" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 33,1)=='1'){echo '<input type="checkbox" name="Miercoles6" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 47,1)=='1'){echo '<input type="checkbox" name="Jueves6" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 61,1)=='1'){echo '<input type="checkbox" name="Viernes6" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 75,1)=='1'){echo '<input type="checkbox" name="Sabado6" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado6" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 89,1)=='1'){echo '<input type="checkbox" name="Domingo6" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo6" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>2:00pm-3:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 6,1)=='1'){echo '<input type="checkbox" name="Lunes7" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes7" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 20,1)=='1'){echo '<input type="checkbox" name="Martes7" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 34,1)=='1'){echo '<input type="checkbox" name="Miercoles7" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 48,1)=='1'){echo '<input type="checkbox" name="Jueves7" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 62,1)=='1'){echo '<input type="checkbox" name="Viernes7" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 76,1)=='1'){echo '<input type="checkbox" name="Sabado7" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado7" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 90,1)=='1'){echo '<input type="checkbox" name="Domingo7" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo7" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>3:00pm-4:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 7,1)=='1'){echo '<input type="checkbox" name="Lunes8" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes8" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 21,1)=='1'){echo '<input type="checkbox" name="Martes8" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 35,1)=='1'){echo '<input type="checkbox" name="Miercoles8" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 49,1)=='1'){echo '<input type="checkbox" name="Jueves8" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 63,1)=='1'){echo '<input type="checkbox" name="Viernes8" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 77,1)=='1'){echo '<input type="checkbox" name="Sabado8" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado8" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 91,1)=='1'){echo '<input type="checkbox" name="Domingo8" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo8" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>4:00pm-5:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 8,1)=='1'){echo '<input type="checkbox" name="Lunes9" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes9" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 22,1)=='1'){echo '<input type="checkbox" name="Martes9" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 36,1)=='1'){echo '<input type="checkbox" name="Miercoles9" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 50,1)=='1'){echo '<input type="checkbox" name="Jueves9" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 64,1)=='1'){echo '<input type="checkbox" name="Viernes9" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 78,1)=='1'){echo '<input type="checkbox" name="Sabado9" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado9" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 92,1)=='1'){echo '<input type="checkbox" name="Domingo9" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo9" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>5:00pm-6:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 9,1)=='1'){echo '<input type="checkbox" name="Lunes10" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes10" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 23,1)=='1'){echo '<input type="checkbox" name="Martes10" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 37,1)=='1'){echo '<input type="checkbox" name="Miercoles10" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 51,1)=='1'){echo '<input type="checkbox" name="Jueves10" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 65,1)=='1'){echo '<input type="checkbox" name="Viernes10" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 79,1)=='1'){echo '<input type="checkbox" name="Sabado10" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado10" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 93,1)=='1'){echo '<input type="checkbox" name="Domingo10" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo10" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>6:00pm-7:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 10,1)=='1'){echo '<input type="checkbox" name="Lunes11" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes11" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 24,1)=='1'){echo '<input type="checkbox" name="Martes11" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 38,1)=='1'){echo '<input type="checkbox" name="Miercoles11" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 52,1)=='1'){echo '<input type="checkbox" name="Jueves11" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 66,1)=='1'){echo '<input type="checkbox" name="Viernes11" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 80,1)=='1'){echo '<input type="checkbox" name="Sabado11" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado11" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 94,1)=='1'){echo '<input type="checkbox" name="Domingo11" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo11" value="1"/>';}?></td>                    
                    </tr>
                    <tr>
                        <td>7:00pm-8:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 11,1)=='1'){echo '<input type="checkbox" name="Lunes12" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes12" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 25,1)=='1'){echo '<input type="checkbox" name="Martes12" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 39,1)=='1'){echo '<input type="checkbox" name="Miercoles12" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 53,1)=='1'){echo '<input type="checkbox" name="Jueves12" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 67,1)=='1'){echo '<input type="checkbox" name="Viernes12" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 81,1)=='1'){echo '<input type="checkbox" name="Sabado12" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado12" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 95,1)=='1'){echo '<input type="checkbox" name="Domingo12" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo12" value="1"/>';}?></td>
                    </tr>
                    <tr>
                        <td>8:00pm-9:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 12,1)=='1'){echo '<input type="checkbox" name="Lunes13" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes13" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 26,1)=='1'){echo '<input type="checkbox" name="Martes13" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 40,1)=='1'){echo '<input type="checkbox" name="Miercoles13" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 54,1)=='1'){echo '<input type="checkbox" name="Jueves13" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 68,1)=='1'){echo '<input type="checkbox" name="Viernes13" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 82,1)=='1'){echo '<input type="checkbox" name="Sabado13" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado13" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 96,1)=='1'){echo '<input type="checkbox" name="Domingo13" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo13" value="1"/>';}?></td>                    </tr>
                    <tr>
                        <td>9:00pm-10:00pm</td>
                        <td><?php if(substr($usuario['disponibilidad'], 13,1)=='1'){echo '<input type="checkbox" name="Lunes14" value="1" checked/>';}else{echo '<input type="checkbox" name="Lunes14" value="1"/>';} ?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 27,1)=='1'){echo '<input type="checkbox" name="Martes14" value="1" checked/>';}else{echo '<input type="checkbox" name="Martes14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 41,1)=='1'){echo '<input type="checkbox" name="Miercoles14" value="1" checked/>';}else{echo '<input type="checkbox" name="Miercoles14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 55,1)=='1'){echo '<input type="checkbox" name="Jueves14" value="1" checked/>';}else{echo '<input type="checkbox" name="Jueves14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 69,1)=='1'){echo '<input type="checkbox" name="Viernes14" value="1" checked/>';}else{echo '<input type="checkbox" name="Viernes14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 83,1)=='1'){echo '<input type="checkbox" name="Sabado14" value="1" checked/>';}else{echo '<input type="checkbox" name="Sabado14" value="1"/>';}?></td>
                        <td><?php if(substr($usuario['disponibilidad'], 97,1)=='1'){echo '<input type="checkbox" name="Domingo14" value="1" checked/>';}else{echo '<input type="checkbox" name="Domingo14" value="1"/>';}?></td>
                    </tr>
                    </table>
                    </li>
                    <li> 
                        <label>Estado</label>
                        <?php if($usuario['estado']=='INACTIVO'){?>
                        <select id="estado" name="estado" class="field-divided">
                            <option value="INACTIVO">INACTIVO</option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="PENDIENTE">PENDIENTE</option>
                        </select>
                        <?PHP }else if($usuario['estado']=='ACTIVO'){?>
                        <select id="estado" name="estado" class="field-divided">
                            <option value="INACTIVO">INACTIVO</option>
                            <option value="ACTIVO" selected="">ACTIVO</option>
                            <option value="PENDIENTE">PENDIENTE</option>
                        </select>
                        <?PHP }else if($usuario['estado']=='PENDIENTE'){?>
                        <select id="estado" name="estado" class="field-divided">
                            <option value="INACTIVO">INACTIVO</option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="PENDIENTE" selected="">PENDIENTE</option>
                        </select>
                        <?php }?>
                    </li>
                        <li>
                            <label>CIP(Numero de registro del Colegio de Ingenieros del Peru)</label>
                            <?php if(($usuario['cip'])==null){echo 'Sí <input type="radio" id="cipSi" name="cipsi"  onclick="enableCIPradiobutton()" value="Si" > No <input type="radio" name="cipsi" id="cipNo" value="No" onclick="disableCIPradiobutton()" checked>';} else {echo 'Sí <input type="radio" id="cipSi" name="cipsi"  onclick="enableCIPradiobutton('.$usuario['cip'].')" value="Si" checked> No<input type="radio" name="cipsi" id="cipNo" value="No" onclick="disableCIPradiobutton()" >';}?>
                            <br><input type="text" id="cip" name="cip" maxlength="6" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo de Numero CIP')" class="field-divided" value="<?php echo $usuario['cip']; ?>"><br>
                        </li>
                        <li>
                            <label>Grado academico</label>
                            <?php if($usuario['gradoacad']=='INGENIERO'){?>
                            <select id="gradoacad" name="gradoacad" class="field-divided" onchange="disableCiclo()">
                                <option value="">---</option>
                                <option value="INGENIERO" selected="">INGENIERO</option>
                                <option value="GRADUADO">GRADUADO</option>
                                <option value="EGRESADO">EGRESADO</option>
                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                            </select>
                            <?PHP }else if($usuario['gradoacad']=='GRADUADO'){?>
                            <select id="gradoacad" name="gradoacad" class="field-divided" onchange="disableCiclo()">
                                <option value="">---</option>
                                <option value="INGENIERO">INGENIERO</option>
                                <option value="GRADUADO" selected="">GRADUADO</option>
                                <option value="EGRESADO">EGRESADO</option>
                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                            </select>
                            <?PHP }else if($usuario['gradoacad']=='EGRESADO'){?>
                            <select id="gradoacad" name="gradoacad" class="field-divided" onchange="disableCiclo()">
                                <option value="">---</option>
                                <option value="INGENIERO">INGENIERO</option>
                                <option value="GRADUADO">GRADUADO</option>
                                <option value="EGRESADO" selected="">EGRESADO</option>
                                <option value="ESTUDIANTE">ESTUDIANTE</option>
                            </select>
                            <?php }else if($usuario['gradoacad']=='ESTUDIANTE'){?>
                            <select id="gradoacad" name="gradoacad" class="field-divided" onchange="disableCiclo()">
                                <option value="">---</option>
                                <option value="INGENIERO">INGENIERO</option>
                                <option value="GRADUADO">GRADUADO</option>
                                <option value="EGRESADO">EGRESADO</option>
                                <option value="ESTUDIANTE" selected="">ESTUDIANTE</option>
                            </select>
                            <?php }else if(!isset ($usuario['gradoacad'])){?>
                            <select id="gradoacad" name="gradoacad" class="field-divided" onchange="disableCiclo()">
                                <option value="" selected="">---</option>
                                <option value="INGENIERO">INGENIERO</option>
                                <option value="GRADUADO">GRADUADO</option>
                                <option value="EGRESADO">EGRESADO</option>
                                <option value="ESTUDIANTE" >ESTUDIANTE</option>
                            </select>
                            <?php }?>
                        </li>
                        <li>
                            <label>Especialidad</label>
                            <input type="text" id="especia" name="especia" class="field-divided" value="<?php echo $usuario['especia']; ?>"><br>
                        </li>
                        <li>
                            <label>Nombre de su universidad</label>
                            <input type="text" id="nomuniver" name="nomuniver" class="field-divided" value="<?php echo $usuario['nomuniver']; ?>"><br>
                        </li>
                        <li>
                            <label>Ciclo</label>
                            
                            <select id="ciclo" name="ciclo" class="field-divided">
                                <?PHP if($usuario['ciclo']=='I'){echo '<option value="I" selected>I</option>';}else{echo '<option value="I" >I</option>';} ?>
                                <?PHP if($usuario['ciclo']=='II'){echo '<option value="II" selected>II</option>';}else{echo '<option value="II" >II</option>';} ?>
                                <?PHP if($usuario['ciclo']=='III'){echo '<option value="III" selected>III</option>';}else{echo '<option value="III" >III</option>';} ?>
                                <?PHP if($usuario['ciclo']=='IV'){echo '<option value="IV" selected>IV</option>';}else{echo '<option value="IV" >IV</option>';} ?>
                                <?PHP if($usuario['ciclo']=='V'){echo '<option value="V" selected>V</option>';}else{echo '<option value="V" >V</option>';} ?>
                                <?PHP if($usuario['ciclo']=='VI'){echo '<option value="VI" selected>VI</option>';}else{echo '<option value="VI" >VII</option>';} ?>
                                <?PHP if($usuario['ciclo']=='VII'){echo '<option value="VII" selected>VII</option>';}else{echo '<option value="VII" >VIII</option>';} ?>
                                <?PHP if($usuario['ciclo']=='VIII'){echo '<option value="VIII" selected>VIII</option>';}else{echo '<option value="VIII" >I</option>';} ?>
                                <?PHP if($usuario['ciclo']=='IX'){echo '<option value="IX" selected>IX</option>';}else{echo '<option value="IX" >IX</option>';} ?>
                                <?PHP if($usuario['ciclo']=='X'){echo '<option value="X" selected>X</option>';}else{echo '<option value="X" >X</option>';} ?>
                                
                            </select><br>
                        </li>
                        <li>
                            <label>Descripcion de su experiencia en docencia</label>
                            Sin experiencia <input type="checkbox" id="sinexperiencialaboral" name="sinexperiencialaboral" onclick="disableDescripdocen()"><br>
                            <textarea id="descripdocen" name="descripdocen" class="field-divided" value="<?php echo $usuario['descripdocen']; ?>"></textarea><br>
                        </li>
                        <li>
                            <label>Niveles de conocimiento  (N)Nulo (B)Basico (I)Intermedio (A)Avanzado</label>
                            
                            
                         Windows <select name="windows" >
                                     <?php if(substr($usuario['nivelconoci'], 0,1)=='N'){echo '<option value="N" selected="">NULO</option>';}else{echo '<option value="N">Nulo</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 0,1)=='B'){echo '<option value="B" selected="">BASICO</option>';}else{echo '<option value="B">BASICO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 0,1)=='I'){echo '<option value="I" selected="">INTERMEDIO</option>';}else{echo '<option value="I">INTERMEDIO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 0,1)=='A'){echo '<option value="A" selected="">AVANZADO</option>';}else{echo '<option value="A">AVANZADO</option>';} ?>
                                </select>
                         Internet <select name="internet" >
                                    <?php if(substr($usuario['nivelconoci'], 1,1)=='N'){echo '<option value="N" selected="">NULO</option>';}else{echo '<option value="N">Nulo</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 1,1)=='B'){echo '<option value="B" selected="">BASICO</option>';}else{echo '<option value="B">BASICO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 1,1)=='I'){echo '<option value="I" selected="">INTERMEDIO</option>';}else{echo '<option value="I">INTERMEDIO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 1,1)=='A'){echo '<option value="A" selected="">AVANZADO</option>';}else{echo '<option value="A">AVANZADO</option>';} ?>
                                </select><br>
                         Correo Elect. <select name="correo" >
                                    <?php if(substr($usuario['nivelconoci'], 2,1)=='N'){echo '<option value="N" selected="">NULO</option>';}else{echo '<option value="N">Nulo</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 2,1)=='B'){echo '<option value="B" selected="">BASICO</option>';}else{echo '<option value="B">BASICO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 2,1)=='I'){echo '<option value="I" selected="">INTERMEDIO</option>';}else{echo '<option value="I">INTERMEDIO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 2,1)=='A'){echo '<option value="A" selected="">AVANZADO</option>';}else{echo '<option value="A">AVANZADO</option>';} ?>
                                </select>
                         Word <select name="word" >
                                    <?php if(substr($usuario['nivelconoci'], 3,1)=='N'){echo '<option value="N" selected="">NULO</option>';}else{echo '<option value="N">Nulo</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 3,1)=='B'){echo '<option value="B" selected="">BASICO</option>';}else{echo '<option value="B">BASICO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 3,1)=='I'){echo '<option value="I" selected="">INTERMEDIO</option>';}else{echo '<option value="I">INTERMEDIO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 3,1)=='A'){echo '<option value="A" selected="">AVANZADO</option>';}else{echo '<option value="A">AVANZADO</option>';} ?>
                                </select><br>
                         <p>
                         Excel <select name="excel" >
                                    <?php if(substr($usuario['nivelconoci'], 4,1)=='N'){echo '<option value="N" selected="">NULO</option>';}else{echo '<option value="N">Nulo</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 4,1)=='B'){echo '<option value="B" selected="">BASICO</option>';}else{echo '<option value="B">BASICO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 4,1)=='I'){echo '<option value="I" selected="">INTERMEDIO</option>';}else{echo '<option value="I">INTERMEDIO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 4,1)=='A'){echo '<option value="A" selected="">AVANZADO</option>';}else{echo '<option value="A">AVANZADO</option>';} ?>
                                </select>
                         Power Point <select name="porwerpoint" >
                                    <?php if(substr($usuario['nivelconoci'], 5,1)=='N'){echo '<option value="N" selected="">NULO</option>';}else{echo '<option value="N">Nulo</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 5,1)=='B'){echo '<option value="B" selected="">BASICO</option>';}else{echo '<option value="B">BASICO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 5,1)=='I'){echo '<option value="I" selected="">INTERMEDIO</option>';}else{echo '<option value="I">INTERMEDIO</option>';} ?>
                                     <?php if(substr($usuario['nivelconoci'], 5,1)=='A'){echo '<option value="A" selected="">AVANZADO</option>';}else{echo '<option value="A">AVANZADO</option>';} ?>
                                </select>
                         </p>
                        </li>
                        <li>
                            <label>Rol al cual aplicar</label>
                            
                            <?php if($usuario['aplicarpara']=='CAPACITADOR') {echo '<input type="radio" id="aplicarparaCAPACITADOR" name="aplicarpara" value="CAPACITADOR" id="chkaplicaCapacitador" checked/>Capacitador';}else{echo '<input type="radio"  id="aplicarparaCAPACITADOR" name="aplicarpara" value="CAPACITADOR" id="chkaplicaCapacitador" />Capacitador';}?>
                            <?php if($usuario['aplicarpara']=='ASISTENTE') {echo '<input type="radio"  id="aplicarparaASISTENTE" name="aplicarpara" value="ASISTENTE" id="chkaplicaAsistente" checked/>Asistente';}else{echo '<input type="radio"  id="aplicarparaASISTENTE" name="aplicarpara" value="ASISTENTE" id="chkaplicaAsistente" />Asistente';}?>
                            <?php if($usuario['aplicarpara']=='APOYO') {echo '<input type="radio" id="aplicarparaAPOYO" name="aplicarpara" value="APOYO" id="chkaplicaApoyo" checked/>Apoyo';}else{echo '<input type="radio"  id="aplicarparaAPOYO" name="aplicarpara" value="APOYO" id="chkaplicaApoyo"/>Apoyo';}?>
                            
                            
               
                        </li>
                        
                        <li><label>¿Tiene privilegio para subir materiales?</label>
                             <select name="privilegio" >
                                     <?php if($usuario['privilegiodesubirmat']=='Si'){echo '<option value="Si" selected="">Si</option>'.'<option value="No" >No</option>';}else{echo '<option value="Si">Si</option>'.'<option value="No" selected="">No</option>';} ?>
                                </select>
                        </li>
                        <li>
                        <label><font color='red'>*</font> Campo no indispensable u obligatorio</label>
                        </li>
                        <center>
                            <input type="button" onclick="window.location.href='../Administrador/FrmPrincipalAdmin.php'" value="Volver" />
                            <button type="button" onclick="document.getElementById('perf').disabled=false;enviar('1')">Grabar</button>
                            <button type="reset" >Reestablecer</button>
                        </center>
                        </li>
                    <?php } ?>
            </ul>
        </form>
    </body>
</html>