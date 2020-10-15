<?php

/**
 * PDO Database class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $dbh; // database handler
    private $statement;
    private $error;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' .$this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare statements with query
     * @param string $sql
     * @return void
     */
    public function query($sql) 
    {
        $this->statement = $this->dbh->prepare($sql);
    }

    /**
     * Bind values
     * @param string $param
     * @param mixed $value
     * @param int $type
     * @return void
     */
    public function bind($param, $value, $type = null) 
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement
     */
    public function execute() 
    {
        return $this->statement->execute();
    }

    /**
     * Get result set as array of objects
     */
    public function resultSet() 
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get single result a object
     */
    public function single() 
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get row count
     */
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}