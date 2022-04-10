<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'contact_page')]
    public function index(): Response
    {
        return $this->render("contact.html.twig");
    }

    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/', name: 'contact_page')]
    public function create_contact(Request $request): Response{
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class,$contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->addFlash(
                'success',
                'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen!'
            );

            $newContact = $form->getData();

            //dd($newContact);

            $this->em->persist($newContact);
            $this->em->flush();

            return $this->redirectToRoute("contact_page");
        }

        else if($form->isSubmitted() && !($form->isValid())){
            $this->addFlash(
                'warning',
                'Hiba! Kérjük töltsd ki az összes mezőt!'
                
            );

        }
        

        return $this->render("contact.html.twig",[
            "form" => $form->createView()
        ]);
    }
}
