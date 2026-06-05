<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{
    protected $token;
    protected $url;

    public function __construct()
    {
        $this->token = config('fonnte.token');
        $this->url = config('fonnte.url');
    }

    public function sendMessage(string $target, string $message)
    {
        if (!$this->token || !$this->url) {
            // Handle missing config values, maybe log an error
            return;
        }

        $httpClient = Http::withHeaders([
            'Authorization' => $this->token,
        ]);

        if (app()->isLocal()) {
            $httpClient->withoutVerifying();
        }

        $httpClient->post($this->url, [
            'target' => $target,
            'message' => $message,
        ]);
    }
}
