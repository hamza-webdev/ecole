<?php

namespace App\Controller;

use App\Entity\TypeExamin;
use App\Form\TypeExaminType;
use App\Repository\TypeExaminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/examin")
 */
class TypeExaminController extends AbstractController
{
    /**
     * @Route("/", name="type_examin_index", methods={"GET"})
     */
    public function index(TypeExaminRepository $typeExaminRepository): Response
    {
        return $this->render('type_examin/index.html.twig', [
            'type_examins' => $typeExaminRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_examin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeExamin = new TypeExamin();
        $form = $this->createForm(TypeExaminType::class, $typeExamin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeExamin);
            $entityManager->flush();

            return $this->redirectToRoute('type_examin_index');
        }

        return $this->render('type_examin/new.html.twig', [
            'type_examin' => $typeExamin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_examin_show", methods={"GET"})
     */
    public function show(TypeExamin $typeExamin): Response
    {
        return $this->render('type_examin/show.html.twig', [
            'type_examin' => $typeExamin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_examin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeExamin $typeExamin): Response
    {
        $form = $this->createForm(TypeExaminType::class, $typeExamin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_examin_index');
        }

        return $this->render('type_examin/edit.html.twig', [
            'type_examin' => $typeExamin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_examin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeExamin $typeExamin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeExamin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeExamin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_examin_index');
    }
}
