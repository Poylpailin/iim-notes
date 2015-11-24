<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Grade;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGradeData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $grade = new Grade();
        $grade ->setName('Piscine');
        $grade->setGrade('5/20');

        // Je sauvegarde en DB
        $manager->persist($grade);
        $manager->flush();
    }
}