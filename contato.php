<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$ok = 0;

if (isset($_POST['email'])){
    //Load Composer's autoloader
require './mailer/Exception.php';
require './mailer/PHPMailer.php';
require './mailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cybercompany@smpsistema.com.br';                     //SMTP username
    $mail->Password   = 'Senac@agencia02';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cybercompany@smpsistema.com.br', 'Mailer');
    $mail->addAddress('lucas.oliveira9712@gmail.com', 'Joe User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $mens = $_POST['mens'];

    require_once('admim/calss/contato.php');

    $contato = new ContatoClass();

    $contato->nomeContato = $nome;
    $contato->emailContato = $email;
    $contato->telefoneContato = $tel;
    $contato->mensagemContato = $mens;

    date_default_timezone_set('America/Sao_Paulo');
    $contato->dataContato = date('Y-m-d') ;
    $contato->horaContato = date('H:i:s');

    $contato->InserirContato();



    $mail->CharSet = 'UTF-8';                                  //Set email format to HTML
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Site Agencia-TIPI';
    $mail->Body    = "

    Nome: $nome <br>
    E-mail: $email <br>
    Telefone: $tel <br>
    Mensagem: $mens 
  
    ";
    $mail->AltBody = "

    Nome: $nome <br>
    E-mail: $email <br>
    Telefone: $tel <br>
    Mensagem: $mens
    
    ";

    $mail->send();
    $ok = 1;
    //echo 'Messagem enviada com sucesso';
} catch (Exception $e) {
    $ok = 2;
    //echo "zaralho fiote : {$mail->ErrorInfo}";
}

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/slick.css">
    <link rel="stylesheet" href="style/slick-theme.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="style/style.css">

</head>

<body>
<?php require_once('conteudo/topo.php'); ?>

    <main>

 <section>
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.0254648900814!2d-46.434437023818866!3d-23.495592259180924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce63dda7be6fb9%3A0xa74e7d5a53104311!2sSenac%20S%C3%A3o%20Miguel%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1687802673992!5m2!1spt-BR!2sbr" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 </section>

<section class="form">
    <div class="site">
        <h2>formulario de contato</h2>
        <div>
            <form action="#" method="POST">
                <div>
                <input type="text" id="nome" name="nome" placeholder="informe seu nome">
                <input type="email" id="email" name="email" required placeholder="informe seu e-mail">
                <input type="tel" id="tel" name="tel" placeholder="informe seu telefone">
                <h3>mensagem enviada com sucesso!</h3>
                </div>
                <div>
                    <textarea name="mens" id="mens" cols="30" rows="10" placeholder="informe sea mensagem"></textarea>
                    <div>
                    <input type="submit" value="enviar via e-mail">
                    <button onclick="event.preventDefault(); formWhats()">enviar via whatsapp</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

 <?php require_once('conteudo/depoimento.php'); ?>

 <?php require_once('conteudo/blog.php'); ?>

 <?php require_once('conteudo/footer.php'); ?>
     </main>
</body>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="js/slick.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="js/main.js"></script>

</html>