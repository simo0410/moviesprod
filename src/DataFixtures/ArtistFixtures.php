<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

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

        $manager->flush();
    }
}
