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

    #[Route('/{categoryName}', name: 'show')]
    public function show( string $categoryName, CategoryRepository $categoryRepository){

        $categoryName = $categoryRepository->findOneBy(['name' => $categoryName]);
        
        if (!$categoryName) {
            throw $this->createNotFoundException(
                'No category with : '. $categoryName .' found in program\'s table.'
            );
    } 

    return $this->render('category/index.html.twig', [
        'category' => $categoryName,
    ]);
   
}

}