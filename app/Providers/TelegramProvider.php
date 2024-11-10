<?php

namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\User;
use GuzzleHttp\ClientInterface;

class TelegramProvider extends AbstractProvider
{
     protected function getAuthUrl($state)
    {
        return 'https://telegram.me/manhwa115_bot?start=login' . $state; 
    }


    protected function getTokenUrl()
    {
        return 'https://api.telegram.org/bot7208791187:AAHdL-wMKV2noG1gMI6cnzdQW4PnSezcUDo/getMe';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get('https://api.telegram.org/bot7208791187:AAHdL-wMKV2noG1gMI6cnzdQW4PnSezcUDo/getMe', [
            'query' => [
                'access_token' => $token,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function mapUserToObject(array $user)
    {
        \Log::info('Data user dari Telegram:', $user); 
        return (new User())->setRaw($user)->map([
            'id' => $user['id'] ?? null,
            'nickname' => $user['username'] ?? null,
            'name' => $user['first_name'] ?? null,
            'avatar' => $user['photo_url'] ?? null,
        ]);
    }


    protected function getTokenFields($code)
    {
        return [
            'code' => $code,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUrl,
            'grant_type' => 'authorization_code',
        ];
    }
}
