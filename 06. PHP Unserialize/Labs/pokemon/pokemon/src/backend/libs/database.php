<?php
#=========================================#
#    Class hỗ trợ làm việc với database   #
#=========================================#
class Database {
    public $conn;
    public function __construct() {
        $this->conn = new mysqli("db","admin","password","myDB");
    }

    public function check_user($username) {
        $sth = $this->conn->prepare("SELECT username FROM users WHERE username = ?");
        $sth->bind_param("s", $username);
        $sth->execute();
        $result = $sth->get_result();
        $user = $result->fetch_assoc();
        $sth->close();
        if (isset($user))
            return false;
        return true;
    }

    public function insert_user($username, $password) {
        $sth = $this->conn->prepare("INSERT INTO users(username, password) VALUES (?, ?)");
        $sth->bind_param("ss", $username, $password);
        $sth->execute();
        $sth->close();
    }

    public function query_user($username, $password) {
        $sth = $this->conn->prepare("SELECT username FROM users WHERE username = ? AND password = ?");
        $sth->bind_param("ss", $username, $password);
        $sth->execute();
        $result = $sth->get_result();
        $user = $result->fetch_assoc();
        $sth->close();
        return $user;
    }

    public function __destruct() {
        $this->conn->close();
    }
}

$db = new Database();
?>