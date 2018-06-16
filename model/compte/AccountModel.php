<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 02:33
 */

class AccountModel
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $firstname
     */
    private $firstname;
    /**
     * @var string $lastname
     */
    private $lastname;
    /**
     * @var string $email
     */
    private $email;
    /**
     * @var boolean $role
     */
    private $role;
    /**
     * @var string $phone
     */
    private $phone;

    public function __construct()
    {
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param bool $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**********
     * MUTATORS
     ************/


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isRole()
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }


}