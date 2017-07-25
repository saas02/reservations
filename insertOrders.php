<?php
require_once "consulta.php";
/*require_once "PHPMailer/class.phpmailer.php";
require_once "PHPMailer/class.smtp.php";
require_once 'PHPMailer/PHPMailerAutoload.php';*/

/*header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=NOMBRE.xls");*/



$modelo = new datosModelo();
$insert = $modelo->get_users();

if($insert == null){
    echo "No Hay Reservas Registradas Hoy";
    return false;
}

$i = 0;
$date = null;
    foreach ($insert as $row) {
        $date .= '<tr> 
            <td>'.$row["id"].'</td> 
            <td>'.$row["provider_id"].'</td>
            <td>'.$row["providerName"].'</td>
            <td>'.$row["order_id"].'</td>
            <td>'.$row["description"].'</td>
            <td>'.$row["booking"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["firstname"].'</td> 
            
        </tr>';
        ++$i;  
    }      
$cuerpo = ' 
<html> 
    <head> 
        <title>Registros Nuevos</title> 
    </head> 
    <body>
        <table border="1">'.$date.'</table>                    
    </body> 
</html>  
';

print $cuerpo;
die;


/*$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "tls"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Username = "saas02@gmail.com"; 
$mail->Password = "davidsantiago";
$mail->Port = 587; 


$mail->From = "saas02@gmail.com";
$mail->FromName = "Sergio Amaya"; 
$mail->Subject = "Reservas"; 
$mail->AltBody = "Este es un mensaje de prueba."; 
$mail->MsgHTML($cuerpo);
$address = "saas02@gmail.com";
$mail->AddAddress($address, "Sergio Amaya");
$mail->IsHTML(true); 
$mail->SMTPDebug = 1;

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}*/


?>


