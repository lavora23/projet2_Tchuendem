<?php

class User {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function register($username, $password, $email, $address) {
        $conn = $this->db->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, password, email, address) VALUES ('$username', '$hashedPassword', '$email', '$address')";
        $conn->query($sql);
    }

    public function login($username, $password) {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Authentification réussie
                return $user;
            }
        }

        return null;
    }

    public function logout() {
        // Code de déconnexion
    }

    public function deleteAccount($userId) {
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM user WHERE id=$userId";
        $conn->query($sql);
    }

    // Autres méthodes pour gérer le profil utilisateur
}

?>