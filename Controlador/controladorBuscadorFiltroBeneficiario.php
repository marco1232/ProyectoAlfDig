<?php
$op=$_GET['op'];
$val=$_GET['val'];
$has_A = strpos($val, "'") !== false;
if($has_A=='1'){$val1='yes';}else{$val1='no';}
//$val= str_replace("'", "", $val);
//echo $val;
switch ($op){
    case 1:{
        include "../Util/config.php";
        if($val1=='yes'){
//            $fila = array();
//                        $sql = "select * from usuario where usua='".$usua."' and pass='".$pass."' and estado='ACTIVO'";
                        $sql = "select * from usuario u inner join beneficiario b on u.dniusu=b.dniusu order by id_benefi";
                        $result = mysqli_query($conn, $sql);
//                        echo $sql;
                        echo '<table border="1" class="tituloTabla" style="text-align: center" id="customers">';
                                echo '<tr>';
                                    echo '<th colspan="30" class="tituloTabla">Beneficiarios</th>';
                                echo '</tr>';

                                echo '<tr>';
                                    
                                    echo '<td>ID beneficiario</td>';
                                    echo '<td>DNI</td>';
                                    echo '<td>Usuario de acceso</td>';
                                    echo '<td>Contraseña</td>';
                                    echo '<td>Apellidos</td>';
                                    echo '<td>Nombres</td>';
                                    echo '<td>Provincia de nacimiento</td>';
                                    echo '<td>Distrito de nacimiento</td>';
                                    echo '<td>Fecha de nacimiento</td>';
                                    echo '<td>Domicilio actual</td>';
                                    echo '<td>Distrito actual</td>';
                                    echo '<td>Email</td>';
                                    echo '<td>Celular</td>';
                                    echo '<td>Telefono</td>';
                                    echo '<td>Nombre de empresa</td>';
                                    echo '<td>Cargo de empresa</td>';
                                    echo '<td>Direccion de empresa</td>';
                                    echo '<td>Distrito de empresa</td>';
                                    echo '<td>Telefono de empresa</td>';
                                    echo '<td>Email de empresa</td>';
                                    echo '<td>Participacion previa</td>';
                                    echo '<td>Objetos en casa</td>';
                                    echo '<td>Como se entero de la campaña</td>';
                                    echo '<td>Disponibilidad</td>';
                                    echo '<td>Estado</td>';
                                    echo '<td>Grado de instruccion</td>';
                                    echo '<td>Nombre de instituto</td>';
                                    echo '<td>Especialidad</td>';
                                    echo '<td>Usa ordenador</td>';
                                    echo '<td>Conocimientos que desea aprender</td>';

                                echo '</tr>';
 
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['estado'] == 'INACTIVO') {
                                        echo '<tr class="fondogrilla" style="background-color: #ff000061;"><td>'.$row['id_benefi']."</td>";
                                    } else if ($row['estado'] == 'PENDIENTE') {
                                        echo '<tr class="fondogrilla" style="background-color: #ffff0059;"><td>'.$row['id_benefi']."</td>";
                                    } else if ($row['estado'] == 'ACTIVO') {
                                        echo '<tr class="fondogrilla" ><td>'.$row['id_benefi']."</td>";
                                    }
                                    echo "<td>".$row['dniusu']."</td>";
                                    echo "<td>".$row['usua']."</td>";
                                    echo "<td>".$row['pass']."</td>"; 
                                    echo "<td>".$row['apellidos']."</td>";
                                    echo "<td>".$row['nombres']."</td>";
                                    echo "<td>".$row['provnaci']."</td>";
                                    echo "<td>".$row['distnaci']."</td>";
                                    echo "<td>".$row['fecnaci']."</td>";
                                    echo "<td>".$row['domiact']."</td>";
                                    echo "<td>".$row['distact']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['celu']."</td>";
                                    echo "<td>".$row['tele']."</td>";
                                    echo "<td>".$row['nomempres']."</td>";
                                    echo "<td>".$row['cargempres']."</td>";
                                    echo "<td>".$row['dirempres']."</td>";
                                    echo "<td>".$row['distempres']."</td>";
                                    echo "<td>".$row['telempres']."</td>";
                                    echo "<td>".$row['emailempres']."</td>";
                                    echo "<td>".$row['participaprevia']."</td>";
                                    echo "<td>".$row['objetencasa']."</td>";
                                    echo "<td>".$row['enterarcampa']."</td>";
                                    echo "<td>".$row['disponibilidad']."</td>";
                                    echo "<td>".$row['estado']."</td>";
                                    echo "<td>".$row['gradoinstrucion']."</td>";
                                    echo "<td>".$row['nominstitu']."</td>";
                                    echo "<td>".$row['especia']."</td>";
                                    echo "<td>".$row['usaordenador']."</td>";
                                    echo "<td>".$row['conociaprender']."</td>";
                        }
                        
                        echo '</tr>';
                        echo '</table>';
        }else{
//                        $fila = array();
//                        $sql = "select * from usuario where usua='".$usua."' and pass='".$pass."' and estado='ACTIVO'";
                        $sql = "select * from usuario u inner join beneficiario b on ((u.nombres like '%".$val."%' or u.apellidos like '%".$val."%') ) and u.dniusu=b.dniusu order by id_benefi";
                        $result = mysqli_query($conn, $sql);
//                        echo $sql;
                        echo '<table border="1" class="tituloTabla" style="text-align: center" id="customers">';
                                echo '<tr>';
                                    echo '<th colspan="30" class="tituloTabla">Beneficiarios</th>';
                                echo '</tr>';

                                echo '<tr>';
                                    
                                    echo '<td>ID beneficiario</td>';
                                    echo '<td>DNI</td>';
                                    echo '<td>Usuario de acceso</td>';
                                    echo '<td>Contraseña</td>';
                                    echo '<td>Apellidos</td>';
                                    echo '<td>Nombres</td>';
                                    echo '<td>Provincia de nacimiento</td>';
                                    echo '<td>Distrito de nacimiento</td>';
                                    echo '<td>Fecha de nacimiento</td>';
                                    echo '<td>Domicilio actual</td>';
                                    echo '<td>Distrito actual</td>';
                                    echo '<td>Email</td>';
                                    echo '<td>Celular</td>';
                                    echo '<td>Telefono</td>';
                                    echo '<td>Nombre de empresa</td>';
                                    echo '<td>Cargo de empresa</td>';
                                    echo '<td>Direccion de empresa</td>';
                                    echo '<td>Distrito de empresa</td>';
                                    echo '<td>Telefono de empresa</td>';
                                    echo '<td>Email de empresa</td>';
                                    echo '<td>Participacion previa</td>';
                                    echo '<td>Objetos en casa</td>';
                                    echo '<td>Como se entero de la campaña</td>';
                                    echo '<td>Disponibilidad</td>';
                                    echo '<td>Estado</td>';
                                    echo '<td>Grado de instruccion</td>';
                                    echo '<td>Nombre de instituto</td>';
                                    echo '<td>Especialidad</td>';
                                    echo '<td>Usa ordenador</td>';
                                    echo '<td>Conocimientos que desea aprender</td>';

                                echo '</tr>';
 
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['estado'] == 'INACTIVO') {
                                        echo '<tr class="fondogrilla" style="background-color: #ff000061;"><td>'.$row['id_benefi']."</td>";
                                    } else if ($row['estado'] == 'PENDIENTE') {
                                        echo '<tr class="fondogrilla" style="background-color: #ffff0059;"><td>'.$row['id_benefi']."</td>";
                                    } else if ($row['estado'] == 'ACTIVO') {
                                        echo '<tr class="fondogrilla" ><td>'.$row['id_benefi']."</td>";
                                    }
                                    echo "<td>".$row['dniusu']."</td>";
                                    echo "<td>".$row['usua']."</td>";
                                    echo "<td>".$row['pass']."</td>"; 
                                    echo "<td>".$row['apellidos']."</td>";
                                    echo "<td>".$row['nombres']."</td>";
                                    echo "<td>".$row['provnaci']."</td>";
                                    echo "<td>".$row['distnaci']."</td>";
                                    echo "<td>".$row['fecnaci']."</td>";
                                    echo "<td>".$row['domiact']."</td>";
                                    echo "<td>".$row['distact']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['celu']."</td>";
                                    echo "<td>".$row['tele']."</td>";
                                    echo "<td>".$row['nomempres']."</td>";
                                    echo "<td>".$row['cargempres']."</td>";
                                    echo "<td>".$row['dirempres']."</td>";
                                    echo "<td>".$row['distempres']."</td>";
                                    echo "<td>".$row['telempres']."</td>";
                                    echo "<td>".$row['emailempres']."</td>";
                                    echo "<td>".$row['participaprevia']."</td>";
                                    echo "<td>".$row['objetencasa']."</td>";
                                    echo "<td>".$row['enterarcampa']."</td>";
                                    echo "<td>".$row['disponibilidad']."</td>";
                                    echo "<td>".$row['estado']."</td>";
                                    echo "<td>".$row['gradoinstrucion']."</td>";
                                    echo "<td>".$row['nominstitu']."</td>";
                                    echo "<td>".$row['especia']."</td>";
                                    echo "<td>".$row['usaordenador']."</td>";
                                    echo "<td>".$row['conociaprender']."</td>";
                        }
                        
                        echo '</tr>';
                        echo '</table>';
                        
        break;}
    }
}
?>

