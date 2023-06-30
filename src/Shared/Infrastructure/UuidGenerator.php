<?php

declare(strict_types=1);

namespace Shared\Infrastructure;

use Shared\Domain\Id;
use Shared\Domain\IdGenerator;
use Shared\Domain\ValueObject\UuidValueObject;

final class UuidGenerator implements IdGenerator
{
    public function generate(): Id
    {
        return UuidValueObject::random();
    }
}
