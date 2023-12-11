<?php 

declare(strict_types=1);

namespace App\Newsletter\Application\Handler;

use App\Newsletter\Application\Command\AddNewsletterConsentCommand;
use App\Newsletter\Domain\Entity\NewsletterConsent;
use App\Newsletter\Domain\Entity\NewsletterConsentId;
use App\Newsletter\Domain\Repository\NewsletterConsentRepositoryInterface;
use Exception;
use PharIo\Manifest\InvalidEmailException;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsMessageHandler]
class AddNewsletterConsentCommandHandler
{
    public function __construct(
        private NewsletterConsentRepositoryInterface $newsletterConsentRepository,
        private EventDispatcherInterface $eventDispatcher,
        private ValidatorInterface $validator
    )
    {
        
    }

    public function __invoke(AddNewsletterConsentCommand $command)
    {
        
        $newsletterConsent = NewsletterConsent::createNewsletterConsent(
            NewsletterConsentId::random(), 
            $command->getEmail(), 
            $command->getCreatedAt()
        );
            $message = '';
            $errors = $this->validator->validate($newsletterConsent);
            if ($errors->count() > 0) {
                foreach ($errors as $error) {
                    $message .= $error->getMessage();
                }

            throw new Exception($message);
            }
                  
        $this->newsletterConsentRepository->save($newsletterConsent);
        
        foreach ($newsletterConsent->pullDomainEvents() as $domainEvent) {
          //  dump($this->eventDispatcher);die;
            $this->eventDispatcher->dispatch($domainEvent, $domainEvent::NAME);  
             
        }   
        
    }

}
