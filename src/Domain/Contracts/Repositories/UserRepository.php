<?php

declare(strict_types=1);

namespace Domain\Contracts\Repositories;

use Domain\Entities\User;
use Domain\Exception\UserNotFoundException;

interface UserRepository
{
    /**
     * @param string $username
     * @param string $password
     * @return User
     */
    public function create(string $username, string $password): User;

    /**
     * @param User $user
     * @return void
     */
    public function update(User $user): void;

    /**
     * @param string $username
     * @return User
     * @throws UserNotFoundException
     */
    public function findByUsername(string $username): User;
}
