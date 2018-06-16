<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 05/04/2018
 * Time: 21:09
 */

include("CollectionInterface.php");
class Collection implements CollectionInterface
{
    /**
     * @var array $collection un array
     */
    protected $collection;

    /**
     * Collection constructor.
     * Initialise un array.
     */
    public function __construct()
    {
        $this->collection = array();
    }

    /**
     * Ajoute un objet dans la collection.
     *
     * @param object $param un objet / valeur
     */
    public function addInCollection($param)
    {
        array_push($this->collection, $param);
    }

    /**
     * @return array une collection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @return int taille de la collection
     */
    public function getSize()
    {
        return count($this->getCollection());
    }

    /**
     * Récupère l'index de l'objet en fonction d'un ID de contrat.
     *
     * @param int $filter
     * @return false|int|string
     */
    public function findObjectByIdContrat($filter)
    {
        foreach ($this->collection as $key=>$value)
        {
            if($value->getId()==$filter)
            {
                return $key;
            }
        }
        return null;
    }

    public function getObjectAtIndex($index)
    {
        return $this->collection[$index];
    }

}
