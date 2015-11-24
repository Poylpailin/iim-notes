<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAdminData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        // Je créé les objets que je veux pour mes tests
        $admin = new Admin();
        $admin ->setName('Admin-génial');
        $admin->setEmail('admin@genial.com');
        $admin->setPassword('mdpgénial');

        // Je sauvegarde en DB
        $manager->persist($admin);
        $manager->flush();
    }
}