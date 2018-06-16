<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:44
 */

class FaqManager
{

    public static function getFaq()
    {
        $monPdo=MonPdo::getInstance();
        $fac = $monPdo->prepare("SELECT * FROM faq");
        $fac->execute();
        return $fac->fetchAll();
    }

    public function count(){
        $req = Connexion::getInstance()->query("SELECT * FROM faq");
        $nb = $req->fetchAll();
        return count($nb) ;
    }
}