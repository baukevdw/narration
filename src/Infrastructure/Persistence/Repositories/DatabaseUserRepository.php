<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Repositories;

use Domain\Contracts\Repositories\UserRepository;
use Domain\Entities\User;
use Domain\Exception\UserNotFoundException;
use Neat\Object\Manager;
use Neat\Object\RepositoryInterface;

final class DatabaseUserRepository implements UserRepository
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    public function __construct(Manager $manager)
    {
        $this->repository = $manager->repository(User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function create(string $username, string $password): User
    {
        $id = $this->repository->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return new User($id, $username, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function update(User $user): void
    {
        $this->repository->store($user);
    }

    /**
     * {@inheritdoc}
     */
    public function findByUsername(string $username): User
    {
        $user = $this->repository->one(['username' => $username]);
        if (null === $user) {
            throw new UserNotFoundException("User with username $username not found");
        }

        return $user;
    }
}
