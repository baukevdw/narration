<?php

declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use Domain\Entities\Todo;
use Domain\Entities\User;

interface TodoRepository
{
    /**
     * @param User   $user
     * @param string $description
     * @return Todo
     */
    public function create(User $user, string $description): Todo;

    /**
     * @param Todo $todo
     */
    public function store(Todo $todo): void;

    /**
     * @param User $user
     * @return Todo[]
     */
    public function findAllByUser(User $user): array;
}
