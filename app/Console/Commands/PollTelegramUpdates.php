<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PollTelegramUpdates extends Command
{
    protected $signature = 'telegram:poll-updates';
    protected $description = 'Poll updates from Telegram';
    protected static $lastMessageId = null;

    public function handle()
    {
        $pollDuration = 5 * 60; // 5 menit
        $startTime = microtime(true);

        $this->info('Polling Telegram updates...');

        // Looping selama durasi polling
        while ((microtime(true) - $startTime) < $pollDuration) {
            $this->pollUpdates();

            sleep(3);
        }

        $this->info('Polling finished after ' . $pollDuration . ' seconds.');
    }

    private function pollUpdates()
    {
        $botToken = config('services.telegram.bot_token');
        $offset = Cache::get('telegram_last_message_id') ? Cache::get('telegram_last_message_id') + 1 : null;
        $url = "https://api.telegram.org/bot$botToken/getUpdates" . ($offset ? "?offset=$offset" : "");
    
        $response = Http::get($url);
        $updates = $response->json();
    
        if (isset($updates['result'])) {
            foreach ($updates['result'] as $update) {
                $this->processUpdate($update);
    
                Cache::put('telegram_last_message_id', $update['update_id']);
            }
        }
    }    

    public function processUpdate($update)
    {
        if (isset($update['message']['text']) && $update['message']['text'] == '/start') {
            $telegramUsername = $update['message']['from']['username'] ?? null;

            if ($telegramUsername) {
                $this->handleMessage($update['message']['chat']['id'], $telegramUsername);
            } else {
                $this->sendMessage($update['message']['chat']['id'], 'Username Telegram tidak ditemukan.');
            }
        }
    }

    private function handleStartCommand($chatId, $username)
    {
        $currentTime = time();
        if (Cache::has("last_message_time_$chatId") && (Cache::get("last_message_time_$chatId") > $currentTime - 5)) {
            return;
        }
        $this->sendMessage($chatId, "Hai @$username, silakan klik link berikut untuk masuk ke halaman dashboard: " . route('dashboard'));

        Cache::put("last_message_time_$chatId", $currentTime);
    }


        private function handleMessage($chatId, $username)
    {
        $currentTime = time();

        if (Cache::has("last_message_time_$chatId") && (Cache::get("last_message_time_$chatId") > $currentTime - 5)) {
            return;
        }
        $user = User::where('telegram_username', $username)->first();

        if ($user) {
            $loginLink = route('telegram.callback', ['telegramUsername' => $username]);
            $this->sendMessage($chatId, "Hai @$username! Klik [disini]($loginLink) untuk login.");
        } else {
            $loginLink = route('telegram.callback', ['telegramUsername' => $username]);
            $this->sendMessage($chatId, "Hai @$username! Klik [disini]($loginLink) untuk login. Kami akan membuat akun baru untuk Anda jika belum terdaftar.");
        }

        Cache::put("last_message_time_$chatId", $currentTime);
    }

  
    public function sendMessage($chatId, $message)
    {
        $url = "https://api.telegram.org/bot" . config('services.telegram.bot_token') . "/sendMessage";
        $params = [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ];

        file_get_contents($url . '?' . http_build_query($params));
    }
}