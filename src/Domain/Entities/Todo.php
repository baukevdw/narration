<?php

declare(strict_types=1);

namespace Domain\Entities;

final class Todo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $done;

    /**
     * Todo constructor.
     * @param int    $id
     * @param int    $userId
     * @param string $description
     * @param bool   $done
     */
    public function __construct(int $id, int $userId, string $description, bool $done)
    {
        $this->id          = $id;
        $this->userId      = $userId;
        $this->description = $description;
        $this->done        = $done;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }

    public function open(): void
    {
        $this->done = false;
    }

    public function done(): void
    {
        $this->done = true;
    }
}
