<?php

    require_once("src/PHPMailer.php");
    require_once("src/SMTP.php");
    require_once("src/Exception.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $sendMail = new PHPMailer(true);

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $nome = addslashes($_POST['nome']);
        $fone = addslashes($_POST['fone']);
        $email = addslashes($_POST['email']);
        $msg = addslashes($_POST['msg']);

        $sendMail = new PHPMailer(true);

        try {
            $sendMail->SMTPDebug = SMTP::DEBUG_SERVER;
            $sendMail->isSMTP();
            $sendMail->Host = "smtp.gmail.com";
            $sendMail->SMTPAuth = true;
            $sendMail->Username = "birigui.escolar@gmail.com";
            $sendMail->Password = "bram2014";
            $sendMail->Port = 587;

            $sendMail->setFrom("birigui.escolar@gmail.com");
            $sendMail->addAddress("informatica@brambilla.com.br");

            $sendMail->isHTML(true);
            $sendMail->Subject = "Contato VDML";
            $sendMail->Body = $msg;
            $sendMail->AltBody = $msg;

            if($sendMail->send()){
                echo "Sucesso";
            }else{
                echo "Não enviado";
            }
            
        }catch (Exception $e){
            echo ("Ocorreu o erro " . $e . " excessão {$sendMail->ErrorInfo}");
        }
    }
?>