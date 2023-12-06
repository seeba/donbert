<?php

declare(strict_types=1);

namespace App\Site\Application\Controller\Http;

//use App\User\Application\Command\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Messenger\HandleTrait;
// use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name:'app_site_home')]
class HomeController extends AbstractController
{
    // use HandleTrait;
    
    // public function __construct(MessageBusInterface $messageBus)
    // {
    //     $this->messageBus = $messageBus;
    // }
    
    public function __invoke(Request $request): Response
    {
        // $command = new CreateUserCommand('6@wp.pl', 'wrz4jk94');
        // $this->messageBus->dispatch($command);
        
        return $this->render('site/index.html.twig', [
            'title' => 'Strona główna'
        ]);
    }
}