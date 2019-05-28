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
    $_SESSION['imc_beneficiarios']=$usuarios;
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
            
        </tr>
<?php foreach ($usuarios as $filas) { ?>
            <?php if($filas['estado']=='INACTIVO'){echo '<tr class="fondogrilla" style="background-color: #ff000061;">';}else if($filas['estado']=='PENDIENTE'){echo '<tr class="fondogrilla" style="background-color: #ffff0059;">';}else if($filas['estado']=='ACTIVO'){echo '<tr class="fondogrilla" >';} ?>
                <td><?php echo $filas['id_benefi']; ?></td>
                <td><?php echo $filas['dniusu']; ?></td>
                <td><?php echo $filas['usua']; ?></td>
                <td><?php echo $filas['pass']; ?></td> 
                <td><?php echo $filas['apellidos']; ?></td>
                <td><?php echo $filas['nombres']; ?></td>
                <td><?php echo $filas['estado']; ?></td>
                <td><button type="button" onclick="window.location.href ='../Mantenimiento/ModificarUsuario.php?dniusu=<?php echo $filas['dniusu']; ?>&perf=<?php echo $filas['perf']; ?>'">Modificar</button></td>
                
            </tr>
<?php } ?>
    </table>
    <button type="button" onclick="descargarExcel('customers')" >Descargar Excel</button>
    <br><br><br>
    <h1></h1>
<?php
$db1 = new Conect_MySql();
$sql1 = "select u.dniusu,u.usua,u.pass,u.perf,u.apellidos,u.nombres,u.estado,c.id_cola from usuario u inner join colaborador c on u.dniusu=c.dniusu order by c.id_cola";
$query1 = $db1->execute($sql1);
$usuarios1 = array();
while ($datos1 = $db1->fetch_row($query1)) {
    $id1 = $datos1['id_cola'];
    //$title_id = $row['title_id'];
    $usuarios1[$id1] = $datos1;
}
$_SESSION['imc_colaboradores']=$usuarios1;
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
            
        </tr>
<?php foreach ($usuarios1 as $filas1) {
    if ($filas1['perf'] != 'Administrador') { ?>
                <?php if($filas1['estado']=='INACTIVO'){echo '<tr class="fondogrilla" style="background-color: #ff000061;">';}else if($filas1['estado']=='PENDIENTE'){echo '<tr class="fondogrilla" style="background-color: #ffff0059;">';}else if($filas1['estado']=='ACTIVO'){echo '<tr class="fondogrilla" >';} ?>
                    <td><?php echo $filas1['id_cola']; ?></td>
                    <td><?php echo $filas1['dniusu']; ?></td>
                    <td><?php echo $filas1['usua']; ?></td>
                    <td><?php echo $filas1['pass']; ?></td> 
                    <td><?php echo $filas1['perf']; ?></td> 
                    <td><?php echo $filas1['apellidos']; ?></td>
                    <td><?php echo $filas1['nombres']; ?></td>
                    <td><?php echo $filas1['estado']; ?></td>
                    <td><button type="button"  onclick="window.location.href ='../Mantenimiento/ModificarUsuario.php?dniusu=<?php echo $filas1['dniusu']; ?>&perf=<?php echo $filas1['perf']; ?>'">Modificar</button></td>
                    
                </tr>
            <?php }
        } ?>
    </table>
    <button type="button" onclick="descargarExcel('customers1')">Descargar Excel</button>
</div>
</center>