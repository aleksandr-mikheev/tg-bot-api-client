<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Request;

use Perpetuum\TelegramBotClient\HttpMethod;

interface Request
{
    public function getApiMethod(): string;

    public function getHttpMethod(): HttpMethod;

    /**
     * @return array<string, mixed>
     */
    public function getData(): array;

    public function getResponseClass(): string;
}
