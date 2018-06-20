<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:35
 */

class AccountManager
{
    /**
     * Récupère les informations d'un compte en fonction d'un id.
     *
     * Instancie un objet de class AccountModel
     *
     * @param int $id session
     * @return object $compte un compte
     */
    public static function constructCompteFromDB($idSession)
    {
        $monPdo = MonPdo::getInstance();
        $compte = new AccountModel();
        try
        {
            $informations = $monPdo->prepare("SELECT id, firstname, lastname, email, role, phone FROM account WHERE id = :idSession");
            $informations->bindParam(":idSession", $idSession, PDO::PARAM_INT);
            $informations->execute();

            while ($info = $informations ->fetch(PDO::FETCH_ASSOC))
            {
                $compte->setId($info["id"]);
                $compte->setFirstname($info["firstname"]);
                $compte->setLastname($info["lastname"]);
                $compte->setEmail($info["email"]);
                $compte->setRole($info["role"]);
                $compte->setPhone($info["phone"]);
            }
        }
        catch (\Exception $e)
        {
            $e->getMessage();
        }
        return $compte;
    }

    /**
     * Cette méthode récupère des informations sur l'utilsisateur
     * Nom, prenom, email & téléphone
     * @return mixed toutes les informations de l'utilisateur
     */
    public static function getProfileInformation($id)
    {
        $monPdo = MonPdo::getInstance();
        $profileInformations = $monPdo->prepare("SELECT firstname, lastname, email, phone FROM account WHERE id = :id");
        $profileInformations->bindParam(":id",$id);
        $profileInformations->execute();

        return $profileInformations->fetchAll();
    }

    /**
     * Permet de connaître le role, si la personne est utilisateur-lambda ou entreprise.
     *
     * @return string $role
     */
    public static function getRole($id)
    {
        $monPdo = MonPdo::getInstance();
        $role = $monPdo->prepare("SELECT role FROM account WHERE id = :id");
        $role->bindParam(":id",$id);
        $role->execute();
        return $role->fetchColumn();
    }

    /**
     * Récupère le nom de la personne en fonction d'un ID
     *
     * @param $arg l'ID de la personne/entreprise
     * @return mixed le nom de la personne
     */
    public static function getNameById($arg)
    {
        $monPdo = MonPdo::getInstance();
        $name = $monPdo->prepare("SELECT lastname FROM account WHERE id = :id");
        $name->bindParam(":id",$arg);
        $name->execute();
        return $name->fetchColumn();
    }

    /**
     * Récupère le prenom de la personne en fonction d'un ID
     *
     * @param $arg l'ID de la personne/entreprise
     * @return mixed le nom de la personne
     */
    public static function getFirstNameById($arg)
    {
        $monPdo = MonPdo::getInstance();
        $fn = $monPdo->prepare("SELECT firstname FROM account WHERE id = :id");
        $fn->bindParam(":id",$arg);
        $fn->execute();
        return $fn->fetchColumn();
    }


    /**
     * Permet de changer le mot de passe actuel par celui reçu en paramètre
     * @param string $new_password le nouveau mot de passe
     * @return mixed l'état
     */
    public static function newPassword($id,$new_password)
    {
        $monPdo = MonPdo::getInstance();
        $update = $monPdo->prepare("UPDATE account SET password = :password WHERE id = :id");
        $update->bindParam(":password",$new_password);
        $update->bindParam(":id",$id);
        return $update->execute();
    }

    /**
     * Met à jour le nom et le prénom
     *
     * @param string $nom le nouveau nom
     * @param string $prenom le nouveau prénom
     * @return mixed
     */
    public static function newNames($id,$new_nom,$new_prenom)
    {
        $unPdo = Connexion::getInstance()->prepare("UPDATE account SET firstname = ?, lastname = ? WHERE id = ?");
        return $unPdo->execute(array($new_prenom,$new_nom,$id));
    }

    /**
     * Met à jour l'email et le numéro de téléphone
     *
     * @param string $new_email le nouvel email
     * @param string $new_tel le nouveau numéro de téléphone
     * @return mixed
     */
    public static function newCoordonnees($id, $new_email,$new_tel)
    {
        $unPdo = Connexion::getInstance()->prepare("UPDATE account SET email = ?, phone = ? WHERE id = ?");
        return $unPdo->execute(array($new_email,$new_tel,$id));
    }


    /**
     * Récupère l'adresse email de la personne/entreprise
     *
     * @param int $id l'id du client/entreprise
     * @return mixed l'adresse email retrouvé
     */
    public static function getMail($id)
    {
        $monPdo = Connexion::getInstance();
        $mail = $monPdo->prepare("SELECT email FROM account WHERE id = :id");
        $mail->bindParam(":id", $id);
        $mail->execute();
        return $mail->fetchColumn();
    }

    /**
     * Récupère tous les utilisateurs de type client.
     */
    public static function getAllUtilisateurs()
    {
     $monPdo = MonPdo::getInstance();
     $role = 1;
     $utilisateurs = $monPdo->prepare("SELECT id, firstname, lastname FROM account WHERE role=:role");
     $utilisateurs->bindParam(":role",$role,PDO::PARAM_BOOL);
     $utilisateurs->execute();
     return $utilisateurs->fetchAll();
    }

    /**
     * Permet à une entreprise d'ajouter des clients.
     *
     * @param int $idEntreprise
     * @param int $idClient
     * @return mixed
     */
    public static function addRelation($idEntreprise, $idClient)
    {
        $monPdo = MonPdo::getInstance();
        $insert = $monPdo->prepare("INSERT INTO relation_client_entreprise (idClient, idEntreprise) VALUES (:idClient, :idEntreprise)");
        $insert->bindParam(":idClient",$idClient, PDO::PARAM_INT);
        $insert->bindParam(":idEntreprise",$idEntreprise, PDO::PARAM_INT);
        return $insert->execute();
    }
}