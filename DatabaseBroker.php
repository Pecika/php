<?php


class DatabaseBroker {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "putovanjaphp";
    
    public static function getConnection() {
      $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      return $conn;
    }
  }
  





?>