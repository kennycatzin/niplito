<?php
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$mensaje=$_POST['mensaje'];




$to = $email;
$subject = 'Mensaje de saludo';
$message = 'Prueba desde el servidor'; 
$from = 'kenn2506@gmail.com';
 
// Sending email
if(mail($to, $subject, $message)){
    header("Location:index.php?status=true");

    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}
?>