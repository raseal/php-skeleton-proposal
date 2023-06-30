<?php

declare(strict_types=1);

namespace Backoffice\User\Application\CreateUser;

use Backoffice\User\Domain\Exception\UserAlreadyExists;
use Backoffice\User\Domain\User;
use Backoffice\User\Domain\UserId;
use Backoffice\User\Domain\UserName;
use Backoffice\User\Domain\UserRepository;

final class CreateUser
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function __invoke(
        UserId $userId,
        UserName $userName
    ): void {
        $this->ensureUserDoesNotExist($userId);

        $user = new User(
            $userId,
            $userName
        );

        $this->userRepository->save($user);
    }

    private function ensureUserDoesNotExist(UserId $userId)
    {
        if ($this->userRepository->findById($userId) !== null) {
            throw new UserAlreadyExists($userId);
        }
    }
}
