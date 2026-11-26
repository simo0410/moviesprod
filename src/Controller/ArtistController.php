<?php

namespace App\Controller;

use App\Entity\Artist;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/artist')]  //préfixe pour TOUTES les routes de la classe

final class ArtistController extends AbstractController
{
    #[Route('/', name: 'app_artist_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $artists = $em->getRepository(Artist::class)->findAll();
        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'title' => 'Liste des artistes',
        ]);
    }
}
