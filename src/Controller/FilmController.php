<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/film')]

final class FilmController extends AbstractController
{
    #[Route('/', name: 'app_film', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $films = $em->getRepository(Film::class)->findAll();

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route('/{id}', name: 'app_film_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show (int $id, EntityManagerInterface $em): Response
    {
        $film = $em->getRepository(Film::class)->find($id);

        if(!$film) {
            throw $this->createNotFoundException('Aucun film trouvé !');
        }

        return $this->render('film/show.html.twig', [
            'film' => $film,
            'title' => 'Liste des films',
        ]);
    }

}