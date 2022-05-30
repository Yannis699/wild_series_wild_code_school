<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\ProgramRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository)
    {

        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route(path:'/new', name: 'new')]
    public function new(): Response 
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);

        return $this->render('category/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{categoryName}', methods: 'GET', name: 'show')]
    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {

        if (!$categoryName) {
            throw $this->createNotFoundException(
                'No category with : ' . $categoryName . ' found in program\'s table.'
            );
        } else {
            $category = $categoryRepository->findOneBy(['name' => $categoryName]);
            $programs = $programRepository->findBy(
                array('category' => $category),
                array('id' => 'DESC'),
                3
            );

            return $this->render('category/show.html.twig', [
                'categories' => $categoryName,
                'programs' => $programs,
            ]);
        }
    }

}
