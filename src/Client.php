<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient;

use CuyZ\Valinor\Mapper\MappingError;
use Perpetuum\TelegramBotClient\Normalizer\Normalizer;
use Perpetuum\TelegramBotClient\Normalizer\ValinorNormalizer;
use Perpetuum\TelegramBotClient\Request\Request;
use Perpetuum\TelegramBotClient\Transport\CurlTransport;
use Perpetuum\TelegramBotClient\Transport\Transport;

final readonly class Client
{
    public function __construct(
        private string $token,
        private string $baseUrl = 'https://api.telegram.org',
        private Transport $transport = new CurlTransport(),
        private Normalizer $normalizer = new ValinorNormalizer(),
    ) {}

    public function send(Request $request): Response
    {
        $response = $this->transport->send(
            $this->getUrl($request->getApiMethod()),
            $request->getData(),
            $request->getHttpMethod()
        );

        $decodedBody = json_decode($response->body, true, flags: JSON_THROW_ON_ERROR);

        try {
            $denormalizedResponse = $this->normalizer->denormalize($decodedBody['result'], $request->getResponseClass());

        } catch (MappingError $e) {
            dd($e);
        }
        dd($response, $decodedBody, $denormalizedResponse);
    }

    private function getUrl(string $apiMethod): string
    {
        return $this->baseUrl . '/bot' . $this->token . '/' . $apiMethod;
    }
}
