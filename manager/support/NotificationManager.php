<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 20/06/2018
 * Time: 15:49
 */

class NotificationManager
{
    /**
     * Récupère les trois dernières notifications lié au compte.
     *
     * @param int $idUser l'id de session
     * @return mixed
     */
    public static function getLastTwoNotifications($idUser)
    {
        $monPdo = MonPdo::getInstance();
        $lastNotifications = $monPdo->prepare("SELECT * FROM notification WHERE idAccount = :id ORDER BY id DESC LIMIT 3");
        $lastNotifications->bindParam(":id",$idUser, PDO::PARAM_INT);
        $lastNotifications->execute();
        return $lastNotifications->fetchAll();
    }

    public static function getAllNotifications($idUser)
    {
        $monPdo = MonPdo::getInstance();
        $lastNotifications = $monPdo->prepare("SELECT * FROM notification WHERE idAccount = :id");
        $lastNotifications->bindParam(":id",$idUser, PDO::PARAM_INT);
        $lastNotifications->execute();
        return $lastNotifications->fetchAll();
    }
    /**
     * Persiste une nouvelle notification en BDD.
     *
     * @param string $titre
     * @param string $message
     * @param string $lien
     * @param int $idAccount
     */
    public static function newNotification($titre, $message, $lien, $idAccount)
    {
        $monPdo = MonPdo::getInstance();
        $dateCreation = date("Y-m-d H:i:s");
        $insertNotification = $monPdo->prepare("INSERT INTO notification (date, titre, message, lien, idAccount) VALUES 
(:dateCreation, :titre, :message, :lien, :id)");
        $insertNotification->bindValue(":dateCreation",$dateCreation);
        $insertNotification->bindValue(":titre",$titre, PDO::PARAM_STR);
        $insertNotification->bindValue(":message",$message, PDO::PARAM_STR);
        $insertNotification->bindValue(":lien",$lien, PDO::PARAM_STR);
        $insertNotification->bindValue(":id",$idAccount, PDO::PARAM_INT);
        return $insertNotification->execute();
    }

    /**
     * Compte le nombre total de notification lié à un compte.
     *
     * @param int $idAccount l'id de session
     * @return mixed
     */
    public static function countNotification($idAccount)
    {
        $monPdo = MonPdo::getInstance();
        $count = $monPdo->prepare("SELECT count(*) FROM notification WHERE idAccount = :idAccount");
        $count->bindParam(":idAccount",$idAccount, PDO::PARAM_INT);
        $count->execute();
        return $count->fetchColumn();
    }

    /**
     * Supprime une notification en base de données.
     *
     * @param int $idNotification l'id de la notification
     * @return mixed
     */
    public static function deleteNotification($idNotification)
    {
        $monPdo = MonPdo::getInstance();
        $delete = $monPdo->prepare("DELETE FROM notification WHERE id = :idNotification");
        $delete->bindParam(":idNotification",$idNotification, PDO::PARAM_INT);
        return $delete->execute();
    }
}