<?php

namespace App\Controller;

use App\Entity\Sampana;
use App\Form\SampanaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sampana")
 */
class SampanaController extends AbstractController
{
    /**
     * @Route("/sampana", name="sampana_index", methods={"GET"})
     */
    public function index(): Response
    {
        $sampanas = $this->getDoctrine()
            ->getRepository(Sampana::class)
            ->findAll();

        return $this->render('sampana/index.html.twig', [
            'sampanas' => $sampanas,
        ]);
    }

    /**
     * @Route("/create/sampana", name="sampana_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sampana = new Sampana();
        $form = $this->createForm(SampanaType::class, $sampana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sampana);
            $entityManager->flush();

            return $this->redirectToRoute('sampana_index');
        }

        return $this->render('sampana/new.html.twig', [
            'sampana' => $sampana,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="sampana_show", methods={"GET"})
     */
    public function show(Sampana $sampana): Response
    {
        return $this->render('sampana/show.html.twig', [
            'sampana' => $sampana,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="sampana_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sampana $sampana): Response
    {
        $form = $this->createForm(SampanaType::class, $sampana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sampana_index', [
                'idSampana' => $sampana->getIdSampana(),
            ]);
        }

        return $this->render('sampana/edit.html.twig', [
            'sampana' => $sampana,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/remove/{idSampana}", name="sampana_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sampana $sampana): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sampana->getIdSampana(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sampana);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sampana_index');
    }
}
