<?php

declare(strict_types=1);

namespace App\Newsletter\Domain\EventListener;

use App\Newsletter\Domain\Event\NewsletterConsentCreated;
use Psr\Log\LoggerInterface;

class NewsletterConsentCreatedListener 
{
    public function __construct(
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(NewsletterConsentCreated $event)
    {
       
        $this->logger->info('Utworzono nowy kontakt newsletter', [
            'email' => $event->getEmail()->email()
        ]);        
    }
}