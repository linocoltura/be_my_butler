<?php

class Service
{
    private $serviceID;
    private $userID;
    private $open;
    private $amount;
    private $completed;

    /**
     * @return mixed
     */
    public function getServiceID()
    {
        return $this->serviceID;
    }

    /**
     * @param mixed $serviceID
     */
    public function setServiceID($serviceID)
    {
        $this->serviceID = $serviceID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param mixed $open
     */
    public function setOpen($open)
    {
        if (!is_bool($open)){
            throw new Exception('Must be a boolean');
        }
        $this->open = $open;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        if ($amount <=0 || $amount > 6){
            throw new Exception('Geef een getal tussen 0 en 6');
        }
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param mixed $completed
     */
    public function setCompleted($completed)
    {
        if (!is_bool($completed)){
            throw new Exception('Must be a boolean');
        }
        $this->completed = $completed;
    }


    public function saveService(){
        $conn = db::getInstance();

        $statement = $conn->prepare("INSERT INTO services (userID, open, amount, completed) VALUES (:userID, :open, :amount, :completed)");
        $statement ->bindValue(":userID", $this->getUserID());
        $statement ->bindValue(":open", $this->getOpen());
        $statement ->bindValue(":amount", $this->getAmount());
        $statement ->bindValue(":completed", $this->getCompleted());
        return $statement->execute();
    }



}