<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:45
 */

class LoginManager
{
    /**
     * Vérification d'un utilisateur.
     *
     * @param string $mail
     * @param string $pass
     * @return mixed
     */
    public static function checkUser($mail, $pass)
    {
        $monPdo = MonPdo::getInstance();
        $check = $monPdo->prepare("SELECT id FROM account WHERE email = :email AND password = :password");
        $check->bindParam(":email",$mail,PDO::PARAM_STR);
        $check->bindParam(":password",$pass,PDO::PARAM_STR);
        $check->execute();
        return $check->fetchColumn();
    }

    /**
     * Ajoute un nouvel utilisateur.
     *
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $password
     * @param mixed $role
     * @return mixed
     */
    public static function inscription($firstname,$lastname,$email,$password,$role){
        $pdo = MonPdo::getInstance();
        $req = $pdo->prepare("INSERT INTO account(firstname,lastname,email,password,role,phone) VALUES (:firstname,:lastname,:email,:password,:role, :phone)");
        $req->bindValue(':firstname',$firstname, PDO::PARAM_STR);
        $req->bindValue(':lastname',$lastname, PDO::PARAM_STR);
        $req->bindValue(':email',$email, PDO::PARAM_STR);
        $req->bindValue(':password',$password, PDO::PARAM_STR);
        $req->bindValue(':role',$role, PDO::PARAM_BOOL);
        $req->bindValue(':phone',0000000000, PDO::PARAM_STR);
        $req->execute();
		
		$idAccount = $pdo->prepare("SELECT id FROM account ORDER BY ID DESC LIMIT 1");
		$idAccount->execute();
		$idAcc = $idAccount->fetchColumn();
		
		$setPref = $pdo->prepare("INSERT INTO preferences (idAccount, getNotif, newsLetter, notifMail) VALUES (:idAccount,:getNotif,:newsLetter,:notifMail)");
		$setPref->bindValue(":getNotif", 0, PDO::PARAM_BOOL);
		$setPref->bindValue(":newsLetter", 0, PDO::PARAM_BOOL);
		$setPref->bindValue(":notifMail", 0, PDO::PARAM_BOOL);
		$setPref->bindValue(":idAccount", $idAcc, PDO::PARAM_INT);
		return $setPref->execute();
    }

    public static function logOut()
    {
        session_destroy();
        echo '<script>window.location.replace("./index.php");</script>';
    }


}