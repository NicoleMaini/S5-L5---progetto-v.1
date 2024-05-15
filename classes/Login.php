<?php

include_once __DIR__ . '/Connection.php';

class Login extends Connection
{
    public $id;
    public function login($usernameemail, $password)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $this->id = $row["id"];
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
