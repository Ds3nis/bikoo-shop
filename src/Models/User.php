<?php

namespace App\Models;

class User
{
    public function __construct(
        private int $id,
        private string $name,
        private string $last_name,
        private string $phone,
        private string $email,
        private string $password,
        private string $role,
        private string $createdAt,
        private string $updatedAt
    ){

    }

    /**
     * @return string
     */
    public function role(): string
    {
        return $this->role;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function phone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }


    /**
     * @return string
     */
    public function createdAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function updatedAt(): string
    {
        return $this->updatedAt;
    }
}