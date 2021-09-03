<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("marque")
 */
class MarqueController extends AbstractController
{
    /**
     * @Route("/", name="marque_index", methods={"GET"})
     */
    public function index(MarqueRepository $marqueRepository, ProduitRepository $produitRepository, Request $request): Response
    {
        $marqueId = $request->query->get('id');
        $produits = $produitRepository->findBy(['marques'=>$marqueId]);
        
        if ($marqueId && is_numeric($marqueId)) {
            $marqueId = intval($marqueId);

            //afficher page marque
            return $this->render('marque/index.html.twig', [
                'marque' => $marqueRepository->find($marqueId),
                'produits' => $produits,
                'allmarques' => false
            ]);
        } else {

            return $this->render('marque/index.html.twig', [
                'marques' => $marqueRepository->findAll(),
                'allmarques' => true
            ]);
        }
    }

    /**
     * @Route("/new", name="marque_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $marque = new Marque();
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($marque);
            $entityManager->flush();

            return $this->redirectToRoute('marque_index');
        }

        return $this->render('admin/marque/new.html.twig', [
            'marque' => $marque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="marque_show", methods={"GET"})
     */
    public function show(Marque $marque): Response
    {
        return $this->render('admin/marque/show.html.twig', [
            'marque' => $marque,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="marque_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Marque $marque): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('marque_index');
        }

        return $this->render('admin/marque/edit.html.twig', [
            'marque' => $marque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="marque_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Marque $marque): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete' . $marque->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($marque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('marque_index');
    }
}
