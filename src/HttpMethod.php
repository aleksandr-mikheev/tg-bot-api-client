<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient;

enum HttpMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
}
