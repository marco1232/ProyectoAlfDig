<?php
session_start();

include_once '../Util/config.inc.php';
if (isset($_POST['subir'])) {
    //echo "<script>alert('entra funcion subir');</script>;";
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamano = intval($_FILES['archivo']['size']);
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "../archivos/" . $nombre;
    $dniusu = $_SESSION['datos']['id_cola'];//cambiar dniusu por id_cola antes de seguir con la correccion de la funcion de subir nuevo material
    if ($nombre != "" && $tipo=='application/pdf' && $tamano<=5000000) {
        //echo "<script>alert('entra if(nombre tipo)');</script>;";
        if (copy($ruta, $destino)) {
            $titulo = $_POST['titulo'];
            $descri = $_POST['descripcion'];
            $db = new Conect_MySql();
            $sql = "INSERT INTO materiales(id_cola,titulo,descripcion,nommat) VALUES('$dniusu','$titulo','$descri','$nombre')";
            $query = $db->execute($sql);
            if ($query) {
                echo "<script>alert('Se guardo correctamente');</script>";
                print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";
            }
        } else {
            echo "<script>alert('Se debe completar todos los requisitos correctamente');</script>";
            print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";
        }
    }else if($tipo!='application/pdf'){
        echo "<script>alert('Solo se admiten archivos tipo PDF');</script>";
        print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";
    }else if($tamano>5000000){
        echo "<script>alert('El tamaño del archivo no debe exceder los 5MB');</script>";
        print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";
    }
}
?>