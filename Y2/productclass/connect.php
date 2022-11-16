<?php

class Connect
{
  // public $host;
  // public $username;
  // public $password;
  // public $database;
  // public $port;
  private $conn;

  function __construct()
  {
    $host = "127.0.0.1";
    $username = "root";
    $password = "root";
    $database = "phpclass";

    $this->conn = new mysqli($host, $username, $password, $database);
  }

  public function GetConn()
  {
    return $this->conn;
  }
}
