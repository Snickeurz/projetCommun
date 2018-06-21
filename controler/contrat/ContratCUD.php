<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 16/05/2018
 * Time: 12:01
 */



if(isset($_POST['signer']))
{
    signeContrat($_POST['id_contrat_to_valide']);
}
elseif (isset($_POST['createContrat']))
{
    newContrat();
}
elseif (isset($_POST['supprimer_contrat']))
{
    deleteContrat($_POST['idContrat']);
}


function newContrat()
{
    //$details = $_POST["details"];
    $idClient = $_POST['selectClient'];
    $nomContrat = basename($_FILES["contrat"]["name"]);
    $idEntreprise = $_SESSION["id"];
    $uploadDir = "./uploads/contrats/".AccountManager::getNameById($idClient);
    $uploadFile = $uploadDir ."/".basename($_FILES['contrat']['name']);
    $description = $_POST["description"];

    if(ContratCUD::addContrat($uploadFile,$nomContrat,$idClient,$idEntreprise, $description)&&uploadFile($uploadDir,$uploadFile))
    {
        $message = "L'entreprise <span style='color:red;'>".AccountManager::getNameById($_SESSION["id"])." </span>vous a envoyé un contrat";
        NotificationManager::newNotification("Nouveau contrat", $message, "./index.php?uc=profil&ac=show", $idClient);
        $message = "Vous venez d'ajouter le contrat ".$nomContrat." pour le client ".AccountManager::getNameById($idClient);
        NotificationManager::newNotification("Ajout d'un contrat", $message, "./index.php?uc=profil&ac=show", $_SESSION["id"]);

        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&information=uploadOk");</script>';
    }
    else
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&information=failupload");</script>';
    }

}

function uploadFile($uploadDir,$uploadFile)
{
    $checkMove = false;
    //Si le repertoir n'existe pas
    if(!file_exists($uploadDir))
    {
        mkdir($uploadDir);
    }
    if (move_uploaded_file($_FILES['contrat']['tmp_name'], $uploadFile)) {
        $checkMove = true;
    }
    /* for debug purpose
    switch ($_FILES['contrat']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }*/
    return $checkMove;
}

function deleteContrat($idContrat)
{
    $path = ContratManager::getPath($idContrat);
    if(file_exists($path))
    {
        unlink($path);
    }
    if(ContratCUD::deleteContrat($idContrat))
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&deletecontrat=true");</script>';
    }
    else{
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&deletecontrat=false");</script>';
    }
}


function signeContrat($idContrat)
{
    if(ContratCUD::updateSignature($idContrat))
    {
        $message = "Le contrat n°".$idContrat." - ".ContratManager::getName($idContrat)." - vient d'être signé.";
        $idEntreprise = ContratManager::getIdEntrepriseByIdContrat($idContrat);
        NotificationManager::newNotification("Signature de contrat", $message, "./index.php?uc=profil&ac=show", $idEntreprise);
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=contrat_signe");</script>';
    }
    else{
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=contrat_non_signe");</script>';
    }
}
