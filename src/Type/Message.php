<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Type;

final readonly class Message
{
    public function __construct(
        public int $message_id,
        public \DateTimeImmutable $date,
        public Chat $chat,
    ) {}
}
