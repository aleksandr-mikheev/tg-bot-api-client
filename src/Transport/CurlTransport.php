<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Transport;

use Perpetuum\TelegramBotClient\HttpMethod;

final readonly class CurlTransport implements Transport
{
    public function send(string $url, array $data = [], HttpMethod $httpMethod = HttpMethod::GET): Response
    {
        $ch = curl_init($url . '?' . http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $body = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new Response($statusCode, $body);
    }
}
