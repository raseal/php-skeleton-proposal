<?php

declare(strict_types=1);

namespace Backoffice\User\Application\CreateUser;

use Shared\Application\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    public function __construct(
        public readonly string $name
    ) {}
}
