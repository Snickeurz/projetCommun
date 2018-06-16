<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicol
 * Date: 08/05/2018
 * Time: 21:09
 */

class FaqModel
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $question
     */
    private $question;
    /**
     * @var string $reponse
     */
    private $reponse;

    public function __construct($id, $question, $reponse)
    {
        $this->id = $id;
        $this->question = $question;
        $this->reponse = $reponse;
    }

    /**
     * GETTERS
     */

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
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return string
     */
    public function getReponse()
    {
        return $this->reponse;
    }

}