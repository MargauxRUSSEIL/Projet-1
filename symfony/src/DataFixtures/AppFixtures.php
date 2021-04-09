<?php

namespace App\DataFixtures;

use App\Entity\Composante;
use App\Entity\DiplomeEtablissement;
use App\Entity\Formation;
use App\Entity\Localisation;
use App\Entity\TypeDiplome;
use App\Entity\TypeDiplomeHasDiplomeEtablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formation = new Formation();
        $formation->setMention("Métiers de l'informatique : applications Web")
                ->setStructureHaute(3)
                ->setCodeDiplome("VDI")
                ->setEcoleDoctorale("ecole doctorale???")
                ->setContact("lp-dw@elric.u-cergy.fr")
                ->setCreatedAt(new \DateTime())
                ->setTypeFormation("type formation???")
                ->setVDI("VDI???");
                // FK Localisation
                // FK Composante
                // FK TypeDiplome
                // FK Parcours

                $manager->persist($formation);

        $localisation = new Localisation();
        $localisation->setAdresse("ZAC des Barbanniers, Avenue Marcel Paul")
                    ->setVille("Gennevilliers")
                    ->setCodePostal("92230");
                    // FK Formation

                $manager->persist($localisation);

        $composante = new Composante();
        $composante->setLibelleInstitut("Institut des Sciences et techniques");
                    // FK Formation

                $manager->persist($composante);

                $manager->flush();

    }
}

/*
namespace App\DataFixtures;

use App\Entity\Composante;
use App\Entity\DiplomeEtablissement;
use App\Entity\Formation;
use App\Entity\Localisation;
use App\Entity\TypeDiplome;
use App\Entity\TypeDiplomeHasDiplomeEtablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formation = new Formation();
        $formation->setMention("Métiers de l'informatique : applications Web")
                ->setStructureHaute("structure haute???")
                ->setCodeDiplome("VDI")
                ->setEcoleDoctorale("ecole doctorale???")
                ->setContact("lp-dw@elric.u-cergy.fr")
                ->setCreatedAt(new \DateTime())
                ->setTypeFormation("type formation???")
                ->setVDI("VDI???");

            $localisation = new Localisation();
            $localisation->setAdresse("ZAC des Barbanniers, Avenue Marcel Paul")
                    ->setVille("Gennevilliers")
                    ->setCodePostal("92230")
                    ->setFormation($formation);

                $manager->persist($localisation);

                $formation->addLocalisation($localisation);
                
            $composante = new Composante();
            $composante->setLibelleInstitut("Institut des Sciences et techniques");

                $manager->persist($composante);

                $formation->addComposante($composante);

            $typeDiplome = new TypeDiplome();
            $typeDiplome->setFormation($formation);

                $typeDiplomeHasDiplomeEtablissement = new TypeDiplomeHasDiplomeEtablissement();
                $typeDiplomeHasDiplomeEtablissement->addTypeDiplome($typeDiplome);

                    $diplomeEtablissement = new DiplomeEtablissement();
                    $diplomeEtablissement->setLibelleDiplome("Licence pro")
                                    ->setNbAnneeDiplome("une");

                                $manager->persist($diplomeEtablissement);

    


                $manager->persist($typeDiplome);
                

        $manager->flush();
    }
}
*/