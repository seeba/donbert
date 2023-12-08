<?php

declare(strict_types=1);

namespace App\Site\Application\Controller\Http;

use App\Newsletter\Application\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class FooterController extends AbstractController
{
   
    public function __invoke(Request $request): Response
    {
        
        $form = $this->createForm(NewsletterType::class, null, [
            'action' => $this->generateUrl('app_newsletter_add_in_site')
        ]);
        
        return $this->render('site/footer.html.twig', [
            'form' => $form
        ]);
    }
    
}