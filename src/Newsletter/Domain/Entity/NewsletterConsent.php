<?php

declare(strict_types=1);

namespace App\Newsletter\Domain\Entity;

use App\Shared\Aggregate\AggregateRoot;
use App\Shared\Domain\ValueObject\Email;
use DateTime;

class NewsletterConsent extends AggregateRoot
{
    
    public function __construct(
        private NewsletterConsentId $id,
        private Email $email,
        private DateTime $createdAt
    )
    {   
    
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}