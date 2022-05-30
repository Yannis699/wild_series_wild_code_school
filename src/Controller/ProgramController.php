<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Season;
use App\Entity\Episode;
use App\Entity\Program;
use App\Repository\ProgramRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();

        if(!$programs) {
            throw $this->createNotFoundException('No programs found !');
        }

        return $this->render('program/index.html.twig', [
            'programs' => $programs,
         ]);
    }

    /* #[Route('/show/{id<^[0-9]+$>}', name: 'show')]
    public function show(int $id, ProgramRepository $programRepository):Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);
        // same as $program = $programRepository->find($id);
    
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    } */

    #[Route('/{programId}/season/{seasonId}', methods: 'GET', name: 'season_show')]
    #[Entity('season', options: ['id' => 'seasonId'])]
    public function showSeason(Season $season, CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('program/season_show.html.twig', array('season' => $season, 'categories' => $categories));
    }
  
    #[Route('/{programId}/season/{seasonId}/episode/{episodeId}', methods: 'GET', name:'episode_show')]
    #[Entity('episode', options: ['id' => 'episodeId'])]
    public function showEpisode(Episode $episode, CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('program/episode_show.html.twig', array('episode' => $episode, 'categories' => $categories));
    } 
    
}