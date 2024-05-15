<?php

include_once __DIR__ . '/Connection.php';
include_once __DIR__ . '/Select.php';

class Select extends Connection
{
    public function selectUserById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }
}
