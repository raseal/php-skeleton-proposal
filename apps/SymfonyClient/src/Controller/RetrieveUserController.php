<?php

declare(strict_types=1);

namespace SymfonyClient\Controller;

use Backoffice\User\Application\RetrieveUser\RetrieveUserQuery;
use Backoffice\User\Domain\Exception\UserNotFound;
use Shared\Domain\Exception\InvalidId;
use Shared\Infrastructure\Symfony\Controller\ApiController;
use Symfony\Component\HttpFoundation\Response;

final class RetrieveUserController extends ApiController
{
    public function __invoke(string $userId): Response
    {
        $user = $this->ask(
            new RetrieveUserQuery($userId)
        );

        return $this->createApiResponse($user, Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [
            InvalidId::class => Response::HTTP_BAD_REQUEST,
            UserNotFound::class => Response::HTTP_NOT_FOUND,
        ];
    }
}
