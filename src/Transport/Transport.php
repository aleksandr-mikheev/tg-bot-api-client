<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Transport;

use Perpetuum\TelegramBotClient\HttpMethod;

interface Transport
{
    public function send(string $url, array $data = [], HttpMethod $httpMethod = HttpMethod::GET): Response;
}
