<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'faleconosco.lojavirtual556677@gmail.com';
    $mail->Password = 'neksyejgaiughmix';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('faleconosco.lojavirtual556677@gmail.com');

    //$mail->addAddress('lojavirtual556677@gmail.com');
    $mail->addAddress('wendellpaimsouzaps@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = $_POST ["assunto"];
    $mail->Body = "<span style='font-weight: bold;'>Nome: </span>".$_POST["name"]."<br>". "<span style='font-weight: bold;'>Email: </span>".$_POST["email"]."<br>". "<span style='font-weight: bold;'>Telefone: </span>".$_POST["telefone"]."<br>". "<span style='font-weight: bold;'>Mensagem/Dúvida/Reclamação: </span>".$_POST["mensagem"];

    $mail->send();

    echo
    "
    <script>
    alert('E-mail enviado com sucesso');
    document.location.href = 'contato.php';
    </script>
    ";
}
?>