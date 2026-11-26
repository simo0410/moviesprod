<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Category;
use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Catégories

        $drame = new Category();
        $drame->setNom('Drame');
        $manager->persist($drame);

        $action = new Category();
        $action->setNom('Action');
        $manager->persist($action);

        $romance = new Category();
        $romance->setNom('Romance');
        $manager->persist($romance);

        $comedie = new Category();
        $comedie->setNom('Comédie');
        $manager->persist($comedie);

        $biopic = new Category();
        $biopic->setNom('Biopic');
        $manager->persist($biopic);

        //Artistes
        $tom = new Artist();
        $tom->setFirstName('Tom');
        $tom->setlastName('Cruise');
        $tom->setBirthDate(new \DateTime('1966-09-04'));
        $tom->setGender('M');
        $manager->persist($tom);

        $keanu = new Artist();
        $keanu->setFirstName('keanu');
        $keanu->setlastName('Reeves');
        $keanu->setBirthDate(new \DateTime('1969-10-04'));
        $keanu->setGender('M');
        $manager->persist($keanu);

        $kate = new Artist();
        $kate->setFirstName('Kate');
        $kate->setlastName('Winslet');
        $kate->setBirthDate(new \DateTime('1970-04-04'));
        $kate->setGender('F');
        $manager->persist($kate);

        $leonardo = new Artist();
        $leonardo->setFirstName('Leonardo');
        $leonardo->setlastName('Dicaprio');
        $leonardo->setBirthDate(new \DateTime('1968-02-04'));
        $leonardo->setGender('M');
        $manager->persist($leonardo);

        $danzel = new Artist();
        $danzel->setFirstName('Danzel');
        $danzel->setlastName('Washington');
        $danzel->setBirthDate(new \DateTime('1963-02-04'));
        $danzel->setGender('M');
        $manager->persist($danzel);

        $kevin = new Artist();
        $kevin->setFirstName('Kevin');
        $kevin->setlastName('Costner');
        $kevin->setBirthDate(new \DateTime('1958-02-04'));
        $kevin->setGender('M');
        $manager->persist($kevin);

        $bob = new Artist();
        $bob->setFirstName('Bob');
        $bob->setlastName('Sull');
        $bob->setBirthDate(new \DateTime('1950-06-04'));
        $bob->setGender('M');
        $manager->persist($bob);

        //Films
        $jfk = new Film();
        $jfk->setTitre('JFK');
        $jfk->setDescription('Enquête autour de l\'assassinat du président américain John Fitzgerald Kennedy');
        $jfk->setCategory($drame);
        $jfk->addArtist($kevin);
        $manager->persist($jfk);

        $malcolmx = new Film();
        $malcolmx->setTitre('Malcolm X');
        /* $malcolmx->setDescription('un film biographique sur Malcolm X'); */
        $malcolmx->setCategory($biopic);
        $malcolmx->addArtist($danzel);
        $manager->persist($malcolmx);

        $titanic = new Film();
        $titanic->setTitre('Titanic');
        $titanic->setDescription('l\'histoire fictive de deux jeunes passagers du paquebot Titanic');
        $titanic->setCategory($romance);
        $titanic->addArtist($leonardo);
        $titanic->addArtist($kate);
        $manager->persist($titanic);

        $john = new Film();
        $john->setTitre('John Wick');
        $john->setDescription('Tueur à gages repenti');
        $john->setCategory($action);
        $john->addArtist($keanu);
        $manager->persist($john);

        $mission = new Film();
        $mission->setTitre('Mission Impossible');
        $mission->setDescription('Un ancien agent renégat menace de déployer une arme biologique mortelle');
        $mission->setCategory($action);
        $mission->addArtist($tom);
        $manager->persist($mission);

        $test = new Film();
        $test->setTitre('Film Test');
        $test->setDescription('testing film');
        $test->setCategory($action);
        /* $test->addArtist($tom); */
        $manager->persist($test);

        $manager->flush();
    }
}
