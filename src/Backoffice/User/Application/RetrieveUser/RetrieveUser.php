<?php

declare(strict_types=1);

namespace Backoffice\User\Application\RetrieveUser;

use Backoffice\User\Domain\Exception\UserNotFound;
use Backoffice\User\Domain\User;
use Backoffice\User\Domain\UserId;
use Backoffice\User\Domain\UserRepository;

final class RetrieveUser
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function __invoke(UserId $userId): User
    {
        $user = $this->userRepository->findById($userId);

        $this->ensureUserExists($user, $userId);

        return $user;
    }

    private function ensureUserExists(?User $user, UserId $userId): void
    {
        if ($user === null) {
            throw new UserNotFound($userId);
        }
    }
}
