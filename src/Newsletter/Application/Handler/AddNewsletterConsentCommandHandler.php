<?php 

declare(strict_types=1);

namespace App\Newsletter\Application\Handler;

use App\Newsletter\Application\Command\AddNewsletterConsentCommand;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class AddNewsletterConsentCommandHandler
{
    public function __construct()
    {
        
    }

    public function __invoke(AddNewsletterConsentCommand $command)
    {
        
    }

}
