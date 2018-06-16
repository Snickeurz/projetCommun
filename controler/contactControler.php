<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 14/06/2018
 * Time: 23:22
 */

/**
 * contact support.
 */
if(isset($_POST["Envoyer"]))
{
    $to      = 'nicolassibaud@hotmail.com';
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = array(
        'From' => 'webmaster@applicontrat.com',
        'Reply-To' => 'webmaster@applicontrat.com',
    'X-Mailer' => 'PHP/' . phpversion()
    );
    sendMail($to,$subject,$message,$headers);
}
