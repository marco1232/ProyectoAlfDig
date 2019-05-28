<?php
function sendmail($msg) {
    date_default_timezone_set('America/Lima');
    include "../PHPMailer-master/src/PHPMailer.php";
    include "../PHPMailer-master/src/SMTP.php";
    $email_user = "mailsenderAlfabetizacionDig@gmail.com";
    $email_password = "29112018proyalfadig";
    $nom= substr($msg, 0, stripos($msg, "|"));
    $length= strlen($msg)-strlen($nom)-1;
    $perf= substr($msg, strpos($msg, "|")+1,$length);
    $the_subject = "Nuevo usuario pendiente de aprobacion";
    $address_to = "hm_inga@hotmail.com";
    $from_name = "Gmailer-Alfabetizacion Digital";
    $phpmailer = new \PHPMailer\PHPMailer\PHPMailer();
// ---------- datos de la cuenta de Gmail -------------------------------
    $phpmailer->Username = $email_user;
    $phpmailer->Password = $email_password;
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Host = "smtp.gmail.com"; // GMail
    $phpmailer->Port = 465;
    $phpmailer->IsSMTP(); // use SMTP
    $phpmailer->SMTPAuth = true;
    $phpmailer->setFrom($phpmailer->Username, $from_name);
    $phpmailer->AddAddress($address_to); // recipients email
    $phpmailer->Subject = $the_subject;
//    $phpmailer->Body .= "<h1 style='color:#3498db;'>Hola Mundo!</h1>";
    $phpmailer->Body .= "<p>El usuario con nombre '".$nom."' acabe de registrarse con perfil '".$perf."'</p>";
    $phpmailer->Body .= "<p>Fecha y Hora: " . date("d-m-Y H:i:s") . "</p>";
    $phpmailer->IsHTML(true);
    $phpmailer->Send();
    return "<script>alert('enviado')</script>";
}


?>
