<?php
use Migrations\AbstractSeed;

/**
 * CategoriesPromotions seed.
 */
class CategoriesPromotionsSeed extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UsersSeed',
            'CategoriesSeed',
            'ImagesSeed',
            'PromotionsSeed'
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category_id' => '1',
                'promotion_id' => '5',
            ],
            [
                'category_id' => '1',
                'promotion_id' => '6',
            ],
            [
                'category_id' => '1',
                'promotion_id' => '7',
            ],
            [
                'category_id' => '1',
                'promotion_id' => '8',
            ],
            [
                'category_id' => '4',
                'promotion_id' => '9',
            ],
            [
                'category_id' => '4',
                'promotion_id' => '10',
            ],
            [
                'category_id' => '4',
                'promotion_id' => '11',
            ],
            [
                'category_id' => '4',
                'promotion_id' => '12',
            ],
            [
                'category_id' => '5',
                'promotion_id' => '1',
            ],
            [
                'category_id' => '5',
                'promotion_id' => '2',
            ],
            [
                'category_id' => '5',
                'promotion_id' => '3',
            ],
            [
                'category_id' => '5',
                'promotion_id' => '4',
            ],
        ];

        $table = $this->table('categories_promotions');
        $table->insert($data)->save();
    }
}
