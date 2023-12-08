<?php

declare(strict_types=1);

namespace App\Newsletter\Domain\Entity;

use App\Newsletter\Domain\Event\NewsletterConsentCreated;
use App\Shared\Aggregate\AggregateRoot;
use App\Shared\Domain\ValueObject\Email;
use DateTime;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('email.email', 'Ten email jest już zarejestrowany w naszym newsletterze')]
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

    public static function createNewsletterConsent(NewsletterConsentId $id, Email $email, DateTime $createdAt): self
    {
        $newsletterConsent = new NewsletterConsent($id, $email, $createdAt);

        $newsletterConsent->recordDomainEvent(new NewsletterConsentCreated($id, $email, $createdAt));

        return $newsletterConsent;
    }

}