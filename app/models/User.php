<?php
namespace app\models;

use Flight;
use PDO; //
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db; // stocke PDO
    }

    /** Trouver un utilisateur par email */
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /** Créer un utilisateur */
    public function create($email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        return $stmt->execute([$email, $hash]);
    }

    /** Login ou Register automatique */
    public function loginOrRegister($email, $password) {
        $user = $this->findByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user; // login OK
            }
            return false; // mauvais mot de passe
        }

        $this->create($email, $password);
        return $this->findByEmail($email);
    }

    public function getUserNotMe(int $myId): array
    {
        $stmt = $this->db->prepare("SELECT id, email FROM users WHERE id != ?");
        $stmt->execute([$myId]);
       return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
