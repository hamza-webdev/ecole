<?php

namespace App\Controller;

use App\Entity\SituationFamilialle;
use App\Form\SituationFamilialleType;
use App\Repository\SituationFamilialleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/situation/familialle")
 */
class SituationFamilialleController extends AbstractController
{
    /**
     * @Route("/", name="situation_familialle_index", methods={"GET"})
     */
    public function index(SituationFamilialleRepository $situationFamilialleRepository): Response
    {
        return $this->render('situation_familialle/index.html.twig', [
            'situation_familialles' => $situationFamilialleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="situation_familialle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $situationFamilialle = new SituationFamilialle();
        $form = $this->createForm(SituationFamilialleType::class, $situationFamilialle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($situationFamilialle);
            $entityManager->flush();

            return $this->redirectToRoute('situation_familialle_index');
        }

        return $this->render('situation_familialle/new.html.twig', [
            'situation_familialle' => $situationFamilialle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="situation_familialle_show", methods={"GET"})
     */
    public function show(SituationFamilialle $situationFamilialle): Response
    {
        return $this->render('situation_familialle/show.html.twig', [
            'situation_familialle' => $situationFamilialle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="situation_familialle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SituationFamilialle $situationFamilialle): Response
    {
        $form = $this->createForm(SituationFamilialleType::class, $situationFamilialle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('situation_familialle_index');
        }

        return $this->render('situation_familialle/edit.html.twig', [
            'situation_familialle' => $situationFamilialle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="situation_familialle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SituationFamilialle $situationFamilialle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$situationFamilialle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($situationFamilialle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('situation_familialle_index');
    }
}
