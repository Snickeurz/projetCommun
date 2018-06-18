<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:35
 */

class ContratManager
{

    public static function constructContratForEnterprise($idEnterprise)
    {
        return self::constructContratFromDB($idEnterprise, "idEntreprise");
    }
    public static function constructContratForClient($idClient)
    {
        return self::constructContratFromDB($idClient, "idClient");
    }
    /**
     * Récupère les contrats d'une entreprise
     *
     * @param int $id session
     * @param string $filtre session
     */
    public static function constructContratFromDB($id, $filtre)
    {
        $monPdo = MonPdo::getInstance();
        $query = "SELECT id, contratUrl, nomContrat, idClient, idEntreprise, status, dateupload FROM contrat WHERE ".$filtre." = :id";
        $listeContrats = $monPdo->prepare($query);
        $listeContrats->bindParam(":id", $id, PDO::PARAM_INT);
        $listeContrats->execute();
        return $listeContrats->fetchAll();
    }

    /**
     * Récupère l'emplacement physique du fichier.
     *
     * @param int $idContrat
     * @return mixed
     */
    public static function getPath($idContrat)
    {
        $monPdo = MonPdo::getInstance();
        $path = $monPdo->prepare("SELECT contratUrl FROM contrat WHERE id = :id");
        $path->bindParam(":id",$idContrat,PDO::PARAM_INT);
        $path->execute();
        return $path->fetchColumn();
    }
}