<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Exam;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadExamData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $exam = new Exam();
        $exam ->setName('Examen de plongée');
        $exam->setDate('26/11/2015');

        // Je sauvegarde en DB
        $manager->persist($exam);
        $manager->flush();
    }
}