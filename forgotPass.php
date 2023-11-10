<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

if(isset($_POST['key']) && $_POST['email'] !== "") {

    $email = $_POST["email"];
    $token = uniqid();
    $subject = "Pedido de troca de senha";

    include './php/conn.php';

    $sql = 'INSERT INTO forgot_pass (user_mail, user_token) VALUES (?, ?)';
    $stm = $pdo->prepare($sql);
    $stm->bindParam(1, $email, PDO::PARAM_STR);
    $stm->bindParam(2, $token, PDO::PARAM_STR);
    $stm->execute();
    $id = $pdo->lastInsertId();

    $href = "http://localhost:3000/changePass.php?ID=$id&token=$token";

    $body = "<h2>Procedimento para troca de senha</h2>";
    $body.="<hr>";
    $body.= "<p>Olá! Recebemos uma solicitação de troca de senha do seu usuário</p>";
    $body.= "<p>Para efetuar o cadastro na nova senha, clique no link a seguir:</p>";
    $body.= "<p><a href='$href'>$href</a></p>";
    $body.= "<br><br>";
    $body.= "<p>Caso não tenha sido você que fez a solicitação, desconsidere esta mensagem</p>";
    $body.= "<p>Atenciosamente: Canal do Prof. Luis Vulcanis</p>";

    $altBody = "Recebemos uma solicitação para troca de senha em sua conta. Se foi você que fez a solicitação acesse o endereço $href para efetuar a mudança. Caso contrário, desconsidere esta mensagem";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'seuemail@gmail.com';
        $mail->Password   = 'suasenhadeapp';
        $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('seuemail@gmail.com', 'Prof. Luis Vulcanis');
        $mail->addAddress($email, 'Usuário do Sistema');
        //$mail->addAddress('ellen@example.com');
        $mail->addReplyTo('seuemail@gmail.com', 'Prof. Luis Vulcanis');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        $mail->send();
        $message = "E-mail enviado com sucesso";
    } catch (Exception $e) {
        $message = "Não foi possível enviar o e-mail. Erro informado: {$mail->ErrorInfo}";
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <main>
        <div class="boxLogin">
            <form action="./forgotPass.php" class="form" id="form" method="post">
                <h1 class="formH1">
                    Esqueci a Senha
                </h1>
                <?php
                if (isset($message)) {
                    echo "<p class='message'>$message</p></p>";
                }
                ?>
                <div class="formBox">
                    <label for="mail" class="formLabel">
                        E-mail:
                    </label>
                    <input type="email" name="email" id="email" class="formInput" maxlength="60" placeholder="Informe o e-mail" required autofocus>
                </div>
                <div class="formBox">
                    <button class="formButtonSubmit" id="Send">
                        Enviar
                    </button>
                </div>
                <footer class="formFooter">
                    <address>Design By: <a href="https://youtube.com/@professorluis" target="_blank" rel="noopener noreferrer">Canal do Prof. Luis</a> &copy; 2023</address>
                </footer>
                <input type="hidden" name="key" value="sendMail">
            </form>
        </div>
    </main>
    
</body>
