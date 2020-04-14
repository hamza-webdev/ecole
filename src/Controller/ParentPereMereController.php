<?php

namespace App\Controller;

use App\Entity\ParentPereMere;
use App\Form\ParentPereMereType;
use App\Repository\ParentPereMereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parent/pere/mere")
 */
class ParentPereMereController extends AbstractController
{
    /**
     * @Route("/", name="parent_pere_mere_index", methods={"GET"})
     */
    public function index(ParentPereMereRepository $parentPereMereRepository): Response
    {
        return $this->render('parent_pere_mere/index.html.twig', [
            'parent_pere_meres' => $parentPereMereRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parent_pere_mere_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parentPereMere = new ParentPereMere();
        $form = $this->createForm(ParentPereMereType::class, $parentPereMere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parentPereMere);
            $entityManager->flush();

            return $this->redirectToRoute('parent_pere_mere_index');
        }

        return $this->render('parent_pere_mere/new.html.twig', [
            'parent_pere_mere' => $parentPereMere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parent_pere_mere_show", methods={"GET"})
     */
    public function show(ParentPereMere $parentPereMere): Response
    {
        return $this->render('parent_pere_mere/show.html.twig', [
            'parent_pere_mere' => $parentPereMere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parent_pere_mere_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ParentPereMere $parentPereMere): Response
    {
        $form = $this->createForm(ParentPereMereType::class, $parentPereMere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parent_pere_mere_index');
        }

        return $this->render('parent_pere_mere/edit.html.twig', [
            'parent_pere_mere' => $parentPereMere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parent_pere_mere_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ParentPereMere $parentPereMere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parentPereMere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parentPereMere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parent_pere_mere_index');
    }
}
