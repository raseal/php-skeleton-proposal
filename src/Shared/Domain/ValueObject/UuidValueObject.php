<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid;
use Shared\Domain\Exception\InvalidId;
use Shared\Domain\Id;

class UuidValueObject extends StringValueObject implements Id
{
    public function __construct(string $value)
    {
        $this->assertIsValidUuid($value);
        parent::__construct($value);
    }

    public static function random(): self
    {
        return new static(Uuid::uuid4()->toString());
    }

    private function assertIsValidUuid(string $value): void
    {
        if(!Uuid::isValid($value)) {
            throw new InvalidId($value);
        }
    }
}
