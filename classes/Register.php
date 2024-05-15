<?php
include_once __DIR__ . '/Connection.php';

class Register extends Connection
{
    public function registration($username, $email, $password, $confirmpassword)
    {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
            // Username or email has already taken
        } else {
            if ($password == $confirmpassword) {
                $query = "INSERT INTO users VALUES('', '$username', '$email', '$password')";
                mysqli_query($this->conn, $query);
                return 1;
                // Registration successful
            } else {
                return 100;
                // Password does not match
            }
        }
    }
}
