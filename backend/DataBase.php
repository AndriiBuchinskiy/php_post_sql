<?php

namespace Palmo\backend;
use DatabaseInterface;
use PDO, PDOException;

include 'DataBaseInterface.php';

class DataBase implements DatabaseInterface
{
    private $host;
    private  $username;
    private $password;
    private  $database;
    private  $port;
    private PDO $connection;

    public function __construct($host, $username, $password, $port, $database)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect(): bool
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    public function disconnect(): bool
    {
        $this->connection = null;
        return true;
    }

    public function query(string $sql, array $params = [])
    {
        $query = $this->connection->prepare($sql);
        if(!empty($params))
        {
            foreach ($params  as $key =>$value)
            {
                $query->bindValue(":$key" ,$value);
            }
        }
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}


/*
class DataBase
{
    public $db;

    public function __construct($servername, $username, $password, $port, $dbname)
    {
        try {
            $this->db = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function query($sql,$params =[])
    {
        $query = $this->db->prepare($sql);
        if(!empty($params))
        {
            foreach ($params  as $key =>$value)
            {
                $query->bindValue(":$key" ,$value);
            }
        }
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
*/
