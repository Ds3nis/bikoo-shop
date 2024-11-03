<?php

namespace App\Models;

class Order
{
    public function __construct(
        private int $id,
        private int $user_id,
        private ?string $full_name,
        private ?string $phone,
        private ?string $city,
        private ?string $psc,
        private ?string $street,
        private ?int $home_number,
        private string $status,
        private int $price,
        private string $date,
    ){

    }

    /**
     * @return int
     */
    public function price(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function userId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return $this->full_name;
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
    public function city(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function psc(): string
    {
        return $this->psc;
    }

    /**
     * @return string
     */
    public function street(): string
    {
        return $this->street;
    }

    /**
     * @return int
     */
    public function homeNumber(): int
    {
        return $this->home_number;
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function date(): string
    {
        return $this->date;
    }


}