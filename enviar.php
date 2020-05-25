<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="C3f3">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="vendor/aos.css">
    <link rel="shortcut icon" href="img/iconos/obrero.png" type="image/x-icon">
    <title>Construcciones Srl.</title>
</head>
<body>
    <?php
        require("archivosformulario/class.phpmailer.php");

        $Nombre = $_POST['Nombre'];
        $Email = $_POST['Email'];
        $Mensaje = $_POST['Mensaje'];
        $Asunto = $_POST['Asunto'];
        
        if( $Nombre == '' || $Email == '' || $Mensaje){
            echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";
        }

        else{
            $mail = new PHPMailer();

            $mail->From = $Email;
            $mail->FromName= $Nombre;
            //direccion a la cual le llegaran los mails
            $mail->AddAddress("armandoher01@gmail.com");

            //armamos el mail con los datos;
            $mail->WordWrap = 100; 
            $mail->IsHTML(true);     
            $mail->Subject  =  $Asunto;
            $mail->Body     =  "Nombre: $Nombre \n<br />".    
            "Email: $Email \n<br />".
            "Asunto: $Asunto \n<br />".    
            "Mensaje: $Mensaje \n<br />";


            //datos del servidor SMTP
            $mail->IsSMTP(); 
            $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
            $mail->SMTPAuth = true; 
            $mail->Username = "armandoher01@gmail.com";  // Correo Electrónico
            $mail->Password = "sivispacemparabellum"; // Contraseña


            if ($mail->Send())
                echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
            else
                echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

        };
    ?>
    
</body>
</html>