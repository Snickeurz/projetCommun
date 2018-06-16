<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 10/05/2018
 * Time: 00:43
 */

//Changement de préferences
//On regarde si chaques paramètres reçu sont paramétré & non null
if(isset($_POST["recevoir_notif"])&&!empty($_POST["recevoir_notif"]))
{
    $getNotif = 1;
}else{
    $getNotif = 0;
}
if(isset($_POST["recevoir_mail"])&&!empty($_POST["recevoir_mail"]))
{
    $getMails = 1;
}else{
    $getMails = 0;
}
if(isset($_POST["recevoir_news_letter"])&&!empty($_POST["recevoir_news_letter"]))
{
    $getNewsLetter = 1;
}else{
    $getNewsLetter = 0;
}
//Appel méthode pour paramétrer les prefs
if(PreferenceManager::setPreferences($_SESSION["id"],$getNotif,$getNewsLetter,$getMails) && isset($_POST["modif_traitement"]))
{
    echo '<script>window.location.replace("./index.php?uc=profil&ac=show&editPref=true");</script>';
}
else
{
    echo '<script>window.location.replace("./index.php?uc=profil&ac=show&editPref=false");</script>';
}