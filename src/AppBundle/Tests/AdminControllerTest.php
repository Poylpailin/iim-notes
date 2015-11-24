<?php

namespace Appbundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{

    public function test_it_lists_admins()
    {
        # Connexion afin de passer au dessus du firewall
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'super_admin',
            'PHP_AUTH_PW'   => 'lolo',
        ));

        # Accès à la page
        $crawler = $client->request('GET', '/admin/admin');

        # Vérification
        $this->assertContains('Admins List', $client->getResponse()->getContent());

    }

}