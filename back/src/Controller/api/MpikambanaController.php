<?php
/**
 * Created by PhpStorm.
 * User: tombo
 * Date: 22/04/2019
 * Time: 23:54
 */

namespace App\Controller\api;

use App\Entity\Mpiangona;
use App\Repository\AdidyRepository;
use App\Repository\MpiangonaRepository;
use App\Repository\VaovaoRepository;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class MpikambanaController
 * @package App\Controller\api
 * @Route("/api")
 */
class MpikambanaController extends AbstractController
{
    private $mpiangonaRepository;
    /**
     * @var VaovaoRepository
     */
    private $vaovaoRepository;
    /**
     * @var AdidyRepository
     */
    private $adidyRepository;

    public function __construct(MpiangonaRepository $mpiangonaRepository, VaovaoRepository $vaovaoRepository,AdidyRepository $adidyRepository)
    {
        $this->mpiangonaRepository=$mpiangonaRepository;
        $this->vaovaoRepository = $vaovaoRepository;
        $this->adidyRepository = $adidyRepository;
    }

    /**
     * @Rest\Post("/login/mpiangona")
     */
    public function login(Request $request)
    {
        if(!empty($request->get('login')) && !empty($request->get('mdp')))
        {
            $mpiangona=$this->mpiangonaRepository->login($request->get('login'),$request->get('mdp'));

            if(sizeof($mpiangona)==1) {
                $formatted = [];
                $error=['error'=>false];

                foreach ($mpiangona as $posts) {
                    $formatted= [
                        'error'=>false,
                        'id'=>(String)$posts->getId(),
                        'anarana'=>$posts->getAnarana(),
                        'telephone'=>$posts->getTelephone(),
                        'adresy'=>$posts->getAdresy(),
                        'mpandray'=>$posts->getMpandray(),
                        'login' => $posts->getLogin(),
                        'mdp' => $posts->getMdp(),
                    ];
                }

                return new JsonResponse($formatted);
            }else{
                return new JsonResponse(['message'=>'Anarana na tenimihafina diso','error'=>true],Response::HTTP_OK);
            }
        }else{
            return new JsonResponse(['message' => 'Ampidiro tompko ny anaranao sy ny tenimihafinanao','error'=>true], Response::HTTP_OK);
        }
    }

    /**
     * @Rest\Get("/read/vaovao")
     */
    public function Vaovao()
    {
        $vaovao=$this->vaovaoRepository->findVaovao();

        $formatted = [];
        foreach ($vaovao as $vao) {
            $formatted[]= [
                'id'=>$vao->getIdVaovao(),
                'titre'=>$vao->getTitre(),
                'contenu'=>$vao->getContenu(),
            ];
        }

        return new JsonResponse($formatted);

    }

    /**
     * @Rest\Get("/read/adidy/{id}")
     */
    public function adidy(Mpiangona $mpiangona)
    {
        $adidy=$this->adidyRepository->findadidyMpiangona($mpiangona->getId());

        $formatted = [];
        foreach ($adidy as $vao) {
            $formatted[]= [
                'id'=>$vao->getId(),
                'mpiangona'=>$vao->getMpiangona()->getAnarana(),
                'date_nanefana'=>$vao->getDatyNanefana()->format('d-m-Y'),
                'volana'=>$vao->getVolana()->format('m-Y'),
                'vola'=>$vao->getVola()
            ];
        }

        return new JsonResponse($formatted);
    }


}