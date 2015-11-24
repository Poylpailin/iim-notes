<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APITest extends WebTestCase
{
    public function test_it_api_students()
    {
        $client = static::createClient([], [
            'X-Token' => '1515A' #Mettre ici le token généré
        ]);

        $crawler = $client->request('GET', '/api/students');
        $this->assertContains('Jean', $client->getResponse()->getContent());
    }

    public function test_it_api_exams()
    {
        $client = static::createClient([], [
            'X-Token' => '1515A' #Mettre ici le token généré
        ]);

        $crawler = $client->request('GET', '/api/exams');
        $this->assertContains('Examen de plong\u00e9e', $client->getResponse()->getContent());
    }

    /*public function test_it_api_grades()
    {
        $client = static::createClient([], [
            'X-Token' => '1515A' #Mettre ici le token généré
        ]);

        $crawler = $client->request('GET', '/api/students/6/grades');
        $this->assertContains('', $client->getResponse()->getContent());
    }*/

}