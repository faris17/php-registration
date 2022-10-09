<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.php
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './vendor/autoload.php';

class SendEmail
{

    public static function SendMail($to, $subject, $content)
    {
        try {

            //Create a new PHPMailer instance
            $mail = new PHPMailer();


            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
            //if your network does not support SMTP over IPv6,
            //though this may cause issues with TLS

            //Set the SMTP port number:
            // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
            // - 587 for SMTP+STARTTLS
            // $mail->Port = 465;

            //Set the encryption mechanism to use:
            // - SMTPS (implicit TLS on port 465) or
            // - STARTTLS (explicit TLS on port 587)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = 'fzain712@gmail.com';

            //Password to use for SMTP authentication
            $mail->Password = 'ojcwelqsvsucfqiv';

            //Set who the message is to be sent from
            //Note that with gmail you can only use your account address (same as `Username`)
            //or predefined aliases that you have configured within your account.
            //Do not use user-submitted addresses in here
            $mail->setFrom('fzain712@gmail.com', 'Faris Zain');

            //Set an alternative reply-to address

            //Set who the message is to be sent to
            $mail->addAddress($to, $to);



            //Attach an image file
            // $mail->addAttachment('./services/emoticon.png');
            $mail->IsHTML(true);
            //Set the subject line
            $mail->Subject = $subject;

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);

            $body             = "<h3>Register Successfully</h3>";
            $body             .= "<p>Thanks for your registration in our app Registration</p>";

            //Replace the plain text body with one created manually
            $mail->Body    = $body;
            $mail->AltBody    = $body;
            //send the message, check for errors
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                return "<h3 class='mt-4 text-center text-success'>We have sent to your email.</h3>";
            }
        } catch (Exception $e) {
            echo 'Email exception caught: ' . $e->getMessage();
            return false;
        }
    }
}
