<?php
session_start();
//login general
            if (!empty($_POST)) {
                if (isset($_POST["EstUsu"]) && isset($_POST["EstPas"])) {
                    if ($_POST["EstUsu"] != "" && $_POST["EstPas"] != "") {
                        $usua = $_POST["EstUsu"];
                        $pass = $_POST["EstPas"];
                        include "../Util/config.php";
                        $fila = null;
//                        $sql = "select * from usuario where usua='".$usua."' and pass='".$pass."' and estado='ACTIVO'";
                        $sql = "select * from usuario where usua='".$usua."' and pass='".$pass."'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fila = $row;
                        }
                        if ($fila == null) {
                            print "<script>alert(\"Usuario o Contraseña incorrectos.\");window.location='../Login.php';</script>";
                        } else {
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            if($fila['perf']=='Capacitador' || $fila['perf']=='Apoyo' || $fila['perf']=='Asistente' ){
                                $sql = "select * from usuario u inner join colaborador c where u.usua='".$usua."' and u.pass='".$pass."' and u.dniusu = c.dniusu";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $fila = $row;
                                    
                                }
                            }
                            $_SESSION['datos'] = $fila;
                            if ($_SESSION['datos']['perf'] == 'Beneficiario' && $_SESSION['datos']['estado']=='ACTIVO') {
                                print "<script>window.location='../Vista/Participante/FrmPrincipalPartic.php';</script>";
                            } else if($_SESSION['datos']['perf'] == 'Beneficiario' && $_SESSION['datos']['estado']=='PENDIENTE'){
                                echo "<script>alert('Su usuario esta pendiente de aceptacion')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            }  else if($_SESSION['datos']['perf'] == 'Beneficiario' && $_SESSION['datos']['estado']=='INACTIVO'){
                                echo "<script>alert('Su usuario esta inhabilitado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            } 
                            
                            if ($_SESSION['datos']['perf'] == 'Capacitador' && $_SESSION['datos']['estado']=='ACTIVO') {
                                
                                if($_SESSION['datos']['privilegiodesubirmat'] == 'Si'){
                                print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";}
                                else{
                                echo "<script>alert('Su usuario no tiene privilegio de subir archivos por lo tanto su acceso fue rechazado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                                }
                            } else if ($_SESSION['datos']['perf'] == 'Capacitador' && $_SESSION['datos']['estado']=='PENDIENTE'){
                                echo "<script>alert('Su usuario esta pendiente de aceptacion')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            } else if ($_SESSION['datos']['perf'] == 'Capacitador' && $_SESSION['datos']['estado']=='INACTIVO'){
                                echo "<script>alert('Su usuario esta inhabilitado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            }
                            
                            if ($_SESSION['datos']['perf'] == 'Asistente' && $_SESSION['datos']['estado']=='ACTIVO') {
                                if($_SESSION['datos']['privilegiodesubirmat'] == 'Si'){
                                print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";}
                                else{
                                echo "<script>alert('Su usuario no tiene privilegio de subir archivos por lo tanto su acceso fue rechazado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                                }
                            } else if ($_SESSION['datos']['perf'] == 'Asistente' && $_SESSION['datos']['estado']=='PENDIENTE'){
                                echo "<script>alert('Su usuario esta pendiente de aceptacion')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            } else if ($_SESSION['datos']['perf'] == 'Asistente' && $_SESSION['datos']['estado']=='INACTIVO'){
                                echo "<script>alert('Su usuario esta inhabilitado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            }
                            
                            if ($_SESSION['datos']['perf'] == 'Apoyo' && $_SESSION['datos']['estado']=='ACTIVO') {
                                if($_SESSION['datos']['privilegiodesubirmat'] == 'Si'){
                                print "<script>window.location='../Vista/Capacitador/FrmPrincipalCapaci.php';</script>";}
                                else{
                                echo "<script>alert('Su usuario no tiene privilegio de subir archivos por lo tanto su acceso fue rechazado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                                }
                            } else if ($_SESSION['datos']['perf'] == 'Apoyo' && $_SESSION['datos']['estado']=='PENDIENTE'){
                                echo "<script>alert('Su usuario esta pendiente de aceptacion')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            } else if ($_SESSION['datos']['perf'] == 'Apoyo' && $_SESSION['datos']['estado']=='INACTIVO'){
                                echo "<script>alert('Su usuario esta inhabilitado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            }
                            
                            if ($_SESSION['datos']['perf'] == 'Administrador' && $_SESSION['datos']['estado']=='ACTIVO') {
                                print "<script>window.location='../Vista/Administrador/FrmPrincipalAdmin.php';</script>";
                            }else if ($_SESSION['datos']['perf'] == 'Administrador' && $_SESSION['datos']['estado']=='PENDIENTE'){
                                echo "<script>alert('Su usuario esta pendiente de aceptacion')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            }else if ($_SESSION['datos']['perf'] == 'Administrador' && $_SESSION['datos']['estado']=='INACTIVO'){
                                echo "<script>alert('Su usuario esta inhabilitado')</script>";
                                print "<script>window.location='../Login.php';</script>";
                            }
                        }
                    }
                }
            }
?>