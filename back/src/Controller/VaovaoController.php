<?php

namespace App\Controller;

use App\Entity\Vaovao;
use App\Form\VaovaoType;
use App\Repository\VaovaoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vaovao")
 */
class VaovaoController extends AbstractController
{
    private $vaovaoRepository;

    public function __construct(VaovaoRepository $vaovaoRepository)
    {
        $this->vaovaoRepository=$vaovaoRepository;
    }

    /**
     * @Route("/vaovao", name="vaovao_index", methods={"GET"})
     */
    public function index(): Response
    {
        $vaovaos = $this->vaovaoRepository->findVaovao();

        return $this->render('vaovao/index.html.twig', [
            'vaovaos' => $vaovaos,
        ]);
    }

    /**
     * @Route("/create/vaovao", name="vaovao_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vaovao = new Vaovao();
        $form = $this->createForm(VaovaoType::class, $vaovao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vaovao);
            $entityManager->flush();

            return $this->redirectToRoute('vaovao_index');
        }

        return $this->render('vaovao/new.html.twig', [
            'vaovao' => $vaovao,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{idVaovao}", name="vaovao_show", methods={"GET"})
     */
    public function show(Vaovao $vaovao): Response
    {
        return $this->render('vaovao/show.html.twig', [
            'vaovao' => $vaovao,
        ]);
    }

    /**
     * @Route("/edit/{idVaovao}", name="vaovao_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vaovao $vaovao): Response
    {
        $form = $this->createForm(VaovaoType::class, $vaovao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaovao_index', [
                'idVaovao' => $vaovao->getIdVaovao(),
            ]);
        }

        return $this->render('vaovao/edit.html.twig', [
            'vaovao' => $vaovao,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/remove/{idVaovao}", name="vaovao_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vaovao $vaovao): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vaovao->getIdVaovao(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vaovao);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vaovao_index');
    }
}
