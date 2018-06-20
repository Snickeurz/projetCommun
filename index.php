<?php
/**
 * Set session.
 */
session_start();

/**
 * PDO.
 */
include("model/pdo/class.pdo.inc.php");


/***********************************
 *          DECLARATIONS           *
 *          -------------          *
 *             MODELS              *
 *            MANAGERS             *
 **********************************/

/**
 * Collection
 */

include ("model/collection/Collection.php");

/**
 * Compte
 */
include("manager/compte/AccountManager.php");
include("manager/compte/EditManager.php");
include("manager/compte/DependencyManager.php");
include("manager/compte/PreferenceManager.php");
include ("manager/compte/LoginManager.php");
include("model/compte/AccountModel.php");
/**
 * Contrat
 */
include("manager/contrat/ContratManager.php");
include("manager/contrat/ContratCUD.php");
include("model/contrat/ContratModel.php");

/**
 * FAQ
 */
include("manager/support/FaqManager.php");
include("model/support/FaqModel.php");

/**
 * NOTIFICATIONS
 */
include("manager/support/NotificationManager.php");

/**
 * Helper methodes
 */
include("helperMethodes.php");
include("mailer/sendMail.php");

/**
 * Vérification de la session active ou non.
 * Si la session n'est pas initialisé redirigé l'utilisateur vers la page d'authentification.
 * Sinon rediriger la personne vers l'écran d'accueil du site internet.
 */
if(!isset($_SESSION["__valide"])&&!isset($_SESSION["id"]))
{
    include ("login/loginInterface.html");
    include ("login/login.php");
}
else
{
    /**
     * Compte controler.
     */
    include("controler/compte/CompteControler.php");

    /**
     * Le fichier base html contient l'entête html du site
     */
    include("base.html");
    /**
     * nav.html contient la barre de naviguation
     */
    include("nav.html");
    /**
     * Banniere.html contient la bannière
     */
    include("banniere.html");

    /**
     * Récupère le paramètre UC
     */
    $uc = getUc();
    /**
     * Récupère le paramètre AC
     */
    $ac = getAc();

    /**
     * alertes générales.
     */
    include ("views/alerte_message/alert_upload.html");

    /**
     * Ce switch sur uc permet d'aiguiller l'utilisateur.
     * en fonction des cases de uc, on redirige vers un controleur spécifié
     */
    switch ($uc)
    {
        case 'accueil':
            include('views/notification.php');
            include('views/home.html');
            break;

        /**
         * Consulter les contrats
         */
        case 'contrat':
            switch ($ac)
            {
                case 'show':
                    include("controler/contrat/ContratControler.php");
                    break;
                case 'details':
                    include("controler/contrat/ContratControler.php");
                    include("views/display/contrat.html");
                    break;
                case 'addContrat':
                    include("controler/contrat/ContratCUD.php");
                    break;
                case 'signerContrat':
                    include("controler/contrat/ContratCUD.php");
                    break;
                case 'delete':
                    include ("controler/contrat/ContratCUD.php");
                    break;
                default:
                    break;
            }
            break;

        /**
         * Afficher profil
         */
        case 'profil':
            switch ($ac)
            {
                case 'show':
                    include("controler/contrat/ContratControler.php");
                    include("views/profil/interface.html");
                    break;
				case 'modificationPreferences':
					include("controler/compte/PreferencesControler.php");
					break;
                case 'edit':
                    include("controler/compte/EditProfil.php");
                    break;
                case 'addclient':
                    include("controler/compte/AddClient.php");
                    break;
                default:
                    break;
            }
            break;

        case 'contact':
            include ("controler/contactControler.php");
            switch ($ac)
            {
                case 'contact_support':
                    include("mailer/send_mail.php");
                    break;
                default:
                    include ('views/contact.html');
                    break;
            }
            break;

        /**
         * On veut observer l'onglet service
         */
        case 'service':
            include('views/service/service_pt1.html');
            include('views/service/service_pt2.html');
            include('views/service/modalService.html');
            break;

        /**
         * Permet d'afficher la vue help.php
         * On affiche la F.A.Q
         */
        case 'help':
            include("controler/FaqControler.php");
            include('views/help.php');
            break;

        case 'logout':
            include('login/logout.php');
            break;
        default :
            include("views/home.html");
            break;
    }
    /**
     * On inclut le footer.html pour avoir le bas de page.
     */
    include('footer.html');
}
