<?php

declare(strict_types=1);

namespace Backoffice\User\Domain;

final class User
{
    public function __construct(
        private UserId $userId,
        private UserName $userName
    ) {}

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function userName(): UserName
    {
        return $this->userName;
    }
}
