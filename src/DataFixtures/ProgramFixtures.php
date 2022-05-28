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
            ->setCategory($this->getReference('category_Action'))
            ->setPoster('https://img.betaseries.com/ZGswN8VehpTnr5_39rj8XlyjiAE=/400x600/smart/https%3A%2F%2Fpictures.betaseries.com%2Ffonds%2Fposter%2Fd338e649f57a342598ec430862798ad3.jpg');

        $manager->persist($program);

        $program1 = new Program();
        $program1
            ->setTitle('American Horror Story')
            ->setSynopsis('A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct. De quoi vous confronter à vos plus grandes frayeurs !')
            ->setCategory($this->getReference('category_Horreur'))
            ->setPoster('https://img.betaseries.com/ZGswN8VehpTnr5_39rj8XlyjiAE=/400x600/smart/https%3A%2F%2Fpictures.betaseries.com%2Ffonds%2Fposter%2Fd338e649f57a342598ec430862798ad3.jpg');

        $manager->persist($program1);

        $program2 = new Program();

        $program2
            ->setTitle('Band of Brothers')
            ->setSynopsis('Vivez la Seconde Guerre mondiale aux côtés de la Easy Company, un groupe de soldats américains.')
            ->setCategory($this->getReference('category_Aventure'));

        $manager->persist($program2);

        $program3 = new Program();
        $program3
            ->setTitle('Black Panther')
            ->setSynopsis('Deep in the heart of Africa lies Wakanda, an advanced and unconquerable civilization. A family of warrior-kings possessing superior speed, strength and agility has governed this mysterious nation as long as time itself.')
            ->setCategory($this->getReference('category_Animation'));

        $manager->persist($program3);

        $program4 = new Program();
        $program4
            ->setTitle('Amazing Stories')
            ->setSynopsis('Série anthologique de courts-métrages fantastiques co-créée et partiellement réalisée par Steven Spielberg.')
            ->setCategory($this->getReference('category_Fantastique'));

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
