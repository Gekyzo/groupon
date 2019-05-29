<?php
use Migrations\AbstractSeed;

/**
 * Images seed.
 */
class ImagesSeed extends AbstractSeed
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
                'id' => '1',
                'name' => '0-cena-en-kiro-sushi.jpeg',
                'path' => 'promotions/0-cena-en-kiro-sushi.jpeg',
                'created' => '2019-05-29 11:01:12',
                'deleted' => NULL,
            ],
            [
                'id' => '2',
                'name' => '0-cabrito-asado-en-cachetero.jpeg',
                'path' => 'promotions/0-cabrito-asado-en-cachetero.jpeg',
                'created' => '2019-05-29 11:56:19',
                'deleted' => NULL,
            ],
            [
                'id' => '3',
                'name' => '0-tapeo-en-torres-gastrobar.jpeg',
                'path' => 'promotions/0-tapeo-en-torres-gastrobar.jpeg',
                'created' => '2019-05-29 14:04:51',
                'deleted' => NULL,
            ],
            [
                'id' => '4',
                'name' => '0-menu-degustacion-la-cocina-de-ramon.jpeg',
                'path' => 'promotions/0-menu-degustacion-la-cocina-de-ramon.jpeg',
                'created' => '2019-05-29 14:06:52',
                'deleted' => NULL,
            ],
            [
                'id' => '5',
                'name' => '0-circuito-termal-en-saline-spa.jpeg',
                'path' => 'promotions/0-circuito-termal-en-saline-spa.jpeg',
                'created' => '2019-05-29 13:55:03',
                'deleted' => NULL,
            ],
            [
                'id' => '6',
                'name' => '0-sesion-de-spa-gold.png',
                'path' => 'promotions/0-sesion-de-spa-gold.png',
                'created' => '2019-05-29 13:57:39',
                'deleted' => NULL,
            ],
            [
                'id' => '7',
                'name' => '0-masaje-bienestar-en-columnata-spa.jpeg',
                'path' => 'promotions/0-masaje-bienestar-en-columnata-spa.jpeg',
                'created' => '2019-05-29 13:59:20',
                'deleted' => NULL,
            ],
            [
                'id' => '8',
                'name' => '0-ritual-dao.jpeg',
                'path' => 'promotions/0-ritual-dao.jpeg',
                'created' => '2019-05-29 14:02:28',
                'deleted' => NULL,
            ],
            [
                'id' => '9',
                'name' => '0-2-noches-desayuno-cava-spa-en-hotel-4.jpeg',
                'path' => 'promotions/0-2-noches-desayuno-cava-spa-en-hotel-4.jpeg',
                'created' => '2019-05-29 14:15:27',
                'deleted' => NULL,
            ],
            [
                'id' => '10',
                'name' => '0-tour-de-enoturismo.jpeg',
                'path' => 'promotions/0-tour-de-enoturismo.jpeg',
                'created' => '2019-05-29 14:17:14',
                'deleted' => NULL,
            ],
            [
                'id' => '11',
                'name' => '0-escapada-ezcaray-con-visita-a-bodega.jpeg',
                'path' => 'promotions/0-escapada-ezcaray-con-visita-a-bodega.jpeg',
                'created' => '2019-05-29 14:19:21',
                'deleted' => NULL,
            ],
            [
                'id' => '12',
                'name' => '0-escapada-romantica-en-haro.jpeg',
                'path' => 'promotions/0-escapada-romantica-en-haro.jpeg',
                'created' => '2019-05-29 14:21:40',
                'deleted' => NULL,
            ],
        ];

        $table = $this->table('images');
        $table->insert($data)->save();
    }
}
