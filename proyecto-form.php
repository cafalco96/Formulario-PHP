<?php
require('mail.php');
function validate ($name,$lastname,$email,$phone,$message, $submit){
  return (!empty($name) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($message));
}
$status = "";
if(isset($_POST['submit'])){
  if (validate(...$_POST)){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $status = 'success';
    $body = "$name $lastname <$email> te envia el siguiente mensaje: <br><br> $message";
    sendMail($email,"Contact",$name,$body, true);
    resMail($name,$lastname,$email,"Hola");
  } else {
    $status = 'error';
  }
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./estilos-formulario.css">
  <title>Formulario Licoreria</title>
</head>
<body> 
   <?php if($status == "error"): ?>
    
    <div class="alert danger">
        <span>Surgió un problema</span>
    </div>
    
    <?php endif; ?>
    

    <?php if($status == "success"): ?>
    
    <div class="alert success">
        <span>¡Mensaje enviado con éxito!</span>
    </div>
    
    <?php endif; ?>
    <?php if ($status == "error" || $status == ""): ?>

  <form action="./proyecto-form.php" method="post">

        <h2>¡Contáctanos!</h2>

        <div class="input-group">
        <label for="name">Nombre: </label>
    <input type="text" name="name" id="name"/>
        </div>

        <div class="input-group">
        <label for="lastname">Apellido:</label>
    <input type="text" name="lastname" id="lastname"/>
        </div>

        <div class="input-group">
        <label for="email">Email: </label>
    <input type="email" name="email" id="email"/>
        </div>

        <div class="input-group">
        <label for="phone">Telefono: </label>
    <input type="number" name="phone" id="phone"/>
        </div>
        <div class="input-group">
        <textarea placeholder="Que informacion necesitas" name="message" id="message"></textarea>

        </div>

        <div class="button-container">
            <button name="submit" type="submit">Enviar</button>
        </div>

    </form>
    <?php endif ; ?>
   <footer>
   <div class="contact-info">
   <div class="info">
    <i class="fa-solid fa-phone">&nbsp&nbsp&nbsp09955447780</i>
    </div>
    <div class="info">
    <i class="fa-solid fa-location-pin">&nbsp&nbsp&nbsps45b</i>
    </div>
    <div class="info">
    <i class="fa-solid fa-user">&nbsp&nbsp&nbspCarlos Company</i>
    </div>
  </div>
   </footer>
   
</body>
<script src="https://kit.fontawesome.com/eb523176fc.js" crossorigin="anonymous"></script>
</html>
