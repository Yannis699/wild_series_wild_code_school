<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use App\Form\CategoryType;


#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController {

    #[Route('/', name:'index')]
    public function index(CategoryRepository $categoryRepository){

        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
         ]);
    }

    #[Route('/{categoryName}', methods: 'GET', name: 'show')]
    public function show( string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {

        if (!$categoryName) {
            throw $this->createNotFoundException(
                'No category with : '. $categoryName .' found in program\'s table.'
            );
        } else {
            $category= $categoryRepository->findOneBy(['name' => $categoryName]);
            $programs = $programRepository->findBy(
                    array('category' => $category), 
                    array('id' => 'DESC'), 3);

    return $this->render('category/show.html.twig', [
        'categories' => $categoryName,
        'programs' => $programs,
    ]);
   
}

    }}