<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:46
 */

$compte = AccountManager::constructCompteFromDB($_SESSION["id"]);


$role = AccountManager::getRole($_SESSION["id"]);
$name = $compte->getFirstname()." ".$compte->getlastname();
$allInformations = AccountManager::getProfileInformation($_SESSION["id"]);
$preferences = PreferenceManager::getPreferences($_SESSION["id"]);
$notifications = NotificationManager::getLastTwoNotifications($_SESSION["id"]);
$allNotifications = NotificationManager::getAllNotifications($_SESSION["id"]);
if(!$role)
{
    $listeClients = DependencyManager::getClients($_SESSION["id"]);
    $listeUtilisateurs = AccountManager::getAllUtilisateurs();
}
else{
    $listeEntreprises = DependencyManager::getEnterprises($_SESSION["id"]);
}