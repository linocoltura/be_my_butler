<?php

class User
{

    private $balance;
    private $loyalty;
    private $id;

    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "bemybutler";
    private $userTbl    = 'users';

    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }

    function checkUser($userData = array()){
        if(!empty($userData)){
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                // Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                // Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
                $insert = $this->db->query($query);
            }

            // Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }

        // Return user data
        return $userData;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */


    public function setBalance($balance)
    {
        $conn = db::getInstance();

        $statement = $conn->prepare("INSERT INTO users (balance) VALUES (:balance) WHERE id = :id");
        $statement ->bindValue(":balance", $balance);
        $statement ->bindValue(":id", $this->getId());
        if ($statement ->execute() && $balance >= 0){
            $this->balance = $balance;
        }
        else throw new Exception("Couldn't set balance");
    }

    /**
     * @return mixed
     */
    public function getLoyalty()
    {
        return $this->loyalty;
    }

    /**
     * @param mixed $loyalty
     */
    public function setLoyalty($loyalty)
    {
        $conn = db::getInstance();

        $statement = $conn->prepare("INSERT INTO users (loyalty) VALUES (:loyalty) WHERE id = :id");
        $statement ->bindValue(":loyalty", $loyalty);
        $statement ->bindValue(":id", $this->getId());
        if ($statement ->execute()){
            $this-$loyalty = $loyalty;
        }
        else throw new Exception("Couldn't set loyalty");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getService(){

        // returns active service this user

        $conn = db::getInstance();

        $statement = $conn->prepare("SELECT * FROM services WHERE completed = FALSE AND userID = :userID");
        $statement ->bindValue(":userID", $this->getId());
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServices(){

        // returns all active services

        $conn = db::getInstance();

        $statement = $conn->prepare("SELECT * FROM services WHERE completed = FALSE");
        $statement ->bindValue(":userID", $this->getUserID());
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}