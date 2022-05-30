<?php

/* 
namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    const PROGRAMS = [

        [
            "title" => "Walking Dead",
            "synopsis" => "Des zombies envahissent la terre",
            "category" => "Action",
            "poster" => "https://pictures.betaseries.com/fonds/poster/c8d7465fb30f7d6121735b234fdbd410.jpg",
        ],

        [
            "title" => "American Horror Story",
            "synopsis" => "A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct. De quoi vous confronter à vos plus grandes frayeurs !",
            "category" => "Horreur",
            "poster" => "https://pictures.betaseries.com/fonds/poster/c8d7465fb30f7d6121735b234fdbd410.jpg",
        ],

        [
            "title" => "Band of Brothers",
            "synopsis" => "Vivez la Seconde Guerre mondiale aux côtés de la Easy Company, un groupe de soldats américains.",
            "category" => "Aventure",
            "poster" => "https://pictures.betaseries.com/fonds/poster/c8d7465fb30f7d6121735b234fdbd410.jpg",
        ],

        [
            "title" => "Walking Dead",
            "synopsis" => "Des zombies envahissent la terre",
            "category" => "Action",
            "poster" => "https://pictures.betaseries.com/fonds/poster/c8d7465fb30f7d6121735b234fdbd410.jpg",
        ],

        [
            "title" => "Walking Dead",
            "synopsis" => "Des zombies envahissent la terre",
            "category" => "Action",
            "poster" => "https://pictures.betaseries.com/fonds/poster/c8d7465fb30f7d6121735b234fdbd410.jpg",
        ],

    ];

    public function load(ObjectManager $manager): void

    {
        $programCounter = 1;

        foreach (self::PROGRAMS as $programLoad) {
            $program = new Program();
            $program->setTitle($programLoad['title']);
            $program->setSynopsis($programLoad['synopsis']);
            $program->setCategory($this->getReference('category_' .$programLoad['category']));
            $program->setPoster($programLoad['poster']);
            $programCounter++;
            $manager->persist($program);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}

*/