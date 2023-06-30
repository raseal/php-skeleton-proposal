<?php

declare(strict_types=1);

namespace Backoffice\User\Application;

use Backoffice\User\Domain\User;
use Shared\Application\Bus\Query\QueryResponse;

final readonly class UserResponse implements QueryResponse
{
    public function __construct(
        public string $userId,
        public string $userName
    ) {}

    public static function fromUser(User $user): self
    {
        return new self(
            $user->userId()->value(),
            $user->userName()->value()
        );
    }
}
