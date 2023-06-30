<?php

declare(strict_types=1);

namespace Backoffice\User\Domain\Exception;

use Backoffice\User\Domain\UserId;
use Shared\Domain\Exception\DomainError;

final class UserAlreadyExists extends DomainError
{
    public function __construct(
        private UserId $userId
    ) {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'product_already_exists';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'User %s already exists',
            $this->userId->value()
        );
    }
}
