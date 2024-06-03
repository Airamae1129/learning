<?php

require_once '../DataLayer/Messenger.php';

session_start();

$messenger = new Messenger();

if (isset($_SESSION['id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = file_get_contents('php://input');
        $data = json_decode($data);

        $type = $data->type;

        switch ($type) {
            case 'get-message': {
                $sender = $data->sender;
                $recipient = $data->recipient;

                echo $messenger->GetMessage($sender, $recipient);
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