<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;


#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController {

    #[Route('/', name:'index')]
    public function index(CategoryRepository $categoryRepository){

        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
         ]);
    }

    #[Route('/category/{categoryName}', name: 'category_show')]
    public function show(string $categoryName){

    }
   
}