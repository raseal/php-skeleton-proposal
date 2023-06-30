<?php

declare(strict_types=1);

namespace Backoffice\User\Application\RetrieveUser;

use Shared\Application\Bus\Query\Query;

final class RetrieveUserQuery implements Query
{
    public function __construct(
        public readonly string $userId
    ) {}
}
