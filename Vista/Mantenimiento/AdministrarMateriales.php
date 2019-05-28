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
<div>
    <?php
    include '../../Util/config.inc.php';
    $db = new Conect_MySql();
    $sql = "select * from materiales";
    $query = $db->execute($sql);
    $materiales = array();
    while ($datos = $db->fetch_row($query)) {
        $id = $datos['idmat'];
        //$title_id = $row['title_id'];
        $materiales[$id] = $datos;
    }
    ?>

    <table border="1" class="tituloTabla" style="text-align: center" id="customers">
        <tr>
            <td colspan="7" class="tituloTabla">Materiales</td>
        </tr>
        
        <tr>
            <td>ID material</td>
            <td>ID colaborador</td>
            <td>Titulo</td>
            <td>Descripcion</td>
            <td>Nombre</td>
            <!--<td>Modificar</td>-->
            
        </tr>
<?php foreach ($materiales as $filas) { ?>
            <tr class="fondogrilla">
                <td><?php echo $filas['idmat']; ?></td>
                <td><?php echo $filas['id_cola']; ?></td>
                <td><?php echo $filas['titulo']; ?></td>
                <td><?php echo $filas['descripcion']; ?></td> 
                <td><?php echo $filas['nommat']; ?></td>
                <!--<td><button  onclick="">Modificar</button></td>-->
                
            </tr>
<?php } ?>
    </table>
</div>