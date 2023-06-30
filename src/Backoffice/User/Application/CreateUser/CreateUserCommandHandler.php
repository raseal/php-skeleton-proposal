<?php

declare(strict_types=1);

namespace Backoffice\User\Application\CreateUser;

use Backoffice\User\Domain\UserId;
use Backoffice\User\Domain\UserName;
use Shared\Application\Bus\Command\CommandHandler;
use Shared\Domain\IdGenerator;

final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(
        private CreateUser $createUser,
        private IdGenerator $idGenerator
    ) {}

    public function __invoke(CreateUserCommand $command): void
    {
        $this->createUser->__invoke(
            UserId::fromId($this->idGenerator->generate()),
            new UserName($command->name)
        );
    }
}
