<?php

namespace App\Controller;

use App\Entity\NoteExaminEleve;
use App\Form\NoteExaminEleveType;
use App\Repository\NoteExaminEleveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/note/examin/eleve")
 */
class NoteExaminEleveController extends AbstractController
{
    /**
     * @Route("/", name="note_examin_eleve_index", methods={"GET"})
     */
    public function index(NoteExaminEleveRepository $noteExaminEleveRepository): Response
    {
        return $this->render('note_examin_eleve/index.html.twig', [
            'note_examin_eleves' => $noteExaminEleveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="note_examin_eleve_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $noteExaminEleve = new NoteExaminEleve();
        $form = $this->createForm(NoteExaminEleveType::class, $noteExaminEleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($noteExaminEleve);
            $entityManager->flush();

            return $this->redirectToRoute('note_examin_eleve_index');
        }

        return $this->render('note_examin_eleve/new.html.twig', [
            'note_examin_eleve' => $noteExaminEleve,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="note_examin_eleve_show", methods={"GET"})
     */
    public function show(NoteExaminEleve $noteExaminEleve): Response
    {
        return $this->render('note_examin_eleve/show.html.twig', [
            'note_examin_eleve' => $noteExaminEleve,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="note_examin_eleve_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NoteExaminEleve $noteExaminEleve): Response
    {
        $form = $this->createForm(NoteExaminEleveType::class, $noteExaminEleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('note_examin_eleve_index');
        }

        return $this->render('note_examin_eleve/edit.html.twig', [
            'note_examin_eleve' => $noteExaminEleve,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="note_examin_eleve_delete", methods={"DELETE"})
     */
    public function delete(Request $request, NoteExaminEleve $noteExaminEleve): Response
    {
        if ($this->isCsrfTokenValid('delete'.$noteExaminEleve->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($noteExaminEleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('note_examin_eleve_index');
    }
}
