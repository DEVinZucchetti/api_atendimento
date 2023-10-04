<?php
    // 1 - Carregar o autoload
     require_once '../vendor/autoload.php';

     function sendEmail() {
        $phpmailer = new PHPMailer\PHPMailer\PHPMailer();

        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'b2ab7e798f588d';
        $phpmailer->Password = 'd0eae85bc4a4c8';

        $phpmailer->setFrom('banco@gmail.com', 'Banco Meu Dinheiro');
        $phpmailer->addAddress('henriquedouglas2803@gmail.com', 'Henrique Douglas');
        $phpmailer->Subject = 'FEEDBACK SOBRE ATENDIMENTO';
        $phpmailer->isHTML(true);
        $phpmailer->Body ='
        <html>
            <head>
                <meta charset="UTF-8">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f0f0f0;
                    }
                    .container {
                        background-color: #ffffff;
                        padding: 20px;
                        border-radius: 5px;
                        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
                    }
                    h1 {
                        color: red;
                    }
                    p {
                        color: #666;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Olá,</h1>
                    <p>Este é um exemplo de e-mail com estilo.</p>
                </div>
            </body>
        </html>';

        if ($phpmailer->send()) {
            echo "Email enviado com sucesso!";
        } else {
            echo "Erro ao enviar o email: " . $phpmailer->ErrorInfo;
        }

     }
