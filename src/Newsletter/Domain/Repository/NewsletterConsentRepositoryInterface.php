<?php

declare(strict_types=1);

namespace App\Newsletter\Domain\Repository;

use App\Newsletter\Domain\Entity\NewsletterConsent;

interface NewsletterConsentRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null);

    public function save(NewsletterConsent $newsletterConsent): void;
}