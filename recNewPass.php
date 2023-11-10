<?php

include './php/conn.php';

if(isset($_POST["key"]) && $_POST["email"] !== "" && $_POST["pass"] !== "" && $_POST["repass"] !== "" && $_POST["pass"] === $_POST["repass"]) {

    $key = $_POST["key"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $repass = $_POST["repass"];

    $sql = "UPDATE users SET user_pass = ? WHERE user_mail = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(1, $pass, PDO::PARAM_STR);
    $stm->bindParam(2, $email, PDO::PARAM_STR);
    $stm->execute();

    $row = $stm->rowCount();

    if($row > 0) {
        $message = "Senha alterada com sucesso!";
    } else {
        $message = "Não foi possível alterar a senha";
    }

} else {
    $message = "Houve algum problema no procedimento, por favor tente novamente.";
}

include './index.php';
