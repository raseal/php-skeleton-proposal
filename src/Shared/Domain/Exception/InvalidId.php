<?php

declare(strict_types=1);

namespace Shared\Domain\Exception;

final class InvalidId extends DomainError
{
    public function __construct(
        private readonly string $id
    ) {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_id';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'The identifier %s is invalid',
            $this->id
        );
    }
}
