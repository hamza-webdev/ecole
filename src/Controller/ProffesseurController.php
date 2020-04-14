<?php

namespace App\Controller;

use App\Entity\Proffesseur;
use App\Form\ProffesseurType;
use App\Repository\ProffesseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/proffesseur")
 */
class ProffesseurController extends AbstractController
{
    /**
     * @Route("/", name="proffesseur_index", methods={"GET"})
     */
    public function index(ProffesseurRepository $proffesseurRepository): Response
    {
        return $this->render('proffesseur/index.html.twig', [
            'proffesseurs' => $proffesseurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="proffesseur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $proffesseur = new Proffesseur();
        $form = $this->createForm(ProffesseurType::class, $proffesseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proffesseur);
            $entityManager->flush();

            return $this->redirectToRoute('proffesseur_index');
        }

        return $this->render('proffesseur/new.html.twig', [
            'proffesseur' => $proffesseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proffesseur_show", methods={"GET"})
     */
    public function show(Proffesseur $proffesseur): Response
    {
        return $this->render('proffesseur/show.html.twig', [
            'proffesseur' => $proffesseur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proffesseur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Proffesseur $proffesseur): Response
    {
        $form = $this->createForm(ProffesseurType::class, $proffesseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proffesseur_index');
        }

        return $this->render('proffesseur/edit.html.twig', [
            'proffesseur' => $proffesseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proffesseur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Proffesseur $proffesseur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proffesseur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proffesseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proffesseur_index');
    }
}
