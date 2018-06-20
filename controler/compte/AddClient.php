<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/06/2018
 * Time: 22:07
 */
if(isset($_POST["add_client"]))
{
    if(AccountManager::addRelation($_SESSION["id"], $_POST["idClientToAdd"]))
    {
        $message = "L'entreprise ".AccountManager::getNameById($_SESSION["id"])." vous a ajouté à sa liste de partenaire.";
        NotificationManager::newNotification("Ajout partenaire",$message, "./index.php?uc=profil&ac=show", $_POST["idClientToAdd"]);
        $message = "Vous venez d'ajouter le client : ".AccountManager::getNameById($_POST["idClientToAdd"])." à votre liste de clients";
        NotificationManager::newNotification("Ajout partenaire",$message, "./index.php?uc=profil&ac=show", $_SESSION["id"]);
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=add_client_true");</script>';
    }
    else{
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=add_client_false");</script>';
    }
}