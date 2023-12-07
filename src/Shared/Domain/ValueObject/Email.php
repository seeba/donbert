<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use InvalidArgumentException;

class Email 
{
    public function __construct(
        private readonly string $email
    )
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Błędny adres email'); 
        }

    }

    public function email(): string 
    {
        return $this->email;
    }

    public function __toString()
    {
        return $this->email;
    }
}