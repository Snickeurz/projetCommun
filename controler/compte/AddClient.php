<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/06/2018
 * Time: 22:07
 */
if(isset($_POST["add_client"]))
{
    if(AccountManager::addRelation($_SESSION["id"], $_POST["idClientToAdd"]))
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=add_client_true");</script>';
    }
    else{
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=add_client_false");</script>';
    }
}