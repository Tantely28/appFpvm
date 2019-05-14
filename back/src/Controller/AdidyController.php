<?php

namespace App\Controller;

use App\Entity\Adidy;
use App\Entity\Mpiangona;
use App\Repository\AdidyRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdidyController extends AbstractController
{

    /**
     * @var AdidyRepository
     */
    private $adidyRepository;

    public function __construct(AdidyRepository $adidyRepository)
    {

        $this->adidyRepository = $adidyRepository;
    }

    /**
     * @Route("/create/adidy", name="create_adidy")
     */
    public function create(Request $request)
    {
        $adidy= new Adidy();

        $form=$this->createFormBuilder($adidy)
            ->add('mpiangona',EntityType::class,[
                'class'=>Mpiangona::class,
                'query_builder'  => function(EntityRepository $s){
                    return $s->createQueryBuilder('s')->orderBy('s.anarana','ASC');
            }
            ])
            ->add('datyNanefana',DateType::class)
            ->add('volana',DateType::class,[
                'label'=>'Volana naloha',
            ])
            ->add('vola',TextType::class)
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($adidy);
            $em->flush();
            return $this->redirectToRoute('read_adidy');
        }

        return $this->render('adidy/create.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("/read/adidy", name="read_adidy")
     */
    public function read()
    {
        $adidy=$this->adidyRepository->findAdidy();

        return $this->render('adidy/read.html.twig',[
            'adidy'=>$adidy
        ]);
    }

    /**
     * @Route("/show/adidy/{id}", name="show_adidy")
     */
    public function show(Adidy $adidy)
    {
        return $this->render('adidy/show.html.twig',[
            'adidy'=>$adidy
        ]);
    }

    /**
     * @Route("/update/adidy/{id}", name="update_adidy")
     */
    public function update(Adidy $adidy, Request $request)
    {
        $form=$this->createFormBuilder($adidy)
            ->add('mpiangona',EntityType::class,[
                'class'=>Mpiangona::class,
                'query_builder'  => function(EntityRepository $s){
                    return $s->createQueryBuilder('s')->orderBy('s.anarana','ASC');
                }
            ])
            ->add('datyNanefana',DateType::class)
            ->add('volana',DateType::class,[
                'label'=>'Volana naloha',
            ])
            ->add('vola',TextType::class)
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($adidy);
            $em->flush();
            return $this->redirectToRoute('read_adidy');
        }

        return $this->render('adidy/update.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
