<?php

declare(strict_types=1);

namespace Application\Injectors;

use Neat\Database\Connection;

final class Orm
{
    /**
     * Injects the orm
     *
     * @return mixed[]
     */
    public function __invoke(): array
    {
        return [
            Connection::class => new Connection(new \PDO('sqlite:database/database.sqlite')),
        ];
    }
}
