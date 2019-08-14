<?php

declare(strict_types=1);

namespace Domain\Entities;

final class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * User constructor.
     * @param int    $id
     * @param string $username
     * @param string $password
     */
    public function __construct(int $id, string $username, string $password)
    {
        $this->id       = $id;
        $this->username = $username;
        $this->password = $password;
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        if (false === $hashed) {
            throw new \RuntimeException("Failed to hash password");
        }
        $this->password = $hashed;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function validatePassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
