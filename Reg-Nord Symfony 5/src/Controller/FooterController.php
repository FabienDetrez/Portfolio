<?php

namespace App\Controller;

use App\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooterController extends AbstractController
{
    /**
     * @Route("/footer", name="footer")
     */

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function index()
    {
        $medias = $this->em->getRepository(Media::class)->findAll();
        return $this->render('footer/index.html.twig', [
            'controller_name' => 'FooterController',
            'medias' => $medias
        ]);
    }
}
