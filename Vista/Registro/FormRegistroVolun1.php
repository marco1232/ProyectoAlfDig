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
        </style>
        <style>
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
            function enviar(){

            document.form.action = "../../Controlador/RegistroVoluntarioControlador.php";
            document.form.method = "POST";
//            document.form.op.value = op;
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
                   !document.getElementById('chkAmigo').checked){
               document.getElementById('enterocampana').focus();
                    alert('Debe marcar al menos uno de las opciones por la cual se entero de la campaña');
                    
                }
            }
        </script>
    <script>
        function disableTxtCiclo(){
                var txt=document.getElementById('txtCiclo');
                if(document.getElementById('gradoacadEst').checked){
                    txt.disabled=false;
                    txt.required=true;
                }
                if(document.getElementById('gradoacadIng').checked ||
                    document.getElementById('gradoacadGrad').checked ||
                    document.getElementById('gradoacadEgre').checked
                    ){
                    txt.value='';
                    txt.disabled=true;
                    txt.required=false;
                }
            } 
    </script>
    </head>
    <body>
        <form name="form" >
            <ul class="form-style-1">
                <input type="button" onclick="window.location.href='../../Login.php'" value="Volver" >
                <span class="login100-form-title p-b-34">
                            REGISTRO DE VOLUNTARIO
                        </span>
                <li>
                    <label>Dni</label>
                    <input type="text" name="dniusu" id="txtDni" class="field-long" placeholder="Dni" maxlength="8" minlength="8" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo DNI')" required=""/>
                    Tiene Reg. CIP : Sí<input type="radio" id="cipSi" name="cipsi"  onclick="disableCIPradiobutton()" value="Si">
                    No<input type="radio" name="cipsi" id="cipNo" value="No" onclick="disableCIPradiobutton()" checked="">
                    N°<input type="text" maxlength="6" name="cip" id="numcip" class="field" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Numero CIP')" placerholder="Número" size="15" disabled=""/>
                </li>
                <li>
                    <label>Nombres / Apellidos</label>
                    <input type="text" name="nombres" id="txtNombres" class="field-divided" placeholder="Nombres" required/> 
                    <input type="text" name="apellidos" id="txtApellidos" class="field-divided" placeholder="Apellidos" required/>
                </li>
                 
                <li>
                    <label>Grado Academico</label>
                    Ingeniero<input type="radio" id="gradoacadIng" name="gradoacad"  onclick="disableTxtCiclo()" value="Ingeniero">
                    Graduado<input type="radio" name="gradoacad" id="gradoacadGrad" value="Graduado" onclick="disableTxtCiclo()" >
                    Egresado<input type="radio" id="gradoacadEgre" name="gradoacad"  onclick="disableTxtCiclo()" value="Egresado">
                    Estudiante<input type="radio" name="gradoacad" id="gradoacadEst" value="Estudiante" onclick="disableTxtCiclo()" checked="">
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
<!--                    <input type="text" name="distact" id="txtDistAct" class="field-divided" placeholder="Distrito" required/>-->
                    <select name="distact" id="distAct" class="field-divided" required="">
                        <option value="">---</option>
                        <option value="Ancon">Ancon</option>
                        <option value="Ate">Ate</option>
                        <option value="Barranco">Barranco</option>
                        <option value="Brena">Brena</option>
                        <option value="Carabayllo">Carabayllo</option>
                        <option value="Chaclacayo">Chaclacayo</option>
                        <option value="Chorrillos">Chorrillos</option>
                        <option value="Cieneguilla">Cieneguilla</option>
                        <option value="Comas">Comas</option>
                        <option value="El Agustino">El Agustino</option>
                        <option value="Independencia">Independencia</option>
                        <option value="Jesus Maria">Jesus Maria</option>
                        <option value="La Molina">La Molina</option>
                        <option value="La Victoria">La Victoria</option>
                        <option value="Lima">Lima</option>
                        <option value="Lince">Lince</option>
                        <option value="Los Olivos">Los Olivos</option>
                        <option value="Lurigancho">Lurigancho</option>
                        <option value="Lurin">Lurin</option>
                        <option value="Magdalena del Mar">Magdalena del Mar</option>
                        <option value="Miraflores">Miraflores</option>
                        <option value="Pachacamac">Pachacamac</option>
                        <option value="Pucusana">Pucusana</option>
                        <option value="Pueblo Libre">Pueblo Libre</option>
                        <option value="Puente Piedra">Puente Piedra</option>
                        <option value="Punta Hermosa">Punta Hermosa</option>
                        <option value="Punta Negra">Punta Negra</option>
                        <option value="Rimac">Rimac</option>
                        <option value="San Bartolo">San Bartolo</option>
                        <option value="San Borja">San Borja</option>
                        <option value="San Isidro">San Isidro</option>
                        <option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
                        <option value="San Juan de Miraflores">San Juan de Miraflores</option>
                        <option value="San Luis">San Luis</option>
                        <option value="San Martin de Porres">San Martin de Porres</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="Santa Anita">Santa Anita</option>
                        <option value="Santa María del Mar">Santa María del Mar</option>
                        <option value="Santa Rosa">Santa Rosa</option>
                        <option value="Santiago de Surco">Santiago de Surco</option>
                        <option value="Surquillo">Surquillo</option>
                        <option value="Villa El Salvador">Villa El Salvador</option>
                        <option value="Villa Maria del Triunfo">Villa Maria del Triunfo</option>
                        <option value="Bellavista">Bellavista</option>
                        <option value="Callao">Callao</option>
                        <option value="Carmen de La Legua-Reynoso">Carmen de La Legua-Reynoso</option>
                        <option value="La Perla">La Perla</option>
                        <option value="La Punta">La Punta</option>
                        <option value="Ventanilla">Ventanilla</option>
                        <option value="Mi Peru">Mi Peru</option>
                    </select>
                    <input type="text" name="email" id="txtEmail" class="field-divided" placeholder="E-mail" />
                </li>
                <li>
                    <label>Celular / Teléfono</label>
                    <input type="text" name="celu" id="txtCelular" class="field-divided" placeholder="Celular" maxlength="9" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Celular')" />
                    <input type="text" name="tele" id="txtTelefono" class="field-divided" placeholder="Teléfono" maxlength="7" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Telefono')"/>
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
                    <input type="text" name="telempres" id="txtTelEmp" class="field-divided" placeholder="Teléfono" maxlength="7" onkeypress="validate(event,'Solo se puede ingresar numeros en el campo Telefono')"/>
                    <input type="text" name="emailempres" id="txtEmailEmp" class="field-divided" placeholder="E-mail"  />
                </li>
                <li>
                    <label>Has participado antes en alguna Campaña Alfabetizacion Digital:</label>
                    <input type="radio"  value="Si" name="participaprevia" id="rdbParticipacionSi" /> Si
                    <input type="radio"  value="No" name="participaprevia" id="rdbParticipacionNo" checked=""/> No
                </li>
                <li>
                    <label id="objetencasa">Marque si tiene en casa:</label>
                    <input type="checkbox" name="chkCompu" id="chkCompu" value="1" />Computadora
                    <input type="checkbox" name="chkLap" id="chkLap" value="1" />Laptop
                    <input type="checkbox" name="chkInter" id="chkInter" value="1" />Internet
                    <input type="checkbox" name="chkCel" id="chkCel" value="1" />Celular
                </li>
                <li>
                    <label>Indique su nivel de conocimiento: (N)Nulo (B)Basico (I)Intermedio (A)Avanzado</label>
                <center>
                    Windows <select name="windows" >
                                <option value="N" selected="">NULO</option>
                                <option value="B">BASICO</option>
                                <option value="I">INTERMEDIO</option>
                                <option value="A">AVANZADO</option>
                            </select>
                     Internet <select name="internet" >
                                <option value="N" selected="">NULO</option>
                                <option value="B">BASICO</option>
                                <option value="I">INTERMEDIO</option>
                                <option value="A">AVANZADO</option>
                     </select>
                     Correo Elect. <select name="correo" >
                                <option value="N" selected="">NULO</option>
                                <option value="B">BASICO</option>
                                <option value="I">INTERMEDIO</option>
                                <option value="A">AVANZADO</option>
                            </select><br>
                     Word <select name="word" >
                                <option value="N" selected="">NULO</option>
                                <option value="B">BASICO</option>
                                <option value="I">INTERMEDIO</option>
                                <option value="A">AVANZADO</option>
                            </select>
                     
                     Excel <select name="excel" >
                                <option value="N" selected="">NULO</option>
                                <option value="B">BASICO</option>
                                <option value="I">INTERMEDIO</option>
                                <option value="A">AVANZADO</option>
                            </select>
                     Power Point <select name="porwerpoint" >
                                <option value="N" selected="">NULO</option>
                                <option value="B">BASICO</option>
                                <option value="I">INTERMEDIO</option>
                                <option value="A">AVANZADO</option>
                            </select>
                     
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
                        <td><input type="checkbox" name="Lunes1" value="1"/></td>
                        <td><input type="checkbox" name="Martes1" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles1" value="1"/></td>
                        <td><input type="checkbox" name="Jueves1" value="1"/></td>
                        <td><input type="checkbox" name="Viernes1" value="1"/></td>
                        <td><input type="checkbox" name="Sabado1" value="1"/></td>
                        <td><input type="checkbox" name="Domingo1" value="1"/></td>
                    </tr>
                    <tr>
                        <td>9:00am-10:00am</td>
                        <td><input type="checkbox" name="Lunes2" value="1"/></td>
                        <td><input type="checkbox" name="Martes2" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles2" value="1"/></td>
                        <td><input type="checkbox" name="Jueves2" value="1"/></td>
                        <td><input type="checkbox" name="Viernes2" value="1"/></td>
                        <td><input type="checkbox" name="Sabado2" value="1"/></td>
                        <td><input type="checkbox" name="Domingo2" value="1"/></td>
                    </tr>
                    <tr>
                        <td>10:00am-11:00am</td>
                        <td><input type="checkbox" name="Lunes3" value="1"/></td>
                        <td><input type="checkbox" name="Martes3" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles3" value="1"/></td>
                        <td><input type="checkbox" name="Jueves3" value="1"/></td>
                        <td><input type="checkbox" name="Viernes3" value="1"/></td>
                        <td><input type="checkbox" name="Sabado3" value="1"/></td>
                        <td><input type="checkbox" name="Domingo3" value="1"/></td>
                    </tr>
                    <tr>
                        <td>11:00am-12:00pm</td>
                        <td><input type="checkbox" name="Lunes4" value="1"/></td>
                        <td><input type="checkbox" name="Martes4" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles4" value="1"/></td>
                        <td><input type="checkbox" name="Jueves4" value="1"/></td>
                        <td><input type="checkbox" name="Viernes4" value="1"/></td>
                        <td><input type="checkbox" name="Sabado4" value="1"/></td>
                        <td><input type="checkbox" name="Domingo4" value="1"/></td>
                    </tr>
                    <tr>
                        <td>12:00pm-1:00pm</td>
                        <td><input type="checkbox" name="Lunes5" value="1"/></td>
                        <td><input type="checkbox" name="Martes5" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles5" value="1"/></td>
                        <td><input type="checkbox" name="Jueves5" value="1"/></td>
                        <td><input type="checkbox" name="Viernes5" value="1"/></td>
                        <td><input type="checkbox" name="Sabado5" value="1"/></td>
                        <td><input type="checkbox" name="Domingo5" value="1"/></td>
                    </tr>
                    <tr>
                        <td>1:00pm-2:00pm</td>
                        <td><input type="checkbox" name="Lunes6" value="1"/></td>
                        <td><input type="checkbox" name="Martes6" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles6" value="1"/></td>
                        <td><input type="checkbox" name="Jueves6" value="1"/></td>
                        <td><input type="checkbox" name="Viernes6" value="1"/></td>
                        <td><input type="checkbox" name="Sabado6" value="1"/></td>
                        <td><input type="checkbox" name="Domingo6" value="1"/></td>
                    </tr>
                    <tr>
                        <td>2:00pm-3:00pm</td>
                        <td><input type="checkbox" name="Lunes7" value="1"/></td>
                        <td><input type="checkbox" name="Martes7" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles7" value="1"/></td>
                        <td><input type="checkbox" name="Jueves7" value="1"/></td>
                        <td><input type="checkbox" name="Viernes7" value="1"/></td>
                        <td><input type="checkbox" name="Sabado7" value="1"/></td>
                        <td><input type="checkbox" name="Domingo7" value="1"/></td>
                    </tr>
                    <tr>
                        <td>3:00pm-4:00pm</td>
                        <td><input type="checkbox" name="Lunes8" value="1"/></td>
                        <td><input type="checkbox" name="Martes8" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles8" value="1"/></td>
                        <td><input type="checkbox" name="Jueves8" value="1"/></td>
                        <td><input type="checkbox" name="Viernes8" value="1"/></td>
                        <td><input type="checkbox" name="Sabado8" value="1"/></td>
                        <td><input type="checkbox" name="Domingo8" value="1"/></td>
                    </tr>
                    <tr>
                        <td>4:00pm-5:00pm</td>
                        <td><input type="checkbox" name="Lunes9" value="1"/></td>
                        <td><input type="checkbox" name="Martes9" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles9" value="1"/></td>
                        <td><input type="checkbox" name="Jueves9" value="1"/></td>
                        <td><input type="checkbox" name="Viernes9" value="1"/></td>
                        <td><input type="checkbox" name="Sabado9" value="1"/></td>
                        <td><input type="checkbox" name="Domingo9" value="1"/></td>
                    </tr>
                    <tr>
                        <td>5:00pm-6:00pm</td>
                        <td><input type="checkbox" name="Lunes10" value="1"/></td>
                        <td><input type="checkbox" name="Martes10" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles10" value="1"/></td>
                        <td><input type="checkbox" name="Jueves10" value="1"/></td>
                        <td><input type="checkbox" name="Viernes10" value="1"/></td>
                        <td><input type="checkbox" name="Sabado10" value="1"/></td>
                        <td><input type="checkbox" name="Domingo10" value="1"/></td>
                    </tr>
                    <tr>
                        <td>6:00pm-7:00pm</td>
                        <td><input type="checkbox" name="Lunes11" value="1"/></td>
                        <td><input type="checkbox" name="Martes11" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles11" value="1"/></td>
                        <td><input type="checkbox" name="Jueves11" value="1"/></td>
                        <td><input type="checkbox" name="Viernes11" value="1"/></td>
                        <td><input type="checkbox" name="Sabado11" value="1"/></td>
                        <td><input type="checkbox" name="Domingo11" value="1"/></td>
                    </tr>
                    <tr>
                        <td>7:00pm-8:00pm</td>
                        <td><input type="checkbox" name="Lunes12" value="1"/></td>
                        <td><input type="checkbox" name="Martes12" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles12" value="1"/></td>
                        <td><input type="checkbox" name="Jueves12" value="1"/></td>
                        <td><input type="checkbox" name="Viernes12" value="1"/></td>
                        <td><input type="checkbox" name="Sabado12" value="1"/></td>
                        <td><input type="checkbox" name="Domingo12" value="1"/></td>
                    </tr>
                    <tr>
                        <td>8:00pm-9:00pm</td>
                        <td><input type="checkbox" name="Lunes13" value="1"/></td>
                        <td><input type="checkbox" name="Martes13" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles13" value="1"/></td>
                        <td><input type="checkbox" name="Jueves13" value="1"/></td>
                        <td><input type="checkbox" name="Viernes13" value="1"/></td>
                        <td><input type="checkbox" name="Sabado13" value="1"/></td>
                        <td><input type="checkbox" name="Domingo13" value="1"/></td>
                    </tr>
                    <tr>
                        <td>9:00pm-10:00pm</td>
                        <td><input type="checkbox" name="Lunes14" value="1"/></td>
                        <td><input type="checkbox" name="Martes14" value="1"/></td>
                        <td><input type="checkbox" name="Miercoles14" value="1"/></td>
                        <td><input type="checkbox" name="Jueves14" value="1"/></td>
                        <td><input type="checkbox" name="Viernes14" value="1"/></td>
                        <td><input type="checkbox" name="Sabado14" value="1"/></td>
                        <td><input type="checkbox" name="Domingo14" value="1"/></td>
                    </tr>
                </table>
                </li>
                <li>
                    <label>Aplicara para</label>
                    <input type="radio" name="aplicarpara" value="Capacitador" id="chkaplicaCapacitador" checked/>Capacitador
                    <input type="radio" name="aplicarpara" value="Asistente" id="chkaplicaAsistente" />Asistente
                    <input type="radio" name="aplicarpara" value="Apoyo" id="chkaplicaApoyo" />Apoyo
                </li>
                <li>
                <center>
                    <input type="button" onclick="window.location.href='../../Login.php'" value="Volver" />
                    <input type="button" onclick="validarchkobjencasa();atLeastOne();enviar()" value="Grabar" />
                </center>
                </li>
            </ul>
        </form>
    </body>
</html>
