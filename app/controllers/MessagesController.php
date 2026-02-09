<?php

namespace app\controllers;

use Flight;
use app\models\User;
use app\models\Discussion; // ✅ IMPORTANT

class MessagesController
{
 public function messages()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $myId = $_SESSION['user_id'];

    $userModel = new User(Flight::db());
    $users = $userModel->getUserNotMe($myId);

    Flight::view()->render('messages.php', [
        'users' => $users
    ]);
}


    public function loadConversation()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $myId = $_SESSION['user_id'];
        $otherId = (int) $_GET['user_id'];

        $discussion = new Discussion(Flight::db());
        $messages = $discussion->getConversation($myId, $otherId);

        Flight::json($messages);
    }

    public function sendMessage()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $me = $_SESSION['user_id'];
        $other = (int) $_POST['user_id'];
        $message = trim($_POST['message']);

        $discussion = new Discussion(Flight::db());
        $discussion->send($me, $other, $message);

        Flight::json(['success' => true]);
    }
}
