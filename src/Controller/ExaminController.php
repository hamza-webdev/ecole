<?php

namespace App\Controller;

use App\Entity\Examin;
use App\Form\ExaminType;
use App\Repository\ExaminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/examin")
 */
class ExaminController extends AbstractController
{
    /**
     * @Route("/", name="examin_index", methods={"GET"})
     */
    public function index(ExaminRepository $examinRepository): Response
    {
        return $this->render('examin/index.html.twig', [
            'examins' => $examinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="examin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $examin = new Examin();
        $form = $this->createForm(ExaminType::class, $examin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($examin);
            $entityManager->flush();

            return $this->redirectToRoute('examin_index');
        }

        return $this->render('examin/new.html.twig', [
            'examin' => $examin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="examin_show", methods={"GET"})
     */
    public function show(Examin $examin): Response
    {
        return $this->render('examin/show.html.twig', [
            'examin' => $examin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="examin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Examin $examin): Response
    {
        $form = $this->createForm(ExaminType::class, $examin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('examin_index');
        }

        return $this->render('examin/edit.html.twig', [
            'examin' => $examin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="examin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Examin $examin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$examin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($examin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('examin_index');
    }
}
