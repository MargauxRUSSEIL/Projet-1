<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WorkflowController extends AbstractController
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

}
