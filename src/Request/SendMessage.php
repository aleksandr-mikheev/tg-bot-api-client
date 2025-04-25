<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Request;

use Perpetuum\TelegramBotClient\HttpMethod;
use Perpetuum\TelegramBotClient\Type\Message;

final readonly class SendMessage implements Request
{
    public function __construct(
        public int|string $chat_id,
        public string $text,
    ) {}

    public function getApiMethod(): string
    {
        return 'sendMessage';
    }

    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function getData(): array
    {
        return [
            'chat_id' => $this->chat_id,
            'text' => $this->text,
        ];
    }

    public function getResponseClass(): string
    {
        return Message::class;
    }
}
