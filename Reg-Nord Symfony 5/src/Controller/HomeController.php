<?php

namespace App\Controller;

use App\Entity\Gamme;
use App\Repository\GammeRepository;
use App\Repository\MarqueRepository;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(GammeRepository $gammeRepository, MediaRepository $mediaRepository)
    {
        $gammes = $gammeRepository->findAll();
        $medias = $mediaRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'gammes' => $gammes,
            'medias' => $medias
        ]);
    }
}
