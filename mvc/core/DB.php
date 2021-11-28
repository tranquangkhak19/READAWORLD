<?php

class DB
{
    protected $conn;
    protected $server = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "readaworld";

    function __construct()
    {
        $this->conn = mysqli_connect($this->server, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->database);
        mysqli_query($this->conn, "SET NAMES 'utf8'");
    }
}

?>