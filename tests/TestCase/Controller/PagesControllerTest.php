<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\pagesController Test Case
 */
class PagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/');
        $this->assertResponseOk();
    }
}
