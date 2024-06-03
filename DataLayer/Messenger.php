<?php
class Messenger {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "capstone";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function InsertMessage($sender, $recipient, $message) {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $sql = "INSERT INTO messenger (sender, recipient, message)
        VALUES ('$sender', '$recipient', '$message')";

        return $this->conn->query($sql) === TRUE;
    }

    public function GetBreadCrumb() {
        $sql = "SELECT school_year 
                    FROM school_year 
                    ORDER BY school_year DESC
                    LIMIT 1";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            return $row["school_year"];
          }
        }

        return 0;
    }

    public function GetTeachers() {
        
        $sql = "SELECT * FROM teacher ORDER BY firstname";
        return $this->conn->query($sql);

        // if ($result->num_rows > 0) {
        //   while($row = $result->fetch_assoc()) {
        //     return $row["school_year"];
        //   }
        // }
    }

    public function GetMessage($sender, $recipient) {
        $messages = [];

        $sql = "SELECT * 
                    FROM messenger
                    WHERE sender='$sender' OR recipient='$recipient'
                    ORDER BY date_created ASC";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               
                $message = [
                    'sender' => $row['sender'],
                    'recipient' => $row['recipient'],
                    'message' => $row['message'],
                    'date_created' => $row['date_created']
                ];

                array_push($messages, $message);
            }
        }

        echo json_encode($messages);
    }

}

    