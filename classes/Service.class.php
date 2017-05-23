<?php

class Service
{
    private $serviceID;
    private $userID;
    private $status;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        if ($status>3){
            throw new Exception('Status can only be 1 - 3');
        }
        $this->status = $status;
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

        $this->completed = $completed;

//        $conn = Db::getInstance();
//
//        $statement = $conn->prepare("UPDATE services SET completed = :completed WHERE id = :id AND completed = false;");
//        $statement ->bindValue(":completed", $completed);
//        $statement ->bindValue(":id", $this->getUserID());
//
//        return $statement->execute();
    }

    public function updateCompleted($userID)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("UPDATE useriscustomer SET complete = TRUE WHERE userID = :userID AND complete = FALSE");
        $statement ->bindValue(":userID", $userID);

        return $statement->execute();
    }

    public function updateFinal()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("UPDATE services SET completed = TRUE WHERE serviceID = :serviceID");
        $statement ->bindValue(":serviceID", $this->getServiceID());

        return $statement->execute();
    }

    public function getServices(){

        // returns all active services

        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM services WHERE completed = FALSE AND status = 1");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCustomers(){

        // returns all customers for this service

        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM useriscustomer WHERE serviceID = :serviceID");
        $statement ->bindValue(":serviceID", $this->getServiceID());
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAmountFromDb(){

        // returns all customers for this service

        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM services WHERE serviceID = :serviceID");
        $statement ->bindValue(":serviceID", $this->getServiceID());
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    public function saveService(){
        $conn = db::getInstance();

        $statement = $conn->prepare("INSERT INTO services (userID, status, amount, completed) VALUES (:userID, :status, :amount, :completed)");
        $statement ->bindValue(":userID", $this->getUserID());
        $statement ->bindValue(":status", $this->getStatus());
        $statement ->bindValue(":amount", $this->getAmount());
        $statement ->bindValue(":completed", $this->getCompleted());
        return $statement->execute();
    }

    public function updateService(){
        $conn = db::getInstance();

        $statement = $conn->prepare("UPDATE services SET status = :status WHERE serviceID = :id;");
        $statement ->bindValue(":status", $this->getStatus());
        $statement ->bindValue(":id", $this->getServiceID());
        return $statement->execute();
    }

    public function saveCustomer($userID, $drink){
        $conn = db::getInstance();

        $statement = $conn->prepare("INSERT INTO useriscustomer (userID, serviceID, drink, complete) VALUES (:userID, :serviceID, :drink, false)");
        $statement ->bindValue(":userID", $userID);
        $statement ->bindValue(":serviceID", $this->getServiceID());
        $statement ->bindValue(":drink", $drink);
        return $statement->execute();
    }

    public function hasCustomers(){

        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM useriscustomer WHERE serviceID = :serviceID WHERE complete = FALSE");
        $statement ->bindValue(":serviceID", $this->getServiceID());
        $statement->execute();
        if ($statement->rowCount()>0) {
            return true;
        } else return false;

    }

    public function getAvailableConsumptions(){

        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM useriscustomer WHERE serviceID = :serviceID");
        $statement ->bindValue(":serviceID", $this->getServiceID());
        $statement->execute();
        $claimed = $statement->rowCount();
        return $this->amount - $claimed;

    }

    public function getClaimedConsumptions(){

        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM useriscustomer WHERE serviceID = :serviceID");
        $statement ->bindValue(":serviceID", $this->getServiceID());
        $statement->execute();
        return $statement->rowCount();
    }




}