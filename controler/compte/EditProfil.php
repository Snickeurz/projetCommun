<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 18/06/2018
 * Time: 11:20
 */

if(isset($_POST["edit_names"]))
{
    editNames();
}
if(isset($_POST["edit_coord"]))
{
    editCoord();
}

function editNames()
{
    if(EditManager::setNames($_POST["prenom"],$_POST["nom"]))
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=names_true");</script>';
    }
    else
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=names_false");</script>';
    }
}
function editCoord()
{
    if(EditManager::setCoord($_POST["email"],$_POST["phone"]))
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=coord_true");</script>';
    }
    else
    {
        echo '<script>window.location.replace("./index.php?uc=profil&ac=show&edit=coord_false");</script>';
    }
}