<?php

    if(isset($_POST[email]) && !empty($_POST[email])){
        $nome = addslashes($_POST['nome']);
        $fone = addslashes($_POST['fone']);
        $email = addslashes($_POST['email']);
        $msg = addslashes($_POST['msg'])

        $to = "informatica@brambilla.com.br";
        $subject = "Contato - Site VDML";
        $body = "Nome: " . $nome . "\r\n" .
                "e-mail: " . $email . "\r\n" . 
                "Mensagem: " . $msg;
        $header = "From:endereço email" . "\r\n" . 
                "Reply-To:" . $email . "\r\n" . 
                "X=Mailer:PHP/" . phpversion();

        if(mail($to, $subject, $body, $header)){
            echo("Mensagem enviada com sucesso.");
        }else{
            echo("Falha ao enviar a mensagem");
        }
    }
?>