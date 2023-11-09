<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definição de Nova Senha</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <main>
        <div class="boxLogin">
            <form action="./recNewPass.php" class="form" id="form" method="post">
                <h1 class="formH1">
                    Defina a senha
                </h1>
                <?php
                if (isset($message)) {
                    echo "<p class='message'>$message</p></p>";
                }
                ?>
                <div class="formBox">
                    <label for="pass" class="formLabel">
                        Nova senha:
                    </label>
                    <input type="password" name="pass" id="pass" class="formInput" maxlength="20" placeholder="Informe a senha" required autofocus>
                </div>
                <div class="formBox">
                    <label for="repass" class="formLabel">
                        Nova senha:
                    </label>
                    <input type="password" name="repass" id="repass" class="formInput" maxlength="20" placeholder="Repita a senha" required>
                </div>
                <div class="formBox">
                    <button class="formButtonSubmit" id="Send">
                        Trocar
                    </button>
                </div>
                <footer class="formFooter">
                    <address>Design By: <a href="https://youtube.com/@professorluis" target="_blank" rel="noopener noreferrer">Canal do Prof. Luis</a> &copy; 2023</address>
                </footer>
                <input type="hidden" name="key" value="newPass">
                <input type="hidden" name="email" value="<?php echo $user_mail; ?>">
            </form>
        </div>
    </main>
    
</body>
</html>