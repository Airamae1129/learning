<?php

require_once '../DataLayer/Messenger.php';

session_start();

$messenger = new Messenger();

if (isset($_SESSION['id'])) {
    if (in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'])) {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET': {
                $sender         = $_GET['sender'];
                $recipient      = $_GET['recipient'];
                $sender_type    = $_GET['sender_type'];
                $recipient_type = $_GET['recipient_type'];

                echo $messenger->GetMessage($sender, $recipient, $sender_type, $recipient_type);
                break;
            } case 'POST': {
                $recipient      = $_POST['recipient'];
				$recipient_type = $_POST['recipient_type'];
				$message        = $_POST['message'];
                $sender         = $_POST['sender'];
				$sender_type    = $_POST['sender_type'];

                echo $messenger->SendMessage($sender, $recipient, $sender_type, $recipient_type, $message);
                break;
            }
        }

        
    }


} else {
    http_response_code(401);
    header('Content-Type: application/json');
    
    echo "Unauthorize Access! Please login to your account";
}



?>