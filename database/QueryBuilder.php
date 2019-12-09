<?php

class QueryBuilder
{
    public $pdo;

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost; dbname=test", "admin", "admin");
    }
    
    //Список задач
    function all($table) 
    {
        // выполняем запрос к базе
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql); // подготовить
        $statement->execute(); // true / false, вып-ся / не вып-ся
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);        

        return $results;
    }
    
    function getOne($table, $id)
    {
        // выполняем запрос к базе
        $sql = "SELECT * FROM $table WHERE id =:id";
        $statement = $this->pdo->prepare($sql); // подготовить
        $statement->bindParam(":id", $id);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $results;
    }

    function getOneByEmail($table, $email)
    {
        // выполняем запрос к базе
        $sql = "SELECT * FROM $table WHERE email =:email";
        $statement = $this->pdo->prepare($sql); // подготовить
        $statement->bindParam(":email", $email);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $results;
    }
    
    function store($table, $data)
    {   
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Формируем строки title, content
        $stringOfKeys = implode(',', $keys);
        // 3. Формируем метки (значения)
        $placeholders = ":" . implode(', :', $keys);
        
        // выполняем запрос к базе
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function update($table, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ',');

        // выполняем запрос к базе
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function delete($table, $id)
    {
        // выполняем запрос к базе
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql); // подготовить
        $statement->bindParam(":id", $id);
        $statement->execute(); 
    }
}