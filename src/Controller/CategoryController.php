<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/category')]

final class CategoryController extends AbstractController
{
    #[Route('/', name: 'app_category_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $categories = $em->getRepository(Category::class)->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'title' => 'Liste des categories',
        ]);
    }

    #[Route('/{id}', name: 'app_category_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em): Response
    {
       // dd($id);
        $category = $em->getRepository(Category::class)->find($id);
        if(!$category) {
            throw $this->createNotFoundException('Aucune categorie trouvée !');
        }
        return $this->render('category/show.html.twig', [
            'category' => $category,
            
        ]);
    }
}
