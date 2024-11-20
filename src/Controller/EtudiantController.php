<?php


namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etudiant', name: 'Eetudiant')]
class EtudiantController extends AbstractController
{
    #[Route('/add', name: 'add_etudiant')]
    public function addEtudiant(ManagerRegistry $doctrine): Response
    {
        // Récupérer l'EntityManager
        $entityManager = $doctrine->getManager();

        // Créer une nouvelle instance de l'entité Etudiant
        $etudiant = new Etudiant();
        $etudiant->setUsername('GhaithThabet');
        $etudiant->setUserEmail('GhaithThabet@example.com');
        $etudiant->setUserPwd('123'); // Hachage du mot de passe
        $etudiant->setRoles(['ROLE_ETUDIANT']); // Assigner le rôle d'étudiant
        

        // Persister l'entité
        $entityManager->persist($etudiant);
        $entityManager->flush();

        return new Response('Étudiant ajouté avec succès avec l\'ID : ' . $etudiant->getId());
    }

    #[Route('/list', name: 'get_etudiants')]
    public function getEtudiants(ManagerRegistry $doctrine): Response
    {
        // Récupérer tous les étudiants depuis le repository
        $etudiants = $doctrine->getRepository(Etudiant::class)->findAll();

        // Retourner une vue Twig avec les données ou une réponse brute
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
}




