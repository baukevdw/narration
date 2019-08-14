<?php

declare(strict_types=1);

namespace Application\Injectors;

use Domain\Contracts\Repositories\TodoRepository;
use Domain\Contracts\Repositories\UserRepository;
use Infrastructure\Persistence\Repositories\DatabaseTodoRepository;
use Infrastructure\Persistence\Repositories\DatabaseUserRepository;

final class Repositories
{
    /**
     * Injects repositories into the container definitions.
     *
     * @return mixed[]
     */
    public function __invoke(): array
    {
        return [
            UserRepository::class => DatabaseUserRepository::class,
            TodoRepository::class => DatabaseTodoRepository::class,
        ];
    }
}
