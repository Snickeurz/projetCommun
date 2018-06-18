<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 25/05/2018
 * Time: 15:36
 */

class DependencyManager
{
    /**
     * Récupère la liste des clients d'une entreprise donnée.
     *
     * @param int $idEntreprise
     * @return mixed
     */
    public static function getClients($idEntreprise)
    {
        $monPdo = MonPdo::getInstance();
        $listeClients = $monPdo->query("SELECT id, firstname, lastname FROM account WHERE id IN (SELECT idClient FROM relation_client_entreprise WHERE idEntreprise = $idEntreprise)");
        return $listeClients->fetchAll();
    }

    /**
     * Récupère la liste des entreprises.
     *
     * @param int $idClient
     * @return mixed
     */
    public static function getEnterprises($idClient)
    {
        $monPdo = MonPdo::getInstance();
        $listeClients = $monPdo->query("SELECT id, firstname, lastname FROM account WHERE id IN (SELECT idEntreprise FROM contrat WHERE idClient = $idClient)");
        return $listeClients->fetchAll();
    }

    public static function countContrat($idEntreprise, $idClient)
    {
        $monPdo = MonPdo::getInstance();
        $count = $monPdo->prepare("SELECT count(*) FROM contrat WHERE idEntreprise = :idEnterprise AND idClient = :idClient");
        $count->bindParam(":idEnterprise",$idEntreprise);
        $count->bindParam(":idClient",$idClient);
        $count->execute();
        return $count->fetchColumn();
    }
}