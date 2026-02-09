<?php
namespace app\controllers;

use flight;
use flight\Engine;
class DashboardController {
    public function index() {
        $data = [
            'title' => 'Dashboard',
            'activePage' => 'dashboard',
            'unreadMessages' => 3, // exemple dynamique
        ];

        // Charger la vue
        require __DIR__ . '/../views/dashboard.php';
    }
}
