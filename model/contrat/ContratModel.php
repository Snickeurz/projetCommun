<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 21:20
 */

class ContratModel
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $contratURL
     */
    private $contratURL;
    /**
     * @var string $nomContrat
     */
    private $nomContrat;
    /**
     * @var int $idClient
     */
    private $idClient;
    /**
     * @var int $idEntreprise
     */
    private $idEntreprise;
    /***
     * @var boolean $status
     */
    private $status;
    /**
     * @var DateTime $dateUpload
     */
    private $dateUpload;
    /**
     * @var string $description
     */
    private $description;

    /**
     * ContratModel constructor.
     *
     * @param int $id
     * @param string $contratURL
     * @param string $nomContrat
     * @param int $idClient
     * @param int $idEntreprise
     * @param bool $status
     */
    public function __construct($id, $contratURL, $nomContrat, $idClient, $idEntreprise, $status, $dateUpload, $description)
    {
        $this->id = $id;
        $this->contratURL = $contratURL;
        $this->nomContrat = $nomContrat;
        $this->idClient = $idClient;
        $this->idEntreprise = $idEntreprise;
        $this->status = $status;
        $this->dateUpload = $dateUpload;
        $this->description = $description;
    }

    /***********
     * MUTATORS
     ***********/

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContratURL()
    {
        return $this->contratURL;
    }

    /**
     * @param string $contratURL
     */
    public function setContratURL($contratURL)
    {
        $this->contratURL = $contratURL;
    }

    /**
     * @return string
     */
    public function getNomContrat()
    {
        return $this->nomContrat;
    }

    /**
     * @param string $nomContrat
     */
    public function setNomContrat($nomContrat)
    {
        $this->nomContrat = $nomContrat;
    }

    /**
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param int $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    /**
     * @return int
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }

    /**
     * @param int $idEntreprise
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;
    }

    /**
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return DateTime
     */
    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    /**
     * @param DateTime $dateUpload
     */
    public function setDateUpload($dateUpload)
    {
        $this->dateUpload = $dateUpload;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}