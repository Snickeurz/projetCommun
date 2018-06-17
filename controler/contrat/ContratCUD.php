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
elseif (isset($_POST['supprimer']))
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
    if(ContratCUD::addContrat($uploadFile,$nomContrat,$idClient,$idEntreprise)&&uploadFile($uploadDir,$uploadFile))
    {
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

    return $checkMove;
}

function deleteContrat($idContrat)
{
    ContratManager::deleteContrat($idContrat);
    echo '<script>window.location.replace("./index.php?uc=redirect&ac=profil&deletecontrat=true");</script>';
}


function signeContrat($idContrat)
{
    if(ContratCUD::updateSignature($idContrat))
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=contrat_signe");</script>';
    }
    else{
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=contrat_non_signe");</script>';
    }
}
