<?php

namespace App\Controller;

use App\Entity\Velo;
use App\Form\InscriptionVeloType;
use App\Repository\VeloRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\form;

class VeloController extends AbstractController
{
        #[Route('/velo', name: 'app_velo')]
        // Récupérer les données du formulaire
        public function addForm(EntityManagerInterface $entityManager, Request $request)
        {
                // création du form
                $velo = new Velo();
                $form = $this->createForm(InscriptionVeloType::class, $velo);
                // recuppérer les données de la requête
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                        $velo = $form->getData();
                        // dd($data);
                        $entityManager->persist($velo);
                        $entityManager->flush();
                        return $this->redirectToRoute('app_velo_confirmation');
                }
                return $this->render('velo/index.html.twig', [
                        // afficher le formulaire avec la variable twig
                        'formulaire' => $form->createView(),
                         // Rediriger vers la route de confirmation
                ]);
        }

        #[Route('/velo/confirmation', name: 'app_velo_confirmation')]
        public function confirmation(): Response
        {
            return $this->render('velo/confirmation.html.twig');
        }
        
}