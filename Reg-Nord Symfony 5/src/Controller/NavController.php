<?php

namespace App\Controller;

use App\Entity\Gamme;
use App\Entity\Marque;
use App\Repository\GammeRepository;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavController extends AbstractController
{
    /**
     * @Route("/nav", name="nav")
     */

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    public function index()
    {
        $gammes = $this->em->getRepository(Gamme::class)->findAll();
        $marques = $this->em->getRepository(Marque::class)->findAll();
        return $this->render('nav/index.html.twig', [
            'controller_name' => 'NavController',
            'gammes' => $gammes,
            'marques' => $marques
        ]);
    }
}
