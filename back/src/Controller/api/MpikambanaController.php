<?php
/**
 * Created by PhpStorm.
 * User: tombo
 * Date: 22/04/2019
 * Time: 23:54
 */

namespace App\Controller\api;

use App\Repository\MpiangonaRepository;
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

    public function __construct(MpiangonaRepository $mpiangonaRepository)
    {
        $this->mpiangonaRepository=$mpiangonaRepository;
    }

    /**
     * @Rest\Post("/login/mpiangona")
     */
    public function login(Request $request)
    {
        $mpiangona=$this->mpiangonaRepository->findAll();

        if(!empty($request->get('login')) && !empty($request->get('mdp')))
        {
            $mpiangona=$this->mpiangonaRepository->login($request->get('login'),$request->get('mdp'));

            if(sizeof($mpiangona)==1) {
                $formatted = [];
                foreach ($mpiangona as $posts) {
                    $formatted[] = [
                        'id'=>$posts->getIdMpiangona(),
                        'anarana'=>$posts->getAnaarana(),
                        'telephone'=>$posts->getTel(),
                        'adresy'=>$posts->getAdresy(),
                        'mpandray'=>$posts->getMpandray(),
                        'login' => $posts->getLogin(),
                        'mdp' => $posts->getMdp(),
                    ];
                }

                return new JsonResponse($formatted);
            }else{
                return new JsonResponse(['message'=>'Anarana na tenimihafina diso'],Response::HTTP_OK);
            }
        }else{
            return new JsonResponse(['message' => 'Ampidiro tompko ny anaranao sy ny tenimihafinanao'], Response::HTTP_OK);
        }
    }
}