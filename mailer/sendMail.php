<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 14/06/2018
 * Time: 23:36
 */


function sendMail($to, $subject, $message, $headers)
{
    $dateSend = date("Y-m-d H:i:s")."<br>";
    $message .= $dateSend;
    mail($to, $subject, $message, $headers);
}

