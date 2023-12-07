<?php

declare(strict_types=1);

namespace App\Newsletter\Application\Controller\Http;

//use App\User\Application\Command\CreateUserCommand;

use App\Newsletter\Application\Command\AddNewsletterConsentCommand;
use App\Shared\Domain\ValueObject\Email;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/newsletter/add', name:'app_newsletter_add_in_site', methods: ['POST', "GET"])]
class AddToNewsletterController extends AbstractController
{
    use HandleTrait;
    
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }
    
    public function __invoke(Request $request): JsonResponse
    {
       
        $command = new AddNewsletterConsentCommand(new Email('poczta@sebastianpluta.pl'), new DateTime());
        $msg = 'Zostałeś zapisany na powiadomienie';
        $status = 1;
        try {
            $this->messageBus->dispatch($command);
        } catch (Exception $e) {
            $msg = $e->getPrevious()->getMessage();
           // $msg = 'Zapis na newsletter nie powiódł się';
           $status = 0;
        }
        
        return new JsonResponse([
            'msg' => $msg, 
            'status' => $status
        ]);
    }
}