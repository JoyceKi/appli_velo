<?php

namespace App\Controller;
use App\Entity\Velo;
use App\Entity\Vols;
use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\InscriptionVeloTypeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    #[Route('/default', name: 'app_default')]
    public function showAllVelo(VeloRepository $veloRepository)
    {
        $velos = $veloRepository->findAll();
        if (!$velos) {
            throw $this->createNotFoundException('La table est vide');
        }
        return $this->render('default/index.html.twig', [
            'controller_name' => 'defaultController',
            'velos' => $velos,
        ]);
    }
}
