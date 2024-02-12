<?php

namespace App\Controller;

use App\Repository\VeloRepository;
use App\Repository\VolsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(): Response
    {
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }

    #[Route('/velos_voles', name: 'app_velos_voles')]
    public function velosVoles(VeloRepository $veloRepository, VolsRepository $volsRepository): Response
    {
        // identifier les vélos volés par une propriété dans l'entité Vols.
        $stolenBikes = $volsRepository->findAllStolenBikes(); // Méthode personnalisée à créer dans VolsRepository

        return $this->render('list/stolen_bikes.html.twig', [
            'stolenBikes' => $stolenBikes,
        ]);
    }
}
