<?php

declare(strict_types=1);

namespace App\Newsletter\Domain\Event;

use App\Newsletter\Domain\Entity\NewsletterConsentId;
use App\Shared\Domain\Event\DomainEventInterface;
use App\Shared\Domain\ValueObject\Email;
use DateTime;
use Symfony\Contracts\EventDispatcher\Event;

final class NewsletterConsentCreated extends Event implements DomainEventInterface
{
    public const NAME = 'newsletter_consent.created';

    public function __construct(
        private NewsletterConsentId $id,
        private Email $email,
        private DateTime $createdAt
    )
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCreated()
    {
        return $this->createdAt;
    }
}