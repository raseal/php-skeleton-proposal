<?php

declare(strict_types=1);

namespace Shared\Domain\Aggregate;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;

abstract class Collection implements Countable, IteratorAggregate
{
    public function __construct(
        protected array $items
    ) {
        $this->ensureItemsHaveSameType($this->items);
    }

    abstract protected function type(): string;

    public function add(mixed $item): void
    {
        $this->ensureItemHasSameType($item);
        $this->items[] = $item;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    private function ensureItemsHaveSameType(array $items): void
    {
        foreach ($items as $item) {
            $this->ensureItemHasSameType($item);
        }
    }

    private function ensureItemHasSameType(mixed $item): void
    {
        $expectedClass = $this->type();

        if (!$item instanceof $expectedClass) {
            throw new InvalidArgumentException(
                sprintf(
                    'The item should be an instance of  %s',
                    $expectedClass
                )
            );
        }
    }
}
