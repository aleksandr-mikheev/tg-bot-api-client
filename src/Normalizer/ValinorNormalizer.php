<?php

declare(strict_types=1);

namespace Perpetuum\TelegramBotClient\Normalizer;

use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\Normalizer\ArrayNormalizer;
use CuyZ\Valinor\MapperBuilder;
use CuyZ\Valinor\Normalizer\Format;

final readonly class ValinorNormalizer implements Normalizer
{
    private ArrayNormalizer $valinor;
    private TreeMapper $mapper;

    public function __construct()
    {
        $this->valinor = (new MapperBuilder())
            ->normalizer(Format::array())
        ;
        $this->mapper = (new MapperBuilder())->allowSuperfluousKeys()->mapper();
    }

    public function normalize(object $object): array
    {
        return $this->valinor->normalize($object);
    }

    public function denormalize(array $data, string $className): mixed
    {
        return $this->mapper->map($className, $data);
    }
}
