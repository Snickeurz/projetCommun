<?php
/**
 * Class Connexion
 * Permet de récupérer une instance de PDO
 * Permet la connexion à la BDD
 */
class MonPdo{
    /**
     * @var string $serveur le serveur distant/local
     */
    private static $serveur='mysql:host=localhost';
    /**
     * @var string $bdd le nom de la base de donnée
     */
    private static $bdd='dbname=projetcommun';
    /**
     * @var string $user le nom d'utilisateur pour se connecter à la bdd
     */
    private static $user='root' ;
    /**
     * @var string $mdp le mot de passe pour se connecter à la bdd
     */
    private static $mdp='';
    /**
     * @var static $monPdo pour avoir une instance
     */
    private static $monPdo;
    /**
     * @var null $monMonPdo au cas ou monPdo foire
     */
    private static $monMonPdo = null;
    /**
     * Connexion's constructor.
     */
    private function __construct()
    {
        MonPdo::$monPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user,
            MonPdo::$mdp);
        MonPdo::$monPdo->query("SET CHARACTER SET utf8");
    }
    /**
     * Connexion's destructor
     */
    public static function _destruct(){
        MonPdo::$monPdo = null;
    }
    /**
     * Permet d'accèder à la BDD
     *
     * @return mixed instance de PDO
     */
    public static function getInstance()
    {
        if(MonPdo::$monPdo == null)
        {
            MonPdo::$monMonPdo= new MonPdo();
        }
        return MonPdo::$monPdo;
    }
}