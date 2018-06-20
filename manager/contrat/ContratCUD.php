<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/05/2018
 * Time: 14:42
 */

class ContratCUD
{
    /**
     * Ajoute un nouveau contrat dans la base.
     *
     * @param int $idClient
     * @param string $nomContrat
     * @param int $idEntreprise
     * @param string $contratUrl
     * @return mixed
     */
    public static function addContrat($contratUrl,$nomContrat,$idClient,$idEntreprise, $description)
    {
        $monPdo = MonPdo::getInstance();
        $status = 0;
        $dateUpload = date("Y-m-d H:i:s");
        $addContrat = $monPdo->prepare("INSERT INTO contrat(contratUrl,nomContrat,idClient,idEntreprise,status,dateupload, description) 
VALUES (:contratUrl,:nomContrat,:idClient,:idEntreprise,:defaultStatus,:dateupload, :description) ");
        $addContrat->bindValue(":contratUrl",$contratUrl);
        $addContrat->bindValue(":nomContrat",$nomContrat);
        $addContrat->bindValue(":idClient",$idClient);
        $addContrat->bindValue(":idEntreprise",$idEntreprise);
        $addContrat->bindValue(":defaultStatus",$status);
        $addContrat->bindValue(":dateupload",$dateUpload);
        $addContrat->bindValue(":description",$description);
        return $addContrat->execute();
    }


    /**
     * Met à jour le status du contrat en état : signer.
     *
     * @param int $idContrat
     * @return mixed
     */
    public static function updateSignature($idContrat)
    {
        $monPdo = MonPdo::getInstance();
        $signature = 1;
        $maRequete = $monPdo->prepare("UPDATE contrat SET status= :signature WHERE id = :idContrat");
        $maRequete->bindParam(":signature",$signature);
        $maRequete->bindParam(":idContrat",$idContrat);
        $maRequete->execute();

        return $maRequete;
    }
    /**
     * Supprime un contrat.
     *
     * @param int $idContrat
     * @return mixed
     */
    public static function deleteContrat($idContrat)
    {
        $monPdo = MonPdo::getInstance();
        $deleteContrat = $monPdo->prepare("DELETE FROM contrat WHERE id = :idContrat ");
        $deleteContrat->bindParam(":idContrat", $idContrat);
        return $deleteContrat->execute();
    }

    /**
     * Met à jour un contrat un contrat.
     *
     * @param int $idContrat
     * @param string $contratUrl
     * @return mixed
     */
    public static function updateContrat($idContrat, $contratUrl)
    {
        $monPdo = MonPdo::getInstance();
        $updateContrat = $monPdo->prepare("UPDATE contrat SET contratUrl =:contratUrl WHERE id = :idContrat");
        $updateContrat->bindParam(":contratUrl", $contratUrl);
        $updateContrat->bindParam(":idContrat", $idContrat);
        return $updateContrat->execute();
    }


}