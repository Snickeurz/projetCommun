<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 29/03/2018
 * Time: 21:37
 */

/**
 * Méthode utilitaire pour récupérer le paramètre ac de l'url.
 *
 * @return string la valeur de l'ac récupéré
 */
function getAc()
{
    $ac = "";
    if(isset($_GET["ac"])&&!empty($_GET["ac"]))
    {
        $ac = $_GET["ac"];
    }
    return $ac;
}

/**
 * Méthode utilitaire pour récupérer le paramètre uc de l'url.
 *
 * @return string la valeur de l'uc récupéré
 */
function getUc()
{
    $uc = "";
    if(isset($_GET["uc"])&&!empty($_GET["uc"]))
    {
        $uc = $_GET["uc"];
    }
    return $uc;
}