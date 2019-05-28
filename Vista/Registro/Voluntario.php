<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alfabetizacion Digital</title>
        <link rel="icon" type="image/png" href="../../images/Alfabetizacion_Mano_Sin Resplandor.png">
        <script src="../../vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
        <style type="text/css">
            body{
                background-image: url(../../images/requerimientos.jpg);
                background-position: center;
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
                max-width: 665px;
                padding: 20px 12px 10px 20px;
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
            input:invalid {
                border: 1px solid red;
            }

            input:valid {
                border: 1px solid green;
            }

            checked{
                box-shadow: 0 0 0 3px #003399;
            }
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: royalblue;
                color: white;
            }
        </style>
        <script>
            function validate(evt) {
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
              }
            }
            function  cargarConAjax(opt)
            {
                
                var txtDni=document.getElementById('txtDni').value;
                var txtNombres=document.getElementById('txtNombres').value;
                var txtApellidos=document.getElementById('txtApellidos').value;
                var txtNombres=document.getElementById('txtNombres').value;
                var cboGrado = document.getElementById("cboTipo");
                var option = cboGrado.options[cboGrado.selectedIndex].value;
                var txtEspecialidad=document.getElementById('txtEspecialidad').value;
                var txtUniversidad=document.getElementById('txtUniversidad').value;
                var txtCiclo=document.getElementById('txtCiclo').value;
                var txtProvNac=document.getElementById('txtProvNac').value;
                var txtDistNac=document.getElementById('txtDistNac').value;
                var txtFechaNac=document.getElementById('txtFechaNac').value;
                var txtDomicilio=document.getElementById('txtDomicilio').value;
                var txtDistAct=document.getElementById('txtDistAct').value;
                var txtEmail=document.getElementById('txtEmail').value;
                var txtCelular=document.getElementById('txtCelular').value;
                var txtTelefono=document.getElementById('txtTelefono').value;
                var txtEmpresa=document.getElementById('txtEmpresa').value;
                var txtCargo=document.getElementById('txtCargo').value;
                var txtDirEmp=document.getElementById('txtDirEmp').value;
                var txtDistEmp=document.getElementById('txtDistEmp').value;
                var txtTelEmp=document.getElementById('txtTelEmp').value;
                var txtEmailEmp=document.getElementById('txtEmailEmp').value;
                if (document.getElementById('rdbParticipacionNo').checked) {
                  var rdbParticipacion = document.getElementById('rdbParticipacionNo').value;
                }else if(document.getElementById('rdbParticipacionSi').checked) {
                  var rdbParticipacion = document.getElementById('rdbParticipacionSi').value;
                }
                var chkCompu='0',chkLap='0',chkInt='0',chkCel='0';
                if (document.getElementById('chkCompu').checked) {
                  chkCompu = '1';
                }
                if(document.getElementById('chkLap').checked) {
                  chkLap = '1';
                }
                if (document.getElementById('chkInt').checked) {
                  chkInt = '1';
                }
                if(document.getElementById('chkCel').checked) {
                  chkCel = '1';
                }
                var objetencasa=chkCompu.chkLap.chkInt.chkCel;
                var txtWindows=document.getElementById('txtWindows').value;
                var txtInternet=document.getElementById('txtInternet').value;
                var txtCorreo=document.getElementById('txtCorreo').value;
                var txtWord=document.getElementById('txtWord').value;
                var txtExcel=document.getElementById('txtExcel').value;
                var txtPower=document.getElementById('txtPower').value;
//                if (document.getElementById('rdbExperienciaNo').checked) {
//                  var rdbExperiencia = document.getElementById('rdbExperienciaNo').value;
//                }else if(document.getElementById('rdbExperienciaSi').checked) {
//                  var rdbExperiencia = document.getElementById('rdbExperienciaSi').value;
//                }
                var txtDetalle=document.getElementById('txtDetalle').value;
                var chkFacebook='0',chkWeb='0',chkEmail='0',chkRadio='0',chkDiario='0',chkAfiche='0',chkVolante='0',chkVideo='0',chkConferencia='0',chkCIP='0',chkUniversidad='0',chkMunicipalidad='0',chkAmigo='0';
                if (document.getElementById('chkFacebook').checked) {
                  chkFacebook = '1';
                }
                if(document.getElementById('chkWeb').checked) {
                  chkWeb = '1';
                }
                if (document.getElementById('chkEmail').checked) {
                  chkEmail = '1';
                }
                if(document.getElementById('chkRadio').checked) {
                  chkRadio = '1';
                }
                if (document.getElementById('chkDiario').checked) {
                  chkDiario = '1';
                }
                if(document.getElementById('chkAfiche').checked) {
                  chkAfiche = '1';
                }
                if (document.getElementById('chkVolante').checked) {
                  chkVolante = '1';
                }
                if(document.getElementById('chkVideo').checked) {
                  chkVideo = '1';
                }
                if (document.getElementById('chkConferencia').checked) {
                  chkConferencia = '1';
                }
                if(document.getElementById('chkCIP').checked) {
                  chkCIP = '1';
                }
                if (document.getElementById('chkUniversidad').checked) {
                  chkUniversidad = '1';
                }
                if(document.getElementById('chkMunicipalidad').checked) {
                  chkMunicipalidad = '1';
                }
                if(document.getElementById('chkAmigo').checked) {
                  chkAmigo = '1';
                }
                var enterarcampa=chkFacebook.chkWeb.chkEmail.chkRadio.chkDiario.chkAfiche.chkVolante.chkVideo.chkConferencia.chkCIP.chkUniversidad.chkMunicipalidad.chkAmigo;
                var txtDisponibilidad=document.getElementById('txtDisponibilidad').value;
                var chkCapacitador='0',chkAsistente='0',chkAdministrador='0'
                if (document.getElementById('chkCapacitador').checked) {
                  chkCapacitador = '1';
                }
                if(document.getElementById('chkAsistente').checked) {
                  chkAsistente = '1';
                }
                if(document.getElementById('chkAdministrador').checked) {
                  chkAdministrador = '1';
                }
                var aplicarpara=chkCapacitador.chkAsistente.chkAdministrador;
                //opt.value=1;
                //alert(opt.value);
//                var pagina="controlador2.php?opt="+opt+"&txtNombres="+txtNombres+"&txtApellidos="+txtApellidos+"&cboTipo="+option+"&rdbSiNo="+rdbSiNo+"&com="+com+"&lap="+lap+"&int="+int+"&cel="+cel;//controlador y opt
                var pagina="../../Controlador/UsuarioControlador.php?txtDni="+txtDni+"&txtNombres="+txtNombres+
                        "&txtApellidos="+txtApellidos+"&cboTipo="+option+"&txtEspecialidad="+txtEspecialidad+
                        "&txtUniversidad="+txtUniversidad+"&txtCiclo="+txtCiclo+"&txtProvNac="+txtProvNac+
                        "&txtDistNac="+txtDistNac+"&txtFechaNac="+txtFechaNac+"&txtDomicilio="+txtDomicilio+
                        "&txtDistAct="+txtDistAct+"&txtEmail="+txtEmail+"&txtCelular="+txtCelular+
                        "&txtTelefono="+txtTelefono+"&txtEmpresa="+txtEmpresa+"&txtCargo="+txtCargo+
                        "&txtDirEmp="+txtDirEmp+"&txtDistEmp="+txtDistEmp+"&txtTelEmp="+txtTelEmp+"&txtEmailEmp="+txtEmailEmp+
                        "&rdbParticipacion="+rdbParticipacion+"&objetencasa="+objetencasa+
                        "&txtWindows="+txtWindows+"&txtInternet="+txtInternet+"&txtCorreo="+txtCorreo+
                        "&txtWord="+txtWord+"&txtExcel="+txtExcel+"&txtPower="+txtPower+
                        "&txtDetalle="+txtDetalle+"&enterarcampa"+enterarcampa+"&txtDisponibilidad="+txtDisponibilidad+
                        "&aplicarpara="+aplicarpara;//controlador y opt
                var xmlhttp;
                if(window.XMLHttpRequest){
                        xmlhttp=new XMLHttpRequest();
                }else{
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function(){
                        if(xmlhttp.readyState==4 && xmlhttp.status==200){
                                document.getElementById("slide-wrapper").innerHTML=xmlhttp.responseText;
                        }
                }
                xmlhttp.open("GET",pagina,true);
                xmlhttp.send(null);

            }
            
            
            $('#contact_email').on('input', function() {
            var input=$(this);
            var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var is_email=re.test(input.val());
            if(is_email){input.removeClass("invalid").addClass("valid");}
            else{input.removeClass("valid").addClass("invalid");}
            
            $("input").on("change", function() {
                this.setAttribute(
                    "data-date",
                    moment(this.value, "YYYY-MM-DD")
                    .format( this.getAttribute("data-date-format") )
                )
            }).trigger("change")
});
        </script>
        <script>
            function disableCIPradiobutton(){
                var txt=document.getElementById('numcip');
                if(document.getElementById('cipSi').checked){
                    txt.disabled=false;
                    txt.required=true;
                }
                if(document.getElementById('cipNo').checked){
                    txt.value='';
                    txt.disabled=true;
                    txt.required=false;
                }
            }
            
        </script>
        <script>
            function disableTxtDetalle(){
                var txt=document.getElementById('txtDetalle');
                if(document.getElementById('rdbExperienciaSi').checked){
                    txt.disabled=false;
                    txt.required=true;
                }
                if(document.getElementById('rdbExperienciaNo').checked){
                    txt.value='';
                    txt.disabled=true;
                    txt.required=false;
                }
            }
        </script>
        <script>
            function enviar(op){

            document.form.action = "../../Controlador/RegistroVoluntarioControlador.php";
            document.form.method = "POST";
            document.form.op.value = op;
            document.form.submit();
    
            }
        </script>
        <script>
            function validarchkobjencasa(){
                if(!document.getElementById('chkCompu').checked &&
                    !document.getElementById('chkLap').checked &&
                    !document.getElementById('chkInter').checked &&
                    !document.getElementById('chkCel').checked ){
                    document.getElementById('objetencasa').focus();
                    alert('Debe marcar al menos uno de las cajas indicando que objetos tiene en casa');
                        }
            }
        </script>
        <script>
            function atLeastOne(){
                if(!document.getElementById('chkFacebook').checked &&
                   !document.getElementById('chkWeb').checked &&
                   !document.getElementById('chkEmail').checked &&
                   !document.getElementById('chkRadio').checked &&
                   !document.getElementById('chkDiario').checked &&
                   !document.getElementById('chkAfiche').checked &&
                   !document.getElementById('chkVolante').checked &&
                   !document.getElementById('chkVideo').checked &&
                   !document.getElementById('chkConferencia').checked &&
                   !document.getElementById('chkCIP').checked &&
                   !document.getElementById('chkUniversidad').checked &&
                   !document.getElementById('chkMunicipalidad').checked &&
                   !document.getElementById('chkAmigo').checked &&){
               document.getElementById('enterocampana').focus();
                    alert('Debe marcar al menos uno de las opciones por la cual se entero de la campaña');
                    
                }
            }
        </script>
    </head>
    <body>
        <form name="form" >
            <ul class="form-style-1">
                <span class="login100-form-title p-b-34">
                            REGISTRO DE VOLUNTARIO
                        </span>
                <li>
                    <label>Dni</label>
                    <input type="text" name="dniusu" id="txtDni" class="field-long" placeholder="Dni" maxlength="8" minlength="8" onkeypress="validate(event)" required=""/>
                    Tiene Reg. CIP : Sí<input type="radio" id="cipSi" name="cipsi"  onclick="disableCIPradiobutton()" value="Si">
                    No<input type="radio" name="cipsi" id="cipNo" value="No" onclick="disableCIPradiobutton()" checked="">
                    N°<input type="text" maxlength="6" name="cip" id="numcip" class="field" placerholder="Número" size="15" disabled=""/>
                </li>
                <li>
                    <label>Nombres / Apellidos</label>
                    <input type="text" name="nombres" id="txtNombres" class="field-divided" placeholder="Nombres" required/> 
                    <input type="text" name="apellidos" id="txtApellidos" class="field-divided" placeholder="Apellidos" required/>
                </li>
                 <li>
                    <label>Grado Académico</label>
                    <select name="gradoacad" class="field-divided" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="Ingeniero">Ingeniero</option>
                        <option value="Graduado">Graduado</option>
                        <option value="Egresado">Egresado</option>
                        <option value="Estudiante">Estudiante</option>
                    </select>
                </li>
                 <li>
                    <label>Especialidad</label>
                    <input type="text" name="especia" id="txtEspecialidad" class="field-divided" placeholder="Especialidad" required/> 
                </li>
                <li>
                    <label>Universidad / Ciclo</label>
                    <input type="text" name="nomuniver" id="txtUniversidad" class="field-divided" placeholder="Universidad" required/>
                    <input type="text" name="ciclo" id="txtCiclo" class="field-divided" placeholder="Ciclo" required/>
                </li>
                <li>
                    <label>Nacimiento</label>
                    <input type="text" name="provnaci" id="txtProvNac" class="field-divided" placeholder="Provincia" required/>
                    <input type="text" name="distnaci" id="txtDistNac" class="field-divided" placeholder="Distrito" required/>
                </li>
                <li>
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="fecnaci" id="txtFechaNac" class="field-divided" min="1928-01-01" max="2000-01-01" data-date="" data-date-format="YYYY MM DD" placeholder="DD/MM/AAAA" required/>
                </li>
                <li>
                    <label>Domicilio</label>
                    <input type="text" name="domiact" Id="txtDomicilio" class="field-divided" placeholder="Domicilio" required/>
                </li>
                <li>
                    <label>Distrito / E-mail</label>
                    <input type="text" name="distact" id="txtDistAct" class="field-divided" placeholder="Distrito" required/>
                    <input type="text" name="email" id="txtEmail" class="field-divided" placeholder="E-mail" />
                </li>
                <li>
                    <label>Celular / Teléfono</label>
                    <input type="text" name="celu" id="txtCelular" class="field-divided" placeholder="Celular" maxlength="9" onkeypress="validate()" />
                    <input type="text" name="tele" id="txtTelefono" class="field-divided" placeholder="Teléfono" maxlength="10" onkeypress="validate()"/>
                </li>
                <li>
                    <label>Empresa / Cargo</label>
                    <input type="text" name="nomempres" id="txtEmpresa" class="field-divided" placeholder="Empresa" />
                    <input type="text" name="cargempres" id="txtCargo" class="field-divided" placeholder="Cargo"/>
                </li>
                <li>
                    <label>Dirección / Distrito</label>
                    <input type="text" name="dirempres" id="txtDirEmp" class="field-divided" placeholder="Dirección" />
                    <input type="text" name="distempres" id="txtDistEmp" class="field-divided" placeholder="Distrito" />
                </li>
                <li>
                    <label>Teléfono / E-mail</label>
                    <input type="text" name="telempres" id="txtTelEmp" class="field-divided" placeholder="Teléfono" maxlength="10" onkeypress="validate()"/>
                    <input type="text" name="emailempres" id="txtEmailEmp" class="field-divided" placeholder="E-mail" />
                </li>
                <li>
                    <label>Has participado antes en alguna Campaña Alfabetizacion Digital:</label>
                    <input type="radio"  value="Si" name="participaprevia" id="rdbParticipacionSi" /> Si
                    <input type="radio"  value="No" name="participaprevia" id="rdbParticipacionNo" checked=""/> No
                </li>
                <li>
                    <label id="objetencasa">Marque si tiene en casa:</label>
                    <input type="checkbox" name="chkCompu" value="1" />Computadora
                    <input type="checkbox" name="chkLap" value="1" />Laptop
                    <input type="checkbox" name="chkInter" value="1" />Internet
                    <input type="checkbox" name="chkCel" value="1" />Celular
                </li>
                <li>
                    <label>Indique su nivel de conocimiento: (N)Nulo (B)Basico (I)Intermedio (A)Avanzado</label>
                <center>
                    Windows <select name="windows" >
                                <option value="N" selected="">N</option>
                                <option value="B">B</option>
                                <option value="I">I</option>
                                <option value="A">A</option>
                            </select>
                     Internet <select name="internet" >
                                <option value="N" selected="">N</option>
                                <option value="B">B</option>
                                <option value="I">I</option>
                                <option value="A">A</option>
                            </select>
                     Correo Elect. <select name="correo" >
                                <option value="N" selected="">N</option>
                                <option value="B">B</option>
                                <option value="I">I</option>
                                <option value="A">A</option>
                            </select>
                     Word <select name="word" >
                                <option value="N" selected="">N</option>
                                <option value="B">B</option>
                                <option value="I">I</option>
                                <option value="A">A</option>
                            </select>
                     <p>
                     Excel <select name="excel" >
                                <option value="N" selected="">N</option>
                                <option value="B">B</option>
                                <option value="I">I</option>
                                <option value="A">A</option>
                            </select>
                     Power Point <select name="porwerpoint" >
                                <option value="N" selected="">N</option>
                                <option value="B">B</option>
                                <option value="I">I</option>
                                <option value="A">A</option>
                            </select>
                     </p>
                </center>
                </li>
                <li>
                    <label>Tiene experiencia en Docencia:</label>
                <center>
                    Si <input type="radio" name="rdbExperiencia" id="rdbExperienciaSi" value="Si" onclick="disableTxtDetalle()"/> 
                    No <input type="radio" name="rdbExperiencia" id="rdbExperienciaNo" value="No" onclick="disableTxtDetalle()" checked=""/> <br>
                    <textarea name="nivelconoci" id="txtDetalle" rows="5" cols="61" 
                              placeholder="Detallar aqui en caso de haber respondido si" disabled="" /></textarea>
                </center>
            </li>
            <li>
                <label id="enterocampana">Como se enteró de la Campaña(marque una o más alternativas):</label>
                <input type="checkbox" name="chkFacebook" id="chkFacebook" value="1" />Facebook
                <input type="checkbox" name="chkWeb" id="chkWeb" value="1" />Web
                <input type="checkbox" name="chkEmail" id="chkEmail" value="1" />E-mail
                <input type="checkbox" name="chkRadio" id="chkRadio" value="1" />Radio
                <input type="checkbox" name="chkDiario" id="chkDiario" value="1" />Diario
                <input type="checkbox" name="chkAfiche" id="chkAfiche" value="1" />Afiche
                <input type="checkbox" name="chkVolante" id="chkVolante" value="1" />Volante
                <input type="checkbox" name="chkVideo" id="chkVideo" value="1" />Video
                <input type="checkbox" name="chkConferencia" id="chkConferencia" value="1" />Conferencia/Charla
                <input type="checkbox" name="chkCIP" id="chkCIP" value="1" />CIP
                <input type="checkbox" name="chkUniversidad" id="chkUniversidad" value="1" />Universidad
                <input type="checkbox" name="chkMunicipalidad" id="chkMunicipalidad" value="1" />Municipalidad
                <input type="checkbox" name="chkAmigo" id="chkAmigo" value="1" />Amigo
            </li>
            <li>
                <label>Disponibilidad de Horario</label>
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
                        <td><input type="radio" name="Lunes1" value="Lunes 8:00am-9:00am"/></td>
                        <td><input type="radio" name="Martes1" value="Martes 8:00am-9:00am"/></td>
                        <td><input type="radio" name="Miercoles1" value="Miercoles 8:00am-9:00am"/></td>
                        <td><input type="radio" name="Jueves1" value="Jueves 8:00am-9:00am"/></td>
                        <td><input type="radio" name="Viernes1" value="Viernes 8:00am-9:00am"/></td>
                        <td><input type="radio" name="Sabado1" value="Sabado 8:00am-9:00am"/></td>
                        <td><input type="radio" name="Domingo1" value="Domingo 8:00am-9:00am"/></td>
                    </tr>
                    <tr>
                        <td>9:00am-10:00am</td>
                        <td><input type="radio" name="Lunes2" value="Lunes 9:00am-10:00am"/></td>
                        <td><input type="radio" name="Martes2" value="Martes 9:00am-10:00am"/></td>
                        <td><input type="radio" name="Miercoles2" value="Miercoles 9:00am-10:00am"/></td>
                        <td><input type="radio" name="Jueves2" value="Jueves 9:00am-10:00am"/></td>
                        <td><input type="radio" name="Viernes2" value="Viernes 9:00am-10:00am"/></td>
                        <td><input type="radio" name="Sabado2" value="Sabado 9:00am-10:00am"/></td>
                        <td><input type="radio" name="Domingo2" value="Domingo 9:00am-10:00am"/></td>
                    </tr>
                    <tr>
                        <td>10:00am-11:00am</td>
                        <td><input type="radio" name="Lunes3" value="Lunes 10:00am-11:00am"/></td>
                        <td><input type="radio" name="Martes3" value="Martes 10:00am-11:00am"/></td>
                        <td><input type="radio" name="Miercoles3" value="Miercoles 10:00am-11:00am"/></td>
                        <td><input type="radio" name="Jueves3" value="Jueves 10:00am-11:00am"/></td>
                        <td><input type="radio" name="Viernes3" value="Viernes 10:00am-11:00am"/></td>
                        <td><input type="radio" name="Sabado3" value="Sabado 10:00am-11:00am"/></td>
                        <td><input type="radio" name="Domingo3" value="Domingo 10:00am-11:00am"/></td>
                    </tr>
                    <tr>
                        <td>11:00am-12:00pm</td>
                        <td><input type="radio" name="Lunes4" value="Lunes 11:00am-12:00pm"/></td>
                        <td><input type="radio" name="Martes4" value="Martes 11:00am-12:00pm"/></td>
                        <td><input type="radio" name="Miercoles4" value="Miercoles 11:00am-12:00pm"/></td>
                        <td><input type="radio" name="Jueves4" value="Jueves 11:00am-12:00pm"/></td>
                        <td><input type="radio" name="Viernes4" value="Viernes 11:00am-12:00pm"/></td>
                        <td><input type="radio" name="Sabado4" value="Sabado 11:00am-12:00pm"/></td>
                        <td><input type="radio" name="Domingo4" value="Domingo 11:00am-12:00pm"/></td>
                    </tr>
                    <tr>
                        <td>12:00pm-1:00pm</td>
                        <td><input type="radio" name="Lunes5" value="Lunes 12:00pm-1:00pm"/></td>
                        <td><input type="radio" name="Martes5" value="Martes 12:00pm-1:00pm"/></td>
                        <td><input type="radio" name="Miercoles5" value="Miercoles 12:00pm-1:00pm"/></td>
                        <td><input type="radio" name="Jueves5" value="Jueves 12:00pm-1:00pm"/></td>
                        <td><input type="radio" name="Viernes5" value="Viernes 12:00pm-1:00pm"/></td>
                        <td><input type="radio" name="Sabado5" value="Sabado 12:00pm-1:00pm"/></td>
                        <td><input type="radio" name="Domingo5" value="Domingo 12:00pm-1:00pm"/></td>
                    </tr>
                    <tr>
                        <td>1:00pm-2:00pm</td>
                        <td><input type="radio" name="Lunes6" value="Lunes 1:00pm-2:00pm"/></td>
                        <td><input type="radio" name="Martes6" value="Martes 1:00pm-2:00pm"/></td>
                        <td><input type="radio" name="Miercoles6" value="Miercoles 1:00pm-2:00pm"/></td>
                        <td><input type="radio" name="Jueves6" value="Jueves 1:00pm-2:00pm"/></td>
                        <td><input type="radio" name="Viernes6" value="Viernes 1:00pm-2:00pm"/></td>
                        <td><input type="radio" name="Sabado6" value="Sabado 1:00pm-2:00pm"/></td>
                        <td><input type="radio" name="Domingo6" value="Domingo 1:00pm-2:00pm"/></td>
                    </tr>
                    <tr>
                        <td>2:00pm-3:00pm</td>
                        <td><input type="radio" name="Lunes7" value="Lunes 2:00pm-3:00pm"/></td>
                        <td><input type="radio" name="Martes7" value="Martes 2:00pm-3:00pm"/></td>
                        <td><input type="radio" name="Miercoles7" value="Miercoles 2:00pm-3:00pm"/></td>
                        <td><input type="radio" name="Jueves7" value="Jueves 2:00pm-3:00pm"/></td>
                        <td><input type="radio" name="Viernes7" value="Viernes 2:00pm-3:00pm"/></td>
                        <td><input type="radio" name="Sabado7" value="Sabado 2:00pm-3:00pm"/></td>
                        <td><input type="radio" name="Domingo7" value="Domingo 2:00pm-3:00pm"/></td>
                    </tr>
                    <tr>
                        <td>3:00pm-4:00pm</td>
                        <td><input type="radio" name="Lunes8" value="Lunes 3:00pm-4:00pm"/></td>
                        <td><input type="radio" name="Martes8" value="Martes 3:00pm-4:00pm"/></td>
                        <td><input type="radio" name="Miercoles8" value="Miercoles 3:00pm-4:00pm"/></td>
                        <td><input type="radio" name="Jueves8" value="Jueves 3:00pm-4:00pm"/></td>
                        <td><input type="radio" name="Viernes8" value="Viernes 3:00pm-4:00pm"/></td>
                        <td><input type="radio" name="Sabado8" value="Sabado 3:00pm-4:00pm"/></td>
                        <td><input type="radio" name="Domingo8" value="Domingo 3:00pm-4:00pm"/></td>
                    </tr>
                    <tr>
                        <td>4:00pm-5:00pm</td>
                        <td><input type="radio" name="Lunes9" value="Lunes 4:00pm-5:00pm"/></td>
                        <td><input type="radio" name="Martes9" value="Martes 4:00pm-5:00pm"/></td>
                        <td><input type="radio" name="Miercoles9" value="Miercoles 4:00pm-5:00pm"/></td>
                        <td><input type="radio" name="Jueves9" value="Jueves 4:00pm-5:00pm"/></td>
                        <td><input type="radio" name="Viernes9" value="Viernes 4:00pm-5:00pm"/></td>
                        <td><input type="radio" name="Sabado9" value="Sabado 4:00pm-5:00pm"/></td>
                        <td><input type="radio" name="Domingo9" value="Domingo 4:00pm-5:00pm"/></td>
                    </tr>
                    <tr>
                        <td>5:00pm-6:00pm</td>
                        <td><input type="radio" name="Lunes10" value="Lunes 5:00pm-6:00pm"/></td>
                        <td><input type="radio" name="Martes10" value="Martes 5:00pm-6:00pm"/></td>
                        <td><input type="radio" name="Miercoles10" value="Miercoles 5:00pm-6:00pm"/></td>
                        <td><input type="radio" name="Jueves10" value="Jueves 5:00pm-6:00pm"/></td>
                        <td><input type="radio" name="Viernes10" value="Viernes 5:00pm-6:00pm"/></td>
                        <td><input type="radio" name="Sabado10" value="Sabado 5:00pm-6:00pm"/></td>
                        <td><input type="radio" name="Domingo10" value="Domingo 5:00pm-6:00pm"/></td>
                    </tr>
                    <tr>
                        <td>6:00pm-7:00pm</td>
                        <td><input type="radio" name="Lunes11" value="Lunes 6:00pm-7:00pm"/></td>
                        <td><input type="radio" name="Martes11" value="Martes 6:00pm-7:00pm"/></td>
                        <td><input type="radio" name="Miercoles11" value="Miercoles 6:00pm-7:00pm"/></td>
                        <td><input type="radio" name="Jueves11" value="Jueves 6:00pm-7:00pm"/></td>
                        <td><input type="radio" name="Viernes11" value="Viernes 6:00pm-7:00pm"/></td>
                        <td><input type="radio" name="Sabado11" value="Sabado 6:00pm-7:00pm"/></td>
                        <td><input type="radio" name="Domingo11" value="Domingo 6:00pm-7:00pm"/></td>
                    </tr>
                    <tr>
                        <td>7:00pm-8:00pm</td>
                        <td><input type="radio" name="Lunes12" value="Lunes 7:00pm-8:00pm"/></td>
                        <td><input type="radio" name="Martes12" value="Martes 7:00pm-8:00pm"/></td>
                        <td><input type="radio" name="Miercoles12" value="Miercoles 7:00pm-8:00pm"/></td>
                        <td><input type="radio" name="Jueves12" value="Jueves 7:00pm-8:00pm"/></td>
                        <td><input type="radio" name="Viernes12" value="Viernes 7:00pm-8:00pm"/></td>
                        <td><input type="radio" name="Sabado12" value="Sabado 7:00pm-8:00pm"/></td>
                        <td><input type="radio" name="Domingo12" value="Domingo 7:00pm-8:00pm"/></td>
                    </tr>
                    <tr>
                        <td>8:00pm-9:00pm</td>
                        <td><input type="radio" name="Lunes13" value="Lunes 8:00pm-9:00pm"/></td>
                        <td><input type="radio" name="Martes13" value="Martes 8:00pm-9:00pm"/></td>
                        <td><input type="radio" name="Miercoles13" value="Miercoles 8:00pm-9:00pm"/></td>
                        <td><input type="radio" name="Jueves13" value="Jueves 8:00pm-9:00pm"/></td>
                        <td><input type="radio" name="Viernes13" value="Viernes 8:00pm-9:00pm"/></td>
                        <td><input type="radio" name="Sabado13" value="Sabado 8:00pm-9:00pm"/></td>
                        <td><input type="radio" name="Domingo13" value="Domingo 8:00pm-9:00pm"/></td>
                    </tr>
                    <tr>
                        <td>9:00pm-10:00pm</td>
                        <td><input type="radio" name="Lunes14" value="Lunes 9:00pm-10:00pm"/></td>
                        <td><input type="radio" name="Martes14" value="Martes 9:00pm-10:00pm"/></td>
                        <td><input type="radio" name="Miercoles14" value="Miercoles 9:00pm-10:00pm"/></td>
                        <td><input type="radio" name="Jueves14" value="Jueves 9:00pm-10:00pm"/></td>
                        <td><input type="radio" name="Viernes14" value="Viernes 9:00pm-10:00pm"/></td>
                        <td><input type="radio" name="Sabado14" value="Sabado 9:00pm-10:00pm"/></td>
                        <td><input type="radio" name="Domingo14" value="Domingo 9:00pm-10:00pm"/></td>
                    </tr>
                </table>
            </li>
            <li>
                <label>Aplicara para</label>
                <input type="radio" name="aplicarpara" value="Capacitador" id="chkaplicaCapacitador" />Capacitador
                <input type="radio" name="aplicarpara" value="Asistente" id="chkaplicaAsistente" />Asistente
                <input type="radio" name="aplicarpara" value="Apoyo" id="chkaplicaApoyo" />Apoyo
            </li>
            <li>
            <center>
                <input type="button" onclick="window.location.href='../../Login.php'" value="Volver" />
                <input type="button" onclick="validarchkobjencasa();atLeastOne();enviar('1')" value="Grabar" />
            </center>
            </li>
            </ul>
        </form>
    </body>
</html>
