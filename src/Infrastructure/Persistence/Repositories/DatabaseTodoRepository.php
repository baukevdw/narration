<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Repositories;

use Domain\Contracts\Repositories\TodoRepository;
use Domain\Entities\Todo;
use Domain\Entities\User;
use Neat\Object\Manager;
use Neat\Object\RepositoryInterface;

final class DatabaseTodoRepository implements TodoRepository
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * DatabaseTodoRepository constructor.
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->repository = $manager->repository(Todo::class);
    }

    /**
     * {@inheritdoc}
     */
    public function create(User $user, string $description): Todo
    {
        $id = $this->repository->insert(['user_id' => $user->getId(), 'description' => $description, 'done' => false]);

        return new Todo($id, $user->getId(), $description, false);
    }

    /**
     * {@inheritdoc}
     */
    public function store(Todo $todo): void
    {
        $this->repository->store($todo);
    }

    /**
     * {@inheritdoc}
     */
    public function findAllByUser(User $user): array
    {
        /** @var Todo[] $todoItems */
        $todoItems = $this->repository->all(['user_id' => $user->getId()]);

        return $todoItems;
    }
}
