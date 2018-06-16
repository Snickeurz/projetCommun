<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/05/2018
 * Time: 14:45
 */

class PreferenceManager
{
    /**
     * Cette méthode permet de mettre à jour les préférences de l'utilisateur.
     *
     * @param int $id
     * @param boolean $notif
     * @param boolean $news
     * @param boolean $mail
     */
    public static function setPreferences($id,$notif,$news,$mail)
    {
        $monPdo = MonPdo::getInstance();
        $update = $monPdo->prepare("UPDATE preferences SET getNotif = ?, newsLetter = ?, notifMail = ? WHERE idAccount = ?");
        return $update->execute(array($notif,$news,$mail,$id));
    }
    /**
     * Retour les préférences de l'utilisateur.
     *
     * @return mixed
     */
    public static function getPreferences($id)
    {
        $monPdo = MonPdo::getInstance();
        $preferences = $monPdo->prepare("SELECT getNotif, newsLetter, notifMail FROM preferences WHERE idAccount = :id");
        $preferences->bindParam(":id",$id);
        $preferences->execute();

        return $preferences->fetchAll();
    }
}