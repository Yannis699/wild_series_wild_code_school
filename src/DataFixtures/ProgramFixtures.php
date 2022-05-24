<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program
                ->setTitle('Walking dead')
                ->setSynopsis('Des zombies envahissent la terre')
                ->setCategory($this->getReference('category_Action'));
                
        $manager->persist($program);

        $program1 = new Program();
        $program1->setTitle('American Horror Story');
        $program1->setSynopsis('A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct. De quoi vous confronter à vos plus grandes frayeurs !');
        $program1->setCategory($this->getReference('category_Horreur'));
        $manager->persist($program1);

        $program2 = new Program();
        $program2->setTitle('Band of Brothers');
        $program2->setSynopsis('Vivez la Seconde Guerre mondiale aux côtés de la Easy Company, un groupe de soldats américains.');
        $program2->setCategory($this->getReference('category_Aventure'));
        $manager->persist($program2);

        $program3 = new Program();
        $program3->setTitle('Black Panther');
        $program3->setSynopsis('Deep in the heart of Africa lies Wakanda, an advanced and unconquerable civilization. A family of warrior-kings possessing superior speed, strength and agility has governed this mysterious nation as long as time itself.');
        $program3->setCategory($this->getReference('category_Animation'));
        $manager->persist($program3);

        $program4 = new Program();
        $program4->setTitle('Amazing Stories');
        $program4->setSynopsis('Série anthologique de courts-métrages fantastiques co-créée et partiellement réalisée par Steven Spielberg.');
        $program4->setCategory($this->getReference('category_Fantastique'));
        $manager->persist($program4);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }


}
