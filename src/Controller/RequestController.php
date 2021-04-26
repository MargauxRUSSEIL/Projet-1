<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RequestController extends AbstractController
{
    /**
     * @Route("/api/workflow/{id}/formations", name="formationsByUser",methods={"GET"})
     */
    public function getAllFormationsByUser($id) 
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        $formations = [];

        if ($user !== null) {

            $workflows = $user->getWorkflows();

            foreach ($workflows as $workflow) {
                $formations = $workflow->getFormations();
            }

            return $this->json($formations, 200, []);
        }

        return $this->json(['error' => 'user is null'], 400, []);
    }
    
    /**
     * @Route("/api/getUsers", name="usersByRolesAndComposantes",methods={"GET"})
     */
    public function getUserByRolesAndComposantes()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $result = [];

        foreach ($users as $user) {
            $result[] = [
                'id' => $user->getId(),
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'mail' => $user->getMail(),
                'telephone' => $user->getTelephone(),
                'adjoint' => $user->getAdjoint(),
                'adjoint2' => $user->getAdjoint2(),
                'adjoint3'=> $user->getAdjoint3(),
                'roles' => $user->getRoles(),
                'workflows' => $user->getWorkflows(),
                'composantes' => $user->getComposantes(),
                'formations' => $user->getFormations(),
                'parcours' => $user->getParcours()
            ];
        }

        return $this->json($result, 200, []);
    }

}
