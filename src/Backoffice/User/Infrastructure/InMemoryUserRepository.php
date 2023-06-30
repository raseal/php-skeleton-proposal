<?php

declare(strict_types=1);

namespace Backoffice\User\Infrastructure;

use Backoffice\User\Domain\User;
use Backoffice\User\Domain\UserId;
use Backoffice\User\Domain\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    public function findById(UserId $userId): ?User
    {
        return null;
    }

    public function save(User $user): void
    {
    }
}
