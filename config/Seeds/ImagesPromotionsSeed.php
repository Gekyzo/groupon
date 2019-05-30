<?php
use Migrations\AbstractSeed;

/**
 * ImagesPromotions seed.
 */
class ImagesPromotionsSeed extends AbstractSeed
{
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
                'image_id' => '1',
                'promotion_id' => '1',
            ],
            [
                'image_id' => '2',
                'promotion_id' => '2',
            ],
            [
                'image_id' => '3',
                'promotion_id' => '3',
            ],
            [
                'image_id' => '4',
                'promotion_id' => '4',
            ],
            [
                'image_id' => '5',
                'promotion_id' => '5',
            ],
            [
                'image_id' => '6',
                'promotion_id' => '6',
            ],
            [
                'image_id' => '7',
                'promotion_id' => '7',
            ],
            [
                'image_id' => '8',
                'promotion_id' => '8',
            ],
            [
                'image_id' => '9',
                'promotion_id' => '9',
            ],
            [
                'image_id' => '10',
                'promotion_id' => '10',
            ],
            [
                'image_id' => '11',
                'promotion_id' => '11',
            ],
            [
                'image_id' => '12',
                'promotion_id' => '12',
            ],
        ];

        $table = $this->table('images_promotions');
        $table->insert($data)->save();
    }
}
