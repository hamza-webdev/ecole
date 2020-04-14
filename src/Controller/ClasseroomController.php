<?php

namespace App\Controller;

use App\Entity\Classeroom;
use App\Form\ClasseroomType;
use App\Repository\ClasseroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/classeroom")
 */
class ClasseroomController extends AbstractController
{
    /**
     * @Route("/", name="classeroom_index", methods={"GET"})
     */
    public function index(ClasseroomRepository $classeroomRepository): Response
    {
        return $this->render('classeroom/index.html.twig', [
            'classerooms' => $classeroomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="classeroom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $classeroom = new Classeroom();
        $form = $this->createForm(ClasseroomType::class, $classeroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classeroom);
            $entityManager->flush();

            return $this->redirectToRoute('classeroom_index');
        }

        return $this->render('classeroom/new.html.twig', [
            'classeroom' => $classeroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="classeroom_show", methods={"GET"})
     */
    public function show(Classeroom $classeroom): Response
    {
        return $this->render('classeroom/show.html.twig', [
            'classeroom' => $classeroom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="classeroom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Classeroom $classeroom): Response
    {
        $form = $this->createForm(ClasseroomType::class, $classeroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('classeroom_index');
        }

        return $this->render('classeroom/edit.html.twig', [
            'classeroom' => $classeroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="classeroom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Classeroom $classeroom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classeroom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($classeroom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('classeroom_index');
    }
}
