<?php

declare(strict_types=1);

namespace SymfonyClient\Controller;

use Shared\Infrastructure\Symfony\Controller\ApiController;
use Symfony\Component\HttpFoundation\Response;

class HealthController extends ApiController
{
    public function __invoke(): Response
    {
        return $this->createApiResponse('It works!');
    }

    protected function exceptions(): array
    {
        return [];
    }
}
