<?php
session_start();
$op=$_POST['op'];

//if(isset($_SESSION[])){$ses=$_SESSION[];}
switch ($op){
    case 1:{//modificar usuario
        $dniusu=$_POST['dniusu'];
        $usua=$_POST['usua'];
        $pass=$_POST['pass'];
        $perf=$_POST['perf'];
        $apellidos=$_POST['apellidos'];
        $nombres=$_POST['nombres'];
        $provnaci=$_POST['provnaci'];
        $distnaci=$_POST['distnaci'];
        $fecnaci=$_POST['fecnaci'];
        $domiact=$_POST['domiact'];
        $distact=$_POST['distact'];
        $email=$_POST['email'];
        $celu=$_POST['celu'];
        $tele=$_POST['tele'];
        $nomempres=$_POST['nomempres'];
        $cargempres=$_POST['cargempres'];
        $dirempres=$_POST['dirempres'];
        $distempres=$_POST['distempres'];
        $telempres=$_POST['telempres'];
        $emailempres=$_POST['emailempres'];
        $participaprevia=$_POST['participaprevia'];
        if(isset($privilegiodesubirmat)){$privilegiodesubirmat=$_POST['privilegiodesubirmat'];}
        
        
        if(isset($_POST['chkCompu'])){$chkCompu=$_POST['chkCompu'];}else{$chkCompu='0';}
        if(isset($_POST['chkLap'])){$chkLap=$_POST['chkLap'];}else{$chkLap='0';}
        if(isset($_POST['chkInter'])){$chkInter=$_POST['chkInter'];}else{$chkInter='0';}
        if(isset($_POST['chkCel'])){$chkCel=$_POST['chkCel'];}else{$chkCel='0';}
        
        $objetencasa=$chkCompu.$chkLap.$chkInter.$chkCel;
        
        if(isset($_POST['chkFacebook'])){$chkFacebook=$_POST['chkFacebook'];}else{$chkFacebook='0';}
        if(isset($_POST['chkEmail'])){$chkEmail=$_POST['chkEmail'];}else{$chkEmail='0';}
        if(isset($_POST['chkRadio'])){$chkRadio=$_POST['chkRadio'];}else{$chkRadio='0';}
        if(isset($_POST['chkDiario'])){$chkDiario=$_POST['chkDiario'];}else{$chkDiario='0';}
        if(isset($_POST['chkAfiche'])){$chkAfiche=$_POST['chkAfiche'];}else{$chkAfiche='0';}
        if(isset($_POST['chkVolante'])){$chkVolante=$_POST['chkVolante'];}else{$chkVolante='0';}
        if(isset($_POST['chkVideo'])){$chkVideo=$_POST['chkVideo'];}else{$chkVideo='0';}
        if(isset($_POST['chkConferencia'])){$chkConferencia=$_POST['chkConferencia'];}else{$chkConferencia='0';}
        if(isset($_POST['chkCIP'])){$chkCIP=$_POST['chkCIP'];}else{$chkCIP='0';}
        if(isset($_POST['chkUniversidad'])){$chkUniversidad=$_POST['chkUniversidad'];}else{$chkUniversidad='0';}
        if(isset($_POST['chkMunicipalidad'])){$chkMunicipalidad=$_POST['chkMunicipalidad'];}else{$chkMunicipalidad='0';}
        if(isset($_POST['chkAmigo'])){$chkAmigo=$_POST['chkAmigo'];}else{$chkAmigo='0';}
        
        $enterarcampa=$chkFacebook.$chkEmail.$chkRadio.$chkDiario.$chkAfiche.$chkVolante.$chkVideo.$chkConferencia.$chkCIP.$chkUniversidad.$chkMunicipalidad.$chkAmigo;
        
        if(isset($_POST['Lunes1'])){$Lunes1=$_POST['Lunes1'];}else{$Lunes1='0';}
        if(isset($_POST['Lunes2'])){$Lunes2=$_POST['Lunes2'];}else{$Lunes2='0';}
        if(isset($_POST['Lunes3'])){$Lunes3=$_POST['Lunes3'];}else{$Lunes3='0';}
        if(isset($_POST['Lunes4'])){$Lunes4=$_POST['Lunes4'];}else{$Lunes4='0';}
        if(isset($_POST['Lunes5'])){$Lunes5=$_POST['Lunes5'];}else{$Lunes5='0';}
        if(isset($_POST['Lunes6'])){$Lunes6=$_POST['Lunes6'];}else{$Lunes6='0';}
        if(isset($_POST['Lunes7'])){$Lunes7=$_POST['Lunes7'];}else{$Lunes7='0';}
        if(isset($_POST['Lunes8'])){$Lunes8=$_POST['Lunes8'];}else{$Lunes8='0';}
        if(isset($_POST['Lunes9'])){$Lunes9=$_POST['Lunes9'];}else{$Lunes9='0';}
        if(isset($_POST['Lunes10'])){$Lunes10=$_POST['Lunes10'];}else{$Lunes10='0';}
        if(isset($_POST['Lunes11'])){$Lunes11=$_POST['Lunes11'];}else{$Lunes11='0';}
        if(isset($_POST['Lunes12'])){$Lunes12=$_POST['Lunes12'];}else{$Lunes12='0';}
        if(isset($_POST['Lunes13'])){$Lunes13=$_POST['Lunes13'];}else{$Lunes13='0';}
        if(isset($_POST['Lunes14'])){$Lunes14=$_POST['Lunes14'];}else{$Lunes14='0';}
        $Lunes=$Lunes1.$Lunes2.$Lunes3.$Lunes4.$Lunes5.$Lunes6.$Lunes7.$Lunes8.$Lunes9.$Lunes10.$Lunes11.$Lunes12.$Lunes13.$Lunes14;

        if(isset($_POST['Martes1'])){$Martes1=$_POST['Martes1'];}else{$Martes1='0';}
        if(isset($_POST['Martes2'])){$Martes2=$_POST['Martes2'];}else{$Martes2='0';}
        if(isset($_POST['Martes3'])){$Martes3=$_POST['Martes3'];}else{$Martes3='0';}
        if(isset($_POST['Martes4'])){$Martes4=$_POST['Martes4'];}else{$Martes4='0';}
        if(isset($_POST['Martes5'])){$Martes5=$_POST['Martes5'];}else{$Martes5='0';}
        if(isset($_POST['Martes6'])){$Martes6=$_POST['Martes6'];}else{$Martes6='0';}
        if(isset($_POST['Martes7'])){$Martes7=$_POST['Martes7'];}else{$Martes7='0';}
        if(isset($_POST['Martes8'])){$Martes8=$_POST['Martes8'];}else{$Martes8='0';}
        if(isset($_POST['Martes9'])){$Martes9=$_POST['Martes9'];}else{$Martes9='0';}
        if(isset($_POST['Martes10'])){$Martes10=$_POST['Martes10'];}else{$Martes10='0';}
        if(isset($_POST['Martes11'])){$Martes11=$_POST['Martes11'];}else{$Martes11='0';}
        if(isset($_POST['Martes12'])){$Martes12=$_POST['Martes12'];}else{$Martes12='0';}
        if(isset($_POST['Martes13'])){$Martes13=$_POST['Martes13'];}else{$Martes13='0';}
        if(isset($_POST['Martes14'])){$Martes14=$_POST['Martes14'];}else{$Martes14='0';}
        $Martes=$Martes1.$Martes2.$Martes3.$Martes4.$Martes5.$Martes6.$Martes7.$Martes8.$Martes9.$Martes10.$Martes11.$Martes12.$Martes13.$Martes14;

        if(isset($_POST['Miercoles1'])){$Miercoles1=$_POST['Miercoles1'];}else{$Miercoles1='0';}
        if(isset($_POST['Miercoles2'])){$Miercoles2=$_POST['Miercoles2'];}else{$Miercoles2='0';}
        if(isset($_POST['Miercoles3'])){$Miercoles3=$_POST['Miercoles3'];}else{$Miercoles3='0';}
        if(isset($_POST['Miercoles4'])){$Miercoles4=$_POST['Miercoles4'];}else{$Miercoles4='0';}
        if(isset($_POST['Miercoles5'])){$Miercoles5=$_POST['Miercoles5'];}else{$Miercoles5='0';}
        if(isset($_POST['Miercoles6'])){$Miercoles6=$_POST['Miercoles6'];}else{$Miercoles6='0';}
        if(isset($_POST['Miercoles7'])){$Miercoles7=$_POST['Miercoles7'];}else{$Miercoles7='0';}
        if(isset($_POST['Miercoles8'])){$Miercoles8=$_POST['Miercoles8'];}else{$Miercoles8='0';}
        if(isset($_POST['Miercoles9'])){$Miercoles9=$_POST['Miercoles9'];}else{$Miercoles9='0';}
        if(isset($_POST['Miercoles10'])){$Miercoles10=$_POST['Miercoles10'];}else{$Miercoles10='0';}
        if(isset($_POST['Miercoles11'])){$Miercoles11=$_POST['Miercoles11'];}else{$Miercoles11='0';}
        if(isset($_POST['Miercoles12'])){$Miercoles12=$_POST['Miercoles12'];}else{$Miercoles12='0';}
        if(isset($_POST['Miercoles13'])){$Miercoles13=$_POST['Miercoles13'];}else{$Miercoles13='0';}
        if(isset($_POST['Miercoles14'])){$Miercoles14=$_POST['Miercoles14'];}else{$Miercoles14='0';}
        $Miercoles=$Miercoles1.$Miercoles2.$Miercoles3.$Miercoles4.$Miercoles5.$Miercoles6.$Miercoles7.$Miercoles8.$Miercoles9.$Miercoles10.$Miercoles11.$Miercoles12.$Miercoles13.$Miercoles14;

        if(isset($_POST['Jueves1'])){$Jueves1=$_POST['Jueves1'];}else{$Jueves1='0';}
        if(isset($_POST['Jueves2'])){$Jueves2=$_POST['Jueves2'];}else{$Jueves2='0';}
        if(isset($_POST['Jueves3'])){$Jueves3=$_POST['Jueves3'];}else{$Jueves3='0';}
        if(isset($_POST['Jueves4'])){$Jueves4=$_POST['Jueves4'];}else{$Jueves4='0';}
        if(isset($_POST['Jueves5'])){$Jueves5=$_POST['Jueves5'];}else{$Jueves5='0';}
        if(isset($_POST['Jueves6'])){$Jueves6=$_POST['Jueves6'];}else{$Jueves6='0';}
        if(isset($_POST['Jueves7'])){$Jueves7=$_POST['Jueves7'];}else{$Jueves7='0';}
        if(isset($_POST['Jueves8'])){$Jueves8=$_POST['Jueves8'];}else{$Jueves8='0';}
        if(isset($_POST['Jueves9'])){$Jueves9=$_POST['Jueves9'];}else{$Jueves9='0';}
        if(isset($_POST['Jueves10'])){$Jueves10=$_POST['Jueves10'];}else{$Jueves10='0';}
        if(isset($_POST['Jueves11'])){$Jueves11=$_POST['Jueves11'];}else{$Jueves11='0';}
        if(isset($_POST['Jueves12'])){$Jueves12=$_POST['Jueves12'];}else{$Jueves12='0';}
        if(isset($_POST['Jueves13'])){$Jueves13=$_POST['Jueves13'];}else{$Jueves13='0';}
        if(isset($_POST['Jueves14'])){$Jueves14=$_POST['Jueves14'];}else{$Jueves14='0';}
        $Jueves=$Jueves1.$Jueves2.$Jueves3.$Jueves4.$Jueves5.$Jueves6.$Jueves7.$Jueves8.$Jueves9.$Jueves10.$Jueves11.$Jueves12.$Jueves13.$Jueves14;

        if(isset($_POST['Viernes1'])){$Viernes1=$_POST['Viernes1'];}else{$Viernes1='0';}
        if(isset($_POST['Viernes2'])){$Viernes2=$_POST['Viernes2'];}else{$Viernes2='0';}
        if(isset($_POST['Viernes3'])){$Viernes3=$_POST['Viernes3'];}else{$Viernes3='0';}
        if(isset($_POST['Viernes4'])){$Viernes4=$_POST['Viernes4'];}else{$Viernes4='0';}
        if(isset($_POST['Viernes5'])){$Viernes5=$_POST['Viernes5'];}else{$Viernes5='0';}
        if(isset($_POST['Viernes6'])){$Viernes6=$_POST['Viernes6'];}else{$Viernes6='0';}
        if(isset($_POST['Viernes7'])){$Viernes7=$_POST['Viernes7'];}else{$Viernes7='0';}
        if(isset($_POST['Viernes8'])){$Viernes8=$_POST['Viernes8'];}else{$Viernes8='0';}
        if(isset($_POST['Viernes9'])){$Viernes9=$_POST['Viernes9'];}else{$Viernes9='0';}
        if(isset($_POST['Viernes10'])){$Viernes10=$_POST['Viernes10'];}else{$Viernes10='0';}
        if(isset($_POST['Viernes11'])){$Viernes11=$_POST['Viernes11'];}else{$Viernes11='0';}
        if(isset($_POST['Viernes12'])){$Viernes12=$_POST['Viernes12'];}else{$Viernes12='0';}
        if(isset($_POST['Viernes13'])){$Viernes13=$_POST['Viernes13'];}else{$Viernes13='0';}
        if(isset($_POST['Viernes14'])){$Viernes14=$_POST['Viernes14'];}else{$Viernes14='0';}
        $Viernes=$Viernes1.$Viernes2.$Viernes3.$Viernes4.$Viernes5.$Viernes6.$Viernes7.$Viernes8.$Viernes9.$Viernes10.$Viernes11.$Viernes12.$Viernes13.$Viernes14;

        if(isset($_POST['Sabado1'])){$Sabado1=$_POST['Sabado1'];}else{$Sabado1='0';}
        if(isset($_POST['Sabado2'])){$Sabado2=$_POST['Sabado2'];}else{$Sabado2='0';}
        if(isset($_POST['Sabado3'])){$Sabado3=$_POST['Sabado3'];}else{$Sabado3='0';}
        if(isset($_POST['Sabado4'])){$Sabado4=$_POST['Sabado4'];}else{$Sabado4='0';}
        if(isset($_POST['Sabado5'])){$Sabado5=$_POST['Sabado5'];}else{$Sabado5='0';}
        if(isset($_POST['Sabado6'])){$Sabado6=$_POST['Sabado6'];}else{$Sabado6='0';}
        if(isset($_POST['Sabado7'])){$Sabado7=$_POST['Sabado7'];}else{$Sabado7='0';}
        if(isset($_POST['Sabado8'])){$Sabado8=$_POST['Sabado8'];}else{$Sabado8='0';}
        if(isset($_POST['Sabado9'])){$Sabado9=$_POST['Sabado9'];}else{$Sabado9='0';}
        if(isset($_POST['Sabado10'])){$Sabado10=$_POST['Sabado10'];}else{$Sabado10='0';}
        if(isset($_POST['Sabado11'])){$Sabado11=$_POST['Sabado11'];}else{$Sabado11='0';}
        if(isset($_POST['Sabado12'])){$Sabado12=$_POST['Sabado12'];}else{$Sabado12='0';}
        if(isset($_POST['Sabado13'])){$Sabado13=$_POST['Sabado13'];}else{$Sabado13='0';}
        if(isset($_POST['Sabado14'])){$Sabado14=$_POST['Sabado14'];}else{$Sabado14='0';}
        $Sabado=$Sabado1.$Sabado2.$Sabado3.$Sabado4.$Sabado5.$Sabado6.$Sabado7.$Sabado8.$Sabado9.$Sabado10.$Sabado11.$Sabado12.$Sabado13.$Sabado14;

        if(isset($_POST['Domingo1'])){$Domingo1=$_POST['Domingo1'];}else{$Domingo1='0';}
        if(isset($_POST['Domingo2'])){$Domingo2=$_POST['Domingo2'];}else{$Domingo2='0';}
        if(isset($_POST['Domingo3'])){$Domingo3=$_POST['Domingo3'];}else{$Domingo3='0';}
        if(isset($_POST['Domingo4'])){$Domingo4=$_POST['Domingo4'];}else{$Domingo4='0';}
        if(isset($_POST['Domingo5'])){$Domingo5=$_POST['Domingo5'];}else{$Domingo5='0';}
        if(isset($_POST['Domingo6'])){$Domingo6=$_POST['Domingo6'];}else{$Domingo6='0';}
        if(isset($_POST['Domingo7'])){$Domingo7=$_POST['Domingo7'];}else{$Domingo7='0';}
        if(isset($_POST['Domingo8'])){$Domingo8=$_POST['Domingo8'];}else{$Domingo8='0';}
        if(isset($_POST['Domingo9'])){$Domingo9=$_POST['Domingo9'];}else{$Domingo9='0';}
        if(isset($_POST['Domingo10'])){$Domingo10=$_POST['Domingo10'];}else{$Domingo10='0';}
        if(isset($_POST['Domingo11'])){$Domingo11=$_POST['Domingo11'];}else{$Domingo11='0';}
        if(isset($_POST['Domingo12'])){$Domingo12=$_POST['Domingo12'];}else{$Domingo12='0';}
        if(isset($_POST['Domingo13'])){$Domingo13=$_POST['Domingo13'];}else{$Domingo13='0';}
        if(isset($_POST['Domingo14'])){$Domingo14=$_POST['Domingo14'];}else{$Domingo14='0';}
        $Domingo=$Domingo1.$Domingo2.$Domingo3.$Domingo4.$Domingo5.$Domingo6.$Domingo7.$Domingo8.$Domingo9.$Domingo10.$Domingo11.$Domingo12.$Domingo13.$Domingo14;
    
        $disponibilidad=$Lunes.$Martes.$Miercoles.$Jueves.$Viernes.$Sabado.$Domingo;
        
        $estado=$_POST['estado'];
        if($perf=='Beneficiario'){
        $gradoinstrucion=$_POST['gradoinstrucion'];
        $nominstitu=$_POST['nominstitu'];
        $especia=$_POST['especia'];
        $usaordenador=$_POST['usaordenador'];
        $conociaprender=$_POST['conociaprender'];
        }else{
        if(isset($cip)){$cip=$_POST['cip'];}else{$cip='';};
        $gradoacad=$_POST['gradoacad'];
        if(isset($especia)){$especia=$_POST['especia'];}else{$especia='';}
        if(isset($nomuniver)){$nomuniver=$_POST['nomuniver'];}else{$nomuniver='';}
        if(isset($ciclo)){$ciclo=$_POST['ciclo'];}else{$ciclo='';}
        if(isset($descripdocen)){$descripdocen=$_POST['descripdocen'];}else{$descripdocen='';} 
        $nivelconoci=$_POST['nivelconoci'];
        $aplicarpara=$_POST['aplicarpara'];
        }
        include '../Util/config.inc.php';
        $db = new Conect_MySql();
        
        $sql = "UPDATE usuario SET dniusu='".$dniusu."',usua='".$usua."',pass='".$pass."',perf='".$perf."',apellidos='".$apellidos."',nombres='".$nombres."',provnaci='".$provnaci."',distnaci='".$distnaci."',fecnaci='".$fecnaci."',domiact='".$domiact."',distact='".$distact."',email='".$email."',celu='".$celu."',tele='".$tele."',nomempres='".$nomempres."',cargempres='".$cargempres."',dirempres='".$dirempres."',distempres='".$distempres."',telempres='".$telempres."',emailempres='".$emailempres."',participaprevia='".$participaprevia."',objetencasa='".$objetencasa."',enterarcampa='".$enterarcampa."',disponibilidad='".$disponibilidad."',estado='".$estado."' WHERE dniusu='".$dniusu."'";
        echo "<script>alert($sql)</script>";
        $db->execute($sql);
        if($perf=='Beneficiario'){
        $sql1="UPDATE beneficiario SET dniusu='".$dniusu."',gradoinstrucion='".$gradoinstrucion."',nominstitu='".$nominstitu."',especia='".$especia."',usaordenador='".$usaordenador."',conociaprender='".$conociaprender."' WHERE dniusu='".$dniusu."'";
        $db->execute($sql1);
        }else{
        $sql2="UPDATE colaborador SET dniusu='".$dniusu."',cip='".$cip."',gradoacad='".$gradoacad."',especia='".$especia."',nomuniver='".$nomuniver."',ciclo='".$ciclo."',descripdocen='".$descripdocen."',nivelconoci='".$nivelconoci."',aplicarpara='".$aplicarpara."',privilegiodesubirmat='".$privilegiodesubirmat."' WHERE dniusu='".$dniusu."'";
        }
        echo "<script>alert('Datos actualizados corerctamente')</script>";
        header('Location:../Vista/Administrador/FrmPrincipalAdmin.php');
        break;
    }case 2:{//modificar materiales
        
        
        break;
    }
    case 3:{
        
     include '../Util/config.inc.php';
        $db = new Conect_MySql();
        
      
             error_reporting(~E_NOTICE); // avoid notice

            require_once '../../Util/ConexionBD.php';

            if (isset($_POST['btnsave'])) {
                //$username = $_POST['user_name']; // user name
                //$userjob = $_POST['user_job']; // user email

                $imgFile = $_FILES['user_image']['name'];
                $tmp_dir = $_FILES['user_image']['tmp_name'];
                $imgSize = $_FILES['user_image']['size'];


//    if (empty($username)) {
//        $errMSG = "Ingrese la marca";
//    } else if (empty($userjob)) {
//        $errMSG = "Ingrese el tipo.";
//    } else 

                if (empty($imgFile)) {
                    $errMSG = "Seleccione el archivo de imagen.";
                } else {
                    $upload_dir = '../../imagenes/'; // upload directory

                    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
                    // valid image extensions
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    // rename uploading image
                    $userpic = rand(1000, 1000000) . "." . $imgExt;

                    // allow valid image file formats
                    if (in_array($imgExt, $valid_extensions)) {
                        // Check file size '1MB'
                        if ($imgSize < 1000000) {
                            move_uploaded_file($tmp_dir, $upload_dir . $userpic);
                        } else {
                            $errMSG = "Su archivo es muy grande.";
                        }
                    } else {
                        $errMSG = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";
                    }
                }


                // if no error occured, continue ....
                if (!isset($errMSG)) {
                    $stmt = $DB_con->prepare('INSERT INTO usuario(img_perf) VALUES( :upic)');
                    $stmt->bindParam(':upic', $userpic);

                    if ($stmt->execute()) {
                        $successMSG = "Nuevo registro insertado correctamente ...";
                        header("refresh:3;PerfilBeneficiario1.php"); // redirects image view page after 5 seconds.
                    } else {
                        $errMSG = "Error al insertar ...";
                    }
                }
            }



            break;
    }
}
?>
