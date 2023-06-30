<?php

declare(strict_types=1);

namespace Backoffice\User\Application\RetrieveUser;

use Backoffice\User\Application\UserResponse;
use Backoffice\User\Domain\UserId;
use Shared\Application\Bus\Query\QueryHandler;

final class RetrieveUserQueryHandler implements QueryHandler
{
    public function __construct(
        private RetrieveUser $retrieveUser
    ) {}

    public function __invoke(RetrieveUserQuery $query): UserResponse
    {
        $user = $this->retrieveUser->__invoke(
            new UserId($query->userId)
        );

        return UserResponse::fromUser($user);
    }
}
