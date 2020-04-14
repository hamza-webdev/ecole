<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Form\CiviliteType;
use App\Repository\CiviliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/civilite")
 */
class CiviliteController extends AbstractController
{
    /**
     * @Route("/", name="civilite_index", methods={"GET"})
     */
    public function index(CiviliteRepository $civiliteRepository): Response
    {
        return $this->render('civilite/index.html.twig', [
            'civilites' => $civiliteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="civilite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $civilite = new Civilite();
        $form = $this->createForm(CiviliteType::class, $civilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($civilite);
            $entityManager->flush();

            return $this->redirectToRoute('civilite_index');
        }

        return $this->render('civilite/new.html.twig', [
            'civilite' => $civilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="civilite_show", methods={"GET"})
     */
    public function show(Civilite $civilite): Response
    {
        return $this->render('civilite/show.html.twig', [
            'civilite' => $civilite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="civilite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Civilite $civilite): Response
    {
        $form = $this->createForm(CiviliteType::class, $civilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('civilite_index');
        }

        return $this->render('civilite/edit.html.twig', [
            'civilite' => $civilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="civilite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Civilite $civilite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$civilite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($civilite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('civilite_index');
    }
}
