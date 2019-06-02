<?php
use Migrations\AbstractSeed;

/**
 * Orders seed.
 */
class OrdersSeed extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UsersSeed',
            'CategoriesSeed',
            'ImagesSeed',
            'PromotionsSeed',
            'CategoriesPromotionsSeed',
            'ImagesPromotionsSeed'
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
                'id' => '1',
                'promotion_id' => '5',
                'user_id' => '2',
                'state' => 'pending',
                'created' => '2019-05-29 14:34:46',
            ],
            [
                'id' => '2',
                'promotion_id' => '8',
                'user_id' => '2',
                'state' => 'pending',
                'created' => '2019-05-29 14:49:36',
            ],
            [
                'id' => '3',
                'promotion_id' => '12',
                'user_id' => '3',
                'state' => 'pending',
                'created' => '2019-05-29 14:57:28',
            ],
            [
                'id' => '4',
                'promotion_id' => '4',
                'user_id' => '3',
                'state' => 'pending',
                'created' => '2019-05-29 15:04:40',
            ],
            [
                'id' => '5',
                'promotion_id' => '5',
                'user_id' => '3',
                'state' => 'pending',
                'created' => '2019-05-29 15:07:02',
            ],
        ];

        $table = $this->table('orders');
        $table->insert($data)->save();
    }
}
