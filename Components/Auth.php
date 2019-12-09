<?php

//session_start();

class Auth
{
    public $db;

    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function register($email, $name, $password)
    {
        $sql = "SELECT email FROM users WHERE email=:email";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
        echo "Пользователь с таким e-mail уже зарегистрирован";
        header("refresh: 3; url=registr");
        }
        else
        {
        $this->db->store('users', [
            'email'  =>  $email,
            'name'  =>   $name,
            'password'   =>  md5($password)
        ]);
        echo "пользователь с '$email' успешно зарегистрирован";
        header("refresh: 3; url=login");
        }
    }

    public function login($email, $password)
    {
        //  1. Проверить существует ли пользователь в базе
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", md5($password));
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        //var_dump ($user);
        // 0. Если пользователь забанен, то не пускаем его.
        if($user['is_banned'] == 1) {
            echo "Пользователь забанен";
            header("refresh: 3; url=login");
            exit;
        }
        // 1. Если пользователь админ, то переадресовываем его на страницу админки.
        if($user['is_admin'] == 1) {
            $_SESSION["user"] = $user['email'];
            echo "Добро пожаловать, Администратор";
            header("refresh: 3; url=admin");
            exit;
        }       
           //  2. Если да
        //      2.1. Записываем в сессию и возвращаем true
        if($user) {
            $_SESSION["user"] = $user['email'];
            header("location: auth_user");
            exit;
        }
           //  3. Если нет
        //      3.1. Возвращаем false
        else {
        echo "такого пользователя не существует";
        header("refresh: 3; url=login");
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header ('location: list');
    }
    
    public function check()
    {
        if (!isset($_SESSION['user']))
        {
            header('location: index.php');
        }
    }

    public function currentUser()
    {
        if($this->check()) {
            echo $_SESSION['user'];
        }
    }

    public function banUser($email)
    {
        $sql = "UPDATE users SET is_banned = 1 WHERE email=:email";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
    }

    public function unBanUser($email)
    {
        $sql = "UPDATE users SET is_banned = 0 WHERE email=:email";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
    }

    public function is_admin()
    {
        $sql = "SELECT is_admin FROM users WHERE email=:email";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $_SESSION['user']);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result['is_admin']== 1) {
             header("Location: admin");
        }
        else {
             header("Location: auth_user");
        }
    }

    public function showAllUsers($table)
    {
        $sql = "SELECT id, email, name, is_banned, is_admin FROM $table";
        $statement = $this->db->pdo->prepare($sql);
       // $statement->bindPram(":email", $_SESSION['user']);
        $statement->execute();
        $results = $statement->fetchall(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getUserStatus($email)
    {
        $sql = "SELECT is_admin FROM users WHERE email=:email";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        //var_dump($result['is_admin']); exit;
        if ($result['is_admin']!= 1) {
            var_dump("This is regular user");
        }
        else {
            var_dump("This is admin");
        }
        header("refresh: 3; url=allUsers");
    }

    public function deleteUser($table, $email)
    {
        $sql = "DELETE FROM $table WHERE email=:email";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $email);
        $statement->execute();
    }
    
}