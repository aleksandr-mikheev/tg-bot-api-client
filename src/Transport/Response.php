<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Transport;

final readonly class Response
{
    public function __construct(
        public int $statusCode,
        public string $body,
    ) {}
}
