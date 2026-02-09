<?php
namespace app\controllers;

use flight;
use flight\Engine;
use app\models\User;

class AuthController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User(Flight::db()); // injecte la connexion PDO
    }

    public static function showLogin() {
        Flight::render('login');
    }
     public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->loginOrRegister($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                Flight::redirect('/dashboard');
            } else {
                Flight::render('login', ['error' => 'Mot de passe incorrect']);
            }
        } else {
            Flight::render('login');
        }
    }
}
