<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\FoldersComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\FoldersComponent Test Case
 */
class FoldersComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\FoldersComponent
     */
    public $Folders;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Folders = new FoldersComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Folders);

        parent::tearDown();
    }

    /**
     * Test checkFolderExists method
     *
     * @return void
     */
    public function testCheckFolderExists()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test createFolders method
     *
     * @return void
     */
    public function testCreateFolders()
    {
        $folderName = WWW_ROOT . Configure::read('Fol.images') . 'categories' . '\\';

        $this->Folders->checkFolderExists($folderName);
    }
}
