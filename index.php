<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembrete de Senha</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <main>
        <div class="boxLogin">
            <form action="#" class="form" id="form" method="post">
                <h1 class="formH1">
                    Formulário de Login
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
                    <label for="pass" class="formLabel">
                        Senha:
                    </label>
                    <input type="password" name="pass" id="pass" class="formInput" maxlength="20" placeholder="Informe a Senha" required>
                </div>
                <div class="formBox">
                    <button class="formButtonSubmit" id="Send">
                        Enviar
                    </button>
                </div>
                <div class="formBoxFlex">
                    <a href="./forgotPass.php" class="formLink" id="forgotPass">Esqueci a Senha</a>
                    <a class="formLink" id="insertUser">Cadastrar Usuário</a>
                </div>
                <footer class="formFooter">
                    <address>Design By: <a href="https://youtube.com/@professorluis" target="_blank" rel="noopener noreferrer">Canal do Prof. Luis</a> &copy; 2023</address>
                </footer>
            </form>
        </div>
    </main>

</body>
</html>