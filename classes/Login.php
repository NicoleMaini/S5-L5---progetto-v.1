<?php

include_once __DIR__ . '/Connection.php';

class Login extends Connection
{
    public $id;
    public function login($usernameemail, $password)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
        $stmt->execute(['username' => $usernameemail, 'email' => $usernameemail]);
        $result = $stmt->fetch();

        if ($result) {
            if (password_verify($password, $result['password']) || $password === $result['password']) {
                $this->id = $result['id'];
                return 1;
                // Login successful
            } else {
                return 10;
                // Wrong password
            }
        } else {
            return 100;
            // User not registered
        }
    }

    public function idUser()
    {
        return $this->id;
    }
}

class Register extends Connection
{
    public function registration($username, $email, $password, $confirmpassword)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
        $stmt->execute([':username' => $username, ':email' => $email]);
        $duplicate = $stmt->fetch();

        if ($duplicate) {
            return 10;
            // Username or email has already taken
        } else {
            if ($password == $confirmpassword) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt_insert = $this->conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
                $stmt_insert->execute([':username' => $username, ':email' => $email, ':password' => $hashed_password]);
                return 1;
                // Registration successful
            } else {
                return 100;
                // Password does not match
            }
        }
    }
}

class Select extends Connection
{
    public function selectUserById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}
