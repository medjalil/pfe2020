<?php

namespace App\Controller;
use App\Entity\Actualite;
use App\Form\ActualiteType;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Session\Session;




use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite_index", methods={"GET"})
     */
    public function index(ActualiteRepository $ActualiteRepository)
    {
        return $this->render('actualite/index.html.twig', [
            'controller_name' => 'ActualiteController',

            'actualites' => $ActualiteRepository->findAll(),
        ]);}
        /**
     * @Route("/actualite/new", name="actualite_new", methods={"GET","POST"})
     */
      public function new(Request $request): Response
    {
        $actualite= new Actualite();
        $form = $this->createForm(ActualiteType::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actualite);
            $entityManager->flush();

            return $this->redirectToRoute('actualite_index');
        }

        return $this->render('actualite/new.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
        ]);
    

}

    /**
     * @Route("/actualite/{id<\d+>}", name="actualite_show", methods={"GET"})
     */

    public function show(Actualite $actualite):Response
    {
        return $this->render('actualite/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="actualite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Actualite $actualite): Response
    {
        $form = $this->createForm(ActualiteType::class, $actualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actualite_index');
        }

        return $this->render('actualite/edit.html.twig', [
            'actualite' => $actualite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actualite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Actualite $actualite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actualite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actualite);
            $entityManager->flush();
        }


        return $this->redirectToRoute('actualite_index');
    }
}


