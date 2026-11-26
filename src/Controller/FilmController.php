<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $films = $em->getRepository(Film::class)->findAll();

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }
}
