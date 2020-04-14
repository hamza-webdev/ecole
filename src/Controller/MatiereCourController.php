<?php

namespace App\Controller;

use App\Entity\MatiereCour;
use App\Form\MatiereCourType;
use App\Repository\MatiereCourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/matiere_cour")
 */
class MatiereCourController extends AbstractController
{
    /**
     * @Route("/", name="matiere_cour_index", methods={"GET"})
     */
    public function index(MatiereCourRepository $matiereCourRepository): Response
    {
        return $this->render('matiere_cour/index.html.twig', [
            'matiere_cours' => $matiereCourRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="matiere_cour_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $matiereCour = new MatiereCour();
        $form = $this->createForm(MatiereCourType::class, $matiereCour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($matiereCour);
            $entityManager->flush();

            return $this->redirectToRoute('matiere_cour_index');
        }

        return $this->render('matiere_cour/new.html.twig', [
            'matiere_cour' => $matiereCour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="matiere_cour_show", methods={"GET"})
     */
    public function show(MatiereCour $matiereCour): Response
    {
        return $this->render('matiere_cour/show.html.twig', [
            'matiere_cour' => $matiereCour,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="matiere_cour_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MatiereCour $matiereCour): Response
    {
        $form = $this->createForm(MatiereCourType::class, $matiereCour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('matiere_cour_index');
        }

        return $this->render('matiere_cour/edit.html.twig', [
            'matiere_cour' => $matiereCour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="matiere_cour_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MatiereCour $matiereCour): Response
    {
        if ($this->isCsrfTokenValid('delete'.$matiereCour->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($matiereCour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('matiere_cour_index');
    }
}
