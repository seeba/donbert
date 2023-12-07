<?php 

declare(strict_types=1);

namespace App\Newsletter\Application\Command;

use App\Shared\Domain\ValueObject\Email;
use DateTime;

class AddNewsletterConsentCommand 
{
    public function __construct(
        private Email $email,
        private DateTime $createdAt
        )
    {
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}