<?php

namespace Core;


use PDO;

// if not use PDO instead below write like this \PDO to tell the PHP to use this class from global namespace

class Database
{

    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {

        // $dsn = `mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};user=root;charset={$config['charset']}`;

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);   // dsn : data source name , pdo : php data object 


    }
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return  $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {

        $result = $this->find();

        if (! $result) {
            abort();
        }
        return $result;
    }
}
