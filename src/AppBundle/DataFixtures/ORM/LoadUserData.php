<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Class LoadUserData
 */
class LoadUserData extends AbstractFixture implements ContainerAwareInterface

{
    use ContainerAwareTrait;

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('super_admin');
        $user->setEmail('email@domain.com');
        $user->setPassword('lolo');
        $user->setPlainPassword('lolo');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_SUPER_ADMIN'));

        // La sauvegarde est différente ici
        $this->container->get('fos_user.user_manager')->updateUser($user);
    }
}