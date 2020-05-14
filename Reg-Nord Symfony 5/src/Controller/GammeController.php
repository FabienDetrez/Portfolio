<?php

namespace App\Controller;

use App\Entity\Gamme;
use App\Form\GammeType;
use App\Repository\GammeRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("gamme")
 */
class GammeController extends AbstractController
{
    /**
     * @Route("/", name="gamme_index", methods={"GET"})
     */
    public function index(GammeRepository $gammeRepository, ProduitRepository $produitRepository, Request $request): Response
    {
        $gammeId = $request->query->get('id');
        
        $produits = $produitRepository->findBy(['gammes'=>$gammeId]);
        
        if ($gammeId && is_numeric($gammeId)) {
            $gammeId = intval($gammeId);

            //afficher page marque
            return $this->render('gamme/index.html.twig', [
                'gamme' => $gammeRepository->find($gammeId),
                'produits' => $produits,
                'allgammes' => false
            ]);
        } else {

            return $this->render('gamme/index.html.twig', [
                'gammes' => $gammeRepository->findAll(),
                'allgammes' => true
            ]);
        }
        
    }

    /**
     * @Route("/new", name="gamme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $gamme = new Gamme();
        $form = $this->createForm(GammeType::class, $gamme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gamme);
            $entityManager->flush();

            return $this->redirectToRoute('gamme_index');
        }

        return $this->render('admin/gamme/new.html.twig', [
            'gamme' => $gamme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gamme_show", methods={"GET"})
     */
    public function show(Gamme $gamme): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/gamme/show.html.twig', [
            'gamme' => $gamme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gamme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gamme $gamme): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(GammeType::class, $gamme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gamme_index');
        }

        return $this->render('admin/gamme/edit.html.twig', [
            'gamme' => $gamme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gamme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gamme $gamme): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete'.$gamme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gamme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gamme_index');
    }
}
