<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Normalizer;

interface Normalizer
{
    public function normalize(object $object): array;

    public function denormalize(array $data, string $className): mixed;
}
