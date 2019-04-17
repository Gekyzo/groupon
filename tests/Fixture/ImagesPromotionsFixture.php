<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagesPromotionsFixture
 */
class ImagesPromotionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'image_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'promotion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_ImgPro_Image' => ['type' => 'index', 'columns' => ['image_id'], 'length' => []],
            'FK_ImgPro_Prom' => ['type' => 'index', 'columns' => ['promotion_id'], 'length' => []],
        ],
        '_constraints' => [
            'FK_ImgPro_Image' => ['type' => 'foreign', 'columns' => ['image_id'], 'references' => ['images', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_ImgPro_Prom' => ['type' => 'foreign', 'columns' => ['promotion_id'], 'references' => ['promotions', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'image_id' => 1,
                'promotion_id' => 1
            ],
        ];
        parent::init();
    }
}
