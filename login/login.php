<?php
/**
 * On vérifie les variables de type POST reçu ainsi que l'action à faire.
 */
if(isset($_POST["mail"])&!empty($_POST["mail"])&isset($_POST["mdp"])&!empty($_POST["mdp"])&isset($_POST['signin']))
{
    /**
     * Vérification des variables fournit.
     */
    $id = null;
    $id = LoginManager::checkUser($_POST["mail"], $_POST["mdp"]);
    if($id != null)
    {
        /**
         * Affectation @bool = true à la variable de session __valide.
         */
        $_SESSION["__valide"] = true;
        /**
         * Paramètre un id de session
         */
        $_SESSION["id"] = $id;
        /**
         * Rediriger l'utlisateur vers index.php.
         */
       echo '<script>window.location.replace("./index.php?uc=accueil&ac=home");</script>';
    }
    /**
     * Redirige l'utilisateur vers index.php et doit afficher un message d'erreur.
     */
    else
    {
        echo '<script>window.location.replace("./index.php?login=fail");</script>';
    }
}
elseif (isset($_POST["mdp"])&isset($_POST["mail"])&isset($_POST["signup"]))
{
    if(LoginManager::inscription($_POST["prenom"],$_POST["nom"],$_POST["mail"],$_POST["mdp"],$_POST["role"]))
	{
        /**
         * Rediriger l'utlisateur vers lécran de log et l'informer de la création du compte.
         */
       echo '<script>window.location.replace("./index.php?login=created");</script>';
	}
	else{
        /**
         * Rediriger l'utlisateur vers lécran de log avec erreyr.
         */
        echo '<script>window.location.replace("./index.php?login=failtocreate");</script>';
	}
}
else
{
    exit;
}