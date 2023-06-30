<?php

declare(strict_types=1);

namespace Backoffice\User\Domain\Exception;

use Backoffice\User\Domain\UserId;
use Shared\Domain\Exception\DomainError;

final class UserNotFound extends DomainError
{
    public function __construct(
        private UserId $userId
    ) {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_not_found';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'user %s not found',
            $this->userId->value()
        );
    }

}
