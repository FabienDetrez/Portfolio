<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($contact);

            $entityManager->flush();

            $nom = $contact->getNom();
            $prenom = $contact->getPrenom();
            $entreprise = $contact->getEntreprise();
            $email = $contact->getEmail();
            $telephone = $contact->getTelephone();
            $Message = $contact->getMessage();
            $sujet = $contact->getSujet();
            $date = date_format($contact->getDateEnvoi(), "d-m-Y");


            $message = (new \Swift_Message($sujet))
                ->setFrom([$email => $nom . " " . $prenom ." " . $entreprise])
                ->setTo('detrez.fabien@gmail.com')
                ->setCharset('UTF-8')
                ->setBody( $this->renderView(
                    // templates/emails/emailContact.html.twig
                    'emails/emailContact.html.twig',
                    ['nom' => $nom, 'prenom' => $prenom, 'entreprise' => $entreprise, 'email' => $email, 'sujet' => $sujet, 'date' => $date, 'message' => $Message, 'telephone' => $telephone],
                    
                ),
                'text/html'
            )
                ->addPart("Le message a été envoyé le $date ");

            //                ->attach(Swift_Attachment::fromPath('my-document.pdf'))
            // Send the message
            $message->setContentType("text/html");

            $mailer->send($message);
            $this->addFlash('message', 'Votre message a bien été envoyé !');



            return $this->redirectToRoute('home');
        }


        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()

        ]);
    }
}
