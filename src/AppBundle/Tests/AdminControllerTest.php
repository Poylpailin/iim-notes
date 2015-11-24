<?php

namespace Appbundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

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
        $this->assertContains('Admin-génial', $client->getResponse()->getContent());

    }

    /*public function test_it_add_exams()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'super_admin',
            'PHP_AUTH_PW'   => 'lolo',
        ));

        $crawler = $client->request('GET', '/admin/exam/add');

        $form = $crawler->selectButton('submit')->form();

        $form['appbundle_admin[name]'] = 'Admin2';
        $form['appbundle_admin[email]'] = 'admin2@admin.com';
        $form['appbundle_admin[password'] = 'pass';

        $client->submit($form);
        $crawler = $client->followRedirect();
        $this->assertContains('Admin2', $client->getResponse()->getContent());
    }*/

}