<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Request;

use Perpetuum\TelegramBotClient\HttpMethod;

final readonly class SendChatAction implements Request
{
    public function __construct(
        private int|string $chat_id,
        private string $action,
    ) {}

    public function getApiMethod(): string
    {
        return 'sendChatAction';
    }

    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function getData(): array
    {
        return [
            'chat_id' => $this->chatId,
            'action' => $this->action,
        ];
    }

    public function getResponseClass(): string
    {
        return '';
    }
}
