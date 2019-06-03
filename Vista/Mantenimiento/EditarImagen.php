



<?php
error_reporting(~E_NOTICE);
require_once 'Conexion.php';


if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM usuario ');

    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    header("Location: PerfilBeneficiario1.php");
}



if (isset($_POST['btn_save_updates'])) {
    $username = $_POST['user_name']; // user name
    $userjob = $_POST['user_job']; // user email

    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if ($imgFile) {
        $upload_dir = '../imagenes/'; // upload directory	
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $userpic = rand(1000, 1000000) . "." . $imgExt;
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 1000000) {
                unlink($upload_dir . $edit_row['imagen_Img']);
                move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            } else {
                $errMSG = "Su archivo es demasiado grande mayor a 1MB";
            }
        } else {
            $errMSG = "Solo archivos JPG, JPEG, PNG & GIF .";
        }
    } else {
        // if no image selected the old image remain as it is.
        $userpic = $edit_row['imagen_Img']; // old image from database
    }


    // if no error occured, continue ....
    if (!isset($errMSG)) {
        $stmt = $DB_con->prepare('UPDATE usuario 
									 
										 imagen_Img=:upic 
								   WHERE dniusu=:uid');

        $stmt->bindParam(':upic', $userpic);
        $stmt->bindParam(':uid', $id);

        if ($stmt->execute()) {
            ?>
            <script>
                alert('Archivo editado correctamente ...');
                window.location.href = 'PerfilBeneficiario1.php';
            </script>
            <?php
        } else {
            $errMSG = "Los datos no fueron actualizados !";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Subir imagen al servidor usando PDO MySQL</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

        <!-- custom stylesheet -->
        <link rel="stylesheet" href="style.css">
        <link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->


        <!-- Latest compiled and minified JavaScript -->

    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header"> <a class="navbar-brand" href="index.php" title='Inicio' target="_blank">Inicio</a> </div>
            </div>
        </div>
        <div class="container">
            <div class="page-header">
                <h1 class="h2">Actualización producto. <a class="btn btn-default" href="index.php"> Mostrar todos los modelos </a></h1>
            </div>
            <div class="clearfix"></div>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php
                if (isset($errMSG)) {
                    ?>
                    <div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?> </div>
                    <?php
                }
                ?>
                <table class="table table-bordered table-responsive">

                    <tr>
                        <td><label class="control-label">Imágen.</label></td>
                        <td><p><img src="../imagenes/<?php echo $usuario['imagen_Img']; ?>" height="150" width="150" /></p>
                            <input class="input-group" type="file" name="user_image" accept="image/*" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default"> <span class="glyphicon glyphicon-save"></span> Actualizar </button>
                            <a class="btn btn-default" href="PerfilBeneficiario1.php"> <span class="glyphicon glyphicon-backward"></span> cancelar </a></td>
                    </tr>
                </table>
            </form>
            <div class="alert alert-success"> <strong>Tutorial Vinculo!</strong> <a href="https://baulcode.com">Ir al Tutorial</a>! </div>
        </div>
    </body>
</html>