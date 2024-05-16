<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    private $telegram_api_token;
    private $chat_id;

    public function __construct()
    {
        $this->telegram_api_token = env('TELEGRAM_BOT_API_TOKEN');
        $this->chat_id = env('TELEGRAM_CHAT_ID');
    }
    public function sendTelegramMessage($message)
    {
        $client = new Client();
        $url = "https://api.telegram.org/bot{$this->telegram_api_token}/sendMessage";

        $response = $client->post($url, [
            'form_params' => [
                'chat_id' => $this->chat_id,
                'text' => $message
            ]
        ]);

        if ($response->getStatusCode() != 200) {
            throw new \Exception('Error sending message to Telegram');
        }
    }
}
