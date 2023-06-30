<?php

declare(strict_types=1);

namespace SymfonyClient\Controller;

use Backoffice\User\Application\CreateUser\CreateUserCommand;
use Backoffice\User\Domain\Exception\UserAlreadyExists;
use Shared\Infrastructure\Symfony\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateUserController extends ApiController
{
    public function __invoke(Request $request): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $this->dispatch(
            new CreateUserCommand($parameters['name'])
        );

        return $this->createApiResponse(null, Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [
            UserAlreadyExists::class => Response::HTTP_BAD_REQUEST,
        ];
    }
}
