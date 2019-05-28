<?php
session_start();
$op=$_GET['op'];
$elemento = $_GET['elemento'];
if (isset($_GET['val'])) {
    $val = $_GET['val'];
} else {
    $val = '0';
}
//echo "val= ".$val;
include "../Util/config_1.php";
//if(isset($_SESSION[])){$ses=$_SESSION[];}
switch ($op){
    case 1:{
        header('Location:../Vista/Mantenimiento/AdministrarUsuarios.php');
        break;
    }
    case 2:{
        header('Location:../Vista/Mantenimiento/AdministrarMateriales.php');
        break;
    }case 3:{
        if ($elemento == 'distrito') {
        //            echo "elemento=provincia";
            if ($val != '0') {
        //            echo 'entra $val!=0';
        //            $fila = array();
        //                        $sql = "select * from usuario where usua='".$usua."' and pass='".$pass."' and estado='ACTIVO'";
                $sql = "select * from ubdistrito d inner join ubprovincia p on d.idProv=p.idProv and d.idProv='" . $val . "' ORDER BY d.distrito";
        //        echo $sql . "<br>";
                $result = mysqli_query($conn, $sql);
                echo "<select name='cboDis' id='cboDis' class='field-divided' required><option value=''>-----------</option>";
                foreach ($result as $fila) {
                    echo "<option value='" . $fila['idDist'] . "'>" . $fila['distrito'] . " </option> ";
                }
                echo "<select>";
            }
        }  
        break;
    }
    case 4:{
        header('Location:../Vista/Mantenimiento/HistorialBeneficiarios.php');
        break;
    }
    case 5:{
        header('Location:../Vista/Mantenimiento/HistorialColaboradores.php');
        break;
    }
    case 6:{
        header('Location:../Vista/Mantenimiento/PerfilBeneficiario.php');
        break;
    }
    case 7:{
        header('Location:../Vista/Mantenimiento/PerfilColaborador.php');
        break;
    }
        
    
}
?>
