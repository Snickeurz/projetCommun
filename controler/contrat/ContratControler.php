<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:46
 */


$collectionContrat = new Collection();

if(!$role)
{
    $contrats = ContratManager::constructContratForEnterprise($_SESSION["id"]);
    $listeClient = DependencyManager::getClients($_SESSION["id"]);
}
else{
    $contrats = ContratManager::constructContratForClient($_SESSION["id"]);
}

foreach ($contrats as $contrat)
{
    $contratModel = new ContratModel(
        $contrat[0],$contrat[1],$contrat[2],$contrat[3],$contrat[4],$contrat[5],$contrat[6]
    );
    $collectionContrat->addInCollection($contratModel);
}

