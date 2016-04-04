<?php

namespace Blogger\BloggerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}
