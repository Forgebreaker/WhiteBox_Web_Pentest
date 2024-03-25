<?php
  session_start();
//   error_reporting(0);

    class Database {

        public function __construct() {
            $connectionString = "mysql:host=" . getenv('MYSQL_HOSTNAME') . ";port=3306;dbname=" . getenv('MYSQL_DATABASE');
            $this->pdo = new \PDO($connectionString, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
        }

        public function select_all_users_with_point() {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM users WHERE points > 0 ORDER BY points DESC");
                $stmt->execute();
                $data = $stmt->fetchAll();
                $result = array();
                foreach ($data as $row) {
                  array_push($result, $row);
                }
                return $result;
            } catch (\PDOException $e) {
                return $e->getMessage();
            }
        }

        public function select_user_by_username($name) {
            try {
                $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name=?");
                $stmt->execute([$name]);
                $user = $stmt->fetch();
                return $user;
            } catch (\PDOException $e) {
                return $e->getMessage();
            }
        }

        public function create_user($name) {
            try {
                $sql = "INSERT INTO users (name) VALUES (?)";
                $this->pdo->prepare($sql)->execute([$name]);
                return NULL;
            } catch (\PDOException $e) {
                return $e->getMessage();
            }
        }

        public function update_point($name, $points) {
            try {
                $sql = "UPDATE users SET points=? where name=? and points < ?";
                $this->pdo->prepare($sql)->execute([$points,$name,$points]);
                return NULL;
            } catch (\PDOException $e) {
                return $e->getMessage();
            }
        }
    }

    $db = new Database;
?>
