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

}