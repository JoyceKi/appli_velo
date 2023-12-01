<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Velo;
use App\Entity\Vols;
use App\Repository\VeloRepository;
use App\Repository\UserRepository;
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
        $user = $this->getUser();
        $welcomeMessage = 'Bienvenue !';
    
        if ($user) {
            // Si l'utilisateur est connecté, on utilise son nom pour le message de bienvenue
            $welcomeMessage = sprintf('Bienvenue, %s !', $user->getNom());
        } else {
            // Si personne n'est connecté, on peut afficher un message générique ou rediriger
            // par exemple vers la page de connexion
            return $this->redirectToRoute('app_login');
        }
    
        return $this->render('default/index.html.twig', [
            'welcomeMessage' => $welcomeMessage,
        ]);
    }
    


}
