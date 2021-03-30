<?php

namespace App\Controller;

use App\Entity\MCC;
use App\Repository\MCCRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;


class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/post", name="api_post_getAllDataMCC",methods={"GET"})
     */
    public function getAllDataMCC(MCCRepository $mccRepo) 
    {
        return $this->json($mccRepo->findAll(), 200, []);
    }
    /**
     * @Route("/api/post", name="api_post_data",methods={"POST"})
     */
    public function data(Request $req, SerializerInterface $serializer, EntityManagerInterface $em) 
    {
        $jsonRecu = $req->getContent();

        try {
            $post = $serializer->deserialize($jsonRecu, MCC::class, 'json');

            $em->persist($post);
            $em->flush();

            return $this->json($post, 201, []);
        } catch(NotEncodableValueException $e){
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
