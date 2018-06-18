<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/06/2018
 * Time: 11:25
 */

class EditManager
{

    public static function setCoord($mail,$tel)
    {
        $monPdo = MonPdo::getInstance();
        $update = $monPdo->prepare("UPDATE account SET email = :mail, phone = :tel WHERE id=:id");
        $update->bindParam(":mail",$mail,PDO::PARAM_STR);
        $update->bindParam(":tel",$tel,PDO::PARAM_STR);
        $update->bindParam(":id",$_SESSION["id"],PDO::PARAM_INT);
        return $update->execute();
    }
    public static function setNames($new_firstname,$new_lastname)
    {
        $monPdo = MonPdo::getInstance();
        $update = $monPdo->prepare("UPDATE account SET firstname = :prenom, lastname = :lastname WHERE id=:id ");
        $update->bindParam(":prenom",$new_firstname,PDO::PARAM_STR);
        $update->bindParam(":lastname",$new_lastname,PDO::PARAM_STR);
        $update->bindParam(":id",$_SESSION["id"],PDO::PARAM_INT);
        return $update->execute();
    }
    public static function changePassword($pass)
    {
        $monPdo = MonPdo::getInstance();
        $update = $monPdo->prepare("UPDATE account SET password = :pass WHERE id=:id");
        $update->bindParam(":pass",$pass,PDO::PARAM_STR);
        $update->bindParam(":id",$_SESSION["id"],PDO::PARAM_INT);
        return $update->execute();
    }
}