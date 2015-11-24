<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APITest extends WebTestCase
{
    public function test_it_lists_students()
    {
        $client = static::createClient([], [
            'X-Token' => '1515A' #Mettre ici le token généré
        ]);

        $crawler = $client->request('GET', '/api/students');
        #$crawler = $client->request('GET', '/api/exams');
        #$crawler = $client->request('GET', '/api/students/2/grades');
    }
}