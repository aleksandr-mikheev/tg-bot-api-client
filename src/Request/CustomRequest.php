<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Request;

use Perpetuum\TelegramBotClient\HttpMethod;

final readonly class CustomRequest implements Request
{
    public function __construct(
        private string $apiMethod,
        private HttpMethod $httpMethod,
        private array $data,
        private string $responseClass,
    ) {}

    public function getApiMethod(): string
    {
        return $this->apiMethod;
    }

    public function getHttpMethod(): HttpMethod
    {
        return $this->httpMethod;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getResponseClass(): string
    {
        return $this->responseClass;
    }
}
