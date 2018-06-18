<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/06/2018
 * Time: 08:43
 */

function notification_creation_compte($mail)
{
    $from = "webmaster@application_contrat.com";
    $to      = $mail;
    $subject = "[CREATION DE COMPTE - ".date('yyyy-mm-dd')."] - Application contrat";
    $message = "Pour confirmer la création de votre compte, suivre ce <a href='http://localhost/projetCommun/index.php?account=activation&key='>lien</a>.";

    $footer = "<br>Ceci est un message automatique.";
    $target = "<a href='http://localhost/projetCommun/index.php?account=activation&key='></a>";
}

function notification_signature_contrat_client($nomEntreprise, $mailClient)
{
    $from = "webmaster@application_contrat.com";
    $to  = $mailClient;
    $subject = "";
}