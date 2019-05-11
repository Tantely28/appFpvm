<?php

namespace App\Controller;

use App\Entity\Mpiangona;
use App\Entity\Sampana;
use App\Repository\MpiangonaRepository;
use App\Repository\SampanaRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MpiangonaController extends AbstractController
{
    public $repository;
    public $sampanaRepository;

    public function __construct(MpiangonaRepository $repository,SampanaRepository $sampanaRepository)
    {
        $this->repository=$repository;
        $this->sampanaRepository=$sampanaRepository;
    }

    /**
     * @Route("/read/mpiangona", name="read_mpiangona")
     */
    public function read()
    {
        $mpiangona=$this->repository->findM();
        return $this->render('mpiangona/read.html.twig',[
            'mpiangona'=>$mpiangona
        ]);
    }

    /**
     * @Route("/create/mpiangona", name="create_mpiangona")
     */
    public function create(Request $request)
    {
        $mpiangona= new Mpiangona();

        $form=$this->createFormBuilder($mpiangona)
            ->add('anarana',TextType::class,[
                'label'=>'Anarana',
                'attr'=>[
                    'placeholder'=>'Anarana'
                ]
            ])
            ->add('sampana',EntityType::class,[
                'class'=>Sampana::class,
                'query_builder'  => function(EntityRepository $s){
                    return $s->createQueryBuilder('s')->orderBy('s.id','ASC');
                },
                'label'=>'Sampana',
            ])
            ->add('telephone')
            ->add('adresy')
            ->add('login')
            ->add('mdp',PasswordType::class,[
                'label'=>'Tenimihafina',
                'attr'=>[
                    'placeholder'=>'Tenimihafina'
                ]
            ])
            ->add('mpandray',ChoiceType::class,[
                'choices'  => [
                'Oui' => 'oui',
                'Non' => 'non',],
                'label'=>'Mpandray ve'
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($mpiangona);
            $em->flush();
            return $this->redirectToRoute('read_mpiangona');
        }

        return $this->render('mpiangona/create.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("show/mpiangona/{id}", name="show_mpiangona")
     */
    public function show(Mpiangona $mpiangona)
    {
        return $this->render('mpiangona/show.html.twig',[
            "mpiangona"=>$mpiangona
        ]);
    }

    /**
     * @param Mpiangona $mpiangona
     * @param Request $request
     * @Route("update/mpiangona/{id}", name="update_mpiangona")
     * @return Response
     */
    public function update(Mpiangona $mpiangona, Request $request)
    {
        $form=$this->createFormBuilder($mpiangona)
            ->add('anarana',TextType::class,[
                'label'=>'Anarana',
                'attr'=>[
                    'placeholder'=>'Anarana'
                ]
            ])
            ->add('sampana',EntityType::class,[
                'class'=>Sampana::class,
                'query_builder'  => function(EntityRepository $s){
                    return $s->createQueryBuilder('s')->orderBy('s.id','ASC');
                },
                'label'=>'Sampana',
            ])
            ->add('telephone')
            ->add('adresy')
            ->add('login')
            ->add('mdp',PasswordType::class,[
                'label'=>'Tenimihafina',
                'attr'=>[
                    'placeholder'=>'Tenimihafina'
                ]
            ])
            ->add('mpandray',ChoiceType::class,[
                'choices'  => [
                    'Oui' => 'oui',
                    'Non' => 'non',],
                'label'=>'Mpandray ve'
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($mpiangona);
            $em->flush();
            return $this->redirectToRoute('read_mpiangona');
        }

        return $this->render('mpiangona/update.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
