<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail( $server_config, $recipients, $content ) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = $server_config->host;  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $server_config->user;                     // SMTP username
        $mail->Password   = $server_config->pass;                               // SMTP password
        $mail->SMTPSecure = $server_config->secure;                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = $server_config->port;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($recipients->from);
        $mail->addAddress($recipients->address);     // Add a recipient           // Name is optional
        $mail->addReplyTo($recipients->replyto);
        $mail->addCC($recipients->cc);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $content->subject;
        $mail->Body    = $content->body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
