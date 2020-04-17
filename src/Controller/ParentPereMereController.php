<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\ParentPereMere;
use App\Form\ParentPereMereType;
use App\Repository\ParentPereMereRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Route("/parent_peremere")
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
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $parentPereMere = new ParentPereMere();
        $elev = new Eleve();
        $originalEleves = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($parentPereMere->getEleves() as $eleve) {
            $originalEleves->add($eleve);
        }
        $form = $this->createForm(ParentPereMereType::class, $parentPereMere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
            foreach ($originalEleves as $eleve) {
                if (false === $parentPereMere->getEleves()->contains($eleve)) {
                    // remove the Task from the Tag
                    if (false === $parentPereMere->getEleves()->contains($eleve)) {
                    $parentPereMere->getEleves()->removeElement($parentPereMere);

                    // if it was a many-to-one relationship, remove the relationship like this
                    // $tag->setTask(null);

                    $entityManager->persist($eleve);

                    // if you wanted to delete the Tag entirely, you can also do that
                    // $entityManager->remove($tag);
                    }
                }
            }

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
    public function edit(Request $request, ParentPereMere $parentPereMere, EntityManagerInterface $entityManager): Response
    {
//        $form = $this->createForm(ParentPereMereType::class, $parentPereMere);
//        $form->handleRequest($request);

        if (null === $parentPereMere) {
            throw $this->createNotFoundException('No task found for id '.$request->get('id'));
        }
        $originalEleves = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($parentPereMere->getEleves() as $eleve) {
            $originalEleves->add($eleve);
        }

        $editForm = $this->createForm(ParentPereMereType::class, $parentPereMere);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            // remove the relationship between the tag and the Task
            foreach ($originalEleves as $eleve) {
                if (false === $parentPereMere->getEleves()->contains($eleve)) {
                    // remove the Task from the Tag
                    $entityManager->remove($eleve);
//                    $parentPereMere->getEleves()->removeElement($eleve);

                    // if it was a many-to-one relationship, remove the relationship like this
                    // $tag->setTask(null);

//                    $entityManager->persist($eleve);

                    // if you wanted to delete the Tag entirely, you can also do that
                    // $entityManager->remove($tag);
                }
            }
            $entityManager->persist($parentPereMere);
            $entityManager->flush();
            return $this->redirectToRoute('parent_pere_mere_index');
        }



//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('parent_pere_mere_index');
//        }

        return $this->render('parent_pere_mere/edit.html.twig', [
            'parent_pere_mere' => $parentPereMere,
            'form' => $editForm->createView(),
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
