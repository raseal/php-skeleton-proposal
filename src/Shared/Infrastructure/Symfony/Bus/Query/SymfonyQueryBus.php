<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Bus\Query;

use Shared\Application\Bus\Query\Query;
use Shared\Application\Bus\Query\QueryBus;
use Shared\Application\Bus\Query\QueryResponse;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyQueryBus implements QueryBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $bus)
    {
        $this->messageBus = $bus;
    }

    public function ask(Query $query): ?QueryResponse
    {
        return $this->handle($query);
    }

}
