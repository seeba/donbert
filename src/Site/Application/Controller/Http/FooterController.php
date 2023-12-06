<?php

declare(strict_types=1);

namespace App\Site\Application\Controller\Http;

//use App\User\Application\Command\CreateUserCommand;

use App\Site\Application\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Messenger\HandleTrait;
// use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class FooterController extends AbstractController
{
    // use HandleTrait;
    
    // public function __construct(MessageBusInterface $messageBus)
    // {
    //     $this->messageBus = $messageBus;
    // }
    
    public function __invoke(Request $request): Response
    {
        
        $form = $this->createForm(NewsletterType::class, null, [
            'action' => $this->generateUrl('app_site_nl')
        ]);
        
        return $this->render('site/footer.html.twig', [
            'form' => $form
        ]);
    }
    #[Route('/nl', name:'app_site_nl')]
    public function test(Request $request): JsonResponse
    {
        return new JsonResponse([
            'msg' => 'Zostałeś zapisany na powiadomienia', 
            'status' => 1
        ]);
    }
}