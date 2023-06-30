<?php

declare(strict_types=1);

namespace Backoffice\User\Domain;

interface UserRepository
{
    public function findById(UserId $userId): ?User;

    public function save(User $user): void;
}
